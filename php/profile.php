<?php

    require 'functions.php';

    $id = $_GET["id"];

    $row = query("SELECT * FROM users WHERE id = $id")[0];

    if(isset($_POST["submit"]) ){
        if(editProfil($_POST) > 0){
            echo "<script>
                    alert('Profil berhasil diubah!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Profil berhasil diubah!');
                    document.location.href = 'profile.php';
                </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit-profile1.css">
    <title>Profile</title>
</head>
<body>
    <h2>Selamat Datang Mr. <?php echo $row["username"]; ?></h2>

    <form action="" method="post">
        <div class="container">
            <div class="profil">
                <input type="text" name="username" placeholder="Username...." class="username" value="<?php echo $row["username"] ?>">
                <input type="text" name="email" placeholder="Email...." class="email" value="<?php echo $row["email"] ?>">
                <button type="submit" name="submit">Save</button>
                <h4>Lengkapi profil anda
                    <div class="toggle"> 
                        <input type="checkbox" class="cbox"> 
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </h4>
            </div>
       
            <div class="profil-tambahan">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <input type="text" name="tgl_lahir" placeholder="Birth Day...." class="tgl-lahir" value="<?php echo $row["tgl_lahir"]; ?>">
                <input type="text" name="hobi" placeholder="Hobby...." class="hobi" value="<?php echo $row["hobi"]; ?>">
                <input type="text" name="negara" placeholder="State...." class="negara" value="<?php echo $row["negara"]; ?>">
                <input type="text" name="no_hp" placeholder="Number phone...." class="no-hp" value="<?php echo $row["no_hp"]; ?>">
                <input type="text" name="photo" placeholder="Photo profile...." class="photo" value="<?php echo $row["photo"]; ?>">
                
            </div>
         </div>
    </form>
   
    <script src="../js/edit.js"></script>
</body>
</html>