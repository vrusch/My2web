<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head'); ?>
	<script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
	<script type="text/javascript">
		tinymce.init({
			selector: '#myTextarea',
			theme: 'modern',
			width: 965,
			height: 300,
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
		<div class="span2">
			<?php echo $this->load->view('editSite/manage_site_menu', array('current' => 'manage_article')); ?>
		</div>

		<div class="span10">

			<h2><?php echo('Editace článku'); ?></h2>

			<div class="well">
				<?php echo('Editace a přidávaní článků'); ?>
			</div>


			<div class="controls">
				<?php echo validation_errors(); ?>

				<?php echo form_open('news/create'); ?> <!-- akcia na odoslanie -->

				<textarea id="myTextarea" name="text"></textarea>

			</div>


			<?php echo form_fieldset_close(); ?>
			<?php echo form_close(); ?>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Create article item <i class='far fa-paper-plane'></i></button>
			</div>

		</div>
	</div>
</div>

	<?php echo $this->load->view('footer'); ?>

</body>
</html>

