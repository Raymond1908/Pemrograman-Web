<?php
    
    $db = mysqli_connect("localhost", "root", "", "useraccount");

    function query($query) {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }

        return $rows;
    }

    #buat table database
    $sqlFile = "Database/admin_account.sql";

    $tableExistsQuery = "SHOW TABLES LIKE 'admin_account'";
    $tableExistsResult = mysqli_query($db, $tableExistsQuery);

    if (mysqli_num_rows($tableExistsResult) == 0) {
        $sql = file_get_contents($sqlFile);
        if (mysqli_multi_query($db, $sql)) {
            do {
                if ($result = mysqli_store_result($db)) {
                    mysqli_free_result($result);
                }
            } while (mysqli_next_result($db));
            echo "SQL file imported successfully.";
        } else {
            echo "Error importing SQL file: " . mysqli_error($db);
        }
    } else {
        echo "";
    }
    
    
    function registrasi($data) {
        global $db;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($db, $data["password"]);
        $password2 = mysqli_real_escape_string($db, $data["password2"]);

        $result = mysqli_query($db, "SELECT username FROM admin_account WHERE username = '$username'");
        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('username tersebut telah terdaftar!')
                </script>";
            return false;
        }


        if( $password !== $password2 ) {
            echo "<script> 
                    alert('konfirmasi password tidak sesuai!')
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        

        mysqli_query($db, "INSERT INTO admin_account VALUES('$username', '$password', 'default.jpg')");


        return mysqli_affected_rows($db);
    }

    function upload($name) {

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if( $error === 4 ) {
            
            echo "<script>
                    alert('anda belum memilih gambar');
                </script>";
            
            return false-4;

        }

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensinya = explode('.', $namaFile);
        $ekstensinya = strtolower(end($ekstensinya));


        if( !in_array($ekstensinya, $ekstensiValid) ) {
            echo "<script>
                alert('format file tidak sesuai');
                </script>";
            return false-2;
        }
        if( $ukuranFile > 10000000 ) {
            echo "<script>
                    alert('ukuran gambar terlalu besar')
                </script>";
            return false-3;
        }

       
        $namaFileBaru = uniqid("CB_img");
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensinya;

        move_uploaded_file($tmpName, 'UserProfile/'.$namaFileBaru);

        return $namaFileBaru;

    }

    function add( $data ) {
        global $db;

        $username = $data["username"];
        
        if($data["picture"] !== "default.jpg") {
            $gambarLama = $data["picture"];
        }

        /*
        $gambar = upload($username);
        */
            
        $gambar = upload($username);
            
            
        if( $gambar <= 0)  {
            return $gambar;
        }
        if ($gambarLama !== $gambar) {
            unlink("UserProfile/".$gambarLama);
        }    

        $query = "UPDATE admin_account 
                SET picture = '$gambar'
                WHERE username = '$username'
                ";  

        mysqli_query($db, $query);
        
        return mysqli_affected_rows($db);
    } 

    function sendM( $data, $message ) {
        global $db;
        $message = mysqli_real_escape_string($db, $message);

        $username = $data["username"];
        

        mysqli_query($db, "INSERT INTO message(username, isi_pesan) VALUES('$username', '$message')");

    }

?>
