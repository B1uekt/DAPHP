<?php
    if(isset($_REQUEST['MaSP'])){
        $severname = "localhost";
        $username ="root";
        $password ="";
        $dbname = "sql_daphp";
        $productID = $_REQUEST['MaSP'];
        var_dump($productID);
        $conn = mysqli_connect($severname,$username,$password,$dbname);
        if(!$conn){
            die("Connection failed". mysqli_connect_error($conn));
        }  
        if($_GET['type']==1){
            $sql = "UPDATE `sanpham` SET `SoLuong`='0' WHERE MaSP ='". $productID."'";
        } 
        else {
            $sql = "UPDATE `phukien` SET `SoLuong`='0' WHERE MaPK ='". $productID."'";
        }
        if ($conn->query($sql) === TRUE) {
            //echo "The record deleted successfully";
            $a = sprintf("Location: manageproduct.php?page=%s", $_GET['page']);
            header($a);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>