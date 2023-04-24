<?php
require_once('lib_session.php');
	if(isset($_REQUEST['isUser'])) {
		echo 'Dang xuat admin thanh cong';
		unset($_SESSION['current_username']);
		unset($_SESSION['isUser']);
		unset($_SESSION['cart']);
		header('Location:' . 'index.php');
	}
	if(isset($_REQUEST['isAdmin'])) {
		echo 'Dang xuat admin thanh cong';
		unset($_SESSION['current_adminname']);
		unset($_SESSION['isAdmin']);
		//unset($_SESSION['cart']);
		header('Location:' . 'index.php');
	}
?>