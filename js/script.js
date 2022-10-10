
$(document).ready(function(){

	$('.container-satu').hide();

	$('.logout').on('click', function(){
		$('.container-satu').show();

		$('.cancel').on('click', function(){
			$('.container-satu').hide()
		});

		$('.oke').on('click', function(){
			window.location.href = "../php/login.php";
		});
	});
});




