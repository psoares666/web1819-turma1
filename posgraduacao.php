<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" href="css/bs.css">
</head>
<body>
<?php 
if( isset( $_GET['pg']) ) $idPosgraduacao = $_GET['pg'];
else $idPosgraduacao = 0;
?>

<?php require_once('functions/connection.php'); ?>	

	
<?php require_once('functions/menuprincipal.php'); ?>

<?php 

$sql = "SELECT * FROM posgraduacoes WHERE id = :id";
$stmt = $dbh->prepare( $sql );
$stmt->bindParam( ':id', $idPosgraduacao );
$stmt->execute();

if ( $stmt && $stmt->rowCount() == 1 )
{
	$obj = $stmt->fetchObject();
}
 ?>


<div class="container">
	<h3 class="display3"><?= $obj->nome ?></h3>
	<div class="row">
		<div class="col">
			<?= $obj->informacao ?>
		</div>
	</div>
	
</div>


	 

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bs.js"></script>
<script>
 	id = sessionStorage.getItem('pgid');
 	console.log('pospgraduação ' + id)




</script>
</body>
</html>