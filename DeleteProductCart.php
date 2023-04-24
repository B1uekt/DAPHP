<?php 
session_start();
$product_id = $_GET['id'];
$type = $_GET['type'];
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sql_daphp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    if($type=='car'){
        $sql = "SELECT  * FROM SanPham WHERE IDSP = $product_id ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $MaSP = $row['MaSP'];
    }
    else if($type=='accessory') {
        $sql1 = "SELECT  * FROM phukien WHERE IDPK = $product_id ";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $MaSP = $row1['MaPK'];
    }
    echo($MaSP);
//$product_id = $_GET['id'];
unset($_SESSION['cart'][$MaSP]);
header("Location: GH.php");
 ?>