<h3 class="subheader">Listar Professor</h3>

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
				<td><?php echo $l->pes_codigo; ?></p></td>
				<td><?php echo $l->pes_nome;  ?></p></td>
				<td>
					<a href="<?php echo base_url('professor/editar/'.$l->pes_codigo) ?>" class="button small right">Editar</a>
					<a href="<?php echo base_url('professor/deletar/'.$l->pes_codigo) ?>" class="button small alert right" style="margin-right:5px;">Excluir</a>
				</td>
			</tr>

		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>Não há registros.</p>

<?php endif ?>

			<a href="<?php echo base_url('professor') ?>" class="button small secondary right" style="margin-right:5px;">Voltar</a>
