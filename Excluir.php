<?php
if ($_GET['id']) {
	
	require_once 'inc/conexao.php';
	
	$id = $_GET['id'];
	$local = $_GET['local'];
	if (!$usuario) $usuario = $_SESSION['usuario'];
	
	
	 mysql_query("SELECT ordem FROM postagens WHERE usuario='$usuario' AND local='$local' AND id='$id' LIMIT 1");
	 $dados = mysql_fetch_assoc($processo);
	 $ordem = $dados['ordem'];
	 
	 mysql_query("DELETE FROM postagens WHERE usuario='$usuario' AND local='$local' AND id='$id' LIMIT 1");	 
	 mysql_query("UPDATE postagens SET ordem=ordem-1 WHERE usuario='$usuario' AND local='$local' AND ordem>$ordem");
	 
	?>
	
     <a id="Exibe<?php echo $local; ?>" href="Mostrar.php?local=<?php echo $local; ?>" target="#Txt<?php echo $local; ?>" ></a>
     
    <script>
	Link('#Exibe<?php echo $local; ?>');
    </script>	
	
	<?php
}
?>