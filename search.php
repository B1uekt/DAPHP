<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sql_daphp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_GET['product'])){
        $product = mysqli_real_escape_string($conn, $_GET['product']);

          // Tạo câu truy vấn SQL để lấy danh sách sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT * FROM products WHERE name LIKE '%$product%'";
        $result = mysqli_query($conn, $sql);

          // Tạo một mảng associative để chứa kết quả tìm kiếm
        $searchResults = array();

          // Lặp qua kết quả truy vấn và đưa nó vào mảng kết quả
            while($row = mysqli_fetch_assoc($result)) {
                $searchResults[] = $row;
            }

          // Trả về dữ liệu tìm kiếm dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($searchResults);
        }
    mysqli_close($conn);
 ?>