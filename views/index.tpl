<div class="title-1">Фильмотека</div>
<?php
foreach ($films as $key => $film) {
	?>
	<div class="card mb-20">
		<div class="row">
			<div class="col-auto">
				<img src="<?=HOST?>data/films/min/<?=$film['photo']?>" alt="poster"  />
			</div>
			<div class="col">
					<div class="card__header">
						<h4 class="title-4"><?=$film['name']?></h4>
						<div class="buttons">
							<?php if (isset($_SESSION['user'])) {
								if ($_SESSION['user'] == 'admin') {?>

								<a href="edit.php?id=<?=$film['id']?>" class="button button--editsmall">Редактировать</a>
								<a href="?action=delete&id=<?=$film['id']?>" class="button button--removesmall">Удалить</a>

							<?php	}} ?>


						</div>

					</div>
					<div class="badge"><?=$film['genre']?></div>
					<div class="badge"><?=$film['year']?></div>
					<div class="mt-10">
						<a href="single.php?id=<?=$film['id']?>" class="button">Подробнее</a>
					</div>
			</div>
		</div>
	</div>
	<?php } ?>

</div>