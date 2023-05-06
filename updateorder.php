<?php
    if(isset($_REQUEST['submit'])) {
        $status = $_REQUEST['status'];
        $total =(double)$_REQUEST['price'];
        $cus = $_REQUEST['cus-number'];
        $pro = $_REQUEST['pro-number'];
        $date = $_REQUEST['date'];
        $mysql_date = date("Y-m-d", strtotime($date));
        $id = $_REQUEST['id'];
        if($id == 2){
            $qty = (double)$_REQUEST['quantity'];
        }
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if($id == 1){
            $sql = sprintf("UPDATE `donhang` SET `TrangThaiDH`='%s',`Gia`='%d', `NgayDat` = '%s' WHERE MaKH ='%s' AND MaSP ='%s'",$status,$total,$mysql_date,$cus,$pro);
        }else{
            $sql = sprintf("UPDATE `donhang_pk` SET `SoLuong`= '%d' ,`TrangthaiDH`='%s',`Gia`='%d', `NgayDat` = '%s' WHERE MaKH ='%s' AND MaPK ='%s'",$qty,$status,$total,$mysql_date,$cus,$pro);
        }
        if ($conn->query($sql) === TRUE) {
            if($id == 1)
                header("Location: manageorder.php?page=1");
            else
                header("Location: manageorder.php?page=2"); 
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
    }
?>
