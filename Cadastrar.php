<?php
if ($_POST['Enviar']==1) {
	require_once 'inc/conexao.php';
	

	//Recuperando dados
	$nome = mysql_real_escape_string($_POST['nome']);
	$negocio = mysql_real_escape_string($_POST['negocio']);
	$email = mysql_real_escape_string($_POST['email']);
	
	// Tratando erros de preenchimento
	if (!$erro) if (!$nome) $erro = 'Você deve digitar um nome';
	if (!$erro) if (!$negocio) $erro = 'Você deve digitar um projeto';
	if (!$erro) if (!$email) $erro = 'Você deve digitar um e-mail';
	if (!$erro) {
		$processo = mysql_query("SELECT * FROM usuarios WHERE email='$email' LIMIT 1");
		if (mysql_num_rows($processo)) $erro = 'Este e-mail ja esta cadastrado';
		}
	
	// Exibindo erro	
	if (!$erro) {
		
		mysql_query("INSERT INTO usuarios SET email='$email', nome='$nome', negocio='$negocio'");		
		$id = mysql_insert_id();
			
			$_SESSION['usuario'] = $id;
			$_SESSION['nome'] = $nome;
			$_SESSION['negocio'] = $negocio;
			$_SESSION['email'] = $email;
		?>
		     
     <a id="Entrando" href="Logado.php" target="#Conteudo" ></a>
     
    <script>
    $('#cadastrar').slideUp(function() { Link('#Entrando'); } );
	
    </script>	
    
		<?php
		
		
	} else {
		echo "<strong>Erro encontrado:</strong>{$erro}<br /><br />";	
	}
	?>
  
	<?php
} 
?>