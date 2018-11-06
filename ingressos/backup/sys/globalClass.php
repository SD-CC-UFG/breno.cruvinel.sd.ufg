<?php // Breno Cruvinel - breno.cruvinel09@gmail.com

############## INICIO - CLASSES ###########>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



class fSQL {
// INICIO FUNÇÕES DO SQL -----------------##############@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>



/*
pesquisa simples SQL
-Exemplo:
*/
function SQL_SELECT_SIMPLES($campos, $tabela, $where='', $order='', $limit='', $join='', $debug=''){
	/*if(($campos != "*") and (!preg_match("/\./i", $campos))){
		$campos = trim($campos);
		$campos = str_replace("`", "", $campos);
		$campos = str_replace(",", "`,`", $campos);
		$campos = "`".$campos."`";
	}//*/
		if($where != ""){ $where = "WHERE ".$where; }else{ $where = ""; }
		if($limit != ""){ $limit = "LIMIT ".$limit; }else{ $limit = ""; }
		//faz SQL no banco selecionado
		$pesquisa = "SELECT $campos FROM $tabela $join $where $order $limit";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		//".mysql_error()."

		if($debug != ""){ //iif DEBUG, imprime o SQL
			echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
		}
	return $resu;
}//fim pesquisa simples SQL






/*
update simples SQL
Exemplos:
campos: $campos = "campo1,campo2,campo3";
tabela: $tabela = "nome da tabela";
valores: $valores = array("valor1","valor2","valor3");
condicao: $condicao = "id='1' AND data !=NULL";
*/
function SQL_UPDATE_SIMPLES($campos, $tabela, $valores, $condicao='', $debug=''){
	if($condicao != ""){
		$sql_campos = "";
		$cont = "0";
		//converte o array de campos recebido
		$array_campos = explode(",", $campos);
		//verifica a lista do array recebido
		foreach ($array_campos as $pos => $valor ){
			if($cont >= "1"){ $sql_campos .= " , "; }
			if($valores["$cont"] == "NULL"){ $sql_campos .= "`".$valor."` = ".$valores["$cont"].""; }else{ $sql_campos .= "`".$valor."` = '".$valores["$cont"]."'"; }
			$cont++;
		}//fim foreach

		//grava na tabela
		//faz SQL no banco selecionado
		$pesquisa = "UPDATE $tabela SET $sql_campos WHERE $condicao";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		$gravados = $resu;
		$retorno = "1";

	}else{ $retorno = "0"; } //else if($condicao != ""){

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	return $retorno;
}//fim update simples SQL



/*
pesquisa busca ultimo id para utilizar em inserts SQL
-Exemplo:
*/
function SQL_SELECT_INSERT($tabela, $campo='id', $where='', $debug=''){
		if($campo == ""){ $campo = "id"; }
		if($where != ""){ $where = "WHERE ".$where; }else{ $where = ""; }
		$id_n = "0";
		//faz SQL no banco selecionado
		$pesquisa = "SELECT $campo FROM $tabela $where ORDER BY $campo DESC LIMIT 1";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		while($linha = mysql_fetch_assoc($resu)){
			$id_n = $linha["$campo"];
		}//fim while
		$id_n++;

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}

	return $id_n;
}//fim pesquisa ultimo id para insert SQL







/*
insert simples SQL
Exemplos:
campos: $campos = "campo1,campo2,campo3";
tabela: $tabela = "nome da tabela";
valores: $valores = array("valor1","valor2","valor3");
*/
function SQL_INSERT_SIMPLES($campos, $tabela, $valores, $debug=''){
		$sql_campos = "";
		$sql_vars = "";
		$cont = "0";
		//converte o array de campos recebido
		$array_campos = explode(",", $campos);
		//verifica a lista do array recebido
		foreach ($array_campos as $pos => $valor ){
			if($cont >= "1"){ $sql_campos .= " , "; $sql_vars .= " , "; }
			$sql_campos .= "`".$valor."`";
			$sql_vars .= "'".$valores["$cont"]."'";
			$cont++;
		}//fim foreach

		//grava na tabela
		//faz SQL no banco selecionado
		$pesquisa = "INSERT INTO `$tabela` ( $sql_campos ) VALUES ( $sql_vars )";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		$gravados = $resu;
		
	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	
		return $gravados;
}//fim insert simples SQL



/*
delete simples SQL
Exemplos:
tabela: $tabela = "nome da tabela";
condicao: $condicao = "id='1' AND data !=NULL";
*/
function SQL_DELETE_SIMPLES($tabela, $condicao='', $debug=''){
	if($condicao != ""){
			//deleta na tabela
			//faz SQL no banco selecionado
			$pesquisa = "DELETE FROM $tabela WHERE $condicao";
			$resu = mysql_query($pesquisa)
			or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
			$gravados = $resu;
	}
	
	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	
	return $gravados;
}//fim delete simples SQL


/*
fetch_assoc SQL
Função:
Listar dados while de uma consulta SQL
*/
function FETCH_ASSOC($result, $debug=''){
	$resu = mysql_fetch_assoc($result);

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">RETORNO: $debug</div>";
	}
	return $resu;
}//fim delete simples SQL



//fim funcoes de SQL ---------<<<<<<<<<<<<<<	
}//fSQL











############## FIM - CLASSES ###########<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
?>
