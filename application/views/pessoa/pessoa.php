<div class="row">

  	<div class="large-12 columns">    
	
		<h3 class="subheader">Cadastro de <?php echo $tipo; ?></h3>

	</div>

	<?php echo form_open($form_destino); ?>

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


</div>

<script type="text/javascript" src="<?php echo base_url('js/maskedinput-1.3.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/validation.js') ?>"></script>

<script>

	$(document).ready(function(){

		$("#cpf").mask("999-999-999-99");
		$("#cep").mask("99999-999");
		$("#fone").mask("(99) 9999-9999");
		$("#nascimento").mask("99/99/9999");

		$("#enviar").click(function(){

			if(isEmpty('nome', 'Preencha o Nome', 'Nome')){
				return false;
			}

			if(isEmpty('cpf', 'Preencha o CPF', 'CPF')){
				return false;
			}

			if(isEmpty('cep', 'Preencha o CEP', 'CEP')){
				return false;
			}

			if(isEmpty('logradouro', 'Preencha o Logradouro', 'Logradouro')){
				return false;
			}

			if(isEmpty('numero', 'Preencha o Número', 'Número')){
				return false;
			}

			if(isEmpty('bairro', 'Preencha o Bairro', 'Bairro')){
				return false;
			}

			if(isEmpty('cidade', 'Preencha a Cidade', 'Cidade')){
				return false;
			}

			if(isEmpty('estado', 'Preencha o Estado', 'UF')){
				return false;
			}

			if(isEmpty('email', 'Preencha o E-mail', 'E-mail')){
				return false;
			}else{
				if(isEmail('email', 'Preencha um E-mail válido', 'E-mail')){
					return false;
				}
			}

			if(isEmpty('fone', 'Preencha o Telefone', 'Telefone')){
				return false;
			}

			if(isEmpty('nascimento', 'Preencha a Data de Nascimento', 'Nascimento')){
				return false;
			}

			if(isEmpty('usuario', 'Preencha Usuário', 'Usuário')){
				return false;
			}

			if(isEmpty('senha', 'Preencha a Senha', 'Senha')){
				return false;
			}

			if(isEmpty('confirmaSenha', 'Preencha a confirmação da Senha', 'Confirmar Senha')){
				return false;
			}

			var senha = $("#senha").val();
			var cSenha = $("#confirmaSenha").val();

			if(senha != cSenha){
				$("#confirmaSenha").attr("placeholder", "As Senhas devem ser iguais");
	            $("#confirmaSenha").addClass("error");
	            setTimeout(function() {                    
	                $("#confirmaSenha").attr("placeholder", "Confirmar Senha");
	                $("#confirmaSenha").removeClass("error");                                                      
	                $("#confirmaSenha").focus();
	            }, 3000);   
	            return false;
			}

		});

	});
</script>