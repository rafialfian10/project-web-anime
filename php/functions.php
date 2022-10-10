<?php  
	
	$conn = mysqli_connect("localhost", "root", "", "data-anime");

?>

<?php  

	function register($data){

		global $conn;

		$username = htmlspecialchars(strtolower(stripslashes($data["username"])));
		$email = htmlspecialchars($data["email"]);
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$cpassword = mysqli_real_escape_string($conn, $data["cpassword"]);

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' ");
		if(mysqli_fetch_assoc($result) ){
			echo  "<script>
					alert('Username / Email sudah terdaftar!');
					document.location.href = 'register.php';
				</script>";
			return false;
		}

		if($password !== $cpassword){
			echo  "<script>
					alert('Konfirmasi password tidak sesuai!');
					document.location.href = 'register.php';
				</script>";
			return false;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$query = "INSERT INTO users VALUES('', '$username', '$email', '$password')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>

<?php  

	function query($query){

		global $conn;

		$result = mysqli_query($conn, $query);
		$rows = [];
		while($anime = mysqli_fetch_assoc($result)){
			$rows[] = $anime;
		}

		return $rows;
	}
?>

<?php

	function insert($data){
		global $conn;

		$judul = htmlspecialchars($_POST["judul"]);
		$jml_episode = htmlspecialchars($_POST["jml-episode"]);
		$tgl_rilis = htmlspecialchars($_POST["tgl-rilis"]);
		$studio = htmlspecialchars($_POST["studio"]);
		$genre = htmlspecialchars($_POST["genre"]);
		$durasi = htmlspecialchars($_POST["durasi"]);
		$skor = htmlspecialchars($_POST["skor"]);
		$credit = htmlspecialchars($_POST["credit"]);

		$gambar = upload();

		if($gambar === false){
			return false;
		}

		$query = "INSERT INTO anime VALUES('', '$gambar', '$judul', '$jml_episode', '$tgl_rilis', '$studio', '$genre', '$durasi', '$skor', '$credit')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>


<?php

	function upload(){
		global $conn;

		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$tmpName = $_FILES['gambar']['tmp_name'];
		$error = $_FILES['gambar']['error'];

		if($error === 4){
			echo "<script>
					alert('Upload gambar terlebih dahulu!');
					document.location.href = 'insert.php';
				 </script>";
			return false;
		}

		if($ukuranFile > 1000000){
			echo "<script>
					alert('Ukuran file terlalu besar! (maksimal 1Mb)');
					document.location.href = 'insert.php';
		 		</script>";
			return false;
		}

		$ekstensiFileValid = ['jpg', 'jpeg', 'png'];
		$ekstensiFile = explode('.', $namaFile);
		$ekstensiFile = strtolower(end($ekstensiFile));

		if(!in_array($ekstensiFile, $ekstensiFileValid)){
			echo "<script>
					alert('Ekstensi file salah! (jpg, jpeg, png)');
					document.location.href = 'insert.php';
				</script>";
			return false;
		}

		$ekstensiFileBaru = uniqid();
		$ekstensiFileBaru .= '.';
		$ekstensiFileBaru .= $ekstensiFile;

		move_uploaded_file($tmpName, 'img/' . $ekstensiFileBaru);

		return $ekstensiFileBaru;
	}
?>


<?php

	function editProfil($data){
		global $conn;

		$id = htmlspecialchars($_POST["id"]);
		$username = htmlspecialchars($_POST["username"]);
		$email = htmlspecialchars($_POST["email"]);
		$tglLahir = htmlspecialchars($_POST["tgl_lahir"]);
		$hobi = htmlspecialchars($_POST["hobi"]);
		$negara = htmlspecialchars($_POST["negara"]);
		$nohp = htmlspecialchars($_POST["no_hp"]);
		$photo = htmlspecialchars($_POST["photo"]);

		$query ="UPDATE users SET username = '$username',
								email = '$email',
								tgl_lahir = '$tglLahir',
								hobi = '$hobi',
								negara = '$negara',
								no_hp = '$nohp',
								photo = '$photo' WHERE id= '$id' ";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
?>