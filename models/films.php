<?php 
//Фильмы с БД
function films_all($link){

	$query = "SELECT * FROM filmoteka";
	$films = array();

	$result = mysqli_query($link, $query);

	if ( $result = mysqli_query($link, $query) ) {
		while ( $row = mysqli_fetch_array($result)  ) {
			$films[] = $row;
		}
	}
	return $films;
}


function film_new($link, $name, $genre, $year, $description){
	if(isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !=''){
		$fileName = $_FILES['photo']['name'];
		$fileTmpLock = $_FILES['photo']['tmp_name'];
		$fileType = $_FILES['photo']['type'];
		$fileSize = $_FILES['photo']['size'];
		$fileErrorMsg = $_FILES['photo']['error'];
		$kaboom = explode(".", $fileName );
		$fileExt = end($kaboom);

		//проверяем, что есть фото
		list($height, $width) = getimagesize($fileTmpLock);
		if($height < 10 || $width < 10){
			$errors[] = 'У изображения слишком маленький размер';
		}
		//даем для фото рандомное имя
		$db_file_name = rand(10000000, 99999999).".".$fileExt;
		if($fileSize > 10485760){
			$errors[] = "Очень большой размер изображения!";

		} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName )){
			$errors[] = "Выберите изображение с расширением .jpeg, .gif,.jpg или .png";
		} else if ($fileErrorMsg == 1){
			$errors[] = "Произошла ошибка";
		}
		//выбираем путь для сохранения фото
		$photoFolderLoc = ROOT . 'data/films/';
		$photoFolderLocMin = ROOT . 'data/films/min/';
		//$photoFolderLocFull = ROOT . 'data/films/full/';

		$uploadFile = $photoFolderLoc . $db_file_name;

		//перемещаем файл из временного хранилища в папку с фото
		$moveResult = move_uploaded_file($fileTmpLock, $uploadFile);
		if ($moveResult != true) {
			$errors[] = 'Файл изображения не загружен';
		}

		//превращаем загруженное фото в миниатюру, используя спец ф-цию
		require_once( ROOT . "functions/image_resize_imagick.php");
		$target_file = $photoFolderLoc . $db_file_name;
		//$resized_file = $photoFolderLoc . $db_file_name;
		$resized_file = $photoFolderLocMin . $db_file_name;

		//размеры, по которым будем обрезать загруженное фото
		$wmax = 137;
		$hmax = 200;
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img->writeImage($resized_file);
	}
	$query = "INSERT INTO filmoteka (name, genre, year, description, photo) VALUES (
	'". mysqli_real_escape_string($link, $name) ."', 
	'". mysqli_real_escape_string($link, $genre) ."', 
	'". mysqli_real_escape_string($link, $year) ."',
	'". mysqli_real_escape_string($link, $description) ."',
	'". mysqli_real_escape_string($link, $db_file_name) ."'
	)";


	if ( mysqli_query($link, $query) ) {
		$result = true;
	} else {
		$result = false;			
	}

	return $result;
}
function imgUpdate(){


}
function film_update($link, $name, $genre, $year, $description, $id){


	echo "<pre>";
	echo $db_file_name;
	print_r($_FILES);
	echo "</pre>";
	//обработка загружаемого изображения для постера
		if(isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !=''){
			$fileName = $_FILES['photo']['name'];
			$fileTmpLock = $_FILES['photo']['tmp_name'];
			$fileType = $_FILES['photo']['type'];
			$fileSize = $_FILES['photo']['size'];
			$fileErrorMsg = $_FILES['photo']['error'];
			$kaboom = explode(".", $fileName );
			$fileExt = end($kaboom);

			//проверяем, что есть фото
			list($height, $width) = getimagesize($fileTmpLock);
			if($height < 10 || $width < 10){
				$errors[] = 'У изображения слишком маленький размер';
			}
			//даем для фото рандомное имя
			$db_file_name = rand(10000000, 99999999).".".$fileExt;
			if($fileSize > 10485760){
				$errors[] = "Очень большой размер изображения!";

			} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName )){
				$errors[] = "Выберите изображение с расширением .jpeg, .gif,.jpg или .png";
			} else if ($fileErrorMsg == 1){
				$errors[] = "Произошла ошибка";
			}
			//выбираем путь для сохранения фото
			$photoFolderLoc = ROOT . 'data/films/';
			$photoFolderLocMin = ROOT . 'data/films/min/';
			//$photoFolderLocFull = ROOT . 'data/films/full/';

			$uploadFile = $photoFolderLoc . $db_file_name;

			//перемещаем файл из временного хранилища в папку с фото
			$moveResult = move_uploaded_file($fileTmpLock, $uploadFile);
			if ($moveResult != true) {
				$errors[] = 'Файл изображения не загружен';
			}

			//превращаем загруженное фото в миниатюру, используя спец ф-цию
			require_once( ROOT . "functions/image_resize_imagick.php");
			$target_file = $photoFolderLoc . $db_file_name;
			//$resized_file = $photoFolderLoc . $db_file_name;
			$resized_file = $photoFolderLocMin . $db_file_name;

			//размеры, по которым будем обрезать загруженное фото
			$wmax = 137;
			$hmax = 200;
			$img = createThumbnail($target_file, $wmax, $hmax);
			$img->writeImage($resized_file);
		}

		if(@$db_file_name !=""){
				$query = "	UPDATE filmoteka 
					SET name = '". mysqli_real_escape_string($link, $name) ."', 
						genre = '". mysqli_real_escape_string($link, $genre) ."', 
						year = '". mysqli_real_escape_string($link, $year) ."', 
						description = '". mysqli_real_escape_string($link, $description) ."' ,
						photo = '". mysqli_real_escape_string($link, $db_file_name) ."' 
						WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";

		}else {
			$query = "	UPDATE filmoteka 
				SET name = '". mysqli_real_escape_string($link, $name) ."', 
					genre = '". mysqli_real_escape_string($link, $genre) ."', 
					year = '". mysqli_real_escape_string($link, $year) ."', 
					description = '". mysqli_real_escape_string($link, $description) ."'
					
					WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";
		}

	if ( mysqli_query($link, $query) ) {
		$result = true;
	} else { 
		$result = false;
	}

	return $result;
}


function get_film($link, $id){

	$query = "SELECT * FROM filmoteka WHERE id = ' ".mysqli_real_escape_string($link, $id)." ' LIMIT 1";


	$result = mysqli_query($link, $query);

	if ( $result = mysqli_query($link, $query) ) {
		$film = mysqli_fetch_array($result);
	}

	return $film;
}


function film_delete($link, $id){
	$query = "DELETE FROM filmoteka WHERE id =' ".mysqli_real_escape_string($link, $id)." ' LIMIT 1";
	mysqli_query($link, $query);
	if ( mysqli_affected_rows($link) > 0 ) {
			$result = true;

		} else { 
			
			$result = false;
		}

		return $result;
}
 ?>

	