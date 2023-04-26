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
        $sql = "DELETE FROM sanpham WHERE MaSP ='". $productID."'";
        if ($conn->query($sql) === TRUE) {
            //echo "The record deleted successfully";
            header("Location: manageproduct.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>