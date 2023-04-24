<?php
session_start();

function isUserLogged() {
	//var_dump($_SESSION['current_username']);
	if(isset($_SESSION['current_username'])) {
		//var_dump($_SESSION['isUser']);
		
		if ($_SESSION['isUser'] == true)
			return true;
	}
	return false;
}
function isAdminLogged() {
	//var_dump($_SESSION['current_username']);
	if(isset($_SESSION['current_adminname'])) {
		//var_dump($_SESSION['isUser']);
		//var_dump($_SESSION['current_adminname']);
		if ($_SESSION['isAdmin'] == true)
			return true;
	}
	return false;
}
?>