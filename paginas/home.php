<div>
<?php
	$Vendas = new Vendas;
	$vendas = $Vendas->listar();
	$FormasDePagamento = new FormasDePagamento;
?>
	
<?php
    for($i=0; $i<$vendas['linhasSelecionadas']; $i++) {
		$formasDePagamento = $FormasDePagamento->listar($vendas['data'][$i]['formaPagamento']);
		$totalConvertido = $vendas['data'][$i]['precoUSD']*$vendas['data'][$i]['cotacaoDolar'];
		$taxa = $formasDePagamento['data'][0]['taxas']*($totalConvertido/100);
		$valorTotal = $totalConvertido + $taxa;
		$pagSeguro = $vendas['data'][$i]['precoBRL']*0.0499;
		$lucroRS = $vendas['data'][$i]['precoBRL']-$pagSeguro-$valorTotal;
		$lucroPercent = $lucroRS/($vendas['data'][$i]['precoBRL']/100);
?>
    <table>
    	<tr>
        	<td>Data</td>
            <td>Pedido</td>
            <td>Cliente</td>
            <td>Produto</td>
            <td>Valor: US$<?php echo number_format($vendas['data'][$i]['precoUSD'], 2, ',', '.'); ?></td>
            <td>Lucro</td>
            <td>Forma de Pagamento</td>
            <td>Status Pedido</td>
            <td>Status E-mail</td>
        </tr>
        
        <tr>
        	<td>Pedido: <?php echo date('d/m/y', strtotime($vendas['data'][$i]['dataPedido'])); ?></td>
            <td>Nº</td>
            <td><?php echo $vendas['data'][$i]['cliente']; ?></td>
            <td><?php echo $vendas['data'][$i]['produto']; ?></td>
            <td>Custo: R$<?php echo number_format($valorTotal, 2, ',', '.'); ?></td>
            <td><?php echo number_format($lucroPercent, 2, ',', '');; ?>%</td>
            <td rowspan="2"><?php echo $formasDePagamento['data'][0]['referencia']; ?></td>
            <td rowspan="2">Status Pedido</td>
            <td rowspan="2">Status E-mail</td>
        </tr>
        
        <tr>
            <td>Compra: <?php echo date('d/m/y', strtotime($vendas['data'][$i]['dataCompra'])); ?></td>
            <td><?php if($vendas['data'][$i]['rastreioCOD'] != NULL) echo '<a href="http://websro.correios.com.br/sro_bin/txect01$.QueryList?P_LINGUA=001&P_TIPO=001&P_COD_UNI='.$vendas['data'][$i]['rastreioCOD'].'" target="_blank">'.$vendas['data'][$i]['rastreioCOD'].'</a>'; ?></td>
            <td><?php echo $vendas['data'][$i]['email']; ?></td>
            <td>R$<?php echo number_format($vendas['data'][$i]['precoBRL'], 2, ',', '.'); ?></td>
            <td>PagSeguro: R$<?php echo number_format($pagSeguro, 2, ',', '.'); ?></td>
            <td>R$<?php echo number_format($lucroRS, 2, ',', '.'); ?></td>
        </tr>
	</table>
<?php
	}
?>
		
    
</div>