<?php 
require 'config.php';
require 'database.php';
require 'functions/checkAdmin.php';

$link = db_connect();
require('models/films.php');

if ( array_key_exists('newFilm', $_POST) ) {
	if ($_POST['name'] == '') {
		$errors[] = "<p>Необходимо ввести название фильма!</p>";
	}
	if ( $_POST['genre'] == '') {
		$errors[] = "<p>Необходимо ввести жанр фильма!</p>";
	}
	if ( $_POST['year'] == '') {
		$errors[] = "<p>Необходимо ввести год фильма!</p>";
	}
	if ( empty($errors) ) {
		$result = film_new($link, $_POST['name'], $_POST['genre'], $_POST['year'], $_POST['description']);
	}	

	if ( $result ) {
		$resultSuccess = "<p>Фильм был успешно добавлен!</p>";
	} else { 
		$resultError = "<p>Что то пошло не так. Добавьте фильм еще раз!</p>";
	}
}

include 'views/header.tpl';
include 'views/notification.tpl';
include 'views/new-film.tpl';
include 'views/footer.tpl';

 ?>