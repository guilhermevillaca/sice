<div class="large-12 columns">
      
	<h3 class="subheader">Editar <?php echo $tipo; ?></h3>

</div>

<?php echo form_open($form_aluno, '', $hidden); ?>

	<div class="large-12 columns">

		<?php echo form_input($nome); ?>

	</div>		


	<div class="large-3 columns">

		<?php echo form_input($cpf); ?>	

	</div>

	<div class="large-3 columns">

		<?php echo form_input($rg); ?>

	</div>

	<div class="large-3 columns">

		<?php echo form_input($nascimento); ?>
		
	</div>

	<div class="large-3 columns">
		<div class="row">
			<div class="large-4 columns">
				Sexo: 
			</div>
			<div class="large-8 columns">
				<?php echo form_dropdown('sexo', $sexo, 'm'); ?>					
				
			</div>
		</div>
	</div>		

	<div class="clearfix"></div>

	<div class="large-2 columns">

		<?php echo form_input($cep); ?>
		
	</div>

	<div class="large-8 columns">			

		<?php echo form_input($logradouro); ?>

	</div>

	<div class="large-2 columns">
		
		<?php echo form_input($numero); ?>	
		
	</div>	

	<div class="large-6 columns">
			
			<?php echo form_input($bairro); ?>

		</div>

		<div class="large-6 columns">

			<?php echo form_input($complemento); ?>

		</div>

		<div class="large-11 columns">
			
			<?php echo form_input($cidade); ?>

		</div>

		<div class="large-1 columns">
			<?php echo form_input($estado); ?>			
		</div>

		<div class="large-9 columns">
			
			<?php echo form_input($email); ?>

		</div>

		<div class="large-3 columns">

			<?php echo form_input($fone); ?>	

		</div>

		
		<div class="large-12 columns">
			
			<?php echo form_input($usuario); ?>
			
		</div>

		<div class="large-6 columns">
			
			<?php echo form_password($senha); ?>

		</div>

		<div class="large-6 columns">
			
			<?php echo form_password($confirmaSenha); ?>

		</div>

		<div class="large-12 columns">
			
			<?php echo form_submit($enviar); ?>

		</div>


	<?php echo form_close(); ?>
   