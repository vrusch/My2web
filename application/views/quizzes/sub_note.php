<p>Editace poznamky ke kvizu - nutne pro mkb kdyz vybira pro skupinu aby vedel co vybira, teda ma to obsahovat strucny popis kvizu.</p>


<?php echo form_open('quizzes_cont/update_note/' . $quizz['id'], 'class="form-horizontal"'); ?>
<?php echo validation_errors(); ?>
<div class="control-group">
	<label class="control-label" for="note">Poznamka/Popis</label>
	<div class="controls">
		<?php echo form_textarea(array('name' => 'note'), $quizz['note']); ?>
	</div>
</div>

<div class="form-actions">
	<div class="controls">
		<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
	</div>
</div>

<?php echo form_close(); ?>
