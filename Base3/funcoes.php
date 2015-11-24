<?php

//-------------------------------------------------------
function conectar()
{
	// fazer a conexão com o banco de dados
	$con = mysql_connect("localhost","root","vertrigo");	
	
	if( !$con )
	{
		// apresenta uma msg e interrompe o script
		die("Não foi possível fazer a conexão com o banco de dados !");
	}
	
	// selecionar a base de dados
	$base = mysql_select_db("ecommerce", $con);
	
	if( !$base )
	{
		die("Não foi possível selecionar a base dados !");
	}
	
	return $con;

} // conectar()

//-----------------------------------------------------------------------------------------------
function DateUSA($d)
{
	// 01/10/2009 00:00:00 => 2009-10-01
	// 0123456789012345678
	
	if( strlen($d) == 10 )
	{
		return substr($d,6,4) . '-' .
			   substr($d,3,2) . '-' .
		   	   substr($d,0,2);
	}
	else 
	{
		return substr($d,6,4) . '-' .
			   substr($d,3,2) . '-' .
		   	   substr($d,0,2) . ' ' . 
			   substr($d,11,8);
	}
	

} // DateUSA

//-----------------------------------------------------------------------------------------------
function DataBR($d)
{
	// 2009-10-01 00:00:00 => 01/10/2009
	// 0123456789012345678
	
	if( strlen($d) == 10 )
	{
		return substr($d,8,2) . '/' .
			   substr($d,5,2) . '/' .
		   	   substr($d,0,4);
	}
	else 
	{
		if( substr($d,11,8) != '00:00:00' )
		{
			return substr($d,8,2) . '/' .
				   substr($d,5,2) . '/' .
		   	   	   substr($d,0,4) . ' ' . 
			   	   substr($d,11,8);
		}
		else
		{
			return substr($d,8,2) . '/' .
				   substr($d,5,2) . '/' .
		   	   	   substr($d,0,4);
		}
	}
	

} // DataBE

//-----------------------------------------------------------------------------------------------
function floatUSA($v)
{
	return str_replace(',', '.', $v);

} // floatUSA

//-----------------------------------------------------------------------------------------------
function floatBR($v)
{
	return str_replace('.', ',', $v);

} // floatBR

//-----------------------------------------------------------------------------------------------
	
function get_foto($cod_produto)
{
	$sql = " select * 
			 from fotos_produtos 
			 where cod_produto = '$cod_produto' 
			 order by cod_foto
			 limit 1
			";
			 
	$r = mysql_query($sql);

	$path='';
		
	if( $foto = mysql_fetch_assoc($r) )
	{
		$path = 'fotos_produtos/'.$foto['cod_foto'].'.'.$foto['extensao'];
	}
	
	if( !file_exists($path) )
	{
		$path = 'fotos_produtos/foto_nao_disponivel.jpg';
	}
	
	return $path;
	
} // get_foto



?>