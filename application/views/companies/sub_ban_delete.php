<div class="control-group">
	<label class="control-label" for="group">blabol o bann a delete</label>
	<div class="controls">

		<?php echo anchor('companies_cont/ban_company/' . $company['id'], 'Zablokovat firmu', 'class="btn btn-danger btn-small"; style="margin: 10px"'); ?>
		<?php echo anchor('companies_cont/un_ban_company/' . $company['id'], 'Odblokovat firmu', 'class="btn btn-danger btn-small"; style="margin: 10px"'); ?>
		<?php echo anchor('companies_cont/delete_company/' . $company['id'], 'Smazat firmu', 'class="btn btn-danger btn-small"; style="margin: 10px"'); ?>

	</div>
</div>
