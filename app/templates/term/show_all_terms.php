<?php $this->layout('layout', ['title' => 'Tous les termes']) ?>

<?php $this->start('main_content') ?>

	<a href="<?= $this->url('register_administrator'); ?>" title="Inscrire un nouvel administateur">
		Inscrire un nouvel administateur</a>


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
			<tr <?php if ($term['is_wotd']) echo 'class="wotd"'; ?>>
				<td><?= $this->e($term['id']) ?></td>
				<td><?= $this->e($term['name']) ?></td>
				<td><?= $this->e($term['modifiedDate']) ?></td>
				<td>
					<a href="<?= $this->url('delete_term', ['id' => $term['id']]); ?>" title="Effacer ce terme">
						<i class="fa fa-trash"></i> Effacer
					</a>
					<a href="<?= $this->url('edit_term', ['id' => $term['id']]); ?>" title="Modifier ce terme">
						<i class="fa fa-pencil"></i> Modifier
					</a>
					<a href="<?= $this->url('change_wotd', ['id' => $term['id']]); ?>" title="Choisir ce terme comme MDJ">
						<i class="fa fa-star"></i> WOTD !
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

<?php $this->stop('main_content') ?>
