<?php // Breno Cruvinel - breno.cruvinel09@gmail.com ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Painel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <!-- função bcm_ajax -->
  <script src="../js/bcm_ajax.js"></script>    
  <script src="../js/jquery.ba-dotimeout.js"></script>
</head>

<body>
<div id="div_resposta"></div>

<script type="text/javascript">
$(document).ready(function(){
	sync();
});	

function sync(){
	//executa sync.php
	bcm_ajax('div_resposta', '0', 'sync.php', '','GET','ON');
	//sleep
	$.doTimeout('vTimerOPENList', 5000, function(){ sync();	return false; });//TIMER
}

</script>
</body>
</html>
