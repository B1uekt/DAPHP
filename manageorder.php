<!DOCTYPE html>
<?php
     session_start();
     $severname= "localhost";
     $username = "root";
     $password ="";
     $dbname = "sql_daphp";
     $conn = mysqli_connect($severname,$username,$password,$dbname);
     if(isset($_REQUEST['filter']) && $_REQUEST['filter'] == 'filter' && $_REQUEST['page'] == 1){
        $_SESSION['product_filter'] = $_REQUEST;
        if(!empty($_SESSION['product_filter'])){
            $where = "";
            $from ="";
            foreach($_SESSION['product_filter'] as $field => $value){
                if(!empty($value)){  
                    switch($field){
                            case 'provinces':
                                $from = " ,khachhang";
                                $where .=(!empty($where)) ? " AND " ." khachhang.MaKH = donhang.MaKH AND DiaChi LIKE '%".$value."%'":"khachhang.MaKH = donhang.MaKH AND DiaChi LIKE '%".$value."%'";   
                                break;
                            case 'status':
                                $where .=(!empty($where))?" AND "." TrangThaiDH ='".$value."'":"TrangThaiDH ='".$value."'";
                                break;
                            case 'price':
                                $max = (double)$_REQUEST['max'];
                                $min = (double)$_REQUEST['min'];
                                $where .= (!empty($where))? sprintf(" AND Gia <= %d AND Gia >= %d",$max,$min) : sprintf("Gia <= %d AND Gia >= %d",$max,$min);
                                break;
                            case 'date':
                                $min_date = date("Y-m-d", strtotime($_REQUEST['min-date']));
                                $max_date = date("Y-m-d", strtotime($_REQUEST['max-date']));
                                $where .=  (!empty($where))? sprintf(" AND NgayGiao BETWEEN '%s' AND '%s'",$min_date,$max_date):sprintf("NgayGiao BETWEEN '%s' AND '%s' ",$min_date,$max_date);
                                break;

                    }
                }
            }
        }
    }else{
            $_SESSION['product_filter'] = $_REQUEST;
            if(!empty($_SESSION['product_filter'])){
                $where = "";
                $from ="";
                foreach($_SESSION['product_filter'] as $field => $value){
                    if(!empty($value)){  
                        switch($field){
                                case 'provinces':
                                    $from = ",khachhang";
                                    $where .=(!empty($where)) ? " AND " ." khachhang.MaKH = donhang_pk.MaKH AND DiaChi LIKE '%%".$value."%%'":"khachhang.MaKH = donhang_pk.MaKH AND DiaChi LIKE '%%".$value."%%'";   
                                    break;
                                case 'status':
                                    $where .=(!empty($where))?" AND "." TrangthaiDH ='".$value."'":"TrangthaiDH ='".$value."'";
                                    break;
                                case 'price':
                                    $max = (double)$_REQUEST['max'];
                                    $min = (double)$_REQUEST['min'];
                                    $where .= (!empty($where))? sprintf(" AND Gia <= %d AND Gia >= %d",$max,$min) : sprintf("Gia <= %d AND Gia >= %d",$max,$min);
                                    break;
                                case 'date':
                                    $min_date = date("Y-m-d", strtotime($_REQUEST['min-date']));
                                    $max_date = date("Y-m-d", strtotime($_REQUEST['max-date']));
                                    $where .=  (!empty($where))? sprintf(" AND NgayGiao BETWEEN '%s' AND '%s'",$min_date,$max_date):sprintf("NgayGiao BETWEEN '%s' AND '%s' ",$min_date,$max_date);
                                    break;
                        }
                    }
                }
            }   
        }
    if(!$conn){
         die("Connection failed". mysqli_connect_error($conn));
    }
    if(!empty($where)){
        if($_REQUEST['page'] == 1){
            $sql = "SELECT * FROM donhang".$from." WHERE ".$where;
        }
        else{
            $sql = "SELECT * FROM donhang_pk".$from." WHERE ".$where;
        }
    }
    else{
        if($_REQUEST['page'] ==1 )
            $sql = "SELECT * FROM donhang";
        else
            $sql = "SELECT * FROM donhang_pk";
    }
    $result = mysqli_query($conn,$sql);
