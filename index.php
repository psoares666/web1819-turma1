<?php 
session_start();
if( isset($_GET['recebido']) )
	$recebido = $_GET['recebido'];
else
	$recebido = 'nop';

?>
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


<!-- carousel -->
<div id="slideshow-unico" class="carousel slide carousel-fade" data-ride="carousel">
	
	<ol class="carousel-indicators">
		<li data-target="#slideshow-unico" data-slide-to="0" class="active"></li>
		<li data-target="#slideshow-unico" data-slide-to="1" ></li>
		<li data-target="#slideshow-unico" data-slide-to="2" ></li>
		
	</ol>


	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="imagens/slideshow/imagem1.jpg" alt="">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="imagens/slideshow/imagem2.jpg" alt="">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="imagens/slideshow/imagem3.jpg" alt="">
		</div>
	</div>
</div>

<!-- painel principal -->
<div class="jumbotron jumbotron-fluid">

	<p class="display-2 text-center">Novidades !!!</p>
	
</div>

<?php $jogoId= 2; ?>

<div class="container">

	<div class="row">
		
		<!-- notícias -->
		<div class="col-12 col-lg-8">
			
			<?php 
			$sql = 'SELECT * FROM noticias 
					WHERE tema = :tema 	
					ORDER BY ID DESC LIMIT 5';
			$stmt = $dbh->prepare( $sql );
			$stmt->bindParam(':tema', $jogoId );
			$stmt->execute();

			if( $stmt && $stmt->rowCount() > 0)
			{
				while( $obj = $stmt->fetchObject() )
				{
			?>
					
				<div class="media noticia">
					<a href=""><img src="imagens/noticias/<?= $obj->imagem ?>" alt="icon das pos-graduações" class="mt-1 mr-3 img-noticia"></a>
				
					<div class="media-body">
						<h2 class="">
							<?php echo $obj->titulo ?>	
						</h2>
						<p class="mb-0">
							<?php echo $obj->descricao ?>
						</p>
						<p class="mb-0"><a href="" class="btn btn-link pl-0 link-noticia">[ ver + ]</a></p>
						<p class="text-muted">Actualizado a 
							<?php 
							echo alterar($obj->updated_at) 
							?></p>
					</div>

				</div>

			<?php
				} 
			}
			else
				echo 'Não existem notícias.';
			 ?>

		
		</div>

		<!-- formulario contacto/mensagem -->
		<div class="col-12 col-lg-4">
			<form action="#" method="POST" 
				id="form-enviar-mensagem" >
				<div id="card-form-mensagem" class="card border border-dark">
									
					<div class="card-body">
						<h5 class="card-title">Contacte-nos</h5>
						<div class="form-group">
							<input type="text" class="form-control" id="txt-nome" name="txtNome" required placeholder="introduza nome completo">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" id="txt-email" name="txtEmail" required placeholder="introduza o seu email">
						</div>

						<div class="form-group">
							<textarea name="txtMensagem" id="txt-mensagem" rows="3" class="form-control" required placeholder="intoduza aqui a sua mensagem"></textarea>
						</div>

						<button class="btn btn-outline-dark btn-block" id="btn-enviar-mensagem">Enviar Mensagem</button>
					</div>
					
				
			</div> <!-- card formulario -->
			</form>

			<!-- spinning -->
			<div id="form-spinning" class="d-none">
				<p>A enviar <i class="fas fa-spinner"></i></p>
			</div>

			<!-- mensagem de resposta -->
			<div id="resposta-form" class="d-none">
				
			</div>
		</div>


	</div>
	
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bs.js"></script>	
<script>

$('#slideshow-unico').carousel({
	interval:2500
	
});
	

$('#form-enviar-mensagem').submit( function(event) {
	
	//console.log('click botao');

	var valido = true;
	var nome 	= $('#txt-nome').val();
	var email 	= $('#txt-email').val();
	var msg 	= $('#txt-mensagem').val();

	tamanho = nome.trim().replace(/  +/g, ' ').length;

	if( tamanho < 10 )
	{
		$('#txt-nome').addClass('border border-danger');
		valido = false;
	}
	else
	{
		$('#txt-nome').removeClass('border border-danger');
	}

	if( valido == true )
	{
		$.ajax({
			type: 'POST',
			url: 'ajax/insereMensagem.php',
			data: { email: email, nome: nome, mensagem: msg },
			beforeSend: function()
			{
				$('#card-form-mensagem').addClass('d-none');
				$('#form-spinning').removeClass('d-none');
			},
			success: function(data){
				//console.log('sucesso: ' + data );
				$('#form-spinning').addClass('d-none');
				$('#resposta-form').removeClass('d-none');
				if( data == 0 )
				{
					$('#resposta-form').html('<h3>Mensagem recebida.<br>Obrigado.</h3>');
				}
				else
				{
					$('#resposta-form').html('<h3>De momento indisponível.<br>Tente mais tarde.</h3>');
				}
			},
			error: function (data)
			{
				//console.log('erro: ' + data );
				$('#form-spinning').addClass('d-none');
				$('#resposta-form').removeClass('d-none');
				$('#resposta-form').html('<h3>De momento indisponível.<br>Tente mais tarde.</h3>');
			},
			complete:function(data)
			{
				console.log('terminado: ' + data );
			}
		})
	}

	return false;
});






$(document).ready( function(){



});




</script>
</body>
</html>

<?php 
function alterar( $datacompleta )
{
	return substr($datacompleta, 0, 10);
} 
?>