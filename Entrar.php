<?php
if ($_POST['Enviar']==1) {
	require_once 'inc/conexao.php';
	

	//Recuperando dados
	$email = mysql_real_escape_string($_POST['email']);
	
	// Tratando erros de preenchimento
	if (!$erro) if (!$email) $erro = 'Você deve digitar um e-mail';
	if (!$erro) {
		
		$processo = mysql_query("SELECT * FROM usuarios WHERE email='$email' LIMIT 1");
		if (!mysql_num_rows($processo)) $erro = 'Este e-mail nao esta cadastrado';
		
		}
	
	// Exibindo erro	
	if (!$erro) {
		
		$dados = mysql_fetch_array($processo);
			
			$_SESSION['usuario'] = $dados['id'];
			$_SESSION['nome'] = $dados['nome'];
			$_SESSION['negocio'] = $dados['negocio'];
			$_SESSION['email'] = $dados['email'];
		?>
		     
     <a id="Entrando" href="Logado.php" target="#Conteudo" ></a>
     
    <script>
    $('#entrar').slideUp(function() { Link('#Entrando'); } );
	
    </script>	
    
		<?php
		
		
	} else {
		echo "<strong>Erro encontrado:</strong>{$erro}<br /><br />";	
	}
	?>
  
	<?php
} 
?>