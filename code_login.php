<?php 
	require_once('lib_session.php');
	$sdt = $_POST['sdt_dn'];
	$mk = $_POST['mk_dn'];
	$mk_check = $_POST['mk_dn'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sql_daphp";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = sprintf("SELECT * FROM TaiKhoan WHERE sdt = '%s'",$sdt);
	$result = mysqli_query($conn, $sql);


	if (mysqli_num_rows($result) == 1) {
		
	  $row = mysqli_fetch_assoc($result);
	 
	  var_dump(password_verify($mk, $row['MatKhau']));
	  if(password_verify($mk, $row['MatKhau']) && $mk_check == 'admin123'){
	  	$_SESSION['current_adminname'] = $sdt;
		$_SESSION['isAdmin'] = true;
		header('Location:' . 'index.php');
	  }
	  else if (password_verify($mk, $row['MatKhau']) && $mk_check != 'admin123' ) {
		if($row['Status']=='None'){
			echo 'Đăng nhập thành công';
			$_SESSION['current_username'] = $sdt;
			$_SESSION['isUser'] = true;
			$_SESSION['cart'] = array();
			header('Location:' . 'index.php');
		}
		else{
			header('Location:' . 'Login.php?isWrong=1');
		}
	  } 
	  else {
	    header('Location:' . 'Login.php?isWrong=2');
	  }
	} 
	else {
		header('Location:' . 'Login.php?isWrong=3');
	}
	
	mysqli_close($conn);
 ?>