<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<title><?php echo isset($title) ? $title.' - '.lang('website_title_long') : lang('website_title_long'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<base href="<?php echo base_url(); ?>"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>

<link type="text/css" rel="stylesheet" href="<?php echo base_url().RES_DIR; ?>/bootstrap/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url().RES_DIR; ?>/css/style.css"/>

<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
	tinymce.init({
		selector: 'textarea',
		height: 500,
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste imagetools wordcount"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		// imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		]
	});
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<link href="<?php echo base_url().RES_DIR; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="<?php echo base_url().RES_DIR; ?>/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
	body {
		padding-top: 5px;
	}
	textarea {
		width: 400px;
	}
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
