<?php // Breno Cruvinel - breno.cruvinel09@gmail.com
	
//ini_set('display_errors',1);ini_set('display_startup_erros',1);error_reporting(E_ALL);	
	
//INCLUDES DE CONTROLE --->>>
include "../sys/globalClass.php";//classes padrao
include "../sys/conexaoClass.php";//classes de conexao
//INCLUDES DE CONTROLE ---<<<

//FUNCOES INICIAIS --->>>
//conexao DB
$classe_db = new classe_DB;//inicia a classe de conexao
$classe_db->AbreConexaoPai();//Abrimos a conexão Pai
//FUNCOES INICIAIS ---<<<
















//arquivo com estrutura webservice REST
include 'functions.php';




//time ultima verificação
$sync = 0;
if(file_exists("sync")){
	$sync = file_get_contents("sync");//guarda time da ultima comunicação
}//if(file_exists("sync")){

//gravar novo time
file_put_contents("sync",time());

//enviar time para o servidor
$arrPost["sync"] = $sync;
$response = send($arrPost);

//retorna um array
$response = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);

//iterar response para atualização dos dados
$cont = "0";
$cont_ARRAY = ceil(count($response));
if($cont_ARRAY >= "1"){
	foreach ($response as $linha_array){
		$cont++;
		//criar jpeg qrcode
		$file_base64 = base64_decode(utf8_decode($linha_array["file_base64"]));
		file_put_contents("../qrcode/".$linha_array["file"], $file_base64);
		//apagar caso já exista
		fSQL::SQL_DELETE_SIMPLES("ingresso","id = '".$linha_array["id"]."'");
		//inserir no banco
		$campos = "id,hash,file,status,sync,time_emitido";
		$valores = array($linha_array["id"],$linha_array["hash"],$linha_array["file"],$linha_array["status"],$linha_array["sync"],$linha_array["time_emitido"]);
		fSQL::SQL_INSERT_SIMPLES($campos,"ingresso",$valores);
	}//fim foreach
}//fim if($cont_ARRAY >= "1"){

echo "<br>sync: ".date("d/m/Y H:i:s",time())." Registros sincronizados: ".$cont;

















//REMOVE CONEXAO
//fecha todas as conexoes abertas
$classe_db->FechaConexaoAll();//fecha conexoes
?>