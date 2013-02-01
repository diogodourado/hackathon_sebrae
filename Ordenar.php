<?php
if ($_GET['local']) {
	
	require_once 'inc/conexao.php';
	
	$NovaOrdem = $_GET['NovaOrdem'];
	$local = $_GET['local'];

	if (!$usuario) $usuario = $_SESSION['usuario'];


	if ($NovaOrdem) {
		$NovaOrdem = explode(',',$NovaOrdem);
		$ordem=1;
		foreach($NovaOrdem as $id=>$valor){
			mysql_query("UPDATE postagens SET ordem=$ordem WHERE usuario='$usuario' AND local='$local' AND id='$valor' LIMIT 1") or die(mysql_error());
			echo $ordem++;
		}
	}
}
?>