<?php
$severname= "localhost";
$username = "root";
$password ="";
$dbname = "sql_daphp";

$conn = mysqli_connect($severname,$username,$password,$dbname);
if(!$conn){
    die("Connection failed". mysqli_connect_error($conn));
}
    $productId = $_GET['MaSP'];

    $sql = "SELECT * FROM sanpham WHERE MaSP = '" .$productId . "'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
    $conn->close();
?>