<h1 class="title-1">Добавить новый фильм</h1>

<div class="panel-holder mt-40 mb-40">
	<form enctype="multipart/form-data" action="new-film.php" method="POST">

		<?php 
		if ( !empty($errors)) {
			foreach ($errors as $key => $value) {
				echo "<div class='error'>$value</div>";
			}
		}
		?>

		<div class="form-group">
			<label class="label">Название фильма</label>
			<input class="input" name="name" type="text" placeholder="Такси 2" />

		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class="label">Жанр</label>
					<input class="input" name="genre" type="text" placeholder="комедия" />
				</div>
			</div>
			<div class="col">
				<div class="form-group"><label class="label">Год</label>
					<input class="input" name="year" type="text" placeholder="2000" /></div>
			</div>
		</div>
			<textarea class="textarea mb-10" name="description" placeholder="Введите описание фильма"></textarea>
		<input type="file" name="photo">
		<input class="button dblock mt-10 mb-10" type="submit" name="newFilm" value="Добавить" />
	</form>
</div>

