<div class="control-group">
	<div class="controls">
		<?php if (!$company['status'] == 'banned') : ?>
			<p>Firma se da zablokovat, pri zablokovani jsou blokovany: firma, studenti i MKB. Mazani firmy je pristupne az po zablokovani.</p>
			<?php echo anchor('companies_cont/ban_company/' . $company['id'], 'Zablokovat firmu', 'class="btn btn-danger btn-small"; style="margin: 10px"'); ?>
		<?php else : ?>
			<p>Firma se da odblokovat, pri odblokovani jsou odblokovany: firma, studenti i MKB. Mazani firmy je NEVRATNE budou straceny vsechny data o firme, studentech i MKB.</p>
			<?php echo anchor('companies_cont/un_ban_company/' . $company['id'], 'Odblokovat firmu', 'class="btn btn-danger btn-small"; style="margin: 10px"'); ?>
			<?php echo anchor('companies_cont/delete_company/' . $company['id'], 'Smazat firmu', 'class="btn btn-danger btn-small"; style="margin: 10px"'); ?>
		<?php endif ?>
	</div>
</div>
