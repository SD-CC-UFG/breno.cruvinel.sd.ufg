<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Painel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- css para biblioteca de icones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <!-- função bcm_ajax -->
  <script src="js/bcm_ajax.js"></script>    
  <script src="js/jquery.ba-dotimeout.js"></script>
</head>

<body>



<br/>

<div class="container">
	<div class="panel-group m-bot20" id="accordion_lista">  
    <div class="panel panel-danger">
      <div class="panel-heading">
      	<!-- BOTÃO RECARREGAR -->          
        <div class="btn" style="float: right;" onClick="bcm_ajax('corpo_tabela', 'loader', 'atualizar.php', 'ajax=atualizarTabela','POST','ADD');" rel="tooltip" data-placement="left" data-original-title="Recarregar"><small>Atualizando em <span id="segundos">5</span>...</small></div>      
      
      	<!-- GIF para sinalizar sinal de carregamento (função bcm_ajax mostra/esconde esse GIF) -->
        	
        <h2 class="panel-title">
        	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_lista" href="#collapse_lista"> Registro de Ingressos - SERVIDOR LOCAL (BACKUP) </a>
          <span id="span_tituloForm"><img id="loader" style="display:none;" src="img/ajax-qloader-preto-p.gif"></span>
        </h2>

      </div>
      <div id="collapse_lista" class="panel-collapse collapse in">
        <div class="panel-body">          
	        <a class="btn btn-primary" style="float: right;" href="gerarHASH.php" target="_blank"><i class="fa fa-flash"></i> Gerar novo ingresso</a>            
            <table class="table">
              <!-- CABEÇALHO DAS COLUNAS DA TABELA -->
              <thead>
                <tr>
                  <th>ID</th>
                  <th>HASH</th>
                  <th>Status</th>
                  <th>Última Atualização Status</th>
                  <th>Emitido em</th>                
                  <th>Ação</th>                                
                </tr>
              </thead>
              <!-- CORPO DA TABELA (id serve para referenciar onde o retorno do servidor será introduzido)-->
              <tbody id="corpo_tabela">
              </tbody>
            </table>
          
          
        </div>
        <!-- End .panel-body -->
      </div>
      <!-- End .panel-collapse -->    
    </div>  
    <!-- End .panel -->
    <a class="accordion-toggle collapsed" style="margin-left:5px; font-size:10px; color:#a0a0a0; text-decoration:none;" data-toggle="collapse"  href="#collapse_lista"><i class="fa fa-retweet" ></i> Expandir/Ocultar - Registro de Ingressos</a>
  </div>
  <!-- End .panel-group -->  
</div>
<!-- End .container -->


    












<!-- MODAL -->
<div id="pModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" id="pModalDialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" rel="tooltip" data-original-title="Fechar"><span aria-hidden="true">&times;</span></button>
        <h3 id="pModalTitulo">Titulo</h3>
      </div>
      <!-- End modal-header-->
      <div id="pModalLoader" style="text-align:center; padding:20px; display:none;"><img src="img/ajax-loader.gif"></div>
      <div class="modal-body" id="pModalConteudo">Conteudo</div>
      <div class="modal-footer" id="pModalRodape"><button class="btn" data-dismiss="modal">Sair</button></div>
      <input id="pModalPage" name="pModalPage" type="hidden" value=""><input id="pModalGet" name="pModalGet" type="hidden" value=""><input id="pModalClass" name="pModalClass" type="hidden" value="">
    </div>
  </div>
</div>
<!-- End #pModal --> 










<script type="text/javascript">
$(document).ready(function(){
	carregaLista();
});	

function carregaLista(){
	bcm_ajax('corpo_tabela', 'loader', 'atualizar.php', 'ajax=atualizarTabela','POST','ADD');
	carregaListaSync();	
}
	
function carregaListaSync(){
	//atualizar segundos
	var seg = $('#segundos').html();
	if(seg == 1){ 
		bcm_ajax('corpo_tabela', 'loader', 'atualizar.php', 'ajax=atualizarTabela','POST','ADD');
		seg = 5;	
	}else{//if(seg == 1){ 
		seg=seg-1;
	}//}else{//if(seg == 1){ 
	$('#segundos').html(seg);
		
	$.doTimeout('vTimerOPENList', 1000, function(){ carregaListaSync();	return false; });//TIMER
	//$.doTimeout('vTimerOPENList', 1000, function(){ atualizaTempo(); });//TIMER
}

//monta modal com parametros e faz requisição no servidor dos dados referente ao conteudo do modal
//usado para mostrar algum conteudo
function pmodalHtml(v_titulo,v_conteudo,v_get,v_class){
	$('#pModalTitulo').html(v_titulo);
	$('#pModalConteudo').html('<div class="content" style="padding:3px;" id="pModalConteudoOn"></div>');
	bcm_ajax('pModalConteudoOn', 'pModalLoader', v_conteudo, v_get, 'post');
	$('#pModalPage').val(v_conteudo);
	$('#pModalGet').val(v_get);
	pmodalDisplay('show');
}//pmodalHtml

//define tamanho do modal e mostra na tela
//usada como função secundaria pelo pmodalHtml e pmodalDel
function pmodalDisplay(v_acao){
	if(v_acao == 'show'){
		$('#pModal').modal('show');
	}else{
		$('#pModal').modal('hide');
	}
}//pmodalDisplay
</script>













</body>
</html>
