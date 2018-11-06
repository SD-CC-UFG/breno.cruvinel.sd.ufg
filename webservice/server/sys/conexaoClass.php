<?php

//vars de conexao banco de daddos pai
define("VAR_DBPAI_HOST", "127.0.0.1");
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
		$this->connPai = mysql_connect ($this->ip,$this->user,$this->pass); // aqui declaramos a var conn como variável da classe
		mysql_set_charset('utf8', $this->connPai);
		mysql_select_db( $this->database, $this->connPai); 
	}
	function FechaConexaoPai() {
		if($this->connPai){
			mysql_close($this->connPai); // aqui fecho a conexão se baseando na variável acima declarada
		}
	}
	  
	//fechar todas as conexoes abertas 
	function FechaConexaoAll() {
		if($this->connPai){
			mysql_close ($this->connPai); // aqui fecho a conexão se baseando na variável acima declarada
		}
	} 
	  

	  
} //fim class  classe_DB 




?>