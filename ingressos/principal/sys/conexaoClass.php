<?php // Breno Cruvinel - breno.cruvinel09@gmail.com
date_default_timezone_set('America/Sao_Paulo');
//vars de conexao banco de daddos pai
define("VAR_DBPAI_HOST", "localhost");
define("VAR_DBPAI_USER", "root");
define("VAR_DBPAI_PASS", "");
define("VAR_DBPAI_BASE", "sd");


//classe de conexao ao banco de dados
class  classe_DB {
	//conexao banco pai
	var $ip = VAR_DBPAI_HOST;
	var $user = VAR_DBPAI_USER;
	var $pass = VAR_DBPAI_PASS;
	var $database = VAR_DBPAI_BASE;
	//conexao banco pai
	function AbreConexaoPai() {
		$this->connPai = mysql_connect ($this->ip,$this->user,$this->pass); // aqui declaramos a var conn como variсvel da classe
		mysql_set_charset('utf8', $this->connPai);
		mysql_select_db( $this->database, $this->connPai); 
		// esse "$this->" ele e utilizado para referenciar uma variсvel da classe
		//buscar variaveis da tabela CONFIG
		//fSQL::SQL_SELECT_SIMPLES($campos, $tabela, $where='', $order='')
		//$resu1 = fSQL::SQL_SELECT_SIMPLES("*", "sistema_config", "id='1'", "");
		//$SISTEMA_CONF = fSQL::FETCH_ASSOC($resu1);
		define("VAR_SYS_CONF", serialize($SISTEMA_CONF));//$SISTEMA_CONF = unserialize(VAR_SYS_CONF);
	}
	function FechaConexaoPai() {
		if($this->connPai){
			mysql_close($this->connPai); // aqui fecho a conexуo se baseando na variсvel acima declarada
		}
	}
	  
	//fechar todas as conexoes abertas 
	function FechaConexaoAll() {
		if($this->connPai){
			mysql_close ($this->connPai); // aqui fecho a conexуo se baseando na variсvel acima declarada
		}
	} 
	  
	  /*
	   function AbreConexao($ID_ADMIN='off') {
			$this->AbreConexaoPai(); // Abrimos a conexуo PAI
			$cont = "0";
			//faz SQL no banco selecionado
			$pesquisa_cor = "SELECT id_admin FROM clientes WHERE id_admin = '$ID_ADMIN'";
			$resu_cor = mysql_query($pesquisa_cor)
			or die("Falha na execuчуo da consulta 01: $pesquisa_cor ");
			while($linha = mysql_fetch_assoc($resu_cor)){
				$id_admin = $linha["id_admin"];
				$cont++;
			}
			$this->FechaConexaoPai(); // Fechamos a conexуo PAI
			if($cont >= "1"){
				//conexao banco pai
				$ipg = "127.0.0.1";
				$userg = "root";
				$passg = "";
				$databaseg = "gigagestor_grupoqg";
		
				//cria conexao geral
				$this->conn = mysql_connect ($ipg,$userg,$passg)or die("Erro de conexao com DB!"); // aqui declaramos a var conn como variсvel da classe
				mysql_select_db ( $databaseg, $this->conn); 
				// esse "$this->" ele e utilizado para referenciar uma variсvel da classe
			}else{//else if($cont >= "1"){
				echo "Erro de conexao!";
			}//fim else if($cont >= "1"){
	   }
	  function FechaConexao() {
		  if($this->conn){
		  	mysql_close ($this->conn); // aqui fecho a conexуo se baseando na variсvel acima declarada
		  }
	  } //*/
	  
	  
} //fim class  classe_DB 




?>