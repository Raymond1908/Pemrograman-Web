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

  if( isset($_POST["change-pp"]) ) {
    //var_dump(add($_SESSION)); die;
    
    if( add($_SESSION) > 0 ) {
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
          <h2>Teman</h2>
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
        <h2>Nama User/grup tujuan</h2>
        <div class="chat-box">
          <p><strong>Raymond:</strong> Hai, kalian sedang apa?</p>
          <p><strong>Ariel:</strong> Sedang bersantai</p>
          <p><strong>Mikael:</strong> Ada yang ingin bermain game?</p>
          <p><strong>Bravio:</strong> Ayo</p>
        </div>
        <form class="form" onsubmit="return false;">
          <input id="yourchat" type="text" placeholder="Type your message..." value=''>
          <button type='reset' onclick="chating()">Send</button>
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
