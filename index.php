<?php

include_once('app/controllers/app.php');
 
$app = new App();

$app->upload_arquivo();


?>

<html lang="pt-br">
<head>
	<meta charset="utf-8" />
   <title>Relatório de vendas do mês de junho</title>
</head>

<style type="text/css">
body{font-family:sans-serif;}
	label{
		display: block;
		font-family:sans-serif;
		color: #666; 
	}
	input[type="submit"]{
		display: block;
		background: #ccc;
		border: 1px solid #999;
		margin-top: 35px;
		cursor:pointer;
	}

	div.error{
		background: #BB2E27;
		color: #ccc;
		}
	div.error p{
		padding: 10px;
	}
</style>
<body>

	<form method="post" action="" enctype="multipart/form-data">
		<div class="upload">

			<?php $app->base->get_msg('error') ?>

			<label>Upload do arquivo CSV</label>
			<input type="file" value="" name="file">
			<input type="submit" value="Enviar" name="submit">
		</div>
	</form>


</body>
</html>

