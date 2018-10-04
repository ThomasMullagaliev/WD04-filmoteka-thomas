

<div class="title-1">Информация о фильме</div>

	<div class="card mb-20">
		<div class="row">
			<div class="col">
				<img src="<?=HOST?>data/films/<?=$film['photo']?>" alt="<?=$film['name']?>">
			</div>
			<div class="col">
				<div class="card__header">
					<h4 class="title-4"><?=$film['name']?></h4>
					<div class="buttons">
						<a href="edit.php?id=<?=$film['id']?>" class="button button--editsmall">Редактировать</a>
						<a href="index.php?action=delete&id=<?=$film['id']?>" class="button button--removesmall">Удалить</a>
					</div>

				</div>
				<div class="badge"><?=$film['genre']?></div>
				<div class="badge"><?=$film['year']?></div>
				<p><?=$film['description']?></p>
			</div>
		</div>
	</div>

</div>