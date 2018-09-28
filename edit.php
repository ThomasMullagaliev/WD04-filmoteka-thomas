 <?php 

	$resultSuccess = "";
	$resultError = "";
	$errors = array();
	// Подключения к БД
	$link = mysqli_connect('localhost', 'root', '', 'WD04-filmoteka-thomas');

	// echo "<pre>";
	// print_r($_GET);
	// print_r($_POST);
	// echo "</pre>";

	if ( mysqli_connect_error() ) {
		die("Ошибка подключения к базе данных.");
	}




	if (@$_GET['action'] == 'delete') {
		$query = "DELETE FROM filmoteka WHERE id =' ".mysqli_real_escape_string($link, $_GET['id'])." ' LIMIT 1";
		mysqli_query($link, $query );
		if ( mysqli_affected_rows($link) > 0 ) {
		 	$resultInfo = "<p>Фильм был удален!</p>";
		 } 
		// mysqli_affected_row($link);
	}


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
			$query = "UPDATE filmoteka 
								SET name ='". mysqli_real_escape_string($link, $_POST['name']) ."',
										genre ='". mysqli_real_escape_string($link, $_POST['genre']) ."',
										year='". mysqli_real_escape_string($link, $_POST['year']) ."'
								WHERE id=".mysqli_real_escape_string($link, $_GET['id'])." LIMIT 1";


			if ( mysqli_query($link, $query) ) {
				$resultInfo = "<p>Фильм был успешно добавлен!</p>";
			} else { 
				$resultError = "<p>Что то пошло не так. Добавьте фильм еще раз!</p>";
			}
		}
	}

// Выборка с бд
$query = "SELECT * FROM filmoteka WHERE id = ' ".mysqli_real_escape_string($link, $_GET['id'])." ' LIMIT 1";


$result = mysqli_query($link, $query);

if ( $result = mysqli_query($link, $query) ) {
	$film = mysqli_fetch_array($result);
}


?>



<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Томас Муллагалиев - Фильмотека</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" /><!-- endbuild -->
	<!-- build:cssCustom css/main.css -->


	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/tm.css" />

</head>

<body class="index-page">
	<div class="container user-content section-page">

		<?php if ( $resultSuccess != '' ) { ?> 
			<div class="info-success2"><?=$resultSuccess?></div>
		<?php } ?>

		<?php if ( @$resultInfo != '' ) { ?> 
			<div class="info-notification"><?=$resultInfo?></div>
		<?php } ?>

		<?php if ( $resultError != '' ) { ?> 
			<div class="error"><?=$resultError?></div>
		<?php } ?>


		<div class="title-1">Редактирование фильма <?=$film['name']?></div>

		<div class="panel-holder mt-30 mb-40">
			<div class="title-3 mt-0">Добавить фильм</div>
			<form action="edit.php?id=<?=$film['id']?>" method="POST">

				<?php 
				if ( !empty($errors)) {
					foreach ($errors as $key => $value) {
					echo "<div class='error'>$value</div>";
					}
				}
				?>

				<div class="form-group">
					<label class="label">Название фильма<input class="input" name="name" type="text" placeholder="Такси 2" value="<?=$film['name']?>" /></label>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group"><label class="label">Жанр<input class="input" name="genre" type="text" placeholder="комедия" value="<?=$film['genre']?>"/></label></div>
					</div>
					<div class="col">
						<div class="form-group"><label class="label">Год<input class="input" name="year" type="text" placeholder="2000" value="<?=$film['year']?>"/></label></div>
					</div>
				</div>
				<input class="button" type="submit" name="update-film" value="Обновить" />
			</form>
			<a class="button mt-20" href="index.php">Вернуться на главную</a>
		</div>
	</div><!-- build:jsLibs js/libs.js -->
	<script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
	<!-- build:jsVendor js/vendor.js -->
	<script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIr67yxxPmnF-xb4JVokCVGgLbPtuqxiA"></script><!-- endbuild -->
	<!-- build:jsMain js/main.js -->
	<!-- <script src="js/main.js"></script><!-- endbuild --> -->
	<script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>