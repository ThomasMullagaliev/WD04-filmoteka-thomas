<?php 
require('config.php');

	if ( isset($_POST['user-submit']) ) {
		$userName1 = $_POST['user-name'];
		$userCity1 = $_POST['user-city'];
		$exrire = time() + 60*60*24*30;
		setcookie('user-name', $userName1, $exrire );
		setcookie('user-city', $userCity1, $exrire );
	}
	header('Location: ' .HOST.'index.php');

 ?>