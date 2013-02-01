<?php require_once 'inc/conexao.php'; ?>
<div id="AcoesOcultas"></div>

    
    <?php
    function Adicionar($local) {
		
	if ($local=='parcerias' || $local=='proposta' || $local=='segmento') { $rolagem = 'txt2'; } else { $rolagem = 'txt1'; }
		
	echo "<div id=\"Txt{$local}\" class=\"{$rolagem}\">";
	include 'Mostrar.php';
	echo "
	</div>
	
	 <a id=\"Add{$local}\" href=\"Adicionar.php?local={$local}\" onClick=\"return Link(this);\" target=\"#Adicionar{$local}\" ></a>
	
	<script>
	$('#{$local} h2').click(function () {
		$('.AdicionarForm').remove();
		$('#{$local}').append('<div id=\"Adicionar{$local}\" class=\"AdicionarForm\"></div>');
		Link('#Add{$local}')
    });
		
	</script>
	
 
	";
	}
	?>
    

<div id="barraTopo">
	<div style="width:150px; float:left;"><a href="./"><img src="img/abcanvas.png"></a></div>
	<div style="width:400px; float:left; padding:15px 0px 0px 150px;">
    <span style="font-size:18px; color:#333;"><?php echo $_SESSION['negocio']; ?></span><br>
    <span style="font-size:14px; color:#555;"><?php echo $_SESSION['nome']; ?> - <?php echo $_SESSION['email']; ?></span>
    
    </div>
   	<div style="width:100px; text-align:right; float:right;"><a href="Sair.php"><img src="img/sair.png"></a></div>


</div>


<div id="tudo">

<div id="como">
    
    <div id="parcerias">
    <h2>Parcerias Principais</h2>
    <?php Adicionar('parcerias'); ?>
    </div>
    
    <div id="atividades">
    <h2>Atividades Principais</h2>
    <?php Adicionar('atividades'); ?>
    </div>
    
    <div id="recursos">
    <h2>Recursos</h2>
    <?php Adicionar('recursos'); ?>
    </div>
    
</div>



<div id="oque">
    
    <div id="proposta">
    <h2>Proposta de valor</h2>
    <?php Adicionar('proposta'); ?>
    </div>
    
</div>


<div id="paraquem">
   
    <div id="segmento">
    <h2>Segmento de Clientes</h2>
    <?php Adicionar('segmento'); ?>
    </div>
    
    <div id="relacionamento">
    <h2>Relacionamento com Clientes</h2>
    <?php Adicionar('relacionamento'); ?>    
    </div>
    
    <div id="canais">
    <h2>Canais</h2>
    <?php Adicionar('canais'); ?>   
    </div>
 
</div>

<div style="clear:both;"></div>

<div id="quanto">

    <div id="estrutura">
    <h2>Estrutura de Custos</h2>
    <?php Adicionar('estrutura'); ?> 
    </div>
    
    <div id="receitas">
    <h2>Receitas</h2>
    <?php Adicionar('receitas'); ?> 
    </div>
    
    <div style="clear:both;"></div>
    
</div>


</div>


<script type="text/javascript">



function Organiza() {
	
    var larguraTudo = $(window).width()-50;
	var alturaTudo = $(window).height()-90;
	
	
	$('#tudo').width(larguraTudo);
	$('#tudo').height(alturaTudo);
	
	var coluna = (larguraTudo/10); //* Divide a pagina em 5 colunas */
	var linha = ((alturaTudo/3)); //* Divide a pagina em 3 linas */

	$('#como').width(coluna*4-3);
	$('#oque').width(coluna*2-2);
	$('#paraquem').width(coluna*4-3);

	$('#quanto').width(coluna*10-5);

		$('#parcerias').width(coluna*2-20); //* barra borda padding */
		$('#atividades').width(coluna*2-25); //* barra  padding */
		$('#recursos').width(coluna*2-25);
		
		$('#parcerias').height(linha*2-10);
		$('#atividades').height(linha-10);
		$('#recursos').height(linha-12);	
	
		$('#proposta').width(coluna*2-20);
		
		$('#proposta').height(linha*2-10);
		
		$('#segmento').width(coluna*2-2-20);
		$('#relacionamento').width(coluna*2-23);
		$('#canais').width(coluna*2-23);
		
		$('#segmento').height(linha*2-10);
		$('#relacionamento').height(linha-5);
		$('#canais').height(linha-17);
		
		
		$('#estrutura').width(coluna*5-22);
		$('#receitas').width(coluna*5-25);
		
		$('#estrutura').height(linha-5);
		$('#receitas').height(linha-5);

		$('.txt1').height(linha-60);
		$('.txt2').height(linha+120);
		
	
}

$(window).resize( function() { Organiza(); });
Organiza();
Carregando(1);
</script>
