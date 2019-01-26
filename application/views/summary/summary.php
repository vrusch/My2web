<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_summary')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Prehled</h2></td>
					<td><a href="quizzes_cont"><buton class="btn btn-primary btn-small">Back</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo("Experiment popis."); ?>
			</div>
			<!-- END of header page	-->


			<?php //var_dump($display); ?>
			<!-- TABS start -->
			<?php if (isset($display['current'])) : ?>
			<ul class="nav nav-tabs">
				<?php if($display['current'] == 'home') {echo '<li class="active"><a data-toggle="tab" href="#home">Prehled firmy</a></li>';} else {echo '<li><a data-toggle="tab" href="#home">Prehled firmy</a></li>';} ?>
				<?php if($display['current'] == 'menu1') {echo '<li class="active"><a data-toggle="tab" href="#menu1">Prehled žáků</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu1">Prehled žáků</a></li>';} ?>
				<?php if($display['current'] == 'menu2') {echo '<li class="active"><a data-toggle="tab" href="#menu2">Jine prehledy</a></li>';} else {echo '<li><a data-toggle="tab" href="#menu2">Jine prehledy</a></li>';} ?>
			</ul>
			<?php //var_dump($display); ?>
				<div class="tab-content">
					<?php if($display['current'] == 'home') {echo '<div id="home" class="tab-pane fade in active">';} else {echo '<div id="home" class="tab-pane fade">';} ?>
					<?php echo $this->load->view('summary/sub_sum_company', array('title' => ('edit company')));?>
					</div>
					<?php if($display['current'] == 'menu1') {echo '<div id="menu1" class="tab-pane fade in active">';} else {echo '<div id="menu1" class="tab-pane fade">';} ?>
					<?php echo $this->load->view('summary/sub_sum_students', array('title' => ('edit company'))); ?>
					</div>
					<?php if($display['current'] == 'menu2') {echo '<div id="menu2" class="tab-pane fade in active">';} else {echo '<div id="menu2" class="tab-pane fade">';} ?>
					<?php //echo $this->load->view('companies/sub_stdtogroup', array('title' => ('edit company'))); ?>
					</div>
					<?php if($display['current'] == 'menu3') {echo '<div id="menu3" class="tab-pane fade in active">';} else {echo '<div id="menu3" class="tab-pane fade">';} ?>
					<?php //echo $this->load->view('companies/sub_quizzes', array('title' => ('edit company'))); ?>
					</div>
				</div>

		</div>
	</div>
<?php endif ?>
</div>
</body>
</html>
