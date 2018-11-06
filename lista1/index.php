<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>

<div class="container">
  <h2>Sistemas Distribuidos</h2>
  <p>Ideia de estrutura básica para solução do problema apresentado.</p>
  <div class="panel-group" id="accordion">


    <div class="panel panel-primary">
      <div class="panel-heading">
      	<div id="loader1" style="float:right; display:none;"><img src="img/ajax-qloader-preto-p.gif"></div>
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#exemplo">Estrutura</a>
        </h4>
      </div>
      <div id="exemplo" class="panel-collapse collapse">
        <div class="panel-body">
          <form class="form-horizontal" action="#" name="form_exemplo" id="form_exemplo"  onsubmit="ajax('div_resultado_exemplo_1', 'loader1', 'controle.php?controle=exemplo', $('#form_exemplo').serialize(), 'POST');return false;">

            <div class="form-group">
              <label for="campo" class="col-lg-2 col-sm-2 control-label">Campo</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="campo" name="campo" placeholder="valor">
                <p class="help-block"><i class="fa fa-info-circle"></i> Dado a ser enviado (parâmetro de entrada)</p>
              </div>
            </div>
            <!-- fim. form-group -->

            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"></label>
              <div class="col-lg-10">
		      	<button type="submit" class="btn btn-success">Enviar</button>
              </div>
            </div>
            <!-- fim. form-group -->     
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Retorno</label>
              <div class="col-lg-10" id="div_resultado_exemplo_1">

              </div>
            </div>
            <!-- fim. form-group -->                    
          </form>
        </div>
        <!-- fim .panel-body -->
      </div>
      <!-- fim .collapse1 -->
    </div>
		<!-- fim .panel -->  




    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#problema1">Problema 1 - Reajuste Salarial</a>
        </h4>
      </div>
      <div id="problema1" class="panel-collapse collapse">
        <div class="panel-body">
          <form class="form-horizontal" action="#" name="form_problema_1" id="form_problema_1"  onsubmit="ajax('div_resultado_problema_1', 'loader2', 'controle.php?controle=problema1', $('#form_problema_1').serialize(), 'POST');return false;">

            <div class="form-group">
              <label for="nome" class="col-lg-2 col-sm-2 control-label">Nome</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do funcionário" required>
              </div>
            </div>
            <!-- fim. form-group -->
            <div class="form-group">
              <label for="cargo" class="col-lg-2 col-sm-2 control-label">Cargo</label>
              <div class="col-lg-10">
                <select id="cargo" name="cargo" class="form-control" required>
	                <option></option>
                  <option value="operador">Operador</option>
                  <option value="programador">Programador</option>
                </select>
                <p class="help-block"><i class="fa fa-info-circle"></i> Selecione um cargo</p>
              </div>
            </div>
            <!-- fim. form-group --> 
            <div class="form-group">
              <label for="salario" class="col-lg-2 col-sm-2 control-label">Salário</label>
              <div class="col-lg-10">
                <div class="input-group m-b-10">
                  <span class="input-group-addon">R$</span>              
                  <input type="text" class="form-control" id="salario" name="salario" data-thousands="." data-decimal="," required>
                </div>                
                <p class="help-block"><i class="fa fa-info-circle"></i> R$ 0.000,00</p>                
              </div>
            </div>
            <!-- fim. form-group -->                       
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"></label>
              <div class="col-lg-10">
		            <button type="submit" class="btn btn-success">Enviar <div id="loader2" style="float:right; display:none;"><img src="img/ajax-qloader-preto-p.gif"></div></button>
              </div>
            </div>
            <!-- fim. form-group -->     
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Retorno</label>
              <div class="col-lg-10" id="div_resultado_problema_1">

              </div>
            </div>
            <!-- fim. form-group -->                    
          </form>
        </div>
        <!-- fim .panel-body -->
      </div>
      <!-- fim .panel-collapse -->
    </div>
	<!-- fim .panel -->      












    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#problema2">Problema 2 - Maioridade</a>
        </h4>
      </div>
      <div id="problema2" class="panel-collapse collapse">
        <div class="panel-body">
          <form class="form-horizontal" action="#" name="form_problema_2" id="form_problema_2"  onsubmit="ajax('div_resultado_problema_2', 'loader3', 'controle.php?controle=problema2', $('#form_problema_2').serialize(), 'POST');return false;">

            <div class="form-group">
              <label for="nome" class="col-lg-2 col-sm-2 control-label">Nome</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Pessoa" required>
              </div>
            </div>
            <!-- fim. form-group -->
            <div class="form-group">
              <label for="sexo" class="col-lg-2 col-sm-2 control-label">Sexo</label>
              <div class="col-lg-10">
                <select id="sexo" name="sexo" class="form-control" required>
	                <option></option>
                  <option value="F">Feminino</option>
                  <option value="M">Masculino</option>
                </select>
              </div>
            </div>
            <!-- fim. form-group --> 
            <div class="form-group">
              <label for="idade" class="col-lg-2 col-sm-2 control-label">Idade</label>
              <div class="col-lg-10">
                <input type="number" class="form-control" id="idade" name="idade" min="1" required>
              </div>
            </div>
            <!-- fim. form-group -->                       
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"></label>
              <div class="col-lg-10">
		            <button type="submit" class="btn btn-success">Enviar <div id="loader3" style="float:right; display:none;"><img src="img/ajax-qloader-preto-p.gif"></div></button>
              </div>
            </div>
            <!-- fim. form-group -->     
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Retorno</label>
              <div class="col-lg-10" id="div_resultado_problema_2">

              </div>
            </div>
            <!-- fim. form-group -->                    
          </form>
        </div>
        <!-- fim .panel-body -->
      </div>
      <!-- fim .panel-collapse -->
    </div>
	<!-- fim .panel -->  




  </div>
	<!-- fim .panel-group -->  
</div>
<!-- fim .container -->



<script>
$(document).ready(function(e) {
    $('#salario').maskMoney();
});

function ajax(div_principal, id_carregando, file_c, var_get, tmetodo, appeend, modalhide){
	if(tmetodo == ""){ tmetodo='get'; }
	if(appeend == ""){ appeend='off'; }
	$.ajax({
	   type: tmetodo, //Tipo do envio das informações GET ou POST
	   url: file_c, //url para onde será enviada as informações digitadas
	   data: var_get, /*parâmetros que serão carregados para a url selecionada (via POST). o form serialize passa de uma só vez todas as informações que estão dentro do formulário. Facilita, mas pode atrapalhar quando não for aplicado adequadamente*/
	   cache: false,
	   async: true,
	
	   beforeSend: function(){
		  //Ação que será executada após o envio, no caso, chamei um gif loading para dar a impressão de garregamento na página
		  if(id_carregando != "0"){
				$("#"+id_carregando+"").show();
		  }
	   },
	   //function(data) vide item 4 em $.get $.post
	   success: function(data){
		  //Tratamento dos dados de retorno.
			$("#"+id_carregando+"").hide();
			$("#"+div_principal+"").fadeIn();
			$("#"+div_principal+"").empty().html(data);
	   },
	
	   // Se acontecer algum erro é executada essa função
	   error: function(erro){
			$("#"+id_carregando+"").hide();
			$("#"+div_principal+"").fadeIn();
			$("#"+div_principal+"").empty().html('<center>Erro ao carregar a pagina!</center>');
	   }
	});

}
</script>
    
</body>
</html>
