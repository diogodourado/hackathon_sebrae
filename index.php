<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ABCanvas</title>

<link rel="stylesheet" type="text/css" href="css/main.css">

<script src="js/jquery-1.9.0.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>

</head>

<body id="Conteudo">


<?php
if($_SESSION['usuario']>0)  {
	?>
     <a id="Entrando" href="Logado.php" target="#Conteudo" ></a>
     
    <script>
     Link('#Entrando');
    </script>	

	<?php
	exit();
} 
?>

<div style="width:300px; margin:0 auto">
  <div style="text-align:center; padding:50px;"><a href="./"><img src="img/abcanvas.png" /></a></div>
  
  <div id="logar" style="text-align:center;"></div>
        
<div id="entrar">
        <h3>Entrar</h3>
        <br />

<form name="Entrar" action="Entrar.php" target="#logar" method="post" enctype="multipart/form-data" class="EntrarForm"> 
<label>E-mail:<br /><input type="text" name="email" value="" maxlength="200" style="padding:3px; width:130px; font-weight:bold;" /></label><br />
<br />
<input type="submit" value="Entrar" onClick="Postar(this)" style="padding:3px;">
</form>

<br />Ainda não é cadastrado? <a href="javascript:;" onclick="$('#entrar').hide('slow'); $('#cadastrar').show('slow');">Cadastre-se grátis</a><br />
</div>
<div id="cadastrar" style="display:none;">

        <h3>Novo Cadastro</h3><br />

<form name="Cadastro" action="Cadastrar.php" target="#logar" method="post" enctype="multipart/form-data" class="CadastroForm"> 
<label>Nome:<br />
<input type="text" name="nome" value="" maxlength="200" style="padding:3px; width:130px; font-weight:bold;" /></label><br /><br />
<label>Projeto:<br />
<input type="text" name="negocio" value="" maxlength="200" style="padding:3px; width:130px; font-weight:bold;" /></label><br /><br />
<label>E-mail:<br /><input type="text" name="email" value="" maxlength="200" style="padding:3px; width:130px; font-weight:bold;" /></label><br /><br />
<input type="submit" value="Cadastrar" onClick="Postar(this)" style="padding:3px;">
</form>
<br /><br />
Ja é cadastrado? <a href="javascript:;" onclick="$('#entrar').show('slow'); $('#cadastrar').hide('slow');">Entre agora!</a><br />
</div>
<br />
<br />
<br />

</div>


<br />

<div style="text-align:center; font-weight:bold;">
<span style=" font-weight: normal;">Desenvolvido por:</span><br /><br />
Diogo Dourado<br />
diogo@dourado.net
<div>


</body>

<script>
Carregando(1);
</script>
</html>