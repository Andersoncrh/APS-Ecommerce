<?php
	include_once("funcoes.php");
	
	conectar();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro de Fotos</title>
</head>

<body>
<h2>CADASTRO DE FOTOS</h2>

<?php
	
	// verificando se o cod_produto está vindo por get
	if( !isset($_GET['cod_produto']) )
	{
		die("É necessário passar pela url o código do produto");
	}

	// verificando o produto está cadastro
	$cod_produto = $_GET['cod_produto'];
	
	$sql = " select * from produtos where cod_produto = '$cod_produto' ";
	
	$r = mysql_query($sql);
	
	if( !$produto = mysql_fetch_assoc($r) )
	{
		die("Produto não encontrado....");
	}
	
	echo '<h3>Fotos do Produto: ' . $produto['descricao'] . '</h3>';
	
	// se estiver fazendo o upload da foto, ou seja, se estiver postando o formulário
	if( isset($_POST['descricao']) )
	{
		//// colocar o arquivo no local correto e cadastrar a informação foto na tabela
		
		$nome_original_arquivo = $_FILES['arq']['name'];
		
		// se for uma extensão válida
		if( strpos($nome_original_arquivo,'.jpg') or 
			strpos($nome_original_arquivo,'.png') or 
			strpos($nome_original_arquivo,'.gif') 
		  )
		{
			// obtendo a extensão do arquivo
			if(strpos($nome_original_arquivo,'.jpg'))
			{ $ext = '.jpg'; }
			else
			if(strpos($nome_original_arquivo,'.gif'))
			{ $ext = '.gif'; }
			else
			{ $ext = '.png'; }
			
			$descricao = $_POST['descricao'];

			$sql = " insert into fotos_produtos 
					 (cod_produto, descricao, extensao)
					 values
					 ('$cod_produto','$descricao','$ext')
				   ";
			mysql_query($sql);
			
			$cod_foto = mysql_insert_id();
			
			// movendo o arquivo uploaded para o local correto
			
			$arq_destino = "fotosprod/" . $cod_foto . $ext;
			
			if( move_uploaded_file($_FILES['arq']['tmp_name'], $arq_destino) )
			{
				echo '<div style="color:#00f;">Foto cadastrada com sucesso !</div>';
			}
			else
			{
				echo '<div style="color:#f00;">Houve um problema ao salvar a foto no servidor!</div>';

				// excluindo o registro da foto no BD
				mysql_query("delete from fotos_produtos where cod_foto = '$cod_foto' ");
			}
		
		} // se for uma extensão válida
	
	} // se estiver postando o formulário

?>

<form name="ffoto" id="ffoto" action="" method="post" 
	enctype="multipart/form-data">
    
Selecione um Arquivo de Imagem/Foto:<br />
<input type="file" name="arq"  id="arq"  />
<p>

Informe uma descrição para Imagem/Foto a ser cadastrada:<br />
<input type="text" name="descricao" id="descricao" maxlength="100"  />

<p>

<input type="submit" name="btenviar" id="btenviar" value=" Salvar Arquivo " />
        
</form>  

<?php
	echo '<p>Fotos Cadastradas</p>';

	$sql = " select * from fotos_produtos where cod_produto = '$cod_produto' order by descricao ";
	$r = mysql_query($sql);
	
	while( $foto = mysql_fetch_assoc($r) )
	{
		$path = 'fotosprod/'.$foto['cod_foto'].$foto['extensao'];
		
		echo '<img src="'.$path.'" width="100">';
		echo $foto['cod_foto'] . ' - ' . $foto['descricao'] . '<br>';
	}

?>  



</body>
</html>
