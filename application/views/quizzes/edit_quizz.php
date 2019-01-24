<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head_js', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_quizzes')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Editace kvizu</h2></td>
					<td><a href="quizzes_cont"><buton class="btn btn-primary btn-small">Back</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo("Experiment popis."); ?>
			</div>
			<!-- END of header page	-->

			<?php echo form_open('quizzes_cont/edit/'.$quizz['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="quizz_name">Editovat nazev </label>
				<div class="controls">
					<?php echo form_input(array('name' => 'quizz_name'), $quizz['name']); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div><br>
			<?php echo form_close(); ?>
			<?php //var_dump($display); ?>
			<!-- TABS start -->
			<?php if (isset($display['current'])) : ?>
				<div style="width: 100%">
					<h2><?php echo $quizz['name']; ?></h2>
					<p>{ poznamka ulozana ke kvizu, strucny popis, mozna cil, urceni unique ID for every tab and wrap them inside a div element with class .tab-content.}</p>
					<ul class="nav nav-pills">
						<li class="active"><a data-toggle="pill" href="#sub_menu1">Komponenty kvizu</a></li>
						<li><a data-toggle="pill" href="#sub_menu2">Konfigurace parametru kvizu</a></li>
						<li><a data-toggle="pill" href="#sub_menu3">if specificke poradi</a></li>
					</ul>

					<div class="tab-content">

						<div id="sub_menu1" class="tab-pane fade in active">
							<?php echo $this->load->view('quizzes/sub_component', array('title' => ('edit quizz'))); ?>
						</div>

						<div id="sub_menu2" class="tab-pane fade">
							<h3>nastaveni prametru kvizu:</h3>
							<p>nahodne poradi otazek</p>
							<p>specificke poradi otazek a lekcii</p>
							<p>dlouhy formular</p>
							<p>1 otazka jedna stranka</p>
						</div>

						<div id="sub_menu3" class="tab-pane fade">
							<h3>Specificke poradi</h3>
							<p>pretahovanim urcite poradi komponent kvizu.</p>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>
</body>
</html>



