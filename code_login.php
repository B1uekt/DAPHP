<?php 
	require_once('lib_session.php');
	$sdt = $_POST['sdt_dn'];
	$mk = $_POST['mk_dn'];
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
	  //$stored_password = $row['MatKhau'];
	  if ($mk == $row['MatKhau']) {
	    echo 'Đăng nhập thành công';
	    $_SESSION['current_username'] = $sdt;
		$_SESSION['isAdmin'] = true;
		header('Location:' . 'index.php');
	  } else {
	    echo 'Mật khẩu đã nhập không đúng';
	  }
	} else {
	  echo 'Tài khoản không tồn tại';
	}

	mysqli_close($conn);
 ?>