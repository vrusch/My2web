<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
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
				<p>Prave editujete kviz - <b><?php echo $quizz['name']; ?></b>. Nejprve kviz nakonfigurujte a potom pridejte komponety, tzn. otazky a lekce.</p>
			</div>
			<!-- END of header page	-->

			<?php echo form_open('quizzes_cont/rename_quizz/'.$quizz['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="quizz_name">Editovat nazev </label>
				<div class="controls">
					<?php echo form_input(array('name' => 'quizz_name'), $quizz['name']); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
				<?php echo form_close(); ?>
			</div><br>

			<!-- TABS start -->

			<?php if (isset($display['current'])) : ?>
			<div class="well">
				<ul class="nav nav-tabs">
					<?php if($display['current'] == 'home') {echo '<li class="active"><a data-toggle="tab" href="#home">Konfigurace kvizu</a></li>';} else {echo '<li><a data-toggle="tab" href="#home">Konfigurace vzhledu</a></li>';} ?>
					<?php if($display['current'] == 'menu1') {echo '<li class="active"><a data-toggle="tab" href="#menu1">Komponenty kvizu</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu1">Komponenty kvizu</a></li>';} ?>
					<?php if($display['current'] == 'menu2') {echo '<li class="active"><a data-toggle="tab" href="#menu2">Popis/Poznamka</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu2">Popis/Poznamka</a></li>';} ?>
					<?php if($display['current'] == 'menu6') {echo '<li class="active"><a data-toggle="tab" href="#menu6">Smazat/Blokovat</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu6">Smazat/Blokovat</a></li>';} ?>
				</ul>
				<?php //var_dump($display); ?>
				<div class="tab-content">
						<?php if($display['current'] == 'home') {echo '<div id="home" class="tab-pane fade in active">';} else {echo '<div id="home" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('quizzes/sub_config', array('title' => ('manage quizzes'))); ?>
					</div>
						<?php if($display['current'] == 'menu1') {echo '<div id="menu1" class="tab-pane fade in active">';} else {echo '<div id="menu1" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('quizzes/sub_component', array('title' => ('manage quizzes'))); ?>
					</div>
						<?php if($display['current'] == 'menu2') {echo '<div id="menu2" class="tab-pane fade in active">';} else {echo '<div id="menu2" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('quizzes/sub_note', array('title' => ('manage quizzes'))); ?>
					</div>
						<?php if($display['current'] == 'menu6') {echo '<div id="menu6" class="tab-pane fade in active">';} else {echo '<div id="menu6" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('quizzes/sub_delete', array('title' => ('manage quizzes'))); ?>
					</div>
				</div>
			<?php endif ?>
			</div>
	</div>
</div>
</body>
</html>



