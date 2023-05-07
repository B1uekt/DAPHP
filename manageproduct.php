<!DOCTYPE html>
<html>
    <?php
            $severname= "localhost";
            $username = "root";
            $password ="";
            $dbname = "sql_daphp";
            $conn = mysqli_connect($severname,$username,$password,$dbname);
            if(!$conn){
                die("Connection failed". mysqli_connect_error($conn));
            } 
            if(isset($_REQUEST['search'])){
                $content = $_REQUEST['key'];
                if($_REQUEST['page'] == 1)
                    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%".$content."%';";
                else if($_REQUEST['page'] == 2)
                    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%".$content."%' AND MaLoai = N'xe 2 chỗ'";
                else if($_REQUEST['page'] == 3)
                    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%".$content."%' AND MaLoai = N'xe 4 chỗ'";
                else 
                    $sql = "SELECT * FROM phukien WHERE TenPK LIKE '%".$content."%';";
                $result = mysqli_query($conn,$sql); 
            }else if(isset($_REQUEST['filter'])){
                $min=(double)$_REQUEST['1-price']; 
                $max=(double)$_REQUEST['2-price'];
                if($_REQUEST['page'] == 1){
                    $sql = sprintf("SELECT * FROM sanpham WHERE GiaBan <= %d and GiaBan >= %d ",$max,$min);
                }else if($_REQUEST['page'] ==2){
                    $sql = sprintf("SELECT * FROM sanpham WHERE GiaBan<= %d and GiaBan >= %d AND MaLoai = N'xe 2 chỗ'",$max,$min);
                }else if($_REQUEST['page'] ==3){
                    $sql = sprintf("SELECT * FROM sanpham WHERE GiaBan<= %d and GiaBan >= %d AND MaLoai = N'xe 4 chỗ'",$max,$min); 
                }
                else{
                    $sql = sprintf("SELECT * FROM phukien WHERE Gia <= %d and Gia >= %d ",$max,$min); 
                }
                $result = mysqli_query($conn,$sql); 
            }else{
                if(isset($_REQUEST['page'] )){
                    if($_REQUEST['page'] == 1){
                        $sql = "SELECT * FROM sanpham;";
                    }
                    else if($_REQUEST['page'] == 2){
                        $sql = "SELECT * FROM sanpham WHERE MaLoai = N'xe 2 chỗ';";
                    }
                    else if($_REQUEST['page'] == 3){
                        $sql = "SELECT * FROM sanpham WHERE MaLoai = N'xe 4 chỗ';";
                    }
                    else{
                            $sql = "SELECT * FROM phukien ;";
                        }
                    $result = mysqli_query($conn,$sql); 
                } 
            }

    ?>
    <head>
        <title>Manage Product</title>
        <!--CSS link-->
        <link rel="stylesheet" href="grid.css">
        <link rel="stylesheet" href="stylemanage.css">
        <!--Font link-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!--Icon link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="ajax.js"></script>
    </head>
    <body>
        <div class="model-0 hide">
            <div class="model-inner-0">  
                <div class="model-header-0 d-flex">
                    <div class="header-form"><h3>UPDATE YOUR PRODUCT</h3></div>
                    <i class="fa fa-window-close"></i>
                </div>
                <div class="model-body-0">
                    <form method="post" action="updateproduct.php" enctype="multipart/form-data">
                        <?php
                            if($_REQUEST['page'] == 1 || $_REQUEST['page'] == 2 || $_REQUEST['page'] == 3){
                        ?>
                            <input type="hidden" id="loaiSP" name="loaiSP" value="1" />
                        <?php
                            }else{
                        ?>
                            <input type="hidden" id="loaiSP" name="loaiSP" value="2" />
                        <?php
                            }
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
                        </div><br>
                        <label for="descr">Product description</label><br>
                        <textarea class="descr" id="descr" name="descr" rows="4" cols="70"></textarea>
                        <div class="container-price-cate my-3 d-flex">
                            <div class="price">
                                <label for="price">Price</label><br>
                                <input class="float-left price-cate" type="text" id="price" name="price" value="">
                            </div>
                        <?php
                            if($_REQUEST['page'] == 1 || $_REQUEST['page'] == 2 || $_REQUEST['page'] == 3){
                        ?>
                            <div class="cate">
                                <label for="cate">Category</label><br>
                                <select class="price-cate" name="cate" id="cate">
                                    <option value="-1">Choose</option>
                                    <option value="xe 2 chỗ">TWO-SEATER</option>
                                    <option value="xe 4 chỗ">FOUR-SEATER</option>
                                </select>
                            </div>
                        <?php
                            }
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
                            if($_REQUEST['page'] == 1 || $_REQUEST['page'] == 2 || $_REQUEST['page'] == 3){
                        ?>
                            <div class="id-number my-3">
                                <label for="year">Year Of Manufacture</label><br>
                                <input type="text" name="year" id="year"> 
                            </div>
                        <?php
                            }
                        ?>
                        <div class="id-number my-3">
                            <label for="id">ID Product</label><br>
                            <input type="text" name="id" id="id"> 
                        </div>
                        <input class="submit" name="submit" type="submit" value="SUBMIT">
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
            <h1><i class="fa fa-gear" style="font-size:24px"></i>Manage Product</h1>
            
            <div class="new-p my-3">
                <a href="addproduct.php"><i class="fa fa-plus-circle" style="margin-right: 10px;"></i>ADD NEW PRODUCT</a>   
            </div>
            
            <div class="my-4 sort-search d-flex">     
                <form class="col-4" action="">
                    <div class="search d-flex">
                        <input type="hidden" name="page" value ="<?=$_REQUEST['page']?>">
                        <input type="text" name="key" placeholder="&#160;&#160;&#160;Search here" style = "width:100%">     
                        <button type="submit" name="search" value ="search" style="font-size:30px;margin-left:3px; margin-top: auto; margin-bottom:auto;"><span style="color: #F77D0A" class="material-symbols-outlined">search</span></button>
                    </div>
                </form>
                <div class="sort" onclick="toggleDropdown()">
                    <i style = "color: #F77D0A" class="fa fa-sort" style="font-size:30px;"></i>
                    <div class="dropdown-button">
                        <form action="">
                            <input type="hidden" name="page" value ="<?=$_REQUEST['page']?>">
                            <div class="filter" style="text-align: left;">
                            <label for="1-price">Min Price:</label>
                                <input type="text" id="1-price" name="1-price"><br><br>
                                <label for="2-price">Max Price:</label>
                                <input type="text" id="2-price" name="2-price"><br><br>
                            </div>
                            <button class="filter-btn" type="submit" name="filter" value="filter">FILTER</button>
                        </form>      
                    </div>
                </div>   
            </div>

            <div class="container-fluid all-p">
                <div class="container-fluid row-title d-flex my-3">
                    <div class="col-1 text-center title">ID</div>
                    <div class="col-1 text-center title">IMAGE</div>
                    <?php
                        if($_REQUEST['page'] == 1 || $_REQUEST['page'] == 2 || $_REQUEST['page'] == 3){
                    ?>   
                        <div class="col-2 text-center title">NAME OF PRODUCT</div>
                    <?php
                        }else{
                    ?>
                        <div class="col-4 text-center title">NAME OF PRODUCT</div>
                    <?php
                        }
                    ?>
                    <div class="col-2 text-center title">PRICE</div>
                    <?php
                        if($_REQUEST['page'] == 1 || $_REQUEST['page'] == 2 || $_REQUEST['page'] == 3){
                    ?>   
                        <div class="col-1 text-center title">YEAR</div>
                        <div class="col-2 text-center title">TYPE</div>
                    <?php
                        }if($_REQUEST['page']== 4){
                    ?>
                       <div class="col-2 text-center title">QUANTITY</div>
                    <?php
                        }else{
                    ?>
                        <div class="col-2 text-center title">QUANTITY</div>
                    <?php
                        }
                    ?>
                    <div class="col-2 text-center title">UPDATE/DELETE</div>
                </div>
                
                <?php
                    if($_REQUEST['page'] == 1 || $_REQUEST['page'] == 2 || $_REQUEST['page'] == 3){
                        $s = '';
                        while($row = mysqli_fetch_assoc($result)){
                            $s .='<div class="conatiern-fluid row-product d-flex">';
                            $s .= sprintf('<div class="col-1 text-center product"><p>%s</p></div>',$row['MaSP']);
                            $s .= sprintf('<div class="col-1 product"><img src="%s" alt=""></div>',$row['Url_image']);
                            $s .= sprintf('<div class="col-2 text-center product"><p>%s</p></div>',$row['TenSP']);
                            $s .= sprintf('<div class="col-2 text-center product">%s vnd</div>',number_format($row['GiaBan'], 0, '', ','));
                            $s .= sprintf('<div class="col-1 text-center product"><p>%s</p></div>',$row['NamSX']);
                            $s .= sprintf('<div class="col-2 text-center product"><p>%s</p></div>',$row['MaLoai']);
                            $s .= sprintf('<div class="col-2 text-center product"><p>%s</p></div>',$row['SoLuong']);
                            $s .='<div class="col-2 text-center product btn-de-up">';
                            $s .= sprintf('<button onclick="UpdateForm1(this)" name="update" value=%s class="btn but-update">UPDATE</button>',$row['MaSP']);
                            $s .=sprintf('<a href="deleteproduct.php?MaSP=%s" onclick="YesorNo()"  class="btn but-delete ">DELETE</a>',$row['MaSP']);
                            $s .='</div>';
                            $s .='</div>';
                        }
                    }
                    else{
                        $s = '';
                        while($row = mysqli_fetch_assoc($result)){
                            $s .='<div class="conatiern-fluid row-product d-flex">';
                            $s .= sprintf('<div class="col-1 text-center product"><p>%s</p></div>',$row['MaPK']);
                            $s .= sprintf('<div class="col-1 product"><img src="%s" alt=""></div>',$row['Url_image']);
                            $s .= sprintf('<div class="col-4 text-center product"><p>%s</p></div>',$row['TenPK']);
                            $s .= sprintf('<div class="col-2 text-center product">%s vnd</div>',number_format($row['Gia'], 0, '', ','));
                            $s .= sprintf('<div class="col-2 text-center product"><p>%d</p></div>',$row['SoLuong']);
                            $s .='<div class="col-2 text-center product btn-de-up">';
                            $s .= sprintf('<button onclick="UpdateForm2(this)" type="submit" name="update" value=%s class="btn but-update">UPDATE</button>',$row['MaPK']);
                            $s .= sprintf('<a href="deleteproduct.php?MaSP=%s" onclick="YesorNo()"  class="btn but-delete ">DELETE</a>',$row['MaPK']);
                            $s .='</div>';
                            $s .='</div>';
                        }
                    }
                    echo($s);
                ?>
            </div>
        </div>
        <!-- Su kien onclick cua div-sort -->
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
        <!--Open Close Model-->
        <script>
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
        </script>
        <script>
            /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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

            function YesorNo(){
                confirm('DO YOU WANT TO DELETE THIS PRODUCT ?')
            }
        </script>
    </body>
</html>