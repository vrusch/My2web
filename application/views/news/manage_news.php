<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('manage news'))); ?>
</head>
<body>

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
					<th><?php echo ('Nadpis'); ?></th>
					<th><?php echo ('Datum vydani'); ?></th>
					<th><?php echo ('Ativni'); ?></th>
					<th><?php echo ('Zvyraznena'); ?></th>
					<th><?php echo ('Nahled'); ?></th>
					<th>
							<?php echo anchor('news/create',('Nová'),'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $news as $news_item ) : ?>
					<tr>
						<td>
							<?php echo $news_item['title']; ?>
						</td>
						<td>
							<?php echo $news_item['date_publish']; ?>
						</td>

						<td>
							<label class="controls">
								<?php

								if ($news_item['active'] === '1'){
									echo '<span style="background-color: green; color: white; padding: 3px; padding-left: 11px; padding-right: 11px">Aktivní</span>';
								} else {
									echo '<span style="background-color: #a7bacc; padding: 3px">Neaktivní</span>';
								}
								?>
							</label>
						</td>
						<td>
							<label class="controls">
								<?php
								if ($news_item['highlight'] === '1'){
									echo '<span style="background-color: green; color: white; padding: 3px; padding-left: 11px; padding-right: 11px">Zvýraznená</span>';
								} else {
									echo '<span style="background-color: #a7bacc; padding: 3px">Nezvýraznená</span>';
								}
								?>
							</label>
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
							echo anchor_popup('news/view/'.$news_item['id'], 'nahled', $atts);
							?>
						</td>
						<td>
							<?php echo anchor('news/update/'.$news_item['id'], ('Edit'), 'class="btn btn-small"'); ?>
						</td>
						<td>
							<?php echo anchor('news/delete/'.$news_item['id'], ('Smazat'), 'class="btn btn-danger btn-small"'); ?>
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






































