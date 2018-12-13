<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Website da turma 1 - WEb 2018.2019 </title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" href="css/bs.css">
</head>
<body>

<?php require_once('functions/connection.php'); ?>	

	
<?php require_once('functions/menuprincipal.php'); ?>



<div class="jumbotron jumbotron-fluid bg-success">
	<p class="display-3 text-center">Pós-graduações</p>
</div>

<div class="container">
	
	<p class="area-nome">Área de Auditoria e Sistemas de Informação</p>

	<?php 
	$sql = 'SELECT * FROM posgraduacoes ORDER BY nome ASC';

	$stmt = $dbh->prepare( $sql );
	$stmt->execute();

	while( $obj = $stmt->fetchObject() )
	{
	?>

		<div class="row">
			<div class="col font-weight-bold">
				<?= $obj->nome; ?>
			</div>
			<div class="col-1">
				Ed.&nbsp;7
			</div>
			<div class="col-1">
				<a href="posgraduacao.php?pg=<?php echo $obj->id ?>" class="btn btn-outline-secondary">+ info</a>
			</div>
			<div class="col-1">
				<button data-identificacao="<?php echo $obj->id ?>"
				class="btn btn-outline-success btn-posgraduacao">+ info</button>
			</div>
			<div class="w-100"></div>
			<div class="col">
				<p>Em sistema Live Training, presencial e/ou online</p>
			</div>
		</div>


	<?php
	}
	?>


	




	
</div>



<div class="container">
	<div class="row">
		<div class="col-12 col-md-3">
			<img class="img-fluid" src="imagens/blond.png" alt="">
		</div>
		<div class="col-12 col-md-3">
			<img class="img-fluid" src="imagens/munich.png" alt="">
		</div>
		<div class="col-12 col-md-3">
			<img class="img-fluid" src="imagens/ipa.png" alt="">
		</div>
		<div class="col-12 col-md-3">
			<img class="img-fluid" src="imagens/weiss.png" alt="">
		</div>

	</div>
</div>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bs.js"></script>
<script>

/* */	
$('.btn-posgraduacao').click(function(){

	id = $(this).data('identificacao');

	//window.location.replace('posgraduacao.php?pg='+id);

	sessionStorage.setItem('pgid', id);
	window.location.href = 'posgraduacao.php';

	console.log(id)
})
	
</script>	
</body>
</html>








