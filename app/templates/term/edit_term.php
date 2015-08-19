<?php $this->layout('layout', ['title' => 'Modification']) ?>

<?php $this->start('main_content') ?>
	<h2><?= $this->e($term['name']) ?></h2>

	<form method="POST">
		<label for="name">Le terme à modifier</label>
		<input type="text" id="name" name="name" value="<?= $this->e($term['name']) ?>" />

		<input type="submit" value="Enregistrer" />
	</form>

<?php $this->stop('main_content') ?>
