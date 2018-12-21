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

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Novinky managment'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stranka umoznuje pridavat, mazat, editovat novinky viditelne na home page v sekcii "Novinky"'); ?>
			</div>

			<?php foreach ($news as $news_item):?>

				<div class="borderdown">
					<table style="width: 100%">
						<tr>
							<td style="width: 33.3333%;"><h3><?php echo $news_item['title']; ?></h3></td>
							<td style="width: 33.3333%;" align="right">
								<p class="seznam" style="line-height: 8px;">Publikovano: <?php echo $news_item['date_publish']; ?></p>
								<!--<p class="seznam" style="line-height: 8px;">Platne do: <?php echo $news_item['lifetime']; ?></p></td>-->
							<td style="width: 33.3333%;" align="right">

								<?php if ($this->authentication->is_signed_in()) : ?>
									<?php if ($this->authorization->is_permitted(array('retrieve_users', 'retrieve_roles', 'retrieve_permissions'))) : ?>
										<a href="#">
											<button type="button" class="btn btn-info">smazat <i class='fas fa-trash-alt'></i></button>
										</a>
										<a href="#">
											<button type="button" class="btn btn-info">editovat <i class='fas fa-pen'></i></button>
										</a>
									<?php endif; ?>
								<?php endif; ?>

							</td>
						</tr>
					</table>
					<div class="main">
						<?php echo $news_item['text']; ?>
					</div>
					<!--<p><a href="<?php echo site_url('news/' . $news_item['slug']); ?>">View article</a></p>-->
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</div>


<?php foreach ($news as $news_item):?>

	<div class="borderdown">
		<table style="width: 100%">
			<tr>
				<td style="width: 33.3333%;"><h3><?php echo $news_item['title']; ?></h3></td>
				<td style="width: 33.3333%;" align="right">
					<p class="seznam" style="line-height: 8px;">Publikovano: <?php echo $news_item['date_publish']; ?></p>
					<!--<p class="seznam" style="line-height: 8px;">Platne do: <?php echo $news_item['lifetime']; ?></p></td>-->
				<td style="width: 33.3333%;" align="right">

					<?php if ($this->authentication->is_signed_in()) : ?>
						<?php if ($this->authorization->is_permitted(array('retrieve_users', 'retrieve_roles', 'retrieve_permissions'))) : ?>
							<a href="#">
								<button type="button" class="btn btn-info">smazat <i class='fas fa-trash-alt'></i></button>
							</a>
							<a href="#">
								<button type="button" class="btn btn-info">editovat <i class='fas fa-pen'></i></button>
							</a>
						<?php endif; ?>
					<?php endif; ?>

				</td>
			</tr>
		</table>
		<div class="main">
			<?php echo $news_item['text']; ?>
		</div>
		<!--<p><a href="<?php echo site_url('news/' . $news_item['slug']); ?>">View article</a></p>-->
	</div>

<?php endforeach; ?>
</body>
</html>



































