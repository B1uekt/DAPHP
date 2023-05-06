<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_order.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sql_daphp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    if($_GET['type']=='car'){
        $id = $_GET['IDDH'];
        //var_dump($id);
        
        $sql1 = "SELECT * FROM hoadon h, donhang d WHERE h.MaDH = d.MaDH and IDDH = '$id'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        //var_dump($row1['MaDH']);
    }
    else{
        $id = $_GET['IDDHPK'];

        $sql2 = "SELECT * FROM hoadon_pk h, donhang_pk d WHERE h.MaHDPK = d.MaHDPK and IDDHPK = '$id' ";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        //var_dump($row2['MaDHPK']);
    }

     ?>
    <a href="account-setting.php"><button type="button" class="btn btn-outline-primary" style="border-color: #2298ff; margin-left: 100px; margin-top: 100px; width: 50px;" ><i class="fa-solid fa-backward"></i></button></a>
    <div class="container">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <?php 
            
            if($_GET['type']=='car'){
                echo('<h6>Order ID:' .$row1['MaDH'].'</h6>');
            }
            else {
                echo('<h6>Order ID:' .$row2['MaDHPK'].'</h6>');
            }
             ?>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Date Order:</strong><br><?php 
                    if($_GET['type']=='car'){
                        echo($row1['NgayDat']);
                    }
                    else{
                        echo($row2['NgayDat']);
                    }   
                    ?></div>
                
                    <div class="col"> <strong>Status:</strong> <br> <?php 
                    if($_GET['type']=='car'){
                        echo($row1['TrangThaiDH']); 
                    }
                    else {
                        echo($row2['TrangthaiDH']); 
                    }

                    ?> </div>
                    
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <?php  if($_GET['type']=='car'){
                        if($row1['TrangThaiDH']== 'Shipped'){ ?>
                            <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                        <?php }
                    }
                    else { ?>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <?php } ?>
            </div>
            
        </div>
        <hr>
      
    </div>
</body>
</html>