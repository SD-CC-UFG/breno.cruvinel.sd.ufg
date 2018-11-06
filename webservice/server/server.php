<?php
//INCLUDES DE CONTROLE --->>>
include "sys/globalClass.php";//classes padrao
include "sys/conexaoClass.php";//classes de conexao
//INCLUDES DE CONTROLE ---<<<
	
//FUNCOES INICIAIS --->>>
//conexao DB
$classe_db = new classe_DB;//inicia a classe de conexao
$classe_db->AbreConexaoPai();//Abrimos a conexão Pai
//FUNCOES INICIAIS ---<<<










//METODOS ---->>>>>>>>>>





$metodo = $_POST["metodo"];
$parametros = json_decode($_POST["bloco_de_dados"]);
$metodo($parametros);












function estrutura($json){
	$result["result"] = "0";
	$result["msg"] = "dados recebidos com sucesso";
	$result["parametro_enviado"] = $json->parametro;

	echo json_encode($result);
}//if($metodo == "estrutura"){
	
	
	
	
	
	
	
	
	
function adicionarLogin($json){

	//VARS insert simples SQL
	$tabela = "login";
	$campos = "login,senha,time";
	$valores = array($json->login,$json->senha,time());
	fSQL::SQL_INSERT_SIMPLES($campos, $tabela, $valores);	
	
	$result["result"] = "0";
	$result["msg"] = "cadastro realizado com sucesso";
	echo json_encode($result);;
}//if($metodo == "adicionarLogin"){










	
function listaLogin(){
	$array = array();
	$resu = fSQL::SQL_SELECT_SIMPLES("id,login,senha,time", "login", "id > '0'", "ORDER BY id ASC");
	while($linha = fSQL::FETCH_ASSOC($resu)){
		$arrayline["id"] = $linha["id"];
		$arrayline["login"] = $linha["login"];
		$arrayline["senha"] = $linha["senha"];
		array_push($array, $arrayline);
		unset($arrayline);		
	}//while($linha2 = fSQL::FETCH_ASSOC($resu2)){
	unset($resu); unset($linha);
	$return_json["result"] = "0";
	$return_json["lista"] = json_encode($array);
	
	echo json_encode($return_json);
}//if($metodo == "estrutura"){












//METODOS ------<<<<<<<




















//REMOVE CONEXAO
//fecha todas as conexoes abertas
$classe_db->FechaConexaoAll();//fecha conexoes
?>
