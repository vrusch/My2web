<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Firmy'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_question')); ?>
		</div>

		<div class="span10">
			<?php $count = count($questions); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo('Otazky'); ?><span
								class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n">
							<buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton>
						</a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo('Tato stánka dovoluje vytvářet nové otazky.'); ?>
			</div>
			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo('Otazka'); ?></th>
					<th><?php echo('tema'); ?></th>
					<th><?php echo('nahled'); ?></th>
					<th>
						<?php echo anchor('questions/new_question', 'Nova', 'class="btn btn-primary btn-small"'); ?>
						<?php echo anchor('questions/delete_question', 'Smazat', 'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($questions as $question_item) : ?>
					<tr>
						<td>
							<?php echo $question_item['question']; ?>
						</td>
						<td>
							<?php echo $question_item['tema']; ?>
						</td>
						<td>
							<p><a href="<?php echo site_url('questions/view/' . $question_item['id']); ?>">nahled</a></p>
						</td>
						<td>
							<?php echo anchor('questions/update_question', 'edit', 'class="btn btn-small"'); ?>
							<?php echo anchor('questions/update_question', 'Pridat do kvizu', 'class="btn btn-small"'); ?>
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
