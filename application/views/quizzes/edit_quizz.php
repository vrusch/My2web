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
			<?php //var_dump($display); ?>
			<!-- TABS start -->
			<?php if (isset($display['current'])) : ?>
				<div style="width: 100%">
					<h2>Dynamic Pills</h2>
					<p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
					<ul class="nav nav-pills">

						<li class="active"><a data-toggle="pill" href="#sub_menu1">Menu 1</a></li>
						<li><a data-toggle="pill" href="#sub_menu2">Menu 2</a></li>
						<li><a data-toggle="pill" href="#sub_menu3">Menu 3</a></li>
					</ul>

					<div class="tab-content">
						<div id="sub_menu1" class="tab-pane fade">
							<h3>Menu 1</h3>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div id="sub_menu2" class="tab-pane fade">
							<h3>Menu 2</h3>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
						</div>
						<div id="sub_menu3" class="tab-pane fade">
							<h3>Menu 3</h3>
							<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>
</body>
</html>



