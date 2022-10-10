<?php  

require 'functions.php';

if(isset($_POST["submit"]) ){
	if(register($_POST) > 0){
		echo "<script>
				alert('Register berhasil dilakukan!');
				document.location.href = 'login.php';
			</script>";
	} else {
		echo "<script>
				alert('Register gagal dilakukan!');
				document.location.href = 'register.php';
			</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/register1.css">
</head>
<body>
	<form action="" method="post">
		<div class="container">
			<div class="title">Register</div>
			<div class="username"><input type="text" name="username" placeholder="Username....." size="40" autocomplete="off"> </div>
			<div class="email"><input type="email" name="email" placeholder="Email....." size="40" autocomplete="off"> </div>
			<div class="password"><input type="password" name="password" placeholder="Password....." size="40" autocomplete="off"> </div>
			<div class="cpassword"><input type="password" name="cpassword" placeholder="Confirm password....." size="40" autocomplete="off"> </div>
			<div class="button"><button type="submit" name="submit">Sign Up</button></div>
			<div class="signin">have an account ? <a href="login.php">Sign In</a></div>
		</div>
	</form>
</body>
</html>