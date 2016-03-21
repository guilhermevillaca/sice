<h3 class="subheader">Reservas</h3>

<?php if (!empty($reservas)): ?>
	

<table>
	<thead>
		<tr>
			<th class="text-center">Livro</th>
			<th class="text-center">Autor</th>
			<th class="text-center">Categoria</th>
			<th class="text-center">Requerente</th>			
			<th class="text-center" style="width:24%;">Ações</th>
		</tr>
	</thead>

	<?php foreach ($reservas as $a): ?>
		
	<tbody>
		<tr>
			<td><?php echo $a->acer_nome_livro ?></td>
			<td><?php echo $a->acer_autor ?></td>
			<td><?php echo $a->cat_descricao ?></td>
			<td><?php echo $a->pes_nome ?></td>
			<td>
				<a href="<?php echo base_url('biblioteca/emprestimo-reserva/'.$a->acer_codigo. '/'.$a->res_codigo) ?>" class="button small success right" style="margin-right:5px;">Empréstimo</a>
				<a href="<?php echo base_url('biblioteca/acervo-deletar/'.$a->acer_codigo) ?>" class="button small alert right" style="margin-right:5px;">Excluir</a>
				

			</td>
		</tr>
	</tbody>
	
	<?php endforeach ?>

</table>

<?php else: ?>
	<p>Não há registro</p>
<?php endif ?>


<a href="<?php echo base_url('biblioteca/acervo') ?>" class="button small secondary right" style="margin-right:5px;">Voltar</a>