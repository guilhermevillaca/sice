<h3 class="subheader">Editar</h3>

<?php echo form_open($form_perfil, '', $hidden); ?>

<?php echo form_input($descricao); ?>

<?php echo form_submit($enviar); ?>

<?php echo form_close(); ?>