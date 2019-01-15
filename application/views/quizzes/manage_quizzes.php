<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Managment Kvizů'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_quizzes')); ?>
		</div>

		<div class="span10">
			<?php $count = count($quizzes); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo('Managment Kvizů'); ?><span
								class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n">
							<buton class="btn btn-primary btn-small"> Zpátky </buton>
						</a></td>
				</tr>
			</table>
			<div class="well">
				<?php echo('Tato stránka dovoluje vytváření a managment kvizů.'); ?>
			</div>
			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo('Název'); ?></th>
					<th><?php echo('Tema'); ?></th>
					<th><?php echo('nahled'); ?></th>
					<th><?php echo('Prednasek'); ?></th>
					<th><?php echo('Otazek'); ?></th>
					<th>
						<?php echo anchor('quizzes_cont/new', 'Novy', 'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($quizzes as $quizzes_item) : ?>
					<tr>
						<td>
							<?php echo $quizzes_item['name']; ?>
						</td>
						<td>
							<?php
							$theme= $this->quizzes_model->get_themes($quizzes_item['theme_id']);
							echo $theme['theme']
							?>
						</td>
						<td>
							<p><a href="<?php echo site_url('quizzes_cont/view/' . $quizzes_item['id']); ?>">nahled</a></p>
						</td>
						<td>
							<?php
							$sql = "SELECT * FROM 4m2w_rel_quizz_lec WHERE quizz_id = ?";
							$query = $this->db->query($sql, array($quizzes_item['id']));
							if ($query->num_rows() > 0) {
								echo '<a href="#"><span class="badge badge-info">' . $query->num_rows() . '</span></a>';
							} else {
								echo '<span class="badge">' . $query->num_rows() . '</span></a>';
							}
							?>
						</td>
						<td>
							<?php
							$sql = "SELECT * FROM 4m2w_rel_quizz_que WHERE quizz_id = ?";
							$query = $this->db->query($sql, array($quizzes_item['id']));
							if ($query->num_rows() > 0) {
								echo '<a href="#"><span class="badge badge-info">' . $query->num_rows() . '</span></a>';
							} else {
								echo '<span class="badge">' . $query->num_rows() . '</span></a>';
							}
							?>
						</td>
						<td>
							<?php echo anchor('quizzes_cont/edit/'. $quizzes_item['id'], 'edit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>



