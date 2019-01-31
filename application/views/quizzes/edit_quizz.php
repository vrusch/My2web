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

			<!-- TABS start -->


			<?php if (isset($display['current'])) : ?>
			<div class="well">
				<ul class="nav nav-tabs">
					<?php if($display['current'] == 'home') {echo '<li class="active"><a data-toggle="tab" href="#home">Konfigurace vzhledu</a></li>';} else {echo '<li><a data-toggle="tab" href="#home">Konfigurace vzhledu</a></li>';} ?>
					<?php if($display['current'] == 'menu1') {echo '<li class="active"><a data-toggle="tab" href="#menu1">Konfigurace kvizu</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu1">Konfigurace kvizu</a></li>';} ?>
					<?php if($display['current'] == 'menu2') {echo '<li class="active"><a data-toggle="tab" href="#menu2">Komponenty kvizu</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu2">Komponenty kvizu</a></li>';} ?>
					<?php if($display['current'] == 'menu3') {echo '<li class="active"><a data-toggle="tab" href="#menu3">zatim nic</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu3">zatim nic</a></li>';} ?>
					<?php if($display['current'] == 'menu4') {echo '<li class="active"><a data-toggle="tab" href="#menu4">zatim nic</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu4">zatim nic</a></li>';} ?>
					<?php if($display['current'] == 'menu5') {echo '<li class="active"><a data-toggle="tab" href="#menu5">Smazat/Blokovat</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu5">Smazat/Blokovat</a></li>';} ?>
				</ul>
				<?php var_dump($display); ?>
				<div class="tab-content">
						<?php if($display['current'] == 'home') {echo '<div id="home" class="tab-pane fade in active">';} else {echo '<div id="home" class="tab-pane fade">';} ?>
						<?php if ($display['page'] == 'students_new')  { echo $this->load->view('companies/sub_students_new', array('title' => ('edit company')));} else { echo $this->load->view('companies/sub_students', array('title' => ('edit company')));}?>
					</div>
						<?php if($display['current'] == 'menu1') {echo '<div id="menu1" class="tab-pane fade in active">';} else {echo '<div id="menu1" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('companies/sub_groups', array('title' => ('edit company'))); ?>
					</div>
						<?php if($display['current'] == 'menu2') {echo '<div id="menu2" class="tab-pane fade in active">';} else {echo '<div id="menu2" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('companies/sub_stdtogroup', array('title' => ('edit company'))); ?>
					</div>
						<?php if($display['current'] == 'menu3') {echo '<div id="menu3" class="tab-pane fade in active">';} else {echo '<div id="menu3" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('companies/sub_quizzes', array('title' => ('edit company'))); ?>
					</div>
						<?php if($display['current'] == 'menu4') {echo '<div id="menu4" class="tab-pane fade in active">';} else {echo '<div id="menu4" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('companies/sub_mkb', array('title' => ('edit company')));?>
					</div>
						<?php if($display['current'] == 'menu5') {echo '<div id="menu5" class="tab-pane fade in active">';} else {echo '<div id="menu5" class="tab-pane fade">';} ?>
						<?php echo $this->load->view('companies/sub_ban_delete', array('title' => ('edit company'))); ?>
					</div>

				</div>

<?php endif ?>

		</div>
	</div>
</div>
</body>
</html>



