<?php
	session_start();
	include_once("funcoes.php");

	$conexao = conectar();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Commerce</title>

<script type="text/javascript" src="_js/funcoes.js"></script>
<script type="text/javascript" src="_js/jquery-1.6.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="_css/geral.css" />

</head>

<body>

<div id="div_tudo">

	<div id="div_cab">
		<?php
			include_once("cabecalho.php");
		?>
	</div>
		
	<div id="div_menu_hor">	
		<?php
			include_once("menu.php");
		?>
	</div>       
	
	<div id="div_conteudo">
		<?php
			
			if( !isset($_GET['conteudo']) )
			{
				include_once("produtos.php");
			}
			else 
			{
				$arquivo = $_GET['conteudo'].'.php';
				
				if( file_exists($arquivo) )
				{
					include_once($arquivo);
				}
				else 
				{
					include_once("produtos.php");
				}
				
			} // else conteudo....

		
		
		?>
	</div>
	
	<div id="div_rodape">
		<?php include_once("rodape.php"); ?>
	</div>
	
</div>




</body>
</html>
