<!DOCTYPE html>
<html lang="en">
<?php 
    if(isset($_GET['search'])){
        // var_dump($_GET['search']);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }

        $type = $_GET['type'];
        if($type=='car'){
            if($_GET['car']==5){
                if($_GET['min-price']!='' && $_GET['max-price']!=''){
                        $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 and GiaBan <= %d and GiaBan >= %d", $_GET['max-price'], $_GET['min-price']);
                        $result3 = mysqli_query($conn, $sql3);
                        $total_records = mysqli_num_rows($result3);
                        $limit = 6; // số bản ghi hiển thị trên mỗi trang
                        $total_pages = ceil($total_records / $limit);
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                        $offset = ($current_page - 1) * $limit;
                        $sql = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 and GiaBan <= %d and GiaBan >= %d LIMIT $offset, $limit", $_GET['max-price'], $_GET['min-price']);
                        $result = mysqli_query($conn, $sql);
                }
                else {
                    switch($_GET['price']){
                        case 1: 
                            $sql3 = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by NamSX DESC";
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0  order by NamSX DESC LIMIT $offset, $limit";
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 2: 
                            $sql3 = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan DESC";
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan DESC LIMIT $offset, $limit";
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 3: 
                                $sql3 = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan";
                                $result3 = mysqli_query($conn, $sql3);
                                $total_records = mysqli_num_rows($result3);
                                $limit = 6; // số bản ghi hiển thị trên mỗi trang
                                $total_pages = ceil($total_records / $limit);
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                                $offset = ($current_page - 1) * $limit;
                                $sql = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan LIMIT $offset, $limit";
                                $result = mysqli_query($conn, $sql);
                                break;
                        case 4: 
                            $sql3 = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by TenSP";
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = "SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 order by TenSP LIMIT $offset, $limit";
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 5: 
                            $sql3 = "SELECT t.*, s.*  FROM SanPham s, thuonghieu t WHERE t.MaTH = s.MaTH and s.SoLuong >0";
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = "SELECT t.*, s.*  FROM SanPham s, thuonghieu t WHERE t.MaTH = s.MaTH and s.SoLuong >0 LIMIT $offset, $limit";
                            $result = mysqli_query($conn, $sql);
                            break;
                    }  
                } 
                    
            }
            else if($_GET['car']!=5){
                if($_GET['min-price']!='' && $_GET['max-price']!=''){
                    $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 and GiaBan <= %d and GiaBan >= %d and t.MaTH = '%s'", $_GET['max-price'], $_GET['min-price'], $_GET['car']);
                    $result3 = mysqli_query($conn, $sql3);
                    $total_records = mysqli_num_rows($result3);
                    $limit = 6; // số bản ghi hiển thị trên mỗi trang
                    $total_pages = ceil($total_records / $limit);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                    $offset = ($current_page - 1) * $limit;
                    $sql = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 and GiaBan <= %d and GiaBan >= %d and t.MaTH = '%s' LIMIT $offset, $limit ", $_GET['max-price'], $_GET['min-price'], $_GET['car']);
                    $result = mysqli_query($conn, $sql);
                }
                else{
                    switch($_GET['price']){
                        case 1:
                            $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH = '%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by NamSX DESC", $_GET['car']);
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH = '%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by NamSX DESC LIMIT $offset, $limit", $_GET['car']);
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 2: 
                            $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH = '%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan DESC", $_GET['car']);
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH = '%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan DESC LIMIT $offset, $limit", $_GET['car']);
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 3: 
                            $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH = '%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan", $_GET['car']);
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH = '%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by GiaBan LIMIT $offset, $limit", $_GET['car']);
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 4: 
                            $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH ='%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by TenSP", $_GET['car']);
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE t.MaTH ='%s' and s.MaTH = t.MaTH and s.SoLuong >0 order by TenSP LIMIT $offset, $limit", $_GET['car']);
                            $result = mysqli_query($conn, $sql);
                            break;
                        case 5: 
                            $sql3 = sprintf("SELECT t.*, s.*  FROM SanPham s, thuonghieu t WHERE t.MaTH ='%s' and t.MaTH = s.MaTH and s.SoLuong >0 LIMIT 9", $_GET['car']);
                            $result3 = mysqli_query($conn, $sql3);
                            $total_records = mysqli_num_rows($result3);
                            $limit = 6; // số bản ghi hiển thị trên mỗi trang
                            $total_pages = ceil($total_records / $limit);
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                            $offset = ($current_page - 1) * $limit;
                            $sql = sprintf("SELECT t.*, s.*  FROM SanPham s, thuonghieu t WHERE t.MaTH ='%s' and t.MaTH = s.MaTH and s.SoLuong >0 LIMIT $offset, $limit ", $_GET['car']);
                            $result = mysqli_query($conn, $sql);
                            break;
                    }
                }
            }
            

        }
        else if($type=='accessory'){
            if($_GET['min-price']!='' && $_GET['max-price']!=''){
                    $sql3 = sprintf("SELECT * FROM phukien WHERE SoLuong >0 and Gia <= %d and Gia >= %d" , $_GET['max-price'], $_GET['min-price']);
                    $result3 = mysqli_query($conn, $sql3);
                    $total_records = mysqli_num_rows($result3);
                    $limit = 6; // số bản ghi hiển thị trên mỗi trang
                    $total_pages = ceil($total_records / $limit);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                    $offset = ($current_page - 1) * $limit;
                    $sql = sprintf("SELECT * FROM phukien WHERE SoLuong >0 and Gia <= %d and Gia >= %d LIMIT $offset, $limit" , $_GET['max-price'], $_GET['min-price']);
                    $result = mysqli_query($conn, $sql);
                }
            else {
                switch($_GET['price']){
                    case 1:
                        $sql3 = "SELECT * FROM phukien where SoLuong >0 order by Gia DESC";
                        $result3 = mysqli_query($conn, $sql3);
                        $total_records = mysqli_num_rows($result3);
                        $limit = 6; // số bản ghi hiển thị trên mỗi trang
                        $total_pages = ceil($total_records / $limit);
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                        $offset = ($current_page - 1) * $limit;
                        $sql = "SELECT * FROM phukien where SoLuong >0 order by Gia DESC LIMIT $offset, $limit";
                        $result = mysqli_query($conn, $sql);
                        break;
                    case 2: 
                        $sql3 = "SELECT * FROM phukien where SoLuong >0 order by Gia";
                        $result3 = mysqli_query($conn, $sql3);
                        $total_records = mysqli_num_rows($result3);
                        $limit = 6; // số bản ghi hiển thị trên mỗi trang
                        $total_pages = ceil($total_records / $limit);
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                        $offset = ($current_page - 1) * $limit;
                        $sql = "SELECT * FROM phukien where SoLuong >0 order by Gia LIMIT $offset, $limit";
                        $result = mysqli_query($conn, $sql);
                        break;
                    case 3: 
                        $sql3 = "SELECT * FROM phukien where SoLuong >0 order by TenPK LIMIT 9";
                        $result3 = mysqli_query($conn, $sql3);
                        $total_records = mysqli_num_rows($result3);
                        $limit = 6; // số bản ghi hiển thị trên mỗi trang
                        $total_pages = ceil($total_records / $limit);
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                        $offset = ($current_page - 1) * $limit;
                        $sql = "SELECT * FROM phukien where SoLuong >0 order by TenPK LIMIT $offset, $limit";
                        $result = mysqli_query($conn, $sql);
                        break;
                    case 4:
                        $sql3 = "SELECT * FROM phukien where SoLuong >0 LIMIT 9";
                        $result3 = mysqli_query($conn, $sql3);
                        $total_records = mysqli_num_rows($result3);
                        $limit = 6; // số bản ghi hiển thị trên mỗi trang
                        $total_pages = ceil($total_records / $limit);
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
                        $offset = ($current_page - 1) * $limit;
                        $sql3 = "SELECT * FROM phukien where SoLuong >0 LIMIT $offset, $limit";
                        $result3 = mysqli_query($conn, $sql3);
                        break;
                }
            }
            
        }
        else {
            //$sql = sprintf("SELECT t.*, s.*, p.* FROM SanPham s, ThuongHieu t, phukien p WHERE s.MaTH = t.MaTH and ( TenSP LIKE '%%%s%%' or TenPK LIKE '%%%s%%') ", $_GET['search'], $_GET['search']);
            //var_dump($sql);

            $sql3 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 and TenSP LIKE '%%%s%% '", $_GET['search']);
            $result3 = mysqli_query($conn, $sql3);
            $total_records = mysqli_num_rows($result3);
            $limit = 3; // số bản ghi hiển thị trên mỗi trang
            $total_pages = ceil($total_records / $limit);
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
            $offset = ($current_page - 1) * $limit;
            $sql1 = sprintf("SELECT t.*, s.* FROM SanPham s, ThuongHieu t WHERE s.MaTH = t.MaTH and s.SoLuong >0 and TenSP LIKE '%%%s%%' LIMIT $offset, $limit ", $_GET['search']);
            $result = mysqli_query($conn, $sql1);


            $sql4 = sprintf("SELECT p.* FROM phukien p WHERE TenPK LIKE N'%%%s%%'  and SoLuong >0 ", $_GET['search']);
            $result4 = mysqli_query($conn, $sql4);

            $total_records = mysqli_num_rows($result4);
            $limit =3 ; // số bản ghi hiển thị trên mỗi trang
            $total_pages = ceil($total_records / $limit);
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
            $offset = ($current_page - 1) * $limit;
            $sql2 = sprintf("SELECT p.* FROM phukien p WHERE TenPK LIKE N'%%%s%%' and SoLuong >0 LIMIT $offset, $limit", $_GET['search']);
            //var_dump($sql2);
            $result1 = mysqli_query($conn, $sql2);
        }
    }

    else{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql_daphp";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        $type = $_GET['type'];
        if($type=='car'){
            $Countsp = "SELECT COUNT(*) FROM SanPham s where SoLuong > 0";
            $resultcountsp = mysqli_query($conn, $Countsp);
        }
        else if($type=='accessory'){
            $Countsp = "SELECT COUNT(*) FROM phukien where SoLuong > 0";
            $resultcountsp = mysqli_query($conn, $Countsp);
        }
        $row = mysqli_fetch_row($resultcountsp);
        $total_records = $row[0];
        $limit = 6; // số bản ghi hiển thị trên mỗi trang
        $total_pages = ceil($total_records / $limit);  
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại
        $offset = ($current_page - 1) * $limit; // tổng số trang cần hiển thị
        if($type=='car'){
            $sql = "SELECT t.*, s.*  FROM SanPham s, thuonghieu t WHERE t.MaTH = s.MaTH and s.SoLuong >0 LIMIT $offset, $limit";
            $result = mysqli_query($conn, $sql);
        }
        else if($type=='accessory'){
            $sql = "SELECT *  FROM phukien WHERE SoLuong >0 LIMIT $offset, $limit";
            $result = mysqli_query($conn, $sql);
        }
    }
