<?php
    $severname= "localhost";
    $username = "root";
    $password ="";
    $dbname = "sql_daphp";
    
    $conn = mysqli_connect($severname,$username,$password,$dbname);
    if(!$conn){
        die("Connection failed". mysqli_connect_error($conn));
    }
    if(isset($_GET['MaDH'])){
        $orderId = $_GET['MaDH'];
        $sql = "SELECT * FROM chitiethoadon WHERE MaDH = '" .$orderId . "'";
    }else{
        $orderId = $_GET['MaDHPK'];
        $sql = "SELECT * FROM chitiethoadon_pk WHERE MaDHPK = '" .$orderId . "'";
    }
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
    $conn->close();
?>