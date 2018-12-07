<html>
        <head>
                <title>CodeIgniter Tutorial</title>
        </head>
        <body>

                <h1><?php echo $title; ?></h1>
<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

	<h3><?php echo $news_item['title']; ?></h3>
	<div class="main">
		<?php echo $news_item['text']; ?>
	</div>
	<p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>
				<em>&copy; 2015</em>
		</body>
</html>
