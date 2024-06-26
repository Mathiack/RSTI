<<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toma</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$nome = $_POST['nome']; 
		$email = $_POST['email'];
		$idade = $_POST['idade'];
		$cidade = $_POST['cidade'];
		$msg = $_POST['msg'];
	?>

	<p>Nome: <?php echo $nome . "<br>";?></p>
	<p>E-mail: <?php echo $email . "<br>";?></p>
	<p>Idade: <?php echo $idade . "<br>";?></p>
	<p>Cidade: <?php echo $cidade . "<br>";?></p>
	<p>Msg: <?php echo $msg . "<br>";?></p>
</body>
</html>