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
































if(isset($_POST["sync"])){
	//sync ultima comunicação
	$sync = $_POST["sync"];

	$return_array = array();
	$data_array = array(); 
	$row_array = array(); 

	$id = "0";
	$resu = fSQL::SQL_SELECT_SIMPLES("*","ingresso","sync > '$sync'","ORDER BY id");
	while($linha = fSQL::FETCH_ASSOC($resu)){
		$row_array["id"] = $linha["id"];		
		$row_array["hash"] = $linha["hash"];		
		$row_array["file"] = $linha["file"];		
		$row_array["status"] = $linha["status"];		
		$row_array["sync"] = $linha["sync"];		
		$row_array["time_emitido"] = $linha["time_emitido"];		
		$row_array["file_base64"] = utf8_encode(base64_encode(file_get_contents("qrcode/".$row_array["file"])));	
		array_push($data_array,$row_array);
	}//fim while
	
	echo json_encode($data_array);
}//if(isset($_POST["sync"])){





















//REMOVE CONEXAO
//fecha todas as conexoes abertas
$classe_db->FechaConexaoAll();//fecha conexoes
?>