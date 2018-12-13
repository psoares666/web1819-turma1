<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="">
</head>
<body>
	
<?php require_once('functions/menuprincipal.php'); ?>

<h3 class="display-3">Nome da Pós-Graduação</h3>
<h4>Formulário de candidatura</h4>


<form action="lixo.php" method="get" id="form-candidatura-pg">
<div class="container">
	
	<div class="row"> 
		
		<div class="form-group">
			
			<div class="form-check">
				<input class="form-check-input" type="radio" id="radio-valor1" name="radioTaxa" value="1" checked>
				<label for="radio-valor1" class="form-check-label">Referência Multibanco</label>
			</div>
		
			<div class="form-check">
				<input class="form-check-input" type="radio" id="radio-valor2" name="radioTaxa" value="2">
				<label for="radio-valor2" class="form-check-label">Numerário</label>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="form-group">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="check-1" name="check1" value="1">
				<label for="check-1" class="form-check-label" >Aluno do ISCAC</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="check-2" name="check1" value="2">
				<label for="check-2" class="form-check-label">Outro</label>
			</div>
		</div>


	</div>

	
	<p>Dados para emissão de recibo</p>
	<div class="form-group">
		<label for="">Entidade</label>
		<input type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="">NIF</label>
		<input type="text" class="form-control" >
	</div>

	<div class="form-group">
		
		<select class="custom-select" name="sltPais" id="slt-pais">
			<option value="0"> -- selecione opção --</option>
			<option value="1">Portugal</option>
			<option value="2">Outro</option>
		</select>

	</div>

	


	<button class="btn btn-outline-dark btn-block">Submeter Candidatura</button>
</div>
</form>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>

$('.nav-link').click(function(){
	/* alert('click'); */
	//console.log('click');
	$('.nav-link').removeClass('active');
	$(this).addClass('active');
});



</script>
</body>
</html>