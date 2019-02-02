

<?php echo form_open('quizzes_cont/config/'.$quizz['id'], 'class="form-horizontal"'); ?>
<?php echo validation_errors();?>
<?php //var_dump($questions) ?>
<div style="border 1px solid grey; border-radius: 4px; padding: 30px">
<table class="table table-condensed table-hover" style="background-color:white;">
	<thead>
	</thead>
	<tbody
	<tr>
		<td>
			<div style="border: 1px solid #CCCCCC; border-radius: 4px; padding: 5px">
				<p style="color: #0e90d2">Nahodne poradi otazek / nebo specificke poradi otazek a lekcii</p>
				<table style="width: 100%">
					<tr>
						<?php if ($quizz['quizz_order'] == NULL) : ?>
						<td style="width: 50%">
							<input class="w3-check" type="radio" name="quizz_order" value="rnd" checked><label>Nahodne poradi otazek</label>
						</td>
						<td>
							<input class="w3-check" type="radio" name="quizz_order" value="spec"><label>Specificke poradi otazek</label>
						</td>
						<?php else : ?>
							<td style="width: 50%">
								<input class="w3-check" type="radio" name="quizz_order" value="rnd" <?php if ($quizz['quizz_order'] == 'rnd') echo 'checked';?>><label>Nahodne poradi otazek</label>
							</td>
							<td>
								<input class="w3-check" type="radio" name="quizz_order" value="spec" <?php if ($quizz['quizz_order'] == 'spec') echo 'checked';?>><label>Specificke poradi otazek</label>
							</td>
						<?php endif ?>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="border: 1px solid #CCCCCC; border-radius: 4px; padding: 5px">
				<p style="color: #0e90d2">Dlouhy formular / nebo 1 otazka jedna stranka</p>
				<table style="width: 100%">
					<tr>
						<?php if ($quizz['quizz_type'] == NULL) : ?>
						<td style="width: 50%">
							<input class="w3-check" type="radio" name="quizz_type" value="long" checked><label>Jeden dlouhy seznam</label>
						</td>
						<td>
							<input class="w3-check" type="radio" name="quizz_type" value="one"><label>1 otazka na 1 stranku</label>
						</td>
						<?php else : ?>
							<td style="width: 50%">
								<input class="w3-check" type="radio" name="quizz_type" value="long" <?php if ($quizz['quizz_type'] == 'long') echo 'checked';?>><label>Jeden dlouhy seznam</label>
							</td>
							<td>
								<input class="w3-check" type="radio" name="quizz_type" value="one" <?php if ($quizz['quizz_type'] == 'one') echo 'checked';?>><label>1 otazka na 1 stranku</label>
							</td>
						<?php endif ?>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<?php $qcount = count($questions);?>
			<div style="border: 1px solid #CCCCCC; border-radius: 4px; padding: 5px">
				<?php if ($qcount != 0) : ?>
					<?php if ($qcount != $quizz['question_num']) {$qc = $quizz['question_num'];} else {$qc = $qcount;}?>
				<p style="color: #0e90d2">Kolik otazek se ma vybrat z celkoveho poctu</p>
				<p>V kvizu je ted: <b><?php echo $qcount ;?></b> otazek. Kolik se ma vybrat otazek <input type="number" name="question_num" min="1" max="<?php echo $qcount ;?>" value="<?php echo $qc ;?>" style="width: 50px"></p>
				<?php else : ?>
				<p>zadne otazky nejsou prirazene</p>
				<?php endif ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="border: 1px solid #CCCCCC; border-radius: 4px; padding: 5px">
				<p style="color: #0e90d2">Bodovy kviz</p>
				<em>Kazda otazka ma bodovou hodnotu a kviz ma bodovou hranici po dosazeni ktere je kviz uspesny</em><br>
				<table style="width: 100%">
					<tr>
						<?php if ($quizz['quizz_point'] == NULL) : ?>
						<td style="width: 50%">
							<input class="w3-check" type="radio" name="quizz_point" value="yes"><label>Zapnout</label>
						</td>
						<?php else : ?>
						<td style="width: 50%">
							<input class="w3-check" type="radio" name="quizz_point" value="yes" checked><label>Zapnout</label>
						</td>
							<td style="width: 50%">
								<input class="w3-check" type="radio" name="quizz_point" value="not"><label>Vypnout</label>
							</td>
						<?php endif ?>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</div>


<div style="width: 100%; text-align: center">
<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
</div>
<?php echo form_close(); ?>