?>
<html>
    <head>
        <title>Manage Product</title>
        <!--CSS link-->
        <link rel="stylesheet" href="grid.css">
        <link rel="stylesheet" href="styleorder.css">
        <!--Font link-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!--Icon link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="ajax.js"></script>
    </head>
    <body>
        <div class="model-0 hide">
            <div class="model-inner-0">  
                <div class="model-header-0 d-flex">
                    <div class="header-form"><h3>UPDATE YOUR ORDER</h3></div>
                    <i class="fa fa-window-close"></i>
                </div>
                <div class="model-body-0">
                    <form action="updateorder.php" method="post" enctype="multipart/form-data">
                        <?php
                            if($_REQUEST['page']== 1){
                        ?>
                            <input type="hidden" name="id" value ="1">
                        <?php
                            }else{
                        ?>
                            <input type="hidden" name="id" value ="2">
                        <?php
                            }
                        ?>
                        <div class="container-price-cate my-3 d-flex">
                            <div class="price">
                                <label for="cus-number">Customer Number</label><br>
                                <input class="float-left price-cate" type="text" id="cus-number" name="cus-number" value="">
                            </div>
                            <div class="cate">
                                <label for="pro-number">Product Number</label><br>
                                <input class="float-left price-cate" type="text" id="pro-number" name="pro-number" value="">
                            </div>
                        </div>
                        <div class="container-price-cate my-3 d-flex">
                            <div class="price">
                                <label for="price">Total Price</label><br>
                                <input class="float-left price-cate" type="text" id="price" name="price" value="">
                            </div>
                            <div class="cate">
                                <label for="status">Status</label></label><br>
                                <select class="float-left price-cate"  name="status" id="status">
                                    <option value="">Choose Status</option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Preparing">Preparing</option>
                                    <option value="Shipped">Shipped</option>
                                </select> 
                            </div>
                        </div>
                        <div class="container-price-cate my-3 d-flex">
                            <div class="price">
                                <label for="date">Delivery Day</label><br>
                                <input class="float-left price-cate" type="date" id="date" name="date">
                            </div>
                            <?php
                                if($_REQUEST['page']==2){
                            ?>
                                <div class="price">
                                    <label for="quantity">Quantity</label><br>
                                    <input class="float-left price-cate" type="text" id="quantity" name="quantity" value="">
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <input class="submit" type="submit" name="submit" value="SUBMIT">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2 nav float-left">
            <h2 style="color:#F77D0A;padding-bottom: 20px;">ROYAL CARS</h2>
            <div class="nav-item"><a href="admin.php"><span class="material-symbols-outlined">home</span>Home</a></div>
            <button class="dropdown-btn"><span t class="material-symbols-outlined">category</span>Manage Products</button>
            <div class="dropdown-container">
            <a href="manageproduct.php?page=1">ALL CAR</a>
                <a href="manageproduct.php?page=2">TWO-SEATER CAR</a>
                <a href="manageproduct.php?page=3">FOUR-SEATER CAR</a>
                <a href="manageproduct.php?page=4">ACCESSORY</a>
            </div>
            <div class="nav-item"><a href="manageuser.php"><span class="material-symbols-outlined">manage_accounts</span>Manage Users</a></div>
            <button class="dropdown-btn"><span class="material-symbols-outlined">list_alt</span>Manage Orders</button>
            <div class="dropdown-container">
                <a href="manageorder.php?page=1">CAR</a>
                <a href="manageorder.php?page=2">ACCESSORY</a>
            </div>
        </div>
        <div class="col-10" style="margin-left:16.66%">
            <h1><i class="fa fa-gear" style="font-size:24px"></i>Manage Order</h1>
            <div class="my-4 sort-search">     
                <form>
                    <div  class="d-flex filter-order">
                        <div class="choose">
                            <select name= "provinces" id="provinces">
                                <option value="">Choose Province</option>
                                <option value="An Giang">An Giang
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
                                <option value="Bắc Giang">Bắc Giang
                                <option value="Bắc Kạn">Bắc Kạn
                                <option value="Bạc Liêu">Bạc Liêu
                                <option value="Bắc Ninh">Bắc Ninh
                                <option value="Bến Tre">Bến Tre
                                <option value="Bình Định">Bình Định
                                <option value="Bình Dương">Bình Dương
                                <option value="Bình Phước">Bình Phước
                                <option value="Bình Thuận">Bình Thuận
                                <option value="Bình Thuận">Bình Thuận
                                <option value="Cà Mau">Cà Mau
                                <option value="Cao Bằng">Cao Bằng
                                <option value="Đắk Lắk">Đắk Lắk
                                <option value="Đắk Nông">Đắk Nông
                                <option value="Điện Biên">Điện Biên
                                <option value="Đồng Nai">Đồng Nai
                                <option value="Đồng Tháp">Đồng Tháp
                                <option value="Đồng Tháp">Đồng Tháp
                                <option value="Gia Lai">Gia Lai
                                <option value="Hà Giang">Hà Giang
                                <option value="Hà Nam">Hà Nam
                                <option value="Hà Tĩnh">Hà Tĩnh
                                <option value="Hải Dương">Hải Dương
                                <option value="Hậu Giang">Hậu Giang
                                <option value="Hòa Bình">Hòa Bình
                                <option value="Hưng Yên">Hưng Yên
                                <option value="Khánh Hòa">Khánh Hòa
                                <option value="Kiên Giang">Kiên Giang
                                <option value="Kon Tum">Kon Tum
                                <option value="Lai Châu">Lai Châu
                                <option value="Lâm Đồng">Lâm Đồng
                                <option value="Lạng Sơn">Lạng Sơn
                                <option value="Lào Cai">Lào Cai
                                <option value="Long An">Long An
                                <option value="Nam Định">Nam Định
                                <option value="Nghệ An">Nghệ An
                                <option value="Ninh Bình">Ninh Bình
                                <option value="Ninh Thuận">Ninh Thuận
                                <option value="Phú Thọ">Phú Thọ
                                <option value="Quảng Bình">Quảng Bình
                                <option value="Quảng Bình">Quảng Bình
                                <option value="Quảng Ngãi">Quảng Ngãi
                                <option value="Quảng Ninh">Quảng Ninh
                                <option value="Quảng Trị">Quảng Trị
                                <option value="Sóc Trăng">Sóc Trăng
                                <option value="Sơn La">Sơn La
                                <option value="Tây Ninh">Tây Ninh
                                <option value="Thái Bình">Thái Bình
                                <option value="Thái Nguyên">Thái Nguyên
                                <option value="Thanh Hóa">Thanh Hóa
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế
                                <option value="Tiền Giang">Tiền Giang
                                <option value="Trà Vinh">Trà Vinh
                                <option value="Tuyên Quang">Tuyên Quang
                                <option value="Vĩnh Long">Vĩnh Long
                                <option value="Vĩnh Phúc">Vĩnh Phúc
                                <option value="Yên Bái">Yên Bái
                                <option value="Phú Yên">Phú Yên
                                <option value="Cần Thơ">Cần Thơ
                                <option value="Đà Nẵng">Đà Nẵng
                                <option value="Hải Phòng">Hải Phòng
                                <option value="Hà Nội">Hà Nội
                                <option value="HCM">HCM
                            </select>
                        </div>
                        <div class="choose" >
                            <select name="status" id="stauts">
                                <option value="">Choose Status</option>
                                <option value="Canceled">Canceled</option>
                                <option value="Preparing">Preparing</option>
                                <option value="Shipped">Shipped</option>
                            </select> 
                        </div>
                        <div class="min-price"><input type="text" onchange="addprice()" name="min" id="min" placeholder="&nbsp MIN PRICE"></div>
                        <div class="max-price"><input type="text" onchange="addprice()" name="max" id="max" placeholder="&nbsp MAX PRICE"></div>
                        <div class="min-price">  
                            
                            <label for="max-date">From:</label>
                            <input onchange="adddate()" type="date" id="min-date" name="min-date" value="<?php echo $_GET['min-date'] ?? ''; ?>">
                        </div>
                        <div class="max-price">
                            <label for="max-date">To:</label>
                            <input onchange="adddate()" type="date" id="max-date" name="max-date" value="<?php echo $_GET['max-date'] ?? ''; ?>">
                        </div>
                        <input type="hidden" name="page" value = "<?=$_REQUEST['page']?>">
                        <button type="submit"  value = "filter" name ="filter"><i class="fa fa-filter"></i></button>
                    </div>
                </form>
            </div>

            <div class="container-fluid all-p">
                <div class="container-fluid row-title d-flex my-3">
                    <div class="col-2 text-center title">CUSTOMER NUMBER</div>
                    <?php
                        if($_REQUEST['page'] == 1){
                    ?>
                        <div class="col-2 text-center title">PRODUCT NUMBER</div>
                    <?php
                        }else{
                    ?>
                         <div class="col-1 text-center title">PRODUCT NUMBER</div>
                    <?php
                        }
                        if($_REQUEST['page']==2){
                    ?>
                        <div class="col-1 text-center title">QUANTITY</div>
                    <?php
                        }
                    ?>
                    <div class="col-2 text-center title">DELIVERY DAY</div>
                    <div class="col-2 text-center title">TOTAL PRICE</div>
                    <div class="col-2 text-center title">STATUS</div>
                    <div class="col-2 text-center title">UPDATE/DELETE</div>
                </div>
                <?php
                    if($_REQUEST['page']==1){   
                        $s = '';
                            while($row = mysqli_fetch_assoc($result)){
                            
                            $s.='<div class="conatiern-fluid row-order d-flex">';
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p>%s</p></div>',$row['MaKH']);
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p>%s</p></div>',$row['MaSP']);
                            if (!empty($row['NgayGiao'])) {
                                $date = date("d-m-Y", strtotime($row['NgayGiao']));
                            }
                            else {
                                $date = null;
                            }
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p>%s</p></div>',$date);
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p> %d VND</p></div>',$row['Gia']);
                            $s.=sprintf('<div class="col-2 text-center order status my-2"><p>%s</p></div>',$row['TrangThaiDH']);
                            $s.='<div class="col-2 text-center product btn-de-up my-2">';
                            $s .= sprintf('<button onclick="UpdateForm3(this)" name="update" value=%s class="btn but-update">UPDATE</button>',$row['MaDH']);
                            /*if($row['TrangThaiDH'] != 'Shipped'){
                                $s.= sprintf('<a href="deleteorder.php?id=%s&page=%s" onclick="YesorNo()" class="btn but-delete ">DELETE</a>',$row['MaDH'],$_REQUEST['page']);
                            }*/    
                            $s.='</div>';
                            $s.='</div>';
                        
                        }
                        echo($s);
                    }else{
                        $s = '';
                        while($row = mysqli_fetch_assoc($result)){
                            $s.='<div class="conatiern-fluid row-order d-flex">';
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p>%s</p></div>',$row['MaKH']);
                            $s.=sprintf('<div class="col-1 text-center order my-2"><p>%s</p></div>',$row['MaPK']);
                            $s.=sprintf('<div class="col-1 text-center order my-2"><p>%d</p></div>',$row['SoLuong']);
                            if (!empty($row['NgayGiao'])) {
                                $date = date("d-m-Y", strtotime($row['NgayGiao']));
                            }
                            else {
                                $date = null;
                            }
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p>%s</p></div>',$date);
                            $s.=sprintf('<div class="col-2 text-center order my-2"><p> %d VND</p></div>',$row['Gia']);
                            $s.=sprintf('<div class="col-2 text-center order status my-2"><p>%s</p></div>',$row['TrangthaiDH']);
                            $s.='<div class="col-2 text-center product btn-de-up my-2">';
                            $s .= sprintf('<button onclick="UpdateForm4(this)" name="update" value=%s class="btn but-update">UPDATE</button>',$row['MaDHPK']);
                            /*if($row['TrangthaiDH'] != 'Shipped'){
                                $s.= sprintf('<a href="deleteorder.php?id=%s&page=%s" onclick="YesorNo()" class="btn but-delete ">DELETE</a>',$row['MaDHPK'],$_REQUEST['page']);
                            }*/
                            $s.='</div>';
                            $s.='</div>';
                        
                        }
                        echo($s);
                    }
                ?>
        </div>
        <script>
            $(document).ready(function() {
              $('.row-order .status').each(function() {
                if ($(this).text().toLowerCase().includes('shipped')) {
                  $(this).css('background-color', 'rgba(0, 231, 79, 0.5)');
                } else if ($(this).text().toLowerCase().includes('preparing')) {
                  $(this).css('background-color','rgba(255, 217, 71, 0.5)');
                }else if ($(this).text().toLowerCase().includes('canceled')) {
                  $(this).css('background-color','rgba(255, 99, 71, 0.5)');
                }
              });
            });
          </script>
          <script>
            function toggleDropdown(){
                var dropdown = document.querySelector('.dropdown-button');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                } else {
                    dropdown.classList.add('show');
                }
            }
        </script>
        <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;
            
            for (i = 0; i < dropdown.length; i++) {
              dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                  dropdownContent.style.display = "none";
                } else {
                  dropdownContent.style.display = "block";
                }
              });
            }
            
            var buttonGroups =document.querySelectorAll('.btn-de-up')
            var model0= document.querySelector('.model-0');
            var icon0 = document.querySelector('.model-header-0 i');
            var submit = document.querySelector('.submit')
            function toggleCLose2(){
                model0.classList.add('hide');
            }
            buttonGroups.forEach(group => {
                const deleteButton = group.querySelector('.but-update');
                 deleteButton.addEventListener('click', () => {
                    model0.classList.remove('hide');
                });
            });
            icon0.addEventListener('click',  toggleCLose2);
            submit.addEventListener('click', toggleCLose2);

            function YesorNo(){
                confirm('DO YOU WANT TO DELETE THIS ORDER ?')
            }

            function addprice(){
                var min = document.getElementById('min');
                var max = document.getElementById('max');
                var inputForm1 = min.form;
                if(min.value != "" || max.value != ""){  
                        var inputHidden1 = document.createElement("input");
                        inputHidden1.type = "hidden";
                        inputHidden1.name = "price";
                        inputHidden1.value = "1";
                        inputForm1.appendChild(inputHidden1);
                }
            }
            function adddate(){
                var max_date = document.getElementById('max-date');
                var min_date =  document.getElementById('min-date');
                var inputForm2 = min_date.form;
                if(!min_date.value || !max_date.value){
                        var inputHidden2 = document.createElement("input");
                        inputHidden2.type = "hidden";
                        inputHidden2.name = "date";
                        inputHidden2.value = "1";
                        inputForm2.appendChild(inputHidden2);
                }
            }
        </script>
    </body>
</html>