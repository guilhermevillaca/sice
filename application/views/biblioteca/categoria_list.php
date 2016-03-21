<h3 class="subheader">Listar categorias</h3>

<?php if (!empty($categorias)): ?>
	

<table>

	<thead>
		<tr>
			<th class="text-center">Descrição</th>
			<th class="text-center">Observação</th>
			<th class="text-center" style="width:19%;">Ações</th>
		</tr>
	</thead>
	<?php foreach($categorias as $c) : ?>

		<tbody>
			<tr>
				<td><?php echo $c->cat_descricao?></td>
				<td><?php echo $c->cat_observacao?></td>

				<td>

					<a href="<?php echo base_url('biblioteca/categoria-editar/'.$c->cat_codigo) ?>" class="button small right">Editar</a>
					<a href="<?php echo base_url('biblioteca/categoria-deletar/'.$c->cat_codigo) ?>" class="button small alert right" style="margin-right:5px;">Excluir</a>

				</td>
			</tr>
		</tbody>

	<?php endforeach; ?>

</table>

<?php else: ?>
	<p>Não há registros</p>
<?php endif ?>

<a href="<?php echo base_url('biblioteca/categoria') ?>" class="button small secondary right" style="margin-right:5px;">Voltar</a>
		
	
