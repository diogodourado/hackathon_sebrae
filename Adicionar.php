<?php
if ($_POST['Enviar']==1) {
	require_once 'inc/conexao.php';
	

	//Recuperando dados
	$local = mysql_real_escape_string($_POST['local']);
	$texto = mysql_real_escape_string($_POST['texto']);
	
	// Tratando erros de preenchimento
	if (!$erro) if (!$local) $erro = 'Erro interno do sistema';
	if (!$erro) if (!$texto) $erro = 'Digite um texto';
	
	// Exibindo erro	
	if (!$erro) {
		
		
		$processo = mysql_query("SELECT id FROM postagens WHERE usuario='$usuario' AND local='$local'");
		$ordem = mysql_num_rows($processo)+1;
		
		mysql_query("INSERT INTO postagens SET usuario='$usuario', local='$local', texto='$texto', ordem='$ordem', data=now();");
	}
	?>
    
     <a id="Exibe<?php echo $local; ?>" href="Mostrar.php?local=<?php echo $local; ?>" target="#Txt<?php echo $local; ?>" ></a>
     
    <script>
    $('form[name="Adicionar"]').slideUp(function() { $('.AdicionarForm').remove(); } );
	Link('#Exibe<?php echo $local; ?>');
    </script>	
	<?php
	
	exit();
} else {
$local = $_GET['local'];	
}
?>
<div style="clear:both; height:5px; color: #FFF; font-size:1px;">.</div>


<form name="Adicionar" action="Adicionar.php" target="#Adicionar<?php echo $local; ?>" method="post" enctype="multipart/form-data" class="AdicionarForm"> 

<div class="bubbleInfo">
  <img class="trigger" src="img/question.png" style="float:left; margin-right:5px;">
<table id="dpop" class="popup">
        	<tbody><tr>
        		<td id="topleft" class="corner">&nbsp;</td>
        		<td class="top">&nbsp;</td>
        		<td id="topright" class="corner">&nbsp;</td>
        	</tr>

        	<tr>
       		  <td class="left" style="color:#FFF;">. . .</td> 
        		<td>
                
               	  <table class="popup-contents">
                    <tbody><tr><td>
                    <img src="img/<?php echo $local; ?>.png" style="float:left; margin:0px 10px 10px 5px;">
                    <?php
                    if ($local=='proposta') echo 'Qual seu pacote de produtos e serviços e o valor que ele posssui para os clientes';
                    if ($local=='atividades') echo 'Liste ações/tarefas importantes que sua empresa deve atender conforme a Proposta de Valor e para fazer seu Modelo de Negócios funcionar.';
                    if ($local=='recursos') echo 'Recursos mais importantes exigidos para fazer o Modelo de Negocio funcionar';
                    if ($local=='parcerias') echo 'Rede de fornecedores e parceiros que ajudam a sua empresa a funcionar.';
                    if ($local=='estrutura') echo 'Todos os custos envolvidos <br />na operação do seu Modelo de Negócio';
                    if ($local=='segmento') echo 'Quem são os clientes que você pretende atender? Eles tem um perfil especifico? Como eles estão agrupados? Como estao localizados? Ha uma necessidade comum?';
                    if ($local=='relacionamento') echo 'Tipos de relação que uma empresa estabelece com Segmento de Clientes para conquista-los e mante-los';
                    if ($local=='canais') echo 'Como sua empresa se comunica e alcança seus clientes para entregar sua Proposta de Valor';
                    if ($local=='receitas') echo 'Dinheiro que a empresa gera.<br /> Quanto e como voce vai receber dos clientes';
					?>
                    </td></tr></tbody>
                    
                    
                    
       			  </table>

        		</td>
        		<td class="right" style="color:#FFF;">. . .</td>    
        	</tr>

        	<tr>
        		<td class="corner" id="bottomleft"></td>
        		<td class="bottom"><img width="30" height="29" alt="popup tail" src="http://static.jqueryfordesigners.com/demo/images/coda/bubble-tail2.png"></td>
        		<td id="bottomright" class="corner"></td>
        	</tr>
        </tbody></table>
</div>

<label><input type="text" name="texto" value="" maxlength="200" style="padding:3px; width:130px; font-weight:bold;">
  </label>
<input type="hidden" name="local" value="<?php echo $local;  ?>">    
<input type="submit" value="Adicionar" onclick="Postar(this)" style="padding:3px;">
</form>

<script>
$(function () {
  $('.bubbleInfo').each(function () {
    // options
    var distance = 10;
    var time = 250;
    var hideDelay = 500;

    var hideDelayTimer = null;

    // tracker
    var beingShown = false;
    var shown = false;
    
    var trigger = $('.trigger', this);
    var popup = $('.popup', this).css('opacity', 0);

    // set the mouseover and mouseout on both element
    $([trigger.get(0), popup.get(0)]).mouseover(function () {
      // stops the hide event if we move from the trigger to the popup element
      if (hideDelayTimer) clearTimeout(hideDelayTimer);

      // don't trigger the animation again if we're being shown, or already visible
      if (beingShown || shown) {
        return;
      } else {
        beingShown = true;

        // reset position of popup box
        popup.css({
          top: -100,
          left: -33,
          display: 'block' // brings the popup back in to view
        })

        // (we're using chaining on the popup) now animate it's opacity and position
        .animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          // once the animation is complete, set the tracker variables
          beingShown = false;
          shown = true;
        });
      }
    }).mouseout(function () {
      // reset the timer if we get fired again - avoids double animations
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      
      // store the timer so that it can be cleared in the mouseover if required
      hideDelayTimer = setTimeout(function () {
        hideDelayTimer = null;
        popup.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function () {
          // once the animate is complete, set the tracker variables
          shown = false;
          // hide the popup entirely after the effect (opacity alone doesn't do the job)
          popup.css('display', 'none');
        });
      }, hideDelay);
    });
  });
});
</script>
