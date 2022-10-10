<?php

    require 'functions.php';

    if(isset($_POST["submit"])){
        if(insert($_POST) > 0){
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'insert.php';
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
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insert Data Anime</title>
</head>
<body>
    <h2>Insert Data Anime</h2>
         <form action="" method="post" enctype="multipart/form-data">
             <div class="container">
                <input type="text" name="judul" placeholder="Judul....." autocomplete="off">
                <input type="text" name="jml-episode" placeholder="Jumlah Episode....." autocomplete="off">
                <input type="text" name="tgl-rilis" placeholder="Tanggal Rilis....." autocomplete="off">
                <input type="text" name="studio" placeholder="Studio....." autocomplete="off">
                <input type="text" name="genre" placeholder="Genre....." autocomplete="off">
                <input type="text" name="durasi" placeholder="Durasi....." autocomplete="off">
                <input type="text" name="skor" placeholder="Skor....." autocomplete="off">
                <input type="text" name="credit" placeholder="Credit....." autocomplete="off">
                <input type="file" name="gambar" placeholder="Image....." autocomplete="off" class="gambar">
                <button type="submit" name="submit">Insert Data</button>
            </div>
        </form>
</body>
</html>