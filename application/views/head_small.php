<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<title><?php echo isset($title) ? $title.' - '.lang('website_title_long') : lang('website_title_long'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<base href="<?php echo base_url(); ?>"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
	  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

	body {
		font: 400 15px Lato, sans-serif;
		line-height: 1.8;
		color: #818181;
	}

	h2 {
		font-size: 24px;
		text-transform: uppercase;
		color: #303030;
		font-weight: 600;
		margin-bottom: 30px;
	}

	h4 {
		font-size: 19px;
		line-height: 1.375em;
		color: #303030;
		font-weight: 400;
		margin-bottom: 30px;
	}

	.jumbotron {
		background-color: #076cc5;
		color: #fff;
		padding: 100px 25px;
		font-family: Montserrat, sans-serif;
	}

	.container-fluid {
		padding: 60px 50px;
	}

	.bg-grey {
		background-color: #f6f6f6;
	}

	.logo-small {
		color: #076cc5;
		font-size: 50px;
	}

	.item h4 {
		font-size: 19px;
		line-height: 1.375em;
		font-weight: 400;
		font-style: italic;
		margin: 70px 0;
	}

	.item span {
		font-style: normal;
	}

	.panel {
		border: 1px solid #076cc5;
		border-radius: 0 !important;
		transition: box-shadow 0.5s;
	}

	.panel:hover {
		box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
	}

	.panel-footer .btn:hover {
		border: 1px solid #076cc5;
		background-color: #fff !important;
		color: #076cc5;
	}

	.panel-heading {
		color: #fff !important;
		background-color: #076cc5 !important;
		padding: 25px;
		border-bottom: 1px solid transparent;
		border-top-left-radius: 0px;
		border-top-right-radius: 0px;
		border-bottom-left-radius: 0px;
		border-bottom-right-radius: 0px;
	}

	.panel-footer {
		background-color: white !important;
	}

	.panel-footer h3 {
		font-size: 32px;
	}

	.panel-footer h4 {
		color: #aaa;
		font-size: 14px;
	}

	.panel-footer .btn {
		margin: 15px 0;
		background-color: #076cc5;
		color: #fff;
	}
</style>


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
