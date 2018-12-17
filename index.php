<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Theme Made By www.w3schools.com -->
	<title>Bootstrap Theme Company Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
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

		.thumbnail {
			padding: 0 0 15px 0;
			border: none;
			border-radius: 0;
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
			background-color: #076cc5;
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
		.modaldown {
			margin-top: 150px;
		}
		.centered {
			margin-right: auto;
			margin-left: auto;
		}
	</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#myPage">Logo</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#about">O NÁS</a></li>
				<li><a href="#actual">AKTUÁLNĚ</a></li>
				<li><a href="#services">SLUŽBY</a></li>
				<li><a href="#portfolio">REFERENCE</a></li>
				<li><a href="#solution">RĚŠENÍ</a></li>
				<li><a href="#training">ŠKOLENÍ</a></li>
				<li><a href="#contact">KONTAKTY</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="jumbotron text-center">

	<h1><strong>KYBER TECH GROUP</strong></h1>

	<div id="slogantop" class="w3-container w3-center w3-animate-left">
		<p>We specialize in blablabla</p>
	</div>
	<div id="sloganbottom" class="w3-container w3-center w3-animate-right ">
		<p>We specialize in blablabla</p>
	</div>
	<div class="input-group-btn">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-user"></i>  Přihlásit se</button>
	</div>
	<br>
	<div class="w3-container centered" style="width:15%">
		<button class="w3-button w3-blue w3-round-large w3-medium w3-hover-light-blue w3-left"><i class="glyphicon glyphicon-blackboard"></i>  Vaše přednášky</button>
		<button class="w3-button w3-blue w3-round-large w3-medium w3-hover-light-blue w3-right">Vaše kurzy  <i class="glyphicon glyphicon-tasks"></i></button>
	</div>
</div>

<!-- Modal -->
<div class="modal fade modaldown" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" ">
			<div class="modal-header w3-light-grey" style="text-align: center;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<img src="/resource/img/default-person.png" alt="Avatar" style="width:20%;" class="w3-circle">
			</div>

			<div class="modal-body">

				<form class="w3-container" action="/action_page.php">
					<div class="w3-section">
						<label><b>Username</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
						<label><b>Password</b></label>
						<input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required>
						<button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">Login</button>
						<input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
					</div>
				</form>

			</div>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey" >
				<button type="button" class="w3-button w3-red">Cancel</button>
				<span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
			</div>
		</div>
	</div>
</div>


<!-- Container (About Section) -->
<div id="about" class="container-fluid">
	<div class="row">
		<div class="col-sm-8">
			<h2>O nás ...</h2><br>
			<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat.</h4><br>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
				ut aliquip ex ea commodo consequat.</p>
		</div>
		<div class="col-sm-8">
			<h2>Ešte trochu o nás... budoucnost</h2><br>
			<h4><strong>Naše cíle:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
				eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
			<h4><strong>Naše vize:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
				eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat.</h4>
		</div>
		<div class="col-sm-4" style="text-align: center;">
			<span class="glyphicon glyphicon-eye-open logo"></span>
		</div>
	</div>
</div>
<br>

<div id="actual" class="container-fluid bg-grey">
	<div class="row">
		<div class="col-sm-4" style="text-align: center;">
			<span class="glyphicon glyphicon-globe logo slideanim"></span>
		</div>
		<div class="col-sm-8">

			<!-- Carousel -->
			<div class="container">
				<h2>Aktuality</h2>
				<div id="myCarouse2" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarouse2" data-slide-to="0" class="active"></li>
						<li data-target="#myCarouse2" data-slide-to="1"></li>
						<li data-target="#myCarouse2" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="panel panel-primary">
								<div class="panel-heading">Nadpis - nazev [datum]</div>
								<div class="panel-body">
									<b>Panel Content</b>
									<p>our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
										eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco
										laboris nisi ut aliquip ex ea commodo consequat.our mission lorem ipsum dolor
										sit amet, consectetur adipiscing elit, sed do
										eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
										veniam, quis nostrud exercitation ullamco
										laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="panel panel-default">
								<div class="panel-heading">Nadpis - nazev [datum]</div>
								<div class="panel-body">
									<b>Panel Content</b>
									<p>our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
										eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco
										laboris nisi ut aliquip ex ea commodo consequat.our mission lorem ipsum dolor
										sit amet, consectetur adipiscing elit, sed do
										eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
										veniam, quis nostrud exercitation ullamco
										laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="panel panel-default">
								<div class="panel-heading">Nadpis - nazev [datum]</div>
								<div class="panel-body">
									<b>Panel Content</b>
									<p>our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
										eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco
										laboris nisi ut aliquip ex ea commodo consequat.our mission lorem ipsum dolor
										sit amet, consectetur adipiscing elit, sed do
										eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
										veniam, quis nostrud exercitation ullamco
										laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarouse2" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarouse2" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<!-- end of carousel -->
		</div>
	</div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
	<h2>Služby</h2>
	<h4>Co přesne nabízíme</h4>
	<br>
	<div class="row slideanim">
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-saved logo-small"></span>
			<h4>SAFETY</h4>
			<p>Lorem ipsum dolor sit amet..</p>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-ok logo-small"></span>
			<h4>LEARNING</h4>
			<p>Lorem ipsum dolor sit amet..</p>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-lock logo-small"></span>
			<h4>JOB DONE</h4>
			<p>Lorem ipsum dolor sit amet..</p>
		</div>
	</div>
	<br><br>
	<div class="row slideanim">
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-cog logo-small"></span>
			<h4>EASY</h4>
			<p>Lorem ipsum dolor sit amet..</p>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-certificate logo-small"></span>
			<h4>CERTIFIED</h4>
			<p>Lorem ipsum dolor sit amet..</p>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-wrench logo-small"></span>
			<h4 style="color:#303030;">HARD WORK</h4>
			<p>Lorem ipsum dolor sit amet..</p>
		</div>
	</div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
	<h2>Reference</h2><br>
	<h4>Naše realizované projekty</h4>
	<div class="row text-center slideanim">
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 1px solid dodgerblue">
				<!--<img src="paris.jpg" alt="Paris" width="400" height="300">-->
				<p><strong>Projekt [logo firmy, mesta]</strong></p>
				<p>Ano, tady jsme poskytly rreseni</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 1px solid dodgerblue">
				<!--<img src="newyork.jpg" alt="New York" width="400" height="300">-->
				<p><strong>Nejaky dalsi projekt [logo firmy, mesta]</strong></p>
				<p>Ano! i tady jsme se podilely na reseni</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 1px solid dodgerblue">
				<!--<img src="sanfran.jpg" alt="San Francisco" width="400" height="300">-->
				<p><strong>Nejaky Projekt [logo firmy, mesta]</strong></p>
				<p>Tady jsme delaly co jsme mohli</p>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center slideanim">
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 1px solid dodgerblue">
				<!--<img src="paris.jpg" alt="Paris" width="400" height="300">-->
				<p><strong>Projekt [logo firmy, mesta]</strong></p>
				<p>Ano, tady jsme poskytly rreseni</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 1px solid dodgerblue">
				<!--<img src="newyork.jpg" alt="New York" width="400" height="300">-->
				<p><strong>Nejaky dalsi projekt [logo firmy, mesta]</strong></p>
				<p>Ano! i tady jsme se podilely na reseni</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 1px solid dodgerblue">
				<!--<img src="sanfran.jpg" alt="San Francisco" width="400" height="300">-->
				<p><strong>Nejaky Projekt [logo firmy, mesta]</strong></p>
				<p>Tady jsme delaly co jsme mohli</p>
			</div>
		</div>
	</div><br><br>

	<h2>Co o nás rěkly naši zákazníci</h2>
	<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<h4>"Tahle firma je profi. Mám velkou radost z výsledku!"<br><span>Michael Roe, Vice President, Comment Box</span>
				</h4>
			</div>
			<div class="item">
				<h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
			</div>
			<div class="item">
				<h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span>
				</h4>
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<!-- Container (Pricing Section) -->
<div id="solution" class="container-fluid">
	<div class="text-center">
		<h2>RĚŠENÍ</h2>
		<h4>Vytvoříme rešení na míru, tady je nekolik možných rešení</h4>
	</div>
	<div class="row slideanim">
		<div class="col-sm-4 col-xs-12">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h1>Základ</h1>
				</div>
				<div class="panel-body">
					<p><strong>20</strong> Lorem</p>
					<p><strong>15</strong> Ipsum</p>
					<p><strong>5</strong> Dolor</p>
					<p><strong>2</strong> Sit</p>
					<p><strong>Endless</strong> Amet</p>
				</div>
				<div class="panel-footer">
					<h3>bla bla</h3>
					<h4>per month</h4>
					<button class="btn btn-lg">Chci zjistit podrobnosti</button>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h1>Pro</h1>
				</div>
				<div class="panel-body">
					<p><strong>50</strong> Lorem</p>
					<p><strong>25</strong> Ipsum</p>
					<p><strong>10</strong> Dolor</p>
					<p><strong>5</strong> Sit</p>
					<p><strong>Endless</strong> Amet</p>
				</div>
				<div class="panel-footer">
					<h3>bla bla</h3>
					<h4>per month</h4>
					<button class="btn btn-lg">Chci zjistit podrobnosti</button>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h1>Premium</h1>
				</div>
				<div class="panel-body">
					<p><strong>100</strong> Lorem</p>
					<p><strong>50</strong> Ipsum</p>
					<p><strong>25</strong> Dolor</p>
					<p><strong>10</strong> Sit</p>
					<p><strong>Endless</strong> Amet</p>
				</div>
				<div class="panel-footer">
					<h3>bla bla</h3>
					<h4>per month</h4>
					<button class="btn btn-lg">Chci zjistit podrobnosti</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Container (Training Section) -->
<div id="training" class="container-fluid">
	<div class="row">
		<div class="col-sm-8">
			<h2>Školení</h2><br>
			<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat.</h4><br>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
				ut aliquip ex ea commodo consequat.</p>
		</div>
		<div class="col-sm-4" style="text-align: center;">
			<span class="glyphicon glyphicon-blackboard logo"></span>
		</div>
	</div>
	<div class="row text-center slideanim">
		<div class="col-sm-4">
			<div class="w3-panel w3-round-large w3-hover-shadow" style="background-color: #F0FFFF; border: #bce8f1 ridge;">
				<p><strong>Paris</strong></p>
				<p>Yes, we built Paris</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-panel w3-round-large w3-hover-shadow" style="background-color: #F0FFFF; border: #bce8f1 ridge;">
				<p><strong>New York</strong></p>
				<p>We built New York</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-panel w3-round-large w3-hover-shadow" style="background-color: #F0FFFF; border: #bce8f1 ridge;">
				<p><strong>San Francisco</strong></p>
				<p>Yes, San Fran is ours</p>
			</div>
		</div>
		<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
			dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
			ea commodo consequat.</h4><br>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
			magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
			commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
			anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
			aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</p>
	</div>
	<br>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
	<h2 class="text-center">Kontakty</h2>
	<div class="row">
		<div class="col-sm-5">
			<p>Contact us and we'll get back to you within 24 hours.</p>
			<p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
			<p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
			<p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
			<div class="span4">
				<a href="#"><i class='fab fa-linkedin blueGlow'></i></a>&nbsp;
				<a href="#"><i class='fab fa-google-plus-square googlrpGlow'></i></a>&nbsp;
				<a href="#"><i class='fab fa-facebook-square facebGlow'></i></a>&nbsp;
				<a href="#"><i class='fab fa-twitter-square twiteri'></i></a>&nbsp;
			</div>
		</div>

		<div class="col-sm-7">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
				</div>
				<div class="col-sm-6 form-group">
					<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
				</div>
			</div>
			<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
			<div class="row">
				<div class="col-sm-12 form-group">
					<button class="btn btn-default pull-right" type="submit">Send</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Image of location/map -->
<!--<img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:80%">-->

<footer class="container-fluid text-center">
	<a href="#myPage" title="To Top">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</a>
	<p>Bootstrap Theme Made By <a href="https://www.w3schools.com" title="Visit w3schools">www.w3schools.com</a></p>
</footer>

<script>
	$(document).ready(function () {
		// Add smooth scrolling to all links in navbar + footer link
		$(".navbar a, footer a[href='#myPage']").on('click', function (event) {
			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {
				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
					scrollTop: $(hash).offset().top
				}, 900, function () {

					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
			} // End if
		});

		$(window).scroll(function () {
			$(".slideanim").each(function () {
				var pos = $(this).offset().top;

				var winTop = $(window).scrollTop();
				if (pos < winTop + 600) {
					$(this).addClass("slide");
				}
			});
		});
	})
</script>

</body>
</html>
