<?php
    require 'functions.php';

    session_start();

    if(!isset($_SESSION["submit"])){
        header("Location: login.php");
        exit;
    }

    if(isset($_POST["ok"]) ){
        session_destroy();
        header("Location: login.php");
        exit;
    }

    // Page
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query("SELECT * FROM anime"));
    $jumlahHalaman = $jumlahData / $jumlahDataPerHalaman;
    

    $animes = query("SELECT * FROM anime LIMIT $dataAwal, $jumlahDataPerHalaman");
    // $users = query("SELECT * FROM users");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/logout1.css">
    <link rel="stylesheet" href="css/search1.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/content.css">
</head>
<body>
        <!-- Navigaton -->
            <div class="container-satu">
                <div class="toggle">
                    <input type="checkbox">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="title">
                    <h3>Anime</h3>
                </div>

                    <nav class="sSatu">
                        <ul>    
                            <li><a href="">Home</a></li>
                            <li><a href="">List Anime</a></li>
                            <li><a href="">Genre</a></li>
                            <li><a href="">About</a></li>
                        </ul>
                    </nav>

                <div class="profil">
                    <div><img src="css/img/profile.png"><input type="checkbox"></div>
                </div>
                    <div class="sDua">
                        <ul>
                            <li><a href="profile.php?id=<?php echo $user["id"]; ?>">Profile</a></li>
                            <li><a href="">Edit</a></li>
                            <li><button type="button" class="btn-logout">Logout</button></li>    
                        </ul>
                    </div>
                    
            </div>
        <!-- End Navigation -->
    
        <!-- Search -->
          <div class="container-dua">
                <input type="text" name="keyword" class="keyword" placeholder="Search keyword....." autocomplete="off">
                <button type="submit" name="search" class="search"><img src="css/img/search1.png"></button>
          </div>
        <!-- End Search -->


        <!-- Gallery -->
                <div class="container-tiga">
                    <?php foreach($animes as $anime) : ?>
                         <a href=""><img src="img/<?php echo $anime["gambar"]; ?>"></a>
                    <?php endforeach ;?>
                </div>
            
        <!-- End Gallery -->


        <!-- Logout -->
            <div class="navLogout" id="navL">
                <div class="x"><img src="css/img/delete1.jpg"></div>
                    <h2>Are you sure ?</h2>

                    <div class="pilihan">
                        <div class="ok"><a href="logout.php" name="ok">Ok</a></div>
                        <div class="cancel">Cancel</div>
                    </div>
            </div>
        <!-- End Logout -->
             <div class="kotak"></div>

        <!-- Insert data  -->
        <a href="insert.php" class="insert">Insert Data Anime</a>
        <br><br><br><br><br>
        

        <script src="../js/index.js"></script>
</body>
</html>