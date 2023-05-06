<?php
    $sdt = $_POST['SDT'];
    $pws_old = $_REQUEST['old'];
    $pws_new = $_REQUEST['new'];
    $pws_conf = $_REQUEST['confirm'];
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
        if(password_verify($pws_old, $row['MatKhau'])){
            if($pws_new!=$pws_conf){
                header('Location:' . 'account-setting.php?Buy=1&Wrong=2');
            }
            else {
                $matkhau = password_hash($pws_new, PASSWORD_DEFAULT);
                $sql1 = sprintf("UPDATE `taikhoan` SET `MatKhau`='%s' WHERE sdt = '%s'", $matkhau, $sdt);
                $result1 = mysqli_query($conn, $sql1);
            }
        }
        else {
            header('Location:' . 'account-setting.php?Buy=1&Wrong=1');
        }
    }
/*
    if(isset($_REQUEST['update'])){
        $pws_conf = $_REQUEST['confirm'];
        $pws_old = $_REQUEST['old'];
        $pws_new = $_REQUEST['new'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql1 = "SELECT MatKhau FROM taikhoan WHERE MatKhau ='".$old."'";
        $result = mysqli_query($conn,$sql1);
        mysqli_num_rows($result);
        if(mysqli_num_rows($result)==0){
            header('Location: account-setting.php?isWrong=1');
        }
       
        
    }*/
?>
