<?php  

	require 'functions.php';

	session_start();

	$_SESSION = [];
	session_unset();
	
	session_destroy();

	setcookie("id", '', time() - 3600);
	setcookie("key", '', time() - 3600);	

	echo "<script>
			alert('Logout success');
			document.location.href = 'login.php';
		</script>";

?>


