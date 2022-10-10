
<?php  
	
	session_start();

	require 'functions.php';

	//cookie
	if(isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ){
		$id = $_COOKIE["id"];
		$key = $_COOKIE["key"];

		$result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id' ");
		$rows = mysqli_fetch_assoc($result);

		if($key === hash("sha256", $rows["username"])){
			$_SESSION["submit"] = true;
		}
	}

	// session
	if(isset($_SESSION["submit"]) ){
		header("Location: index.php");
		exit;
	}

	//login
	if(isset($_POST["submit"]) ){

		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' && email = '$email' ");
		if (mysqli_num_rows($result) === 1){
			$rows = mysqli_fetch_assoc($result);

				if(password_verify($password, $rows["password"]) ){


					//set Session
					$_SESSION["submit"] = true;

					//set cookie
					if(isset($_POST["remember"]) ){

						setcookie("id", $rows["id"], time() + 60);
						setcookie("key", hash("sha256", $rows["username"]), time() + 60);
					}
					echo "<script>
							alert('Login berhasil!');
							document.location.href = 'index.php';
						</script>";
				} else {
					echo "<script>
							alert('Password salah!');
							document.location.href = 'login.php';
						</script>";
				}
		} else {
			echo "<script>
					alert('Username / Email salah!');
					document.location.href = 'login.php';
				</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<form action="" method="post">
		<div class="container">
			<div class="title">Login</div>
			<div class="username"><input type="text" name="username" placeholder="Username....." autocomplete="off"> </div>
			<div class="email"><input type="email" name="email" placeholder="Email....." autocomplete="off"> </div>
			<div class="password"><input type="password" name="password" placeholder="Password....." autocomplete="off"> </div>
			<div class="remember">
				<div class="checklist"></div>
				<input type="checkbox" name="remember" class="toggle">
			</div>
			<div class="text"><p class="text">Remember me</p></div>
			<div class="button"> <button type="submit" name="submit">Sign In</button></div>
			<div class="signup">Don't have an account ? <a href="register.php">Sign Up</a></div>
		</div>
	</form>

	<script src="../js/login.js"></script>
</body>
</html>