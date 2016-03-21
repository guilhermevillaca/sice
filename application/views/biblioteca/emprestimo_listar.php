<h3 class="subheader">Listar Empréstimos</h3>

<?php if (!empty($emprestimos)): ?>

	
	<table>

		<thead>
			<tr>
				<th class="text-center">Data Empréstimo</th>
				<th class="text-center">Data Devolução</th>
				<th class="text-center">Aluno/Professor</th>
				<th class="text-center" style="width:10%">Ações</th>
			</tr>
		</thead>
		
	<?php foreach ($emprestimos as $e): ?>

		<tr>
			<td><?php echo date('d/m/Y', strtotime($e->emp_dataemprestimo)) ?></td>
			<td><?php echo date('d/m/Y', strtotime($e->emp_datadevolucao)) ?></td>
			<td><?php echo $e->pes_nome ?></td>
			<td><a class="button small success right"href="<?php echo base_url('biblioteca/devolucao/'.$e->emp_codigo) ?>">Devolver</a></td>
		</tr>

	<?php endforeach ?>
	
	</table>

<?php else: ?>
	<p>Não há registros</p>
<?php endif ?>