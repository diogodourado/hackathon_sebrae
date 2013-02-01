function Carregando(Opcao) {
	if (Opcao==1) { $('body').prepend("<div id=\"CarregandoBox\"><img src=\"img/load.gif\" width=\"31\" height=\"31\" alt=\"Carregando\" /><br /><strong>Processando informações..</strong><br />Aguarde, pode demorar alguns segundos</div><div id=\"Carregando\"></div>"); }
	if (Opcao==2) { $('#Carregando').fadeIn(10); $('#CarregandoBox').fadeIn(10); }
	if (Opcao==3) { $('#Carregando').fadeOut(10); $('#CarregandoBox').fadeOut(10); }
	return false;
}

function Link(e) {
	var Origem = $(e).attr('href');
	var Destino = $(e).attr('target');
	Carregando(2);
	$(Destino).load(Origem, function() { Carregando(3); });  // Carregando Origem no Destino	
	return false;
};

// Ajax - Link com confirmação

function Aviso(e, mensagem) {
	var x=confirm(mensagem);
	if(x==false){ return false; } else { return Link(e); }
};

// Postar Formulario Ajax

function Postar(e) {
	Carregando(2); // Tela de Carregando
	if(typeof(e) == "object"){	var Formulario = $(e).parents('form:first').attr('name'); } else { var Formulario = e; }
	$('form[name='+Formulario+']').submit(function() { return false; } ); 
	var Destino = $('form[name='+Formulario+']').attr('target'); 
	var Origem = $('form[name='+Formulario+']').attr('action'); 
	var Dados = $('form[name='+Formulario+']').serialize() +'&FormularioId='+Formulario; 

	$.post(Origem, Dados+'&Enviar=1', function(data) {
		$(Destino).html(data); 
		Carregando(3);
		var Posicao = $(Destino).position(); 
		$('html, body').animate({ scrollTop: Posicao.top-20 }, 500);  
	});
	
	return false;
}