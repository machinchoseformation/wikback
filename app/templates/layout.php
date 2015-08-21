<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,300,700'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<h1>Wikébec Admin :: <?= $this->e($title) ?></h1>

			<?php if ($w_user): ?>
				<p>Bonjour <?= $w_user['username']; ?></p>
				<a href="<?= $this->url('logout'); ?>" title="Déconnexion">Déconnexion</a>
			<?php endif; ?>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>