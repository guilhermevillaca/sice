<h3 class="subheader">Editar Acervo</h3>


<div class="row">
	
	<div class="large-12 columns">
		

		<?php echo form_open('biblioteca/acervo_edit_confirm', '', $acer_codigo); ?>

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
				<?php echo form_dropdown('categorias', $categorias, $cat_sel); ?>
			</div>
			
			<div class="large-12 columns">

				<?php echo form_input($autor); ?>

			</div>

			<div class="clearfix"></div>

			
		</div>		

		<?php echo form_textarea($resumo); ?>


		<?php echo form_submit($enviar); ?>

		<a href="<?php echo base_url('biblioteca/acervo-listar') ?>" class="button right small secondary" style="margin-right:5px">Voltar</a>

		<?php echo form_close(); ?>


	</div>

</div>