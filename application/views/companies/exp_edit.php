<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_experiment')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Experiment</h2></td>
					<td><a href="experiment_cont"><buton class="btn btn-primary btn-small">Back</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo("Experiment popis."); ?>
			</div>
			<!-- END of header page	-->

			<?php echo form_open('companies/edit/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name">Editovat nazev </label>
				<div class="controls">
					<?php echo form_input(array('name' => 'company_name'), $company['name']); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div><br>
			<?php echo form_close(); ?>
			<?php //var_dump($display); ?>
			<!-- TABS start -->
			<?php if (isset($display['current'])) : ?>
				<div class="well">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Managment Zaku</a></li>
						<li><a data-toggle="tab" href="#menu1">Managment Skupin</a></li>
						<li><a data-toggle="tab" href="#menu2">Managment Kvizu</a></li>
						<li><a data-toggle="tab" href="#menu3">Managment MKB</a></li>
					</ul>

					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<?php echo $this->load->view('companies/sub_students', array('title' => ('edit company'))); ?>
						</div>
						<div id="menu1" class="tab-pane fade">
							<?php echo $this->load->view('companies/sub_groups', array('title' => ('edit company'))); ?>
						</div>
						<div id="menu2" class="tab-pane fade">
							<?php echo $this->load->view('companies/sub_quizzes', array('title' => ('edit company'))); ?>
						</div>
						<div id="menu3" class="tab-pane fade">
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


