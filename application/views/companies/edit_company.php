<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Managment firmy</h2></td>
					<td><a href="experiment_cont"><buton class="btn btn-primary btn-small">Zpátky na firmy</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo("Experiment popis."); ?>
			</div>
			<!-- END of header page	-->

			<?php echo form_open('companies_cont/edit/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name">Editovat název </label>
				<div class="controls">
					<?php echo form_input(array('name' => 'company_name'), $company['name']); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div><br>
			<?php echo form_close(); ?>

			<?php //var_dump($company);?>
			<?php //var_dump($groups);?>
			<?php //var_dump($students);?>
			<?php //var_dump($mkb);?>
			<?php //var_dump($quizzes);?>
			<?php //var_dump($display);?>

			<!-- TABS start -->
			<?php if (isset($display['current'])) : ?>
				<div class="well">
					<ul class="nav nav-tabs">
						<?php if($display['current'] == 'home') {echo '<li class="active"><a data-toggle="tab" href="#home">Managment žáků</a></li>';} else {echo '<li><a data-toggle="tab" href="#home">Managment žáků</a></li>';} ?>
						<?php if($display['current'] == 'menu1') {echo '<li class="active"><a data-toggle="tab" href="#menu1">Managment Skupin</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu1">Managment Skupin</a></li>';} ?>
						<?php if($display['current'] == 'menu2') {echo '<li class="active"><a data-toggle="tab" href="#menu2">Žáci -> skupiny</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu2">Žáci -> skupiny</a></li>';} ?>
						<?php if($display['current'] == 'menu3') {echo '<li class="active"><a data-toggle="tab" href="#menu3">Managment Kvízů</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu3">Managment Kvízů</a></li>';} ?>
						<?php if($display['current'] == 'menu4') {echo '<li class="active"><a data-toggle="tab" href="#menu4">Managment MKB</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu4">Managment MKB</a></li>';} ?>
					</ul>
					<?php //var_dump($display); ?>
					<div class="tab-content">
						<?php if($display['current'] == 'home') {echo '<div id="home" class="tab-pane fade in active">';} else {echo '<div id="home" class="tab-pane fade">';} ?>
							<?php echo $this->load->view('companies/sub_students', array('title' => ('edit company'))); ?>
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
							<?php echo $this->load->view('companies/sub_mkb', array('title' => ('edit company'))); ?>
						</div>
					</div>

				</div>
			<?php endif ?>
		</div>
	</div>
</div>
</body>
</html>


