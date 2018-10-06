<?php 
// include "functions/checkAdmin.php";
 ?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="msapplication-TileColor" content="#6AB12F">
	<meta name="theme-color" content="#6AB12F">
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
		<ul class="admin-nav mb-20">
			<a href="index.php" class="button admin-nav__link">Главная</a>


			<?php if (isset($_SESSION['user'])) {
				if ($_SESSION['user'] == 'admin') {?>
						
					<a href="new-film.php" class="button admin-nav__link">Добавить новый фильм</a>

			<?php	}} ?>


			<a href="request.php" class="button admin-nav__link">Указать информацию</a>

			<?php if (!isAdmin()) {?>
						
				<a href="login.php" class="button admin-nav__link">Вход для администратора</a>

			<?php	} ?>


			<?php if (isAdmin()) {?>
						
					<a href="logout.php" class="button admin-nav__link">Выход</a>

			<?php	} ?>
			
		</ul>

		<?php if ( isset($_COOKIE['user-name']) ) { ?>
		<div class="mb-50">

			<?php if ( isset($_COOKIE['user-city']) ) { ?>
				Привет, <?=$_COOKIE['user-name']?> из <?=$_COOKIE['user-city']?>!
			<?php } else { ?>
				Привет, <?=$_COOKIE['user-name']?>!
			<?php } ?>

		</div>
		<?php } ?>


		