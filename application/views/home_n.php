<!DOCTYPE html>
<html lang="cz">
<head>

<?php echo $this->load->view('head_n'); ?>

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

	<!-- LOGIN -->
	<div class="w3-container">
		<?php if ($this->authentication->is_signed_in()) : ?>
			<?php if ($this->authorization->is_permitted(array('retrieve_users', 'retrieve_roles', 'retrieve_permissions'))) : ?>

		<a href="account/manage_users">
			<button class="w3-btn linky"><i class="fas fa-desktop"></i> Admin Menu</button>
		</a>
			<?php endif; ?>

		<a href="account/account_profile">
			<button class="w3-btn linky"><i class="fas fa-user-edit"> </i> <?php echo $account->username; ?></button>
		</a>

			<button onclick="document.getElementById('id02').style.display='block'" class="w3-btn linky"><i class="fas fa-sign-in-alt"> </i> odhlasit</button>

		<?php else : ?>
			<a href="account/sign_in">
				<button onclick="document.getElementById('id01').style.display='block'" class="w3-btn linky">
					<i class="fas fa-user-alt-slash"></i> Přihlásit se
				</button>
			</a>
		<?php endif; ?>
	</div>
</div>
<!-- END OF LOGIN -->

<!-- MODAL sign in-->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-card-4 w3-round-large w3-animate-zoom" style="max-width:600px">

		<?php echo form_open(uri_string().($this->input->get('continue') ? '/?continue='.urlencode($this->input->get('continue')) : ''), 'class="form-horizontal"'); ?>
		<?php echo form_fieldset(); ?>

		<h3><?php echo lang('sign_in_heading'); ?></h3>

		<div class="well">
			<?php if (isset($sign_in_error)) : ?>
				<div class="form_error"><?php echo $sign_in_error; ?></div>
			<?php endif; ?>

			<div class="control-group <?php echo (form_error('sign_in_username_email') || isset($sign_in_username_email_error)) ? 'error' : ''; ?>">
				<label class="control-label" for="sign_in_username_email"><?php echo lang('sign_in_username_email'); ?></label>

				<div class="controls">
					<?php echo form_input(array('name' => 'sign_in_username_email', 'id' => 'sign_in_username_email', 'value' => set_value('sign_in_username_email'), 'maxlength' => '24')); ?>
					<?php if (form_error('sign_in_username_email') || isset($sign_in_username_email_error)) :?>
						<span class="help-inline">
		        			<?php echo form_error('sign_in_username_email'); ?>
							<?php if (isset($sign_in_username_email_error)) : ?>
								<span class="field_error"><?php echo $sign_in_username_email_error; ?></span>
							<?php endif; ?>
		        			</span>
					<?php endif; ?>
				</div>
			</div>

			<div class="control-group <?php echo form_error('sign_in_password') ? 'error' : ''; ?>">
				<label class="control-label" for="sign_in_password"><?php echo lang('sign_in_password'); ?></label>

				<div class="controls">
					<?php echo form_password(array('name' => 'sign_in_password', 'id' => 'sign_in_password', 'value' => set_value('sign_in_password'))); ?>
					<?php if (form_error('sign_in_password')) : ?>
						<span class="help-inline"><?php echo form_error('sign_in_password'); ?></span>
					<?php endif; ?>

					<?php if (isset($recaptcha)) : ?>
						<?php echo $recaptcha; ?>
						<?php if (isset($sign_in_recaptcha_error)) : ?>
							<span class="field_error"><?php echo $sign_in_recaptcha_error; ?></span>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<?php echo form_checkbox(array('name' => 'sign_in_remember', 'id' => 'sign_in_remember', 'value' => 'checked', 'checked' => $this->input->post('sign_in_remember'),)); ?>
						<?php echo lang('sign_in_remember_me'); ?>
					</label>
				</div>
			</div>

			<div>
				<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-large pull-right', 'content' => '<i class="icon-lock"></i> '.lang('sign_in_sign_in'))); ?>
			</div>

			<p><?php echo anchor('account/forgot_password', lang('sign_in_forgot_your_password')); ?><br/>
				<?php echo sprintf(lang('sign_in_dont_have_account'), anchor('account/sign_up', lang('sign_in_sign_up_now'))); ?></p>

		</div>

		<?php echo form_fieldset_close(); ?>
		<?php echo form_close(); ?>

	</div>
</div>
<!-- END OF MODAL sign in -->

<!-- MODAL sign out -->
<div id="id02" class="w3-modal w3-round-large">
	<div class="w3-modal-content w3-center w3-round-large w3-animate-zoom"
		 style="max-width:400px; background-color: #c4e2fd">

		<p class="w3-text-black w3-padding-large"><strong>Opravdu se chcete odhlasit?</strong></p>

		<div class="w3-container">
			<div class="w3-bar">
				<a href="account/sign_out">
					<button type="button" class="w3-button w3-tiny w3-white w3-border w3-round"> OK</button>
				</a>
				<button onclick="document.getElementById('id02').style.display='none'" type="button"
						class="w3-button w3-tiny w3-white w3-border w3-round">Cancel
				</button>
			</div>
		</div>
	</div>
