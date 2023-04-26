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
    $sql = sprintf("DELETE FROM khachhang WHERE `SDT` = %d",  $userID);
    $sql1 = sprintf("DELETE FROM taikhoan WHERE `SDT` = %d",  $userID);
    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
        echo "The record deleted successfully";
        header("Location: manageuser.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>
