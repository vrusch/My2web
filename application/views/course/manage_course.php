<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Managment Kurzů'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_course')); ?>
		</div>

		<div class="span10">
			<?php $count = count($course); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo('Managment Kurzů'); ?><span
								class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n">
							<buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton>
						</a></td>
				</tr>
			</table>
			<div class="well">
				<?php echo('Tato stránka dovoluje vytváření a managment kurzů.'); ?>
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
						<?php echo anchor('course/new_course', 'Novy', 'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($course as $course_item) : ?>
					<tr>
						<td>
							<?php echo $course_item['name']; ?>
						</td>
						<td>
							<?php echo $course_item['tema']; ?>
						</td>
						<td>
							<p><a href="<?php echo site_url('course/view/' . $course_item['id']); ?>">nahled</a></p>
						</td>
						<td>
							<?php
							$sql = "SELECT id FROM 4m2w_t_course WHERE course_id = ? AND lectures_id IS NOT NULL";
							$query = $this->db->query($sql, array($course_item['id']));
							echo($query->num_rows());;
							?>
						</td>
						<td>
							<?php
							$sql = "SELECT id FROM 4m2w_t_course WHERE course_id = ? AND questions_id IS NOT NULL";
							$query = $this->db->query($sql, array($course_item['id']));
							echo($query->num_rows());
							?>
						</td>
						<td>
							<?php echo anchor('news/', 'edit', 'class="btn btn-small"'); ?>
							<?php echo anchor('lecture/delete/'.$course_item['id'],'Smazat','class="btn btn-danger btn-small"'); ?>
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