</div>
<!-- END OF MODAL sign out -->

<!-- Container (About Section) -->
<br><br>
<div id="about" class="container-fluid">
	<div class="row">
		<div class="col-sm-8">
			<h2><strong>O nás ...</strong></h2><br>
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

<div id="actual" class="container-fluid text-center bg-grey">
	<h2><strong>Aktuality</strong></h2>
	<div class="row">
		<div class="col-sm-4" style="text-align: center;">
			<span class="glyphicon glyphicon-globe logo slideanim"></span>
		</div>
		<div class="col-sm-8">

			<!-- Carousel -->
			<div class="container">

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
	<h2><strong>Služby</strong></h2>
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
	<h2><strong>Reference</strong></h2><br>
	<h4>Naše realizované projekty</h4>
	<div class="row text-center slideanim">
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 2px solid #076cc5">
				<img src="/resource/img/liberec.jpg" alt="liberec" style="width:100%;max-width:150px">
				<p><strong>Projekt [logo firmy, mesta]</strong></p>
				<p>Ano, tady jsme poskytly reseni</p>
				<a href="">
					<button type="button" class="w3-button w3-small w3-blue w3-round w3-hover-white w3-margin">Vice
					</button>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 2px solid #076cc5">
				<!--<img src="newyork.jpg" alt="New York" width="400" height="300">-->
				<p><strong>Nejaky dalsi projekt [logo firmy, mesta]</strong></p>
				<p>Ano! i tady jsme se podilely na reseni</p>
				<a href="">
					<button type="button" class="w3-button w3-small w3-blue w3-round w3-hover-white w3-margin">Vice
					</button>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 2px solid #076cc5">
				<!--<img src="sanfran.jpg" alt="San Francisco" width="400" height="300">-->
				<p><strong>Nejaky Projekt [logo firmy, mesta]</strong></p>
				<p>Tady jsme delaly co jsme mohli</p>
				<a href="">
					<button type="button" class="w3-button w3-small w3-blue w3-round w3-hover-white w3-margin">Vice
					</button>
				</a>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center slideanim">
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 2px solid #076cc5">
				<!--<img src="paris.jpg" alt="Paris" width="400" height="300">-->
				<p><strong>Projekt [logo firmy, mesta]</strong></p>
				<p>Ano, tady jsme poskytly reseni</p>
				<a href="">
					<button type="button" class="w3-button w3-small w3-blue w3-round w3-hover-white w3-margin">Vice
					</button>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 2px solid #076cc5">
				<!--<img src="newyork.jpg" alt="New York" width="400" height="300">-->
				<p><strong>Nejaky dalsi projekt [logo firmy, mesta]</strong></p>
				<p>Ano! i tady jsme se podilely na reseni</p>
				<a href="">
					<button type="button" class="w3-button w3-small w3-blue w3-round w3-hover-white w3-margin">Vice
					</button>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-round-large w3-hover-shadow w3-white" style="border: 2px solid #076cc5">
				<!--<img src="sanfran.jpg" alt="San Francisco" width="400" height="300">-->
				<p><strong>Nejaky Projekt [logo firmy, mesta]</strong></p>
				<p>Tady jsme delaly co jsme mohli</p>
				<a href="">
					<button type="button" class="w3-button w3-small w3-blue w3-round w3-hover-white w3-margin">Vice
					</button>
				</a>
			</div>
		</div>
	</div>
	<br><br>

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
		<h2><strong>RĚŠENÍ</strong></h2>
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
<br><br>
<!-- Container (Training Section) -->
<div id="training" class="container-fluid text-center">
	<h2><strong>Školení</strong></h2><br>
	<div class="row">
		<div class="col-sm-8">

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
			<div class="w3-panel w3-round-large w3-hover-shadow"
				 style="background-color: #ffffff; border: #076cc5 ridge;">
				<p><strong>Paris</strong></p>
				<p>Yes, we built Paris</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-panel w3-round-large w3-hover-shadow"
				 style="background-color: #ffffff; border: #076cc5 ridge;">
				<p><strong>New York</strong></p>
				<p>We built New York</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="w3-panel w3-round-large w3-hover-shadow"
				 style="background-color: #ffffff; border: #076cc5 ridge;">
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
</div>
<br><br>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey"><br><br>
	<h2 class="text-center"><strong>Kontakty</strong></h2>
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

<?php echo $this->load->view('footer_n'); ?>

</body>
</html>
