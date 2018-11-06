<?php
$controle = $_GET['controle'];

if($controle == 'exemplo'){

	$campo = $_POST["campo"];

	echo "<pre><p>SUCESSO</p><p>Dados enviados</p>";
	var_dump($_POST);
	echo "</pre>";
}//if($controle == 'problema1'){



if($controle == 'problema1'){
	$nome = $_POST["nome"];
	$cargo = $_POST["cargo"];
	$salario = $_POST["salario"];		
	
	$novo_salario = 0;
	if($salario > 0){
		$salario = str_replace('.','',$salario);
		$salario = str_replace(',','.',$salario);
		switch($cargo){
			case 'operador':
					$novo_salario = $salario + ($salario * 0.2);
					break;
			case 'programador':
					$novo_salario = $salario + ($salario * 0.18);
					break;
		}//switch($cargo){
	}else{//if($salario > 0){
		$novo_salario = 'incorreto ('.$salario.')';
	}//}else{//if($salario > 0){
		
	echo "<pre><p>Nome: ".$nome."</p><p>Novo salário: R$ ".number_format($novo_salario, 2, ",", ".")."</p></pre>";	
}//if($controle == 'problema1'){
	





if($controle == 'problema2'){
	$nome = $_POST["nome"];
	$sexo = $_POST["sexo"];
	$idade = $_POST["idade"];		
	
	$resultado = 'não atingiu a maioridade';
	switch($sexo){
		case 'F':
				if($idade >= '18'){ $resultado = 'atingiu a maioridade'; }
				break;
		case 'M':
				if($idade >= '21'){ $resultado = 'atingiu a maioridade'; }
				break;
	}//switch($cargo){
		
	echo "<pre><p>".$nome." ".$resultado."</p></pre>";	
}//if($controle == 'problema1'){





?>