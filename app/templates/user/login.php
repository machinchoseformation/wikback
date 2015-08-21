<?php $this->layout('layout', ['title' => 'Connexion !']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2>

	<form method="POST" novalidate>
		<label for="username">Pseudo ou email</label>
		<input type="text" id="username" name="username" value="<?= $username ?>" />

		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password" value=""  />

		<input type="submit" value="Connexion" />
		<div><?= $error ?></div>
	</form>

<?php $this->stop('main_content') ?>
