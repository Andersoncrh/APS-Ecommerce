
<div id="div_vitrine">

<?php

	
	$sql = " select * 
			 from produtos 
			 order by descricao 
		   ";
		   
	$rprod = mysql_query($sql);
	while( $produto = mysql_fetch_assoc($rprod) )
	{
		
		echo '<div class="prod_vitrine">';		
	
		echo '<div class="foto_vitrine">';
		echo '<img src="'.get_foto($produto['cod_produto']).'" width="220"  > <p>';
		echo '</div>';
		
		echo '<div class="desc_prod_vitrine">';
		echo $produto['descricao'] ;
		$a = $produto['cod_marca'];
		$x = mysql_fetch_assoc( mysql_query(" select descricao from marcas where cod_marca = '$a'") );
		echo '<br>';
		echo ' '.$x['descricao'];
		echo '</div>';
		
		echo '<div class="valor_prod_vitrine">';
		echo 'R$ ' . number_format($produto['valor_unitario'],2,',','.');
		echo '</div>';
		
		echo '<a href="carrinho_cadastrar.php?acao=incluir&cod_produto='.$produto['cod_produto'].'">';
		echo '<img src="_imagens/botao_comprar.png" width="100">';
		echo '</a>';
		
		
		echo '</div>';
		
		
	} // while produto	
	
	echo '<div class="limpar_float"></div>';
	


?>

</div>