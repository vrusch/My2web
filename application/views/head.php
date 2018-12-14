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

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<link href="<?php echo base_url().RES_DIR; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="<?php echo base_url().RES_DIR; ?>/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
	body {
		padding-top: 5px;
	}
	.none {
		all: unset;
	}

	.inline {
		float:left
	}
	.errors{
		color: red;
		font-size: 10px;
		margin-left : 20px;
		float:left;
	}
	.sitebordertop {
		border-top: 0px solid #076cc5;
		border-bottom: 2px solid #076cc5;
		border-left: none;
		border-right: none;
		border-radius: 0px;
		margin-bottom: 10px;
	}
	.mynav {
		margin-bottom: 10px;
	}
	.siteborder{
		border-top: 2px solid #076cc5;
		border-left: none;
		border-right: none;
		border-radius: 0px;
	}
	.fat {
		color: lightslategrey;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	.fab {
		color: lightslategrey;
		font-size:24px
	}
	.blueGlow:hover {
		font-size: 24px;
		color: blue;
		text-shadow: 0 0 1px #7c7aff;
	}
	.googlrpGlow:hover{
		font-size: 24px;
		color: red;
		text-shadow: 0 0 1px #9c9c9c;;
	}
	.facebGlow:hover{
		font-size: 24px;
		color: darkblue;
		text-shadow: 0 0 1px #9c9c9c;;
	}
	.twiteri:hover{
		font-size: 24px;
		color: dodgerblue;
		text-shadow: 0 0 1px #9c9c9c;;
	}

</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
