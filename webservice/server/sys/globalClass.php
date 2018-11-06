<?php 
class fSQL {
// INICIO FUNÇÕES DO SQL -----------------##############@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>


//funcoes de conexao com banco de dados ################################>>>>>>>>>

//inicio funcoes de SQL --------->>>>>>>>>>>>>>>
/*
pesquisa simples SQL
-Exemplo:
*/
function SQL_GERAL($sql, $debug=''){
		//faz SQL no banco selecionado
		$pesquisa = $sql;
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		//or die("<script>alert('Ops... o servidor falhou na busca, tente mais tarde!'); window.location='?';</ script>");
		//or die("<script>alert('Ops... o servidor falhou, tente mais tarde!'); window.location='../login.php?sair=1';</ script>");
		//".mysql_error()."

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	return $resu;
}//fim pesquisa geral SQL










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
pesquisa dupla SQL
-Exemplo: SELECT * FROM combo_files F, usuarios_permissoes U WHERE tab = '1' AND F.permissao = U.permissao
*/
function SQL_SELECT_DUPLO($campos, $tabelas, $where='', $order='', $limit='', $debug=''){
		if($where != ""){ $where = "WHERE ".$where; }else{ $where = ""; }
		if($limit != ""){ $limit = "LIMIT ".$limit; }else{ $limit = ""; }
		
		//faz SQL no banco selecionado
		$pesquisa = "SELECT $campos FROM $tabelas $where $order $limit";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		//or die("<script>alert('Ops... o servidor falhou na busca, tente mais tarde!'); window.location='?';</ script>");
		//or die("<script>alert('Ops... o servidor falhou, tente mais tarde!'); window.location='../login.php?sair=1';</ script>");
		//".mysql_error()."

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	return $resu;
}//fim pesquisa simples SQL





/*
Conta os registros de uma consulta SQL
*/
function SQL_CONT($result){
		$resu = mysql_num_rows($result);
	return $resu;
}//fim pesquisa simples SQL



/*
conta registros de um filtro SQL
-Exemplo:
*/
function SQL_CONTAGEM($tabela, $where='', $limit='', $group='', $debug=''){
	$contagem = "0";
		$group = str_replace("GROUP BY ", "", $group);
		$group = str_replace(" ", "", $group);
		if($where != ""){ $where = "WHERE ".$where; }else{ $where = ""; }
		if($limit != ""){ $limit = "LIMIT ".$limit; }else{ $limit = ""; }
		if($group != ""){ $group = "DISTINCT ".$group; }else{ $group = "*"; }
		//faz SQL no banco selecionado
		$pesquisa = "SELECT  COUNT(".$group.") AS contagem FROM $tabela $where $limit";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		$linha = mysql_fetch_assoc($resu);
		$contagem = $linha["contagem"];
		//or die("<script>alert('Ops... o servidor falhou na busca, tente mais tarde!'); window.location='?';</ script>");
		//or die("<script>alert('Ops... o servidor falhou, tente mais tarde!'); window.location='../login.php?sair=1';</ script>");
		//".mysql_error()."

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width:100%; z-index: 999999999; background:#FFE8E8; overflow:auto; font-size:12px; color:#000; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	return $contagem;
}//fim pesquisa contagem SQL



/*
pesquisa DISTINCT SQL
-Exemplo:
campo: $campos = "campo1";
tabela: $tabela = "nome da tabela";
where: $where = "id='1'";
order: $order = "ORDER BY id DESC";
*/
function SQL_SELECT_DISTINCT($campo, $tabela, $where='', $order='', $limit='', $debug=''){
		if($where != ""){ $where = "WHERE ".$where; }else{ $where = ""; }
		if($limit != ""){ $limit = "LIMIT ".$limit; }else{ $limit = ""; }
		//faz SQL no banco selecionado
		$pesquisa = "SELECT DISTINCT `$campo` FROM `$tabela` $where $order $limit";
		$resu = mysql_query($pesquisa)
		or die("<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>");
		
	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
		return $resu;
}//fim pesquisa DISTINCT SQL






/*
pesquisa simples com retorno de um registro SQL
-Exemplo:
*/
//function SQL_SELECT_ONE($campos, $tabela, $where='', $order='', $debug=''){
function SQL_SELECT_ONE($campos, $tabela, $where='', $order='', $join='', $debug=''){	
	if(($campos != "*") and (!preg_match("/./i", $campos))){
		$campos = str_replace(" ", "", $campos);
		$campos = str_replace("`", "", $campos);
		$campos = str_replace(",", "`,`", $campos);
		$campos = "`".$campos."`";
	}
	if($where != ""){ $where = "WHERE ".$where; }else{ $where = ""; }
	//faz SQL no banco selecionado
	$pesquisa = "SELECT $campos FROM $tabela $join $where $order LIMIT 1";
	$die = "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: 5px; position: absolute;\">Ops... o servidor falhou, entre em contato com o suporte e informe o ERRO: $pesquisa</div>";
	$result = mysql_query($pesquisa) or die($die);
	$resu = mysql_fetch_assoc($result);

	if($debug != ""){ //iif DEBUG, imprime o SQL
		echo "<div style=\"width: 800px; z-index: 999999999; background:#FFE8E8; border:#F00 1px solid; padding:10px; left: 5px; top: ".$debug."px; position: absolute;\">SQL: $pesquisa</div>";
	}
	return $resu;
}//fim pesquisa simples com retorno de um registro SQL




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
update incremento de campo SQL
Exemplos:
campo: $campo = "campo1";
tabela: $tabela = "nome da tabela";
condicao: $condicao = "id='1' AND data !=NULL";
//Essa funcao pega um campo que tinha um valor 3 exemplo, incrementa ele alterando para 4
*/
function SQL_UPDATE_INCREMENTO($campo, $tabela, $condicao='', $debug=''){
	if($condicao != ""){

		//grava na tabela
		//faz SQL no banco selecionado
		$pesquisa = "UPDATE $tabela SET $campo = $campo + 1 WHERE $condicao";
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


/*
fetch_array SQL
Função:
Listar dados while de uma consulta SQL em um ARRAY
*/
function FETCH_ARRAY($result){
	$resu = mysql_fetch_array($result);

	return $resu;
}//fim delete simples SQL





//verifica se tabela existe no DB
/* Exemplo de USO:
echo VER_TABELA("DB", "nometabela");
*/
function VER_TABELA($tabela){ 
		if(!(mysql_query("SELECT * FROM $tabela LIMIT 1"))) { 
			//echo "essa tabela não existe"; 
			return 0;
		} else { 
			//echo "essa tabela existe"; 
			return 1;
		} 
}//fim funtioction ver_tabela()




//converte resultado SQL em ARRAY
// Function to Convert Results into an ARRAY 
function result_to_array($result){ 
	// Defining an array 
	$result_array = array(); 
	// Creating the Array of all users 
	for ($i = 0; $row = mysql_fetch_assoc($result); $i++){
			$result_array[$i] = $row; 
	} 
	// returns the array of all users by Multi Dimensional Array 
	return $result_array; 
} // Function to Convert Results into an ARRAY 


//fim funcoes de SQL ---------<<<<<<<<<<<<<<	
}//fSQL

