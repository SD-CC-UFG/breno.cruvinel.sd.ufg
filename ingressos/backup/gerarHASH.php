<?php // Breno Cruvinel - breno.cruvinel09@gmail.com
//INCLUDES DE CONTROLE --->>>
include "sys/globalClass.php";//classes padrao
include "sys/conexaoClass.php";//classes de conexao
//INCLUDES DE CONTROLE ---<<<

//FUNCOES INICIAIS --->>>
//conexao DB
$classe_db = new classe_DB;//inicia a classe de conexao
$classe_db->AbreConexaoPai();//Abrimos a conexão Pai
//FUNCOES INICIAIS ---<<<






















$time_emitido = time();
//geração de nova hash
$hash = md5(uniqid(time()));
//data qrcode
$data = file_get_contents('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$hash.'&choe=UTF-8');
//vaminho de gravação do arquivo
$qrcode = $hash.".jpeg";
$caminho_qrcode = "qrcode/".$qrcode;
//gravar arquivo
file_put_contents($caminho_qrcode, $data);


//inserir no banco novo registro
$id = fSQL::SQL_SELECT_INSERT("ingresso");
$campos = "id,hash,file,status,sync,time_emitido";
$valores = array($id,$hash,$qrcode,"EMITIDO",time(),$time_emitido);
$tabela = "ingresso";
fSQL::SQL_INSERT_SIMPLES($campos,$tabela,$valores);



$head = "";
$html = "";
//echo $head.$html;			
		

				

?>
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
  <div class="container">
    <div class="panel" style="text-align:center">
      <div class="panel-heading">
      	<h2><b>INGRESSO #<?=$id?></b></h2>
      </div>
      <div class="panel-body">
          <p>Data emissão: <?=date("d/m/Y H:i:s", $time_emitido)?>
          <br/>Código verificador (HASH): <?=$hash?></p>
          
          <div style="text-align:center;"><img src="<?=$caminho_qrcode?>" /></div>
          
      </div>
      <!-- fim .panel-body -->
    </div>
    <!-- fim .panel -->
  </div>
  <!-- fim .container -->
</body>
</html>


























<?php
//REMOVE CONEXAO
//fecha todas as conexoes abertas
$classe_db->FechaConexaoAll();//fecha conexoes
?>