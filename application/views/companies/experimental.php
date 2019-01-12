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

			<h2><?php echo("Firma editace"); ?></h2>

			<div class="well">
				<?php echo("Editovaní firmy"); ?>
			</div>
			<?php
			//var_dump($company_item);
			//var_dump($groups);
			?>
			<?php echo form_open('companies/edit/' . $company_item['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo('Název'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'id' => 'name'), $company_item['name']); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div>
			<?php echo form_close(); ?>


			<div class="well">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Žáci</a></li>
					<li><a data-toggle="tab" href="#menu1">Skupiny</a></li>
					<li><a data-toggle="tab" href="#menu2">Kvizy</a></li>
					<li><a data-toggle="tab" href="#menu3">MKB</a></li>
				</ul>

				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<?php echo $this->load->view('companies/sub_addstudents', array('' => '')); ?>
					</div>
					<div id="menu1" class="tab-pane fade">
						<h3>Menu 1</h3>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
							commodo consequat.</p>
					</div>
					<div id="menu2" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
							laudantium, totam rem aperiam.</p>
					</div>
					<div id="menu3" class="tab-pane fade">
						<h3>Menu 3</h3>
						<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
							explicabo.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</body>
</html>


