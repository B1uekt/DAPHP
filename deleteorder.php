<?php
        $id = $_REQUEST['id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";
        $ID = $_REQUEST['id'];
        $page = $_REQUEST['page'];
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if($page == 1){
            $sql1 ="DELETE FROM `hoadon` WHERE MaDH = '".$ID."'";
            $sql2 = "DELETE FROM `donhang` WHERE MaDH = '".$ID."'";
        }else{
            $sql1 ="DELETE FROM `hoadon_pk` WHERE MaDH = '".$ID."'";
            $sql2 = "DELETE FROM `donhang_pk` WHERE MaDH = '".$ID."'";
        }
        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
            if($page == 1)
                header("Location: manageorder.php?page=1");
            else
                header("Location: manageorder.php?page=2");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
?>