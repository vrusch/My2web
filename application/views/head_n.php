
	<!-- Theme Made By www.w3schools.com -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="utf-8">

	<title><?php echo isset($title) ? $title.' - '.lang('website_title_long') : lang('website_title_long'); ?></title>

	<base href="<?php echo base_url(); ?>"/>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
		  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

		.logo {
			color: #076cc5;
			font-size: 200px;
		}

		.thumbnail img {
			width: 100%;
			height: 100%;
			margin-bottom: 10px;
		}

		.carousel-control.right {
			margin-right: -120px;
			background-image: none;
			color: #076cc5;
		}

		.carousel-control.left {
			margin-left: -120px;
			background-image: none;
			color: #076cc5;
		}

		.carousel-indicators li {
			margin-bottom: -60px;
			border-color: #076cc5;
		}

		.carousel-indicators li.active {
			margin-bottom: -60px;
			background-color: #076cc5;
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

		.navbar {
			margin-bottom: 0;
			background-color: #054c8a;
			z-index: 9999;
			border: 0;
			font-size: 12px !important;
			line-height: 1.42857143 !important;
			letter-spacing: 4px;
			border-radius: 0;
			font-family: Montserrat, sans-serif;
		}

		.navbar li a, .navbar .navbar-brand {
			color: #fff !important;
		}

		.navbar-nav li a:hover, .navbar-nav li.active a {
			color: #076cc5 !important;
			background-color: #fff !important;
		}

		.navbar-default .navbar-toggle {
			border-color: transparent;
			color: #fff !important;
		}

		footer .glyphicon {
			font-size: 20px;
			margin-bottom: 20px;
			color: #076cc5;
		}

		.slideanim {
			visibility: hidden;
		}

		.slide {
			animation-name: slide;
			-webkit-animation-name: slide;
			animation-duration: 1s;
			-webkit-animation-duration: 1s;
			visibility: visible;
		}

		@keyframes slide {
			0% {
				opacity: 0;
				transform: translateY(70%);
			}
			100% {
				opacity: 1;
				transform: translateY(0%);
			}
		}

		@-webkit-keyframes slide {
			0% {
				opacity: 0;
				-webkit-transform: translateY(70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateY(0%);
			}
		}

		@media screen and (max-width: 768px) {
			.col-sm-4 {
				text-align: center;
				margin: 25px 0;
			}

			.btn-lg {
				width: 100%;
				margin-bottom: 35px;
			}
		}

		@media screen and (max-width: 480px) {
			.logo {
				font-size: 150px;
			}
		}

		.fab {
			color: lightslategrey;
			font-size: 28px
		}

		.blueGlow:hover {
			font-size: 28px;
			color: blue;
			text-shadow: 0 0 1px #7c7aff;
		}

		.googlrpGlow:hover {
			font-size: 28px;
			color: red;
			text-shadow: 0 0 1px #9c9c9c;
		}

		.facebGlow:hover {
			font-size: 28px;
			color: darkblue;
			text-shadow: 0 0 1px #9c9c9c;
		}

		.twiteri:hover {
			font-size: 28px;
			color: dodgerblue;
			text-shadow: 0 0 1px #9c9c9c;
		}

		#sloganbottom {
			margin-bottom: 50px;
		}

		.linky {
			color: #fff;
			border-color: #bce8f1;
		}

		.linky:hover {
			color: #fff;
		}

	</style>


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
