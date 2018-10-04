<div class="panel-holder mt-40 mb-40">
	<div class="title-3 mt-0">Редактирование фильма - <?=$film['name']?></div>
	<form enctype="multipart/form-data" action="edit.php?id=<?=$film['id']?>" method="POST">

		<?php 
		if ( !empty($errors)) {
			foreach ($errors as $key => $value) {
				echo "<div class='error'>$value</div>";
			}
		}
		?>

		<div class="form-group">
			<label class="label">Название фильма
				<input class="input" name="name" type="text" placeholder="Такси 2" value="<?=$film['name']?>"/>
			</label>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group"><label class="label">Жанр<input class="input" name="genre" type="text" placeholder="комедия" value="<?=$film['genre']?>"/></label></div>
			</div>
			<div class="col">
				<div class="form-group">
					<label class="label">Год<input class="input" name="year" type="text" placeholder="2000" value="<?=$film['year']?>"/></label></div>
			</div>
		</div>
		<textarea class="textarea mb-10" name="description" placeholder="Введите описание фильма"><?=$film['description']?>
		</textarea>
		<input type="file" name="photo">
		<input class="button" type="submit" name="update-film" value="Обновить" />
	</form>
</div>


