<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultados</title>
	<?php
		$nome = $_POST['nome'];
		$n1 = $_POST['n1'];
		$pn1 = $_POST['pn1'];

		$n2 = $_POST['n2'];
		$pn2 = $_POST['pn2'];

		$n3 = $_POST['n3'];
		$pn3 = $_POST['pn3'];

		$media = 
	?>
</head>
<body>
	<?php
	?>
</body>
=======
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultados</title>
	<?php
		$nome = $_POST['nome'];
		$n1 = $_POST['n1'];
		$pn1 = $_POST['pn1'];

		$n2 = $_POST['n2'];
		$pn2 = $_POST['pn2'];

		$n3 = $_POST['n3'];
		$pn3 = $_POST['pn3'];

		$media = (($n1 * $pn1) + ($n2 + $pn2) + ($n3 + $pn3)) / ($pn1 + $pn2 + $pn3);

	?>
</head>
<body>
	<p>Nome: <?php $nome?></p>
	<p>Media: <?php $media?></p>
</body>
>>>>>>> 4b086c598fe97b57f3023166b957e0412b73d72a
</html>