<h3 class="subheader">Cadastro de Acervo</h3>


<div class="row">
	
	<div class="large-12 columns">
		

		<?php echo form_open('biblioteca/acervo_cad'); ?>

		<?php echo form_input($nome_livro); ?>

		<div class="row">
			
			<div class="large-3 columns">
				
				<?php echo form_input($edicao); ?>

			</div>


			<div class="large-3 columns">

				<?php echo form_input($ano); ?>
				
			</div>

			<div class="large-3 columns">

				<?php echo form_input($editora); ?>

			</div>

			<div class="large-3 columns">
				<?php echo form_dropdown('categorias', $categorias); ?>
			</div>
			
			<div class="large-12 columns">

				<?php echo form_input($autor); ?>

			</div>

			<div class="clearfix"></div>

			
		</div>		

		<?php echo form_textarea($resumo); ?>

		<?php echo form_submit($enviar); ?>

		<?php echo form_close(); ?>


	</div>

</div>