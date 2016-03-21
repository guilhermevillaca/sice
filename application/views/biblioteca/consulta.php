<h3 class="subheader">Consulta <small>(Faça aqui sua busca em nosso acervo)</small></h3>


<?php echo form_open('biblioteca/consulta_acervo') ?>

<?php echo form_input($consulta) ?>

<?php echo form_submit($enviar) ?>

<?php echo form_close(); ?>