<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('assigment'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_assignment')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('assigment'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo (''); ?>
				<?php //$count = count($news); ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th><?php echo ('Nadpis'); ?></th>
					<th><?php echo ('Datum vydani'); ?></th>
					<th><?php echo ('Datum platnosti'); ?></th>
					<th>
						<?php echo anchor('news/create',lang('website_create'),'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $news as $news_item ) : ?>
					<tr>
						<td><?php echo $news_item['id']; ?></td>
						<td>
							<?php echo $news_item['title']; ?>
						</td>
						<td>
							<?php echo $news_item['date_publish']; ?>
						</td>
						<td>
							<?php echo $news_item['lifetime']; ?>
						</td>
						<td>
							<?php echo anchor('news/'.$news_item['slug'], lang('website_update'), 'class="btn btn-small"'); ?>
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
