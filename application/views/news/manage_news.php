<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('manage news'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_news')); ?>
		</div>

		<div class="span10">
			<?php $count = count($news); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Novinky managment'); ?><span class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stránka umožňuje přidávat, mazat a editovat novinky viditelné na Domovské stránce v sekcii "Novinky.'); ?>

			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th><?php echo ('Nadpis'); ?></th>
					<th><?php echo ('Datum vydani'); ?></th>
					<th><?php echo ('Ativni'); ?></th>
					<th><?php echo ('Zvyraznena'); ?></th>
					<th></th>
					<th>
							<?php echo anchor('news/create',('Nová'),'class="btn btn-primary btn-small"'); ?>
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
							<label class="cont">
								<?php
								$check = '';
								if ($news_item['active'] === '1'){
									$check = 'checked';
								}
								echo form_checkbox('active', 'active', $check );
								?>
							</label>
						</td>
						<td>
							<label class="cont">
								<?php
								$check = '';
								if ($news_item['highlight'] === '1'){
									$check = 'checked';
								}
								echo form_checkbox('active', 'active', $check );
								?>
							</label>
						</td>
						<td>
							<?php echo anchor('news/update/'.$news_item['slug'], ('Edit'), 'class="btn btn-small"'); ?>
						</td>
						<td>
							<?php echo anchor('news/delete'.$news_item['slug'], ('Smazat'), 'class="btn btn-danger btn-small"'); ?>
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






































