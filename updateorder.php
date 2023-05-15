<?php
    if(isset($_REQUEST['submit'])) {
        $status = $_REQUEST['status'];
        $total =(double)$_REQUEST['price'];
        $cus = $_REQUEST['cus-number'];
        $pro = $_REQUEST['pro-number'];
        var_dump($_REQUEST['date']);
        var_dump(isset( $_REQUEST['date']));

        if(isset( $_REQUEST['date']) && !empty($_REQUEST['date'])){
            $mysql_date = date("Y-m-d", strtotime($_REQUEST['date']));
        }else{
            $mysql_date = 'NULL';
        }

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
            $sql = sprintf("UPDATE `chitiethoadon` SET `TrangThaiDH`='%s',`Gia`='%d', `NgayGiao` = '%s' WHERE MaKH ='%s' AND MaSP ='%s'",$status,$total,$mysql_date,$cus,$pro);
        }else{
            $sql = sprintf("UPDATE `chitiethoadon_pk` SET `SoLuong`= '%d' ,`TrangthaiDH`='%s',`Gia`='%d', `NgayGiao` = '%s' WHERE MaKH ='%s' AND MaPK ='%s'",$qty,$status,$total,$mysql_date,$cus,$pro);
        }
        var_dump($sql);
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
