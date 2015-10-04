<?php

include_once('app/controllers/app.php');
 
$app = new App();

$dados = $app->get_vendas();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
   <title>Relatório de vendas do mês de junho</title>
</head>

<style type="text/css">
	table{
		width: 400px;
		font-family: sans-serif;
	}
	table th{
		font-size: 14px;
		text-align: left;
		background-color: #DDEBF9;
		padding: 10px;
	}

	table td{
		font-size: 12px;
		text-align: left;
		padding: 10px;
	}

	table tbody tr:nth-child(2n+1) {
	background:#ccc;
	}

	div.sucess{
	
    background-color: #C2DFC9;
    font-family: sans-serif;
    color: #222;
	}

	div.sucess p{
		padding: 6px;
	}


</style>
<body>

	<?php $app->base->get_msg('sucess'); ?>

	<?php //if ($dados): ?>
		
	<?php// endif ?>
	<table>
		<thead>
			<tr>
				<th>Bandeiras</th>
				<th>Valor Total</th>
				<th>Valor com desconto</th>
			</tr>
		</thead>
		<tbody>			
	
			<?php foreach ($dados as $k => $v): ?>
				<tr>
					<td><?php echo $k; ?><br>(<?php echo ($v['qtd_vendida'] > 1)? $v['qtd_vendida']." Vendas" : $v['qtd_vendida']." Venda" ?>)</td>
					<td><?php echo $v['total_venda_bandeira']; ?></td>
					<td><?php echo $v['total_venda_desconto']; ?></td>
				</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</body>
</html>

