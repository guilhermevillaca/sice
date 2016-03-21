<h3 class="subheader">Listar Perfis</h3>


<?php if (!empty($perfis)): ?>
	
<table>
	
	<tr>
		<th class="text-center" style="width:8%;">Código</th>
		<th class="text-center">Desrição</th>
		<th class="text-center" style="width:19%;">Ações</th>
	</tr>


<?php foreach ($perfis as $p): ?>

	<tr>
		<td><?php echo $p->perfil_codigo ?></td>
		<td><?php echo $p->perfil_nome; ?></td>
		<td>
			<a href="<?php echo base_url('perfil/editar/'.$p->perfil_codigo) ?>" class="button small right">Editar</a>
			<a href="<?php echo base_url('perfil/deletar/'.$p->perfil_codigo) ?>" class="button small alert right" style="margin-right:5px;">Excluir</a>
		</td>
	</tr>


<?php endforeach ?>

</table>

<?php else: ?>
	<p>Não há registros</p>
<?php endif; ?>

	<a href="<?php echo base_url('perfil') ?>" class="button small secondary right" style="margin-right:5px;">Voltar</a>