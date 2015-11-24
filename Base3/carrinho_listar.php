<script language="javascript">

//-------------------------------------------------------------------
function alterar_carrinho(cod_produto)
{
	qde= $("#txt"+cod_produto).val();
	document.location='carrinho_cadastrar.php?acao=alterar&cod_produto='+cod_produto+'&qde='+qde;
}


</script>

<h5>Carrinho de Compras</h5>
<p>&nbsp;</p>
<?php
	
	if( isset($_SESSION['carrinho']) )
	{
		$subtotal=0;
		$total=0;
		foreach($_SESSION['carrinho'] as $cod_produto => $detalhes  )
		{			
			echo '<img src="'.get_foto($cod_produto).'" width="80"  > <p>';
			$d = mysql_fetch_assoc( mysql_query(" select * from produtos where cod_produto = '$cod_produto'") );			
			echo $d['descricao'];	
			$x = $d['cod_marca'];
			$a = mysql_fetch_assoc( mysql_query(" select descricao from marcas where cod_marca = '$x'") );
			echo ' '.$a['descricao'];
			echo ' <br>';
			echo ' Valor Unitário.: ' . $detalhes['vu'];
			echo '&nbsp;&nbsp;';
			// link para alterar a quantidade
			echo 'Quantidade <input type="text" name="txt'.$cod_produto.'" id="txt'.$cod_produto.'" value="'.$detalhes['qde'].'" size="5">';
			echo '<a href="javascript:alterar_carrinho('.$cod_produto.');"> Alterar </a>';

			echo '&nbsp;&nbsp; | &nbsp;&nbsp; ';

			// link para excluir item
			echo '<a href="carrinho_cadastrar.php?acao=excluir&cod_produto='.$cod_produto.'">Excluir Item</a>';

			
			$subtotal = $detalhes['vu']*$detalhes['qde']; 
			$total = $total + $subtotal;
			
			echo ' <br>';
		
		} // for carrinho
		echo ' <br>';
		echo ' <br>';
		echo 'Valor Total da Compra: R$'.$total;
	} // se o carrinho existir
	else
	{
		echo 'Carrinho vazio....';
	}
	
	echo '<p>&nbsp;</p>';
	echo '<a href="index.php">';
	echo '<h1 style=" font-weight:bold; color:#f00;">CONTINUE COMPRANDO</h1>';
	echo '</a>';
	
	echo '<p>&nbsp;</p>';
	
	// link para limpar o carrinho
	echo '<a href="carrinho_cadastrar.php?acao=limpar" style="color:#f00;">Limpar Carrinho</a>';
	
	
	

	
?>