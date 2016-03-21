<h3 class="subheader">Listar Alunos</h3>

<?php if (!empty($lista)): ?>

<table>
	<thead>
		
		<tr>
			<th class="text-center" style="width:8%">Código</th>
			<th class="text-center">Nome</th>
			<th class="text-center" style="width:19%">Ações</th>
		</tr>
	</thead>
	

<?php foreach($lista as $l): ?>

	<tr>
		<td><?php echo $l->pes_codigo;  ?></td>
		<td><?php echo $l->pes_nome;  ?></td>
		<td>
			<a href="<?php echo base_url('aluno/editar/'.$l->pes_codigo) ?>" class="button small right">Editar</a>
			<a href="<?php echo base_url('aluno/deletar/'.$l->pes_codigo) ?>" class="button small alert right" style="margin-right:5px;">Excluir</a>
		</td>
	</tr>

<?php endforeach; ?>

</table>


<?php else: ?>

	<p>Não há registros.</p>

<?php endif ?>
	
	<a href="<?php echo base_url('aluno') ?>" class="button small secondary right" style="margin-right:5px;">Voltar</a>
