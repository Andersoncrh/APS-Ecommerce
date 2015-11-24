<?php
	session_start();
	include_once("funcoes.php");

	$conexao = conectar();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carrinho de compras</title>
</head>

<body>
Cadastrando no carrinho....
<?php
	
	$acao = $_GET['acao'];
	
	if( $acao == 'incluir' )
	{	
		$cod_produto = $_GET['cod_produto'];
		
		if( !isset($_SESSION['carrinho'][$cod_produto]) )
		{
			// buscar o valor unitário do produto
			$d = mysql_fetch_assoc( mysql_query(" select valor_unitario from produtos where cod_produto = '$cod_produto'") );
			$_SESSION['carrinho'][$cod_produto]['qde'] = 1;
			$_SESSION['carrinho'][$cod_produto]['vu'] = $d['valor_unitario'];
		}
		else
		{
			$_SESSION['carrinho'][$cod_produto]['qde']++; 
		}		
		
	} // incluindo
	else
	if( $acao == 'alterar' )
	{
		$cod_produto = $_GET['cod_produto'];
		$qde = $_GET['qde'];
		$_SESSION['carrinho'][$cod_produto]['qde'] = $qde;
	}
	else
	if( $acao == 'excluir' )
	{
		$cod_produto = $_GET['cod_produto'];
		unset($_SESSION['carrinho'][$cod_produto]);
	}
	else
	if( $acao == 'limpar' )
	{	
		unset($_SESSION['carrinho']);
	}
	else
	{
		echo '<script language="javascript">
				alert("Ação Inválida !");
				document.location="index.php";		
			  </script>';	
	}

	echo '<script language="javascript">
			document.location="index.php?conteudo=carrinho_listar";		
		  </script>';	
		
?>

</body>
</html>
