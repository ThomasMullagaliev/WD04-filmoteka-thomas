 <?php 

 require 'config.php';
 require 'database.php';

 $link = db_connect();
 require('models/films.php');


 if ( array_key_exists('update-film', $_POST) ) {
 	
 	// Обработка ошибок

 		if ( $_POST['name'] == '') {
 			$errors[] = "<p>Необходимо ввести название фильма!</p>";
 		}
 		if ( $_POST['genre'] == '') {
 			$errors[] = "<p>Необходимо ввести жанр фильма!</p>";
 		}
 		if ( $_POST['year'] == '') {
 			$errors[] = "<p>Необходимо ввести год фильма!</p>";
 		}
 		if ( empty($errors) ) {
 			// Запись данных в БД
 			$result = film_update($link, $_POST['name'], $_POST['genre'], $_POST['year'], $_POST['description'], $_GET['id']);


 			if ( $result ) {
 				$resultInfo = "<p>Фильм был успешно добавлен!</p>";
 			} else { 
 				$resultError = "<p>Что то пошло не так. Добавьте фильм еще раз!</p>";
 			}
 		}
 	}


 $film = get_film($link, $_GET['id']);

 include 'views/header.tpl';
 include 'views/notification.tpl';
 include 'views/edit.tpl';
 include 'views/footer.tpl';