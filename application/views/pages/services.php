<!DOCTYPE html>
<html>
<head>

	<?php echo $this->load->view('head'); ?>

</head>
<body>

<?php echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<div class="span2">
			<ul class="nav nav-list">
				<li class="nav-header">Sluzby a produkty:</li>
				<li><a>sluzba 1</a></li>
				<li><a>sluzba 2</a></li>
				<li><a>produkt 1</a></li>
				<li><a>produkt 2</a></li>

				<li class="nav-header">Reseni:</li>
				<li><a>reseni 1</a></li>
				<li><a>reseni 2</a></li>
				<li><a>reseni 3</a></li>
			</ul>
		</div>

		<div class="span10">

			<h2>Sluzby a produkty</h2>

			<div class="well">
				<p> povidani o slubach a produktech; obchodni zdeleni </p>
			</div>

			<div>
				<p>popis sluzby, produktu, reseni: zamereni, cile, obchodni sdeleni</p>
				<p>//todo: vyriesit posuvanie strany alebo testu, back color div? table? ...border</p>
				<p>//todo: div precnieva container</p>
			</div>

		</div>

	</div>

	<?php echo $this->load->view('footer'); ?>

</body>
</html>

