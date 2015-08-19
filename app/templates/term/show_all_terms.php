<?php $this->layout('layout', ['title' => 'Tous les termes']) ?>

<?php $this->start('main_content') ?>
	<h2>Tous les termes.</h2>
	
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Terme</th>
				<th>Modification</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($terms as $term): ?>
			<tr>
				<td><?= $this->e($term['id']) ?></td>
				<td><?= $this->e($term['name']) ?></td>
				<td><?= $this->e($term['modifiedDate']) ?></td>
				<td><a href="<?= $this->url('delete_term', ['id' => $term['id']]); ?>" title="Effacer ce terme"><i class="fa fa-trash"></i> Effacer</a></td>
				<td><a href="<?= $this->url('edit_term', ['id' => $term['id']]); ?>" title="Modifier ce terme"><i class="fa fa-pencil"></i> Modifier</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

<?php $this->stop('main_content') ?>