?>
<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script>
        function xuly() {
            if (document.frm['min-price'].value !== '' || document.frm['max-price'].value !== '') {
                document.frm.price.disabled = true;
                document.frm.price.value = 5;
            }
        }
        function xuly1() {
            if (document.frm['min-price'].value !== '' || document.frm['max-price'].value !== '') {
                document.frm.price.disabled = true;
                document.frm.price.value = 4;
            }
        }
    </script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php 
    require('navbar.php');
     ?>
    <!-- Navbar End -->

    
    <!-- Search Start -->
    <div class="container-fluid bg-white pt-3 px-lg-5">
        <form action="" method="get">
            <div class="row mx-n2 justify-content-end"> 
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <input type="hidden" name="type" value="timkiem">
                    <input name= "search" class="custom-select px-4 mb-3 " style="width: 230px; height: 50px; background:none; margin: 0px 15px" type="text" placeholder="Search">
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2 pl-5">
                    <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Search</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Search End -->

    <!-- Rent A Car Start -->
    <div class="container-fluid">
            
        <div class="container pb-3">
            <?php 
                if($type=='car'){
                    echo('<h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>');
                }
                else if($type=='accessory') {
                    echo('<h1 class="display-4 text-uppercase text-center mb-5">Find Your Accessory</h1>');
                }
                else {
                    echo('<h1 class="display-4 text-uppercase text-center mb-5">Search Results</h1>'); 
                }
            ?>
            
            
            <!-- Search Start -->
        <div class="container-fluid bg-white pt-3">
            <div class="mx-n2">
                <div class="col-xl-2 col-lg-4 col-md-6 px-2" >
                    <form name= "frm" class="pb-3" action="car.php" method="get" style="display: flex">
                        <?php  
                        if($type=='car'){
                            echo('<input type="hidden" name="type" value="car">');
                            echo('<input onchange="xuly();" style="border: 1px solid #ced4da" class="px-4 mb-3 ml-4" style="width: 200px; height: 50px" type="number" name="min-price" placeholder="Min Price" >');
                            echo('<p style="margin-top: 10px; margin-left: 15px; margin-right: 15px">-</p>');
                            echo('<input onchange="xuly();" style="border: 1px solid #ced4da" class=" px-4 mb-3" style="width: 200px; height: 50px" type="number" name="max-price" placeholder="Max Price">');
                            echo('<select name="car" class="custom-select px-4 mb-3 ml-4" style="width: 200px; height: 50px; float: right">');
                            echo('<option value="5" selected>Brand</option>');
                            echo('<option value="Vin">Vinfast</option>');
                            echo('<option value="Fer">Ferrari</option>');
                            echo('<option value="Lam">Lamborghini</option>');
                            echo('<option value="Mer">Mercedes</option>');
                            echo('<option value="5">All</option>'); 
                            echo('</select>');
                            echo('<select name="price" class="custom-select px-4 mb-3 ml-4 mr-4" style="width: 200px; height: 50px; float:right">');
                            echo('<option value="5" selected>Classify</option>');
                            echo('<option value="1">Mới nhất</option>');
                            echo('<option value="2">Giá giảm dần</option>');
                            echo('<option value="3">Giá tăng dần</option>');
                            echo('<option value="4">Theo tên A -> Z</option>');
                            echo('</select>');
                            echo('<button class="btn btn-primary btn-block mb-3" name="search" style="height: 50px; float: right">Search</button>');
                        }
                        else if($type=='accessory'){
                            echo('<input type="hidden" name="type" value="accessory">');
                            echo('<input onchange="xuly1();" style="border: 1px solid #ced4da" class="px-4 mb-3 ml-4" style="width: 200px; height: 50px" type="number" name="min-price" placeholder="Min Price" >');
                            echo('<p style="margin-top: 10px; margin-left: 15px; margin-right: 15px">-</p>');
                            echo('<input onchange="xuly1();" style="border: 1px solid #ced4da" class=" px-4 mb-3" style="width: 200px; height: 50px" type="number" name="max-price" placeholder="Max Price">');
                            echo('<select name="price" class="custom-select px-4 mb-3 ml-4 mr-4" style="width: 200px; height: 50px; float:right">');
                            echo('<option value="4" selected>Classify</option>');
                            echo('<option value="1">Giá giảm dần</option>');
                            echo('<option value="2">Giá tăng dần</option>');
                            echo('<option value="3">Theo tên A -> Z</option>');
                            echo('</select>');
                            echo('<button class="btn btn-primary btn-block mb-3" name="search" style="height: 50px; float: right">Search</button>');
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    <!-- Search End -->
    <div class="modal123 hide container-fluid">
            <div class="modal_inner123">
                    <div class="modal_header123">
                        <p></p>
                        <i class="fa-solid fa-xmark"></i>
                        </div>
                    <div class="modal_body123">
                        <form method="post" action="updateproduct.php" enctype="multipart/form-data">
                        <?php 
                            if($type=='car'){ ?>
                                <input type="hidden" id="loaiSP" name="loaiSP" value="1" />
                            <?php }
                            else { ?>
                                <input type="hidden" id="loaiSP" name="loaiSP" value="2" />
                            <?php }
                         ?>
                        <label for="name">Product name</label><br>
                        <input class="name" type="text" id="name" name="name" value=""><br>
                        <div class="cate">
                        <label for="cate">Producer</label><br>
                        <select class="price-cate" id="name-producer" name="name-producer" required>
                            <option value="">Choose Producer</option>
                            <option value="Mer">Mercedes</option>
                            <option value="Lam">Lamborghini</option>
                            <option value="Fer">Ferrari</option>
                            <option value="Au">Audi</option>
                            <option value="Bu">Bugatti</option>
                            <option value="BM">BMW</option>
                            <option value="Vin">VinFast</option>
                            <option value="NN">No Name</option>
                        </select>
                    </div>
                        <label for="descr">Product description</label><br>
                        <textarea class="descr" id="descr" name="descr"></textarea>
                        <div class="container-price-cate my-3 d-flex">
                            <div class="price">
                                <label for="price">Price</label><br>
                                <input class="float-left price-cate" type="text" id="price" name="price" value="">
                            </div>
                            <?php 
                            if($type=='car'){ ?>
                                <div class="cate">
                                    <label for="cate">Category</label><br>
                                    <select class="price-cate" name="cate" id="cate">
                                        <option value="-1">Choose</option>
                                        <option value="xe 2 chỗ">TWO-SEATER</option>
                                        <option value="xe 4 chỗ">FOUR-SEATER</option>
                                    </select>
                                </div>
                            <?php }
                         ?>
                            
                        </div>
                        <div class="id-number my-3">
                            <label for="quantity">Quantity</label><br>
                            <input type="text" name="quantity" id="quantity"  required> 
                        </div>
                        <label for="fileToUpload">Select image</label><br>
                        <div class="btn-img">
                            <input  type="file" placeholder= "File hình SP" name="fileToUpload"> 
                        </div>
                        <?php 
                            if($type=='car'){ ?>
                                <div class="id-number my-3">
                                    <label for="year">Year Of Manufacture</label><br>
                                    <input type="text" name="year" id="year"> 
                                </div>
                            <?php } ?>
                        
                        <div class="id-number my-3">
                            <label for="id">ID Product</label><br>
                            <input type="text" name="id" id="id"> 
                        </div>    
                    </div>
                    <div class="modal_footer123">
                    <input class="submit" name="submit" type="submit" value="SUBMIT">
                    </div>
            </div>
        </div>                   
            <div class="row">
                <?php 

                    if($type=='car'){
                        $num =0;
                        if(mysqli_num_rows($result)>0){
                            $s = "";
                            while($row = mysqli_fetch_assoc($result)){
                                
                                $s .= '<div class="col-lg-4 col-md-6 mb-2">';
                                $s .= '<div class="rent-item mb-4">';
                                $s .= sprintf('<a href="detail.php?id=%s&type=%s"><img class="img-fluid mb-4" style="width: 300px; height: 200px" src="%s"></a>', $row['IDSP'], $_GET['type'], $row['Url_image']);
                                $s .= sprintf('<h4 class="text-uppercase mb-4">%s</h4>', $row['TenSP']);
                                $s .= '<div class="d-flex justify-content-center mb-4">';
                                if($type=='car'){
                                    $s .= '<div class="px-2">';
                                    $s .= '<i class="fa fa-car text-primary mr-1"></i>';
                                    $s .= sprintf('<span>%s</span>', $row['NamSX']);
                                    $s .= '</div>';
                                }
                                $s .= sprintf('<div class="px-2 border-left border-right"><i class="fa fa-cogs text-primary mr-1"></i><span>%s</span></div>', $row['XuatXu']);
                                $s .= '</div>';
                                $s .= sprintf('<a class="btn btn-primary px-3" href="detail.php?id=%s&type=%s">%s VND</a>', $row['IDSP'], $_GET['type'], number_format($row['GiaBan'], 0, '', ','));
                                if(isAdminLogged()){
                                    $s .= '<div class="justify-content-center mt-3 mb-4 btn-de-up">';
                                    $s .= sprintf('<button onclick="UpdateForm1(this)" name="update" value=%s type="button" class="btn but-update btn btn-primary px-3 open-modal-btn">Update</button>',$row['MaSP']); ?>
                                    <?php $s .= '</div>';
                                }
                                $s .= '</div>';
                                $s .= '</div>';
                            }
                            echo($s);
                            }
                    }
                    else if($type=='accessory') {
                        $num =0;
                        if(mysqli_num_rows($result)>0){
                            $s = "";
                            while($row1 = mysqli_fetch_assoc($result)){
                                $num++;
                                $s .= '<div class="col-lg-4 col-md-6 mb-2">';
                                $s .= '<div class="rent-item mb-4">';
                                $s .= sprintf('<a href="detail.php?id=%s&type=%s"><img class="img-fluid mb-4" style="width: 300px; height: 200px" src="%s"></a>', $row1['IDPK'], $_GET['type'], $row1['Url_image']);
                                $s .= sprintf('<h4 class="text-uppercase mb-4">%s</h4>', $row1['TenPK']);
                                $s .= '<div class="d-flex justify-content-center mb-4">';
                                $s .= sprintf('<div class="px-2 border-left border-right"><i class="fa fa-cogs text-primary mr-1"></i><span>Số Lượng: %s</span></div>', $row1['SoLuong']);
                                $s .= '</div>';
                                $s .= sprintf('<a class="btn btn-primary px-3" href="detail.php?id=%s&type=%s">%s VND</a>', $row1['IDPK'], $_GET['type'], number_format($row1['Gia'], 0, '', ','));
                                if(isAdminLogged()){
                                    $s .= '<div class="justify-content-center mt-3 mb-4 btn-de-up">';
                                    $s .= sprintf('<button onclick="UpdateForm2(this)" name="update" value=%s type="button" class="btn but-update btn btn-primary px-3 open-modal-btn">Update</button>',$row1['MaPK']); ?>
                                    <?php $s .= '</div>';
                                }
                                $s .= '</div>';
                                $s .= '</div>';
                                if($num==6){
                                    break;
                                }
                            }
                            echo($s);
                        }
                    }
                    else {
                        $s = "";
                        if(mysqli_num_rows($result)>0){
                            
                            while($row = mysqli_fetch_assoc($result)){
                                
                                $s .= '<div class="col-lg-4 col-md-6 mb-2">';
                                $s .= '<div class="rent-item mb-4">';
                                $s .= sprintf('<a href="detail.php?id=%s&type=car"><img class="img-fluid mb-4" style="width: 300px; height: 200px" src="%s"></a>', $row['IDSP'], $row['Url_image']);
                                
                                $s .= sprintf('<h4 class="text-uppercase mb-4">%s</h4>', $row['TenSP']);
                                $s .= '<div class="d-flex justify-content-center mb-4">';
                                if($type=='car'){
                                    $s .= '<div class="px-2">';
                                    $s .= '<i class="fa fa-car text-primary mr-1"></i>';
                                    $s .= sprintf('<span>%s</span>', $row['NamSX']);
                                    $s .= '</div>';
                                }
                                $s .= sprintf('<div class="px-2 border-left border-right"><i class="fa fa-cogs text-primary mr-1"></i><span>%s</span></div>', $row['XuatXu']);
                                $s .= '</div>';
                                $s .= sprintf('<a class="btn btn-primary px-3" href="detail.php?id=%s">%s VND</a>', $row['IDSP'], number_format($row['GiaBan'], 0, '', ','));
                                $s .= '</div>';
                                $s .= '</div>';
                            }
                        }
                        if(mysqli_num_rows($result1)>0){
                            while($row1 = mysqli_fetch_assoc($result1)){
                                
                                $s .= '<div class="col-lg-4 col-md-6 mb-2">';
                                $s .= '<div class="rent-item mb-4">';
                                $s .= sprintf('<a href="detail.php?id=%s&type=accessory"><img class="img-fluid mb-4" style="width: 300px; height: 200px" src="%s"></a>', $row1['IDPK'], $row1['Url_image']);
                                $s .= sprintf('<h4 class="text-uppercase mb-4">%s</h4>', $row1['TenPK']);
                                $s .= '<div class="d-flex justify-content-center mb-4">';
                                $s .= sprintf('<div class="px-2 border-left border-right"><i class="fa fa-cogs text-primary mr-1"></i><span>Số Lượng: %s</span></div>', $row1['SoLuong']);
                                $s .= '</div>';
                                $s .= sprintf('<a class="btn btn-primary px-3" href="detail.php?id=%s">%s VND</a>', $row1['IDPK'], number_format($row1['Gia'], 0, '', ','));
                                $s .= '</div>';
                                $s .= '</div>';
                            }
                        }
                        echo($s);
                    }  
                    
                 ?>
            </div>
        </div>
    </div>
    <?php 
    echo "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++){
        if(isset($_GET['search'])){
            echo "<li><a href='car.php?page=".$i."&type=".$type."&search=".$_GET['search']."'";
            if($i==$current_page) echo "class='active'";
                echo ">".$i."</a></li>";
        }
        else{
            for ($i = 1; $i <= $total_pages; $i++){
                echo "<li><a href='car.php?page=".$i."&type=".$type."'";
                if($i==$current_page) echo "class='active'";
                echo ">".$i."</a></li>";
            }
        }
    }
    
    echo "</ul>";
    ?>
    <!-- Rent A Car End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0">
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-secondary d-flex align-items-center justify-content-between" style="height: 350px;">
                        <img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-4" src="img/banner-left.png" alt="">
                        <div class="text-right">
                            <h3 class="text-uppercase text-light mb-3">Want to be driver?</h3>
                            <p class="mb-4">Lorem justo sit sit ipsum eos lorem kasd, kasd labore</p>
                            <a class="btn btn-primary py-2 px-4" href="">Start Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
                        <div class="text-left">
                            <h3 class="text-uppercase text-light mb-3">Looking for a car?</h3>
                            <p class="mb-4">Lorem justo sit sit ipsum eos lorem kasd, kasd labore</p>
                            <a class="btn btn-primary py-2 px-4" href="">Start Now</a>
                        </div>
                        <img class="img-fluid flex-shrink-0 mr-n5 w-50 ml-4" src="img/banner-right.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>info@example.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private Policy</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Affiliate Programme</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Return & Refund</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Newsletter</h4>
                <p class="mb-4">Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
                <div class="w-100 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
                <i>Lorem sit sed elitr sed kasd et</i>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.</p>
        
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="ajax.js"></script>
    <script>
        function toggleModal(e) {
            console.log(e.target);
	        modal.classList.toggle('hide')
        }

        var btnOpen = document.querySelectorAll('.open-modal-btn');
        for (var i = 0; i < btnOpen.length; i++) {
            btnOpen[i].addEventListener('click', toggleModal);
            console.log(btnOpen[i]);
        }

        var iconClose = document.querySelectorAll('.modal_header123 i');
        for (var i = 0; i < iconClose.length; i++) {
            iconClose[i].addEventListener('click', toggleModal);
            console.log(iconClose[i]);
        }

        var modal = document.querySelector('.modal123')
        modal.addEventListener('click', function(e){
            if(e.target==currenTarget){
                toggleModal()
            }
	    })
    </script>
</body>

</html>