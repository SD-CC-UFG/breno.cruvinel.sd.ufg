/*
Funcao 1 - Exemplo de utilização:
<a href="#" onclick="bcm_ajax('conteudo', 'carregando', 'pagina.php', 'var=1');">link</a>
*/
function bcm_ajax(div_principal, id_carregando, file_c, var_get, tmetodo, appeend, modalhide){
	if(tmetodo == ""){ tmetodo='get'; }
	if(appeend == ""){ appeend='off'; }
	$.ajax({
	   type: tmetodo, //Tipo do envio das informações GET ou POST
	   url: file_c, //url para onde será enviada as informações digitadas
	   data: var_get, /*parâmetros que serão carregados para a url selecionada (via POST). o form serialize passa de uma só vez todas as informações que estão dentro do formulário. Facilita, mas pode atrapalhar quando não for aplicado adequadamente a sua   aplicação*/
	   cache: false,
	   async: true,
	
	   beforeSend: function(){
		  //Ação que será executada após o envio, no caso, chamei um gif loading para dar a impressão de garregamento na página
		  if(id_carregando != "0"){
				$("#"+id_carregando+"").show();
				if(appeend == "ADD" || modalhide == "ADD"){ $("[rel=tooltip]").tooltip('hide'); }else{ $("#"+div_principal+"").hide(); }
		  }
	   },
	   //function(data) vide item 4 em $.get $.post
	   success: function(data){
		  //Tratamento dos dados de retorno.
			$("#"+id_carregando+"").hide();
			if(modalhide != "" || modalhide != "ADD"){ $("#"+modalhide+"").modal('hide'); }
			$("#"+div_principal+"").fadeIn();
			if(appeend == "ADD"){ $("[rel=tooltip]").tooltip('hide'); }
			if(appeend == "ON"){ $("#"+div_principal+"").append(data); }else{ $("#"+div_principal+"").empty().html(data); }
	   },
	
	   // Se acontecer algum erro é executada essa função
	   error: function(erro){
			$("#"+id_carregando+"").hide();
			if(modalhide != "" || modalhide != "ADD"){ $("#"+modalhide+"").modal('hide'); }
			$("#"+div_principal+"").fadeIn();
			$("#"+div_principal+"").empty().html('<center>Erro ao carregar a pagina!</center>');
	   }
	});

}