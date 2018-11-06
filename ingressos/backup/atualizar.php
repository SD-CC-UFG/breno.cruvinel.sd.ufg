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






















if($ajax == "atualizarTabela"){
	$cont = "0";
	$resu = fSQL::SQL_SELECT_SIMPLES("*","ingresso","id >= '1'");
	while($linha = fSQL::FETCH_ASSOC($resu)){ $cont++;
		$id = $linha["id"];
		$hash = $linha["hash"];
		$status = $linha["status"];
		$sync = $linha["sync"];
		$file = $linha["file"];
		$time_emitido = $linha["time_emitido"];
		
		$status_leg = "<div class='label label-info'>".$status."</div>";
		if($status == "ACESSO PERMITIDO"){ $status_leg = "<div class='label label-success'>".$status."</div>"; }
?>
		<tr>
    	<td><?=$id?></td>
    	<td><?=$hash?></td>      
      <td><?=$status_leg?></td>
      <td><?=date("d/m/Y H:i:s",$sync)?></td>
      <td><?=date("d/m/Y H:i:s",$time_emitido)?></td>      
      <td>
        <button data-toggle="button" class="btn" rel="tooltip" data-placement="top" data-original-title="Visualizar" onClick="pmodalHtml('VISUALIZAR - QRCode','atualizar.php','ajax=visualizarQR&file=<?=$file?>');"><i class="fa fa-qrcode"></i></button>        
      </td>
    </tr>
<?php
	}//fim while
	
	if($cont <= "0"){
?>
    <tr>
      <td style="padding-left:40px; height:200px;" colspan="6">Não foi encontrado nenhum registro.</td>
    </tr>
<?php
	}//if($cont <= "0"){
}//fim atualizarTabela





























if($ajax == "visualizarQR"){
	$file = $_POST["file"];
	$caminho_qrcode = "qrcode/".$file;
?>
	<div style="text-align:center;"><img src="<?=$caminho_qrcode?>" /></div>
<?php	
}//if($ajax == "atualizarTabela"){

































if($ajax != "OFF"){
	//REMOVE CONEXAO
	//fecha todas as conexoes abertas
	$classe_db->FechaConexaoAll();//fecha conexoes
}//if($ajax != "OFF"){
?>