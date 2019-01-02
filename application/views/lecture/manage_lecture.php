<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Managment přednášek'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_lecture')); ?>
		</div>

		<div class="span10">
			<?php $count = count($lecture); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Managment přednášek'); ?><span class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo ('Tato stránka dovoluje vytváření a mangment přednášek.'); ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo ('Název'); ?></th>
					<th><?php echo ('tema'); ?></th>
					<th><?php echo ('Nahled popup'); ?></th>
					<th>
						<?php echo anchor('lecture/create','Nova','class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $lecture as $lecture_item ) : ?>
				<tr>
					<td>
						<?php echo $lecture_item['name']; ?>
					</td>
					<td>
						<?php echo $lecture_item['tema']; ?>
					</td>
					<td>
						<?php
						$atts = array(
							'width'       => 800,
							'height'      => 600,
							'scrollbars'  => 'no',
							'status'      => 'yes',
							'resizable'   => 'no',
							'screenx'     => 200,
							'screeny'     => 200,
							'window_name' => '_blank'
						);
						echo anchor_popup('lecture/view/'.$lecture_item['id'], 'nahled', $atts);
						?>
					</td>
					<td>
						<?php echo anchor('lecture/edit/'.$lecture_item['id'], 'edit', 'class="btn btn-small"'); ?>
						<?php echo anchor('lecture/addto/'.$lecture_item['id'], 'Pridat do kvizu', 'class="btn btn-small"'); ?>
						<?php echo anchor('lecture/delete/'.$lecture_item['id'],'Smazat','class="btn btn-danger btn-small"'); ?>
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



