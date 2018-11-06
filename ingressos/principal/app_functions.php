<?php // Breno Cruvinel - breno.cruvinel09@gmail.com
$ajax = "OFF"; //zera a variavel AJAX e nao executa as funcoes ajax
if(isset($_POST["ajax"])){//verifia se chamou função AJAX da Pagina
	$ajax = $_POST["ajax"];
	
	//INCLUDES DE CONTROLE --->>>
	include "sys/globalClass.php";//classes padrao
	include "sys/conexaoClass.php";//classes de conexao
	//INCLUDES DE CONTROLE ---<<<
	
	//FUNCOES INICIAIS --->>>
	//conexao DB
	$classe_db = new classe_DB;//inicia a classe de conexao
	$classe_db->AbreConexaoPai();//Abrimos a conexão Pai
	//FUNCOES INICIAIS ---<<<
}//fim else - if(isset($_GET["ajax"])){//verifia se chamou função AJAX da Pagina

























if($ajax == "ingresso"){
	$hash = $_POST["hash"];

	$result = array();	$id = "0";
	$resu = fSQL::SQL_SELECT_SIMPLES("id,status","ingresso","hash = '$hash'");
	while($linha = fSQL::FETCH_ASSOC($resu)){
		$id = $linha["id"];
		$status = $linha["status"];
	}//fim while
	
	if($id == "0"){
		$result["result"] = "0";
		$result["msg"] = "SEM ACESSO - Ingresso inválido!";
	}else{//if($id == "0"){`
		
		if($status == "EMITIDO"){
			$result["result"] = "1";
			$result["msg"] = "ACESSO PERMITIDO";
		
			fSQL::SQL_UPDATE_SIMPLES("status,sync","ingresso",array("ACESSO PERMITIDO",time()),"id = '$id'");
		}else{//if($status == "EMITIDO"){
			$result["result"] = "0";
			$result["msg"] = "ACESSO JÁ REGISTRADO!";			
		}//}else{//if($status == "EMITIDO"){
	}//else//if($cont == "0"){
	
	echo json_encode($result);
}//fim ingresso



































if($ajax != "OFF"){
	//REMOVE CONEXAO
	//fecha todas as conexoes abertas
	$classe_db->FechaConexaoAll();//fecha conexoes
}//if($ajax != "OFF"){
?>