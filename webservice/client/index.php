<?php
$metodo = "";
if(isset($_GET["metodo"])){
	$metodo = $_GET["metodo"];
}//if(isset($_POST["acao"])){

	
include 'functions.php';
?>















<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>#2 - Webservices</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>

<div class="container">
  <h2>Sistemas Distribuidos</h2>
  <p>#2 - Comunicação client-server via webservices.</p>
  <div class="panel-group" id="accordion">


    <div class="panel panel-primary">
      <div class="panel-heading">
      	<div id="loader1" style="float:right; display:none;"><img src="img/ajax-qloader-preto-p.gif"></div>
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#panel_estrutura">Estrutura</a>
        </h4>
      </div>
      <div id="panel_estrutura" class="panel-collapse collapse <?php if($metodo == "estrutura"){ echo "in"; }?>">
        <div class="panel-body">
          <form class="form-horizontal" id="estrutura" name="estrutura" method="post" action="?metodo=estrutura">
					  <input type="hidden" id="acao" name="acao" value="estrutura">						
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Método</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" value="estrutura" disabled>
                <p class="help-block"><i class="fa fa-info-circle"></i> Nome do método a ser consultado no servidor</p>
              </div>
            </div>
            <!-- fim. form-group -->

            <div class="form-group">
              <label for="parametro" class="col-lg-2 col-sm-2 control-label">Parâmetro</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" id="parametro" name="parametro" placeholder="valor">
                <p class="help-block"><i class="fa fa-info-circle"></i> Dado a ser enviado (parâmetro de entrada)</p>
              </div>
            </div>
            <!-- fim. form-group -->

            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"></label>
              <div class="col-lg-10">
		      			<button type="submit" class="btn btn-success">Consultar</button>
              </div>
            </div>
            <!-- fim. form-group -->     
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Retorno (JSON)</label>
              <div class="col-lg-10" id="div_resultado_estrutura">

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
          <a data-toggle="collapse" data-parent="#accordion" href="#panel_inserir">Cadastrar Login</a>
        </h4>
      </div>
      <div id="panel_inserir" class="panel-collapse collapse <?php if($metodo == "adicionarLogin"){ echo "in"; }?>">
        <div class="panel-body">
          <form class="form-horizontal" id="inserir" name="inserir" method="post" action="?metodo=adicionarLogin">
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Método</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" value="adicionarLogin" disabled>
                <p class="help-block"><i class="fa fa-info-circle"></i> Nome do método a ser consultado no servidor</p>
              </div>
            </div>
            <!-- fim. form-group -->

            <div class="form-group">
              <label for="login" class="col-lg-2 col-sm-2 control-label">Nome de usuário (login)</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" id="login" name="login" placeholder="login" required>
              </div>
            </div>
            <!-- fim. form-group -->
            <div class="form-group">
              <label for="senha" class="col-lg-2 col-sm-2 control-label">Senha</label>
              <div class="col-lg-4">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="senha" required>
              </div>
            </div>
            <!-- fim. form-group -->            

            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"></label>
              <div class="col-lg-10">
		      			<button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </div>
            <!-- fim. form-group -->     
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Retorno (JSON)</label>
              <div class="col-lg-10" id="div_resultado_adicionarLogin">

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
          <a data-toggle="collapse" data-parent="#accordion" href="#panel_listaLogin">Listar Login Cadastrados</a>
        </h4>
      </div>
      <div id="panel_listaLogin" class="panel-collapse collapse <?php if($metodo == "listaLogin"){ echo "in"; }?>">
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="?metodo=listaLogin">
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Método</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" value="listaLogin" disabled>
                <p class="help-block"><i class="fa fa-info-circle"></i> Nome do método a ser consultado no servidor</p>
              </div>
            </div>
            <!-- fim. form-group -->

            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"></label>
              <div class="col-lg-10">
		      			<button type="submit" class="btn btn-success">Consultar</button>
              </div>
            </div>
            <!-- fim. form-group -->     
            
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Retorno (JSON)</label>
              <div class="col-lg-10" id="div_resultado_listaLogin">

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











  </div>
	<!-- fim .panel-group -->  
</div>
<!-- fim .container -->




<?php




if($metodo == "estrutura"){
	//json - parametros
	$jsonArr["parametro"] = $_POST["parametro"];
	$jsonString = json_encode($jsonArr);//tranforma array em string json de comunicação
	//array post
	$arrPost["metodo"] = $metodo;
	$arrPost["bloco_de_dados"] = $jsonString;
	
	
	//envia dados do servidor
	$response = send($arrPost);
?>

<script>
$('#div_resultado_<?=$metodo?>').html('<pre><?=print_r($response)?></pre>');
</script>

<?php	
	
}//if($metodo == "estrutura"){
	
	
	
	
	
	
	
	
	
	
	
if($metodo == "adicionarLogin"){
	//json - parametros
	$jsonArr["login"] = $_POST["login"];
	$jsonArr["senha"] = $_POST["senha"];	
	$jsonString = json_encode($jsonArr);//tranforma array em string json de comunicação
	//array post
	$arrPost["metodo"] = $metodo;
	$arrPost["bloco_de_dados"] = $jsonString;
	
	//envia dados do servidor
	$response = send($arrPost);
	
?>

<script>
$('#div_resultado_<?=$metodo?>').html('<pre><?=print_r($response)?></pre>');
</script>

<?php	
	
}//if($metodo == "adicionarLogin"){











if($metodo == "listaLogin"){
	//array post
	$arrPost["metodo"] = $metodo;
	$arrPost["bloco_de_dados"] = "";
	
	//envia dados do servidor
	$response = send($arrPost);
?>

<script>
$('#div_resultado_<?=$metodo?>').html('<pre><?=print_r($response)?></pre>');
</script>

<?php	
	
}//if($metodo == "estrutura"){



?>