<?php

if(isset($_REQUEST['SDT'])){
    $userID = $_REQUEST['SDT'];
    $severname = "localhost";
    $username ="root";
    $password ="";
    $dbname = "sql_daphp";
    var_dump($userID);
    $conn = mysqli_connect($severname,$username,$password,$dbname);
    if(!$conn){
        die("Connection failed". mysqli_connect_error());
    }
    if($_GET['status']=='Block'){
        $sql = sprintf("UPDATE `taikhoan` SET `Status`='None' WHERE SDT='%s'",  $userID);
        var_dump($sql);
    }
    else {
        $sql = sprintf("UPDATE `taikhoan` SET `Status`='Block' WHERE SDT = '%s' ",  $userID);
    }
    if ($conn->query($sql) === TRUE ) {
        echo "The record deleted successfully";
        if($_GET['status']=='block'){
            header("Location: manageuser.php?Status-Status=none");
        }
        else {
            header("Location: manageuser.php?Status-Status=block");
        }
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>
