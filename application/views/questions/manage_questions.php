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
		<?php
		$quizzes = $this->question_model->get_quizzes();
		foreach ($quizzes as $quizz_item){
		$opt[$quizz_item['id']] = $quizz_item['name'];
		}
		if (count($quizzes)){
		$opt += ['0' => 'Žádny kviz'];
		} else {
		$opt = ['0' => 'Žádne kvizy'];
		}
		?>
		<div class="span10">
			<?php $count = count($questions); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo('Otazky'); ?><span
								class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n">
							<buton class="btn btn-primary btn-small"> Zpátky </buton>
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
					<th><?php echo('Nahled [rnd]'); ?></th>
					<th>
						<?php echo anchor('questions/new_question', 'Nova', 'class="btn btn-primary btn-small"'); ?>
					</th>
					<th>

					</th>
					<th>
						<?php echo 'pridat do kvizu'; ?>
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
							<?php
							$atts = array(
								'width'       => 800,
								'height'      => 600,
								'scrollbars'  => 'no',
								'status'      => 'yes',
								'resizable'   => 'no',
								'screenx'     => 500,
								'screeny'     => 200,
								'window_name' => '_blank'
							);
							echo anchor_popup('questions/rnd/'. $question_item['id'], 'Nahled', $atts);
							?>
						</td>
						<td>
							<?php echo anchor('questions/update/'. $question_item['id'], 'edit', 'class="btn btn-small"'); ?>
						</td>
						<td>
							<?php echo form_open('questions/addto/' . $question_item['id'], 'class="form-horizontal"'); ?>
							<?php echo form_submit('', 'pridat do kvizu', 'class="btn btn-info btn-small"'); ?>
						</td>
						<td>
							<?php echo form_dropdown('quizz_id', $opt, '0'); ?>
							<?php echo form_close(); ?>
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
