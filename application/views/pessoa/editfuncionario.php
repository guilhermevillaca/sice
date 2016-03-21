
      
<p>Editar <?php echo $tipo; ?></p>

<?php echo form_open($form_destino); ?>

		<?php echo form_input($nome); ?>

		<div class="large-3">
			<?php echo form_input($cpf); ?>			
		</div>

		<div class="large-3">
			<?php echo form_input($rg); ?>
		</div>

		<div class="large-3">
			<div class="row collapse">
				<div class="large-4 columns">
					Sexo: 
				</div>
				<div class="large-8 columns">
					<?php echo form_dropdown('Sexo', $sexo, 'm'); ?>					
					
				</div>
			</div>
		</div>


		<div class="large-2">

			<?php echo form_input($cep); ?>
			
		</div>

		<?php echo form_input($logradouro); ?>

		<div class="large-2">
			
			<?php echo form_input($numero); ?>	
			
		</div>


		<?php echo form_input($complemento); ?>

		<?php echo form_input($bairro); ?>

		<?php echo form_input($cidade); ?>

		<div class="large-1">
			<?php echo form_input($estado); ?>			
		</div>

		<?php echo form_input($email); ?>

		<div class="large-2">

			<?php echo form_input($fone); ?>

		</div>

		<div class="large-3">

			<?php echo form_input($nascimento); ?>
			
		</div>

		<?php echo form_input($usuario); ?>

		<?php echo form_password($senha); ?>

		<?php echo form_submit($enviar); ?>

		<?php echo form_close(); ?>
   