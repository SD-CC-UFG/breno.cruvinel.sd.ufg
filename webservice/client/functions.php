<?php
define("URL", "http://192.168.43.167/sistemas-distribuidos/problemas/webservice/server/server.php");






//mando dados de envio
function montaEnvio($arrPost){
	$opts = array(
		'http'=>array(
			'header'=>"Content-type: application/x-www-form-urlencoded",
			'method'=>'POST',
			'content'=>http_build_query($arrPost),
		)
	);

	return $opts;
}//function montaEnvio($arrPost){


//função que comunica via ws com o servidor
function send($arrPost){
	$opts = montaEnvio($arrPost);
	$context = stream_context_create($opts);	
	$response = file_get_contents(URL, false, $context);	
	return $response;
}//function send($arrPost){

?>