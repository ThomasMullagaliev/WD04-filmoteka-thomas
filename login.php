<?php 
 require 'config.php';
 require('functions/checkAdmin.php');

	if ( isset($_POST['enter']) ) {
		$userName = 'admin';
		$userPassword = '123456';
		if ( $_POST['login'] == $userName) {
			if ( $_POST['password'] == $userPassword){

				$_SESSION['user'] = 'admin';
				header('Location: ' .HOST.'index.php');

			}
		}
		
		$exrire = time() + 60*60*24*30;
		setcookie('user-name', $userName, $exrire );
		setcookie('user-city', $userCity, $exrire );
	}


	include 'views/header.tpl';
	include 'views/login.tpl';
	include 'views/footer.tpl';


?>



