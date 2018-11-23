<?php
function isConnected(){
	
	return isset($_SESSION["user_id"]);
}

function getConnectedUserId(){
	
	if(isConnected()){
		
		return $_SESSION["user_id"];
	}
	return null;
}

$user_id = getConnectedUserId();
?>