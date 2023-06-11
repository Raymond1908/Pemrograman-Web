<?php
session_start();

if ( isset($_SESSION["login"]) ) { //memaksa user pergi ke chatbubble.php jika user belum log out
  header("Location: chatbubble.php");
  exit;
}

require "koneksi.php";

if( isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db, "SELECT * FROM admin_account WHERE username = '$username'");

  if( mysqli_num_rows($result)===1 ) {

    $row = mysqli_fetch_assoc($result);
    
    
    if( password_verify($password, $row["password"]) ) 
    {
      $_SESSION["login"] = true;
      $_SESSION["username"] = $username;
      header("Location: chatbubble.php");
      exit;
    }

  } else {
    $error = true;
  }

}

if( isset($_POST["register"]) ) {
  
  if( registrasi($_POST)> 0 ) {
    echo "<script>
          alert('user baru berhasil ditambahkan!')
          </script>";
    header("Location: halamanlogin.php");
  } else {
    echo mysqli_error($db);
  }

}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ChatBubble - Login</title>
  <link rel = "icon" href ="/chatbubble.png" type = "image/x-icon">
  <link href="halamanalogin.css" rel="stylesheet" type="text/css" />
  
</head>

<body>
  <header>
    <h1 id="loginHeader"><a href="../index.html">ChatBubble</a></h1>
  </header>
  <main>

    <p id="login-error-alert"
    <?php if( isset($error) ) : ?>
      > username/password salah! 
    <?php else : ?>
      style="visibility: hidden;">&nbsp;
    <?php endif;?>
    </p>

    <div id="login-form" class="container">
      <h1 id="h1login" class="h1logres">Login</h1>
      
      <form action="" method="post" onsubmit="validateForm(event)">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button name="login" type="submit" id="login-button">Login</button>
        <button type="button" id="register-button" onclick="showregisterform()">Register</button>
      </form>
    </div>

    <div id="register-form" class="container">
      <h1 id="h1register" class="h1logres">Register</h1>
      <form action="" method="post" onsubmit="validateForm(event)">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="passconfirm">Konfirmasi password:</label>
        <input type="password" id="passconfirm" name="password2" required>
        <button name="register" type="submit" id="register-button">Register</button>
        <p>
          <a id="have-account" onclick="showregisterform()">Already have an account?</a>
        </p>
      </form>
    </div>
    
  </main>
  <script src="halamanlogin.js"></script>
</body>

</html>