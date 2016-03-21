<br><br>
<div class="row">

	<div class="large-4 large-centered columns panel radius">
		
		<h3 class="text-center"><img src="<?php echo base_url('img/logo.png') ?>" width="100"></h3>
		
		<?php echo form_open('user/login'); ?>

		<?php echo form_input($usuario); ?>

		<?php echo form_password($senha); ?>

		<?php echo form_submit($enviar); ?>

		<?php echo form_close(); ?>

		<div class="clearfix"></div>

	</div>
</div>

