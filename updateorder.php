<?php
    if(isset($_REQUEST['submit'])) {
        $status = $_REQUEST['status'];
        $total =(double)$_REQUEST['price'];
        $id = $_REQUEST['id'];
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

        $sql = sprintf("UPDATE `donhang` SET `TrangThaiDH`='%s',`Gia`='%d' WHERE MaDH ='%s'",$status,$total,$id);
        if ($conn->query($sql) === TRUE) {
            header("Location: manageorder.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
    }
?>
