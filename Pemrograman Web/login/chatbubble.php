<?php
  session_start();
  if( !isset($_SESSION["login"]) ) {
    header("Location: halamanlogin.php");
    exit;
  }

  //koneksi php
  require 'koneksi.php';
  
  $username = $_SESSION["username"];
   
  $account = query("SELECT * FROM admin_account WHERE username = '$username'")[0];

  //var_dump($account["picture"]); die;
  $_SESSION["picture"] = $account["picture"];

  $errormsg = "";

  if( isset($_POST["sendM"]) ) {

    if( sendM($_SESSION, $_POST["yourMessage"]) > 0) {
      echo "

        <script>
          hideUploadPopup();
        </script>

      ";
    } else {
      echo "
        <script>
          hideUploadPopup();
        </script>
      ";
    }
  }

  if( isset($_POST["change-pp"]) ) { //implementasi upload pada fitur ganti foto profil
    //var_dump(add($_SESSION)); die;
    
    if( add($_SESSION) > 0 ) { //jika fungsi add berhasil, maka script dibawah akan dijalankan
      echo "

        <script>
          alert('data berhasil ditambahkan!');
          hideUploadPopup();
        </script>

      ";
      header("Location: chatbubble.php");
      exit;

    } else {
      
      echo "
        <script>
          alert('data GAGAL ditambahkan!');
          hideUploadPopup();
        </script>
      ";
      
    }
  }
$globalM = query("SELECT * FROM `message`");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ChatBubble</title>
    <link rel="icon" href="/chatbubble.png">
    <link href="chatbubble.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <header class="navbar">
      <nav id="logout">
        <ul>
          <a href="logout.php">
          <button id="logout-btn" >Logout</button>
          </a>
        </ul>
      </nav>
      <nav id="name">
        <div class="logo"><a href="#">ChatBubble</a>
          <img src="../chatbubble.png" alt="chatbubble">
        </div>
      </nav>
      <div class="search-box">
        <input type="text" placeholder="Search">
        <button><i class="fa fa-search"></i></button>
      </div>
    </header>
    
    <main>
      <div class="side-bar">
        <div class="Percakapan">
          <h2>Percakapan</h2>
          <ul>
            <li><a href="#">Raymond</a></li>
            <li><a href="#">Ariel</a></li>
            <li><a href="#">Mikael</a></li>
            <li><a href="#">Bravio</a></li>
          </ul>
        </div>
        <div class="user-profile">
          <img class="profile-pic" src="UserProfile/<?= $account['picture']; ?>" onclick="showUploadPopup()">
          <p class="user-profile-name">@<?= $username ?></p>
        </div>
      </div>
      
      <div class="chat">
        <h2>Global chat</h2>
        <div class="chat-box">

          <?php $i = 1; ?>
          <?php foreach( $globalM as $row ) : ?>
            <?php if( $username == $row["username"] ) : ?>
              <p><strong style="color:green;">You:</strong> <?= $row["isi_pesan"] ?></p>
              <?php continue; ?>
            <?php endif; ?>
              <p><strong><?= $row["username"] ?>:</strong> <?= $row["isi_pesan"] ?></p>
            <?php $i++; ?>
          <?php endforeach; ?>
          
        </div>
        <form class="form" action="" method="post">          <!-- onsubmit="return false;" -->
          <input  name="yourMessage" type="text" placeholder="Type your message..." required>
          <button name="sendM" type='submit' onclick="chating()" >Send</button> <!-- Write your comments here -->
        </form>
      </div>

      <div class="pop-up_pp" id="uploadPopup">
      
        <div id="uploadPopupContent">
            <h2>Change Profile Picture</h2>
            <span id="uploadPopupClose" onclick="hideUploadPopup()">&times;</span>
            
            <?=
              $errormsg;
            ?>
            
            <!--<img id="previewImage" alt="Preview" src="../anggota/ariel.jpg">-->
            <img id="PPPreview" class="pp-preview" src="UserProfile/<?= $account['picture']; ?>" width="200px">
            <form action="" method="POST" enctype="multipart/form-data"> 
              <input name="gambar" type="file" id="fileInput">
              <br>
              <button name="change-pp" id="upload-button" >Ganti</button>
            </form>
        </div>
      </div>
      
    </main>
    <script src="chatbubble.js"></script>
    
  </body>
</html>
