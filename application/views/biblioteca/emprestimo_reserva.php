<link href="<?php echo base_url('css/smoothness/jquery-ui-1.10.3.custom.css') ?>" rel="stylesheet">
<script>
	function addDays(dateObj, numDays) {
  		var d = dateObj.setDate(dateObj.getDate() + numDays);
  		var r = d*1000;
  		return r.getDate() + "/" + r.getMonth() + "/" + r.getFullYear();
	}

  $(function() {
    $( "#dt_emprestimo" ).datepicker({
		dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: [  'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior',
        minDate: 0
	});


	$("#dt_emprestimo").change(function(){
		var d = $(this).val();

		var aux = d.split("/");

		var someDate = new Date(aux[2], aux[1]-1, aux[0]);
		var numberOfDaysToAdd = 7;
		someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 

		var dd = someDate.getDate();
		var mm = someDate.getMonth()+1;
		var y = someDate.getFullYear();

		var someFormattedDate = dd + '/'+ mm + '/'+ y;

		$("#dt_devolucao").val(someFormattedDate);


	});

  });
  </script>


<h3 class="subheader">Empréstimo</h3>

<?php echo form_open('biblioteca/emprestimo_reserva_confirmar', '', $hidden) ?>


<div class="row">

	<div class="large-3 columns">
		
		<?php echo form_input($acervo) ?>

	</div>

	<div class="large-9 columns">
		
		<?php echo form_input($acervo_nome) ?>

	</div>

	<div class="large-6 columns">
		<?php echo form_input($dt_reserva) ?>
	</div>
	
	<div class="large-6 columns">
		<?php echo form_input($dt_devolucao) ?>
	</div>

</div>

<?php echo form_input($requerente_nome) ?>

<?php echo form_submit($enviar) ?>

<?php echo form_close(); ?>