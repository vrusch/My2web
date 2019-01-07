<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('pridat skupiny'))); ?>
</head>
<script>
	$(document).ready(function() {
		var max_fields      = 4; //maximum input boxes allowed
		var wrapper         = $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="controls"><input type="text" name="skupina[]" placeholder="Nazev nove skupiny" style="margin: 10px"><button class="btn btn-small remove_field" href="#">Smazat</button></div>'); //add input box
			}
		});

		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).parent('div').remove(); x--;
		})
	});
</script>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Vytvorit skupiny zaku"); ?></h2>

			<div class="well">
				<?php echo ("vytvareni skupin"); ?>
			</div>

			<?php echo form_open('companies/add_groups/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Pridavat skupiny zaku pro firmu: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>

			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			<div class="control-group input_fields_wrap">
				<div class="controls">
					<input type="text" name="skupina[]" placeholder="Nazev nove skupiny" style="margin: 10px"><button class="btn btn-info btn-small add_field_button">Pridat dalsi</button>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('companies/edit/' . $company['id'], ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>
</body>
</html>
