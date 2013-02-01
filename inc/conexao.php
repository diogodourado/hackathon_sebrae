<?php
session_start();

	$usuario = $_SESSION['usuario'];
	
	$br_bd_servidor = 'localhost';
	
	$br_bd_nome = 'sebrae';
	$br_bd_usuario = 'root';
	$br_bd_senha = '';
	
$lnk = mysql_connect($br_bd_servidor, $br_bd_usuario, $br_bd_senha) or die ('Não foi possível conectar: ' . mysql_error());
mysql_select_db($br_bd_nome, $lnk) or die ('Não foi possível usar BD: ' . mysql_error());
?>