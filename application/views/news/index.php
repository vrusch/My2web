<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head'); ?>

</head>
<body>

<?php echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<div class="span12">

			<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="hero-unit" style="position: relative;">
				<div class="borderdown">
					<table style="width: 100%">
					<tr>
						<td style="width: 50%;">
							<h2><?php echo $title; ?>
						</td>
						<td style="width: 50%;" align="right">
							</h2><button type="button" class="btn btn-info">Nova <i class='fas fa-plus'></i></button>
						</td>
					</tr>
					</table>


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
									<button type="button" class="btn btn-info">smazat <i class='fas fa-trash-alt'></i></button>
									<button type="button" class="btn btn-info">editovat <i class='fas fa-pen'></i></button>
								</td>
							</tr>
						</table>
						<div class="main">
							<?php echo $news_item['text']; ?>
						</div>
						<p><a href="<?php echo site_url('news/' . $news_item['slug']); ?>">View article</a></p>
					</div>

				<?php endforeach; ?>

			</div>

		</div>
	</div>
</div>


<?php echo $this->load->view('footer'); ?>

</body>
</html>
