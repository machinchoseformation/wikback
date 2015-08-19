<?php $this->layout('layout', ['title' => 'Tous les termes']) ?>

<?php $this->start('main_content') ?>
	<h2>Tous les termes.</h2>
	
	<table>
	<?php foreach($terms as $term): ?>
		<tr>
			<td><?php echo $term['name'] ?></td>
			<td><?php echo $term['modifiedDate'] ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

<?php $this->stop('main_content') ?>
