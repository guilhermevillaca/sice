<h3 class="subheader">Cadastro de Categoria</h3>

<div class="row">
	<div class="large-12 columns">
		
		<?php echo form_open('biblioteca/categoria_cad'); ?>

		<div class="row">
			<div class="large-6 columns">

				<?php echo form_input($descricao); ?>

			</div>
		
			<div class="large-6 columns">

				<?php echo form_input($observacao) ?>

			</div>
		</div>


		<?php echo form_submit($enviar); ?>

		<?php echo form_close(); ?>

	</div>
</div>