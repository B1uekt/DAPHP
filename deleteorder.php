<?php
        $id = $_REQUEST['id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";
        $ID = $_REQUEST['id'];
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "DELETE FROM `donhang` WHERE MaDH = '".$ID."'";
        var_dump($sql);
        if ($conn->query($sql) === TRUE) {
            header("Location: manageorder.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
?>