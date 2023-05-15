<!DOCTYPE html>
<?php
    $id = $_REQUEST['ID'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sql_daphp";
    $page = $_REQUEST['page'];
  
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($page == 1){
        $sql =sprintf("SELECT d.*,k.*,s.* FROM donhang  d, khachhang k, sanpham s WHERE MaDH = '%s' and d.MaKH = k.MaKH and d.MaSP = s.MaSP",$id);
    }else{
        $sql =sprintf("SELECT d.*, k.*, p.TenPK, p.Gia, p.Url_image, p.MoTa FROM donhang_pk  d, khachhang k, phukien p WHERE MaDHPK = '%s' and d.MaKH = k.MaKH and d.MaPK = p.MaPK",$id);  
    }
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result)
?>
<html>
    <head>
        <link rel="stylesheet" href="grid.css">
        <link rel="stylesheet" href="orderdetail.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <a style="margin-top: 32px" class="home" href="manageorder.php?page=<?=$_REQUEST['page']?>"><i class="material-icons">home</i></a>
        <div class="container d-flex" style="margin-top: 96px">
            <div class="col-4 information">
                <div class="name">
                    <h1>Orderer's Name</h1>
                    <h3><?=$row['TenKH']?></h3>
                </div>
                <div class="date">
                    <h1>Order Date</h1>
                    <h4><?=date("d-m-Y", strtotime($row['NgayDat']))?></h4>
                </div>
                <div class="img">
                <img  style ="width:100%" src="<?=$row['Url_image']?>" alt="">
                </div>
            </div>
            <div class="col-4 information">
                <div class="product" style="height: 80px">
                    <h5>Name</h5>
                    <?php if($_REQUEST['page']==1){?>
                        <h3><?=$row['TenSP']?></h3>
                    <?php }else{ ?>
                        <h3><?=$row['TenPK']?></h3>
                    <?php } ?>
                 </div>
                <div class="product" style="height: 80px">
                    <h5>Quantity</h5>
                    <?php if ($_REQUEST['page']==1){ ?>
                    <h3>1</h3>
                    <?php }else{ ?>
                    <h3><?=$row['SoLuong']?></h3>
                    <?php } ?>
                </div>
                <div class="product" style="height: 80px">
                    <h5>Cost</h5>
                    <h3><?=number_format($row['Gia'], 0, '', ',')?> VND</h3>
                </div>
                <div class="product" style="height: 80px">
                    <h5>Status</h5>
                    <?php if($_REQUEST['page']==1){?>
                        <h3><?=$row['TrangThaiDH']?></h3>
                    <?php }else{ ?>
                        <h3><?=$row['TrangthaiDH']?></h3>
                    <?php } ?>
                </div>
            </div>
            <div class="col-4 information">
                    <div class="user" style="height: 80px">
                        <h3>Address <i class="fa fa-address-card"></i></h1> 
                        <p><?=$row['DiaChi']?></p>
                    </div>
                    <div class="user" style="height: 80px">
                        <h3>Phone <i class="fa fa-phone"></i></h3>
                        <p><?=$row['SDT']?></p>
                    </div>
                    <div class="user" style="height: 80px">
                        <h3>Email <i class="material-icons">email</i></h3>
                        <p><?=$row['Email']?></p>
                    </div>
                    <div class="user" style="height: 80px">
                        <h3>Email <i class="material-icons">email</i></h3>
                        <p><?=$row['Email']?></p>
                    </div>
              
            </div>
        </div>
    </body>
</html>
