<?php 
	require 'config.php';
	require 'database.php';

	$link = db_connect();
	require('models/films.php');
	require('functions/checkAdmin.php');

	if (@$_GET['action'] == 'delete') {
		$result = film_delete($link, $_GET['id']);
	
		if ( $result ) {
		 	$resultInfo = "<p>Фильм был удален!</p>";
		 } else {
		 	$resultError = "<p>Что-то пошло не так!</p>";
		 }
		// mysqli_affected_row($link);
	}

	$films = films_all($link);


	include 'views/header.tpl';
	include 'views/notification.tpl';
	include 'views/index.tpl';
	include 'views/footer.tpl';


?>



