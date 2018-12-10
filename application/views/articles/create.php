<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head'); ?>
	<script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
	<script type="text/javascript">
		tinymce.init({
			selector: '#myTextarea',
			theme: 'modern',
			width: 1170,
			height: 500,
			plugins: [
				'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
				'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
				'save table contextmenu directionality emoticons template paste textcolor'
			],
			content_css: 'css/content.css',
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		});
	</script>
</head>
<body>

<?php echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<div class="span12">

			<!-- Main hero unit for a primary marketing message or call to action -->

			<h1>Welcome to <?php echo lang('website_title_long'); ?></h1>

			<p>
				to je stranka na editaciu a pridavanie clankov ...
			</p>
		</div>

	</div>

	<?php echo validation_errors(); ?>

	<?php echo form_open('news/create'); ?> <!-- akcia na odoslanie -->

	<textarea id="myTextarea" name="text"></textarea>
	<input type="submit" name="submit" value="Create article item"/><!-- akcia na odoslanie -->
	</form>


</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>

