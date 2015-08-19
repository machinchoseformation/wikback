<?php $this->layout('layout', ['title' => 'Tous les termes']) ?>

<?php $this->start('main_content') ?>
	<h2>Tous les termes.</h2>
	
	<table>
		<tr>
			<th>Id</th>
			<th>Terme</th>
			<th>Modification</th>
			<th>Actions</th>
		</tr>
	<?php foreach($terms as $term): ?>
		<tr>
			<td><?php echo $term['id'] ?></td>
			<td><?php echo $term['name'] ?></td>
			<td><?php echo $term['modifiedDate'] ?></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	</table>

<?php $this->stop('main_content') ?>
