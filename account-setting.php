<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Account Settings UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleaccount.css">
	<link rel="stylesheet" type="text/css" href="css/style_order.css">
	<link rel="stylesheet" href="css/styleGH.css">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
	<?php 
		require_once('lib_session.php');
		$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "sql_daphp";

	    $conn = mysqli_connect($servername, $username, $password, $dbname);
	    if(!$conn){
	        die("Connection failed: " . mysqli_connect_error());
	    }
	    $sql = sprintf("SELECT * from khachhang where sdt = '%s'", $_SESSION['current_username']);
    	$result = mysqli_query($conn, $sql);


    	$sql1 = sprintf("SELECT * from khachhang k, donhang d, sanpham s where sdt = '%s' and k.MaKH = d.MaKH and s.MaSP = d.MaSP", $_SESSION['current_username']); 
    	$result1 = mysqli_query($conn, $sql1);
    	

    	$sql2 = sprintf("SELECT * from khachhang k, donhang_pk d, phukien p where sdt = '%s' and k.MaKH = d.MaKH and d.MaPK = p.MaPK", $_SESSION['current_username']); 
    	$result2 = mysqli_query($conn, $sql2);
    	//var_dump($row1['GiaBan']); 

		$sql3 = sprintf("SELECT * from khachhang where sdt = '%s'", $_SESSION['current_username']);
    	$result3 = mysqli_query($conn, $sql);
		$row3 = mysqli_fetch_assoc($result3);
	?>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<?php 
					$s = "";
					$row = mysqli_fetch_assoc($result);
					$s .= '<div class="p-4">';
					$s .= '<div class="img-circle text-center mb-3">';
					$s .= sprintf('<img src="%s" alt="Image" class="shadow">', $row['Img_user']);
					$s .= '</div>';
					$s .= sprintf('<h4 class="text-center">%s</h4>', $row['TenKH']);
					$s .= '</div>';
					$s .= '<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">';
					$s .= '<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">';
					$s .= '<i class="fa fa-home text-center mr-1"></i>';
					$s .= 'Account</a>';
					$s .= '<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">';
					$s .= '<i class="fa fa-key text-center mr-1"></i>';
					$s .= 'Password</a>';
					$s .= '<a class="nav-link" id="History-tab" data-toggle="pill" href="#history" role="tab" aria-controls="history" aria-selected="false">';
					$s .= '<i class="fa-solid fa-cart-shopping"></i>';
					$s .= 'Order</a>';
					$s .= '<a class="nav-link" href="index.php" role="tab" aria-controls="logout" aria-selected="false" style="padding-left: 24px;">';
					$s .= '<i class="fa-solid fa-right-from-bracket"></i>';
					$s .= 'Back To Home Page</a>';
					
					$s .= '</div>';
					$s .= '</div>';
					$s .= '<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">';
					$s .= '<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">';
					$s .= '<form action="update-user.php" method="post" enctype="multipart/form-data">';
					$s .= '<h3 class="mb-4">Account Settings</h3>';
					$s .= '<div class="row">';
					$s .= '<div class="col-md-6">';
					$s .= '<div class="form-group">';
					$s .= '<label>Name</label>';
					$s .= sprintf('<input name="user_name" type="text" class="form-control" value="%s">', $row['TenKH']);
					$s .= '</div>';
					$s .= '</div>';
					$s .= '<div class="col-md-6">';
					$s .= '<div class="form-group">';
					$s .= '<label>Email</label>';
					$s .= sprintf('<input name="user_email" type="text" class="form-control" value="%s">', $row['Email']);
					$s .= '</div>';
					$s .= '</div>';
					$s .= '<div class="col-md-6">';
					$s .= '<div class="form-group">';
					$s .= '<label>Phone number</label>';
					$s .= sprintf('<input name="user_sdt" type="text" class="form-control" value="%s" >', $row['SDT']);
					$s .= '</div>';
					$s .= '</div>';
					$s .= '<div class="col-md-6">';
					$s .= '<div class="form-group">';
					$s .= '<label>Address</label>';
					$s .= sprintf('<input name="user_diachi" type="text" class="form-control" value="%s">', $row['DiaChi']);
					$s .= '</div>';
					$s .= '</div>';
					echo($s);
					?>	
								<div class="col-md-6">
									<div class="form-group">
									  	<label>Upload file ảnh</label>
									  	<input class="form-control" type="file" placeholder="File hình SP"
	                                        name="fileToUpload">
									</div>
								</div>
							</div>
							<div>
								<button name="update" class="btn btn-primary">Update</button>
								<a href="index.php" class ="btn btn-light">Cancel</a>
								
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<form id="changepass" action="changepwd.php" method = "post">
						<?php echo '<input type="hidden" name="SDT" value="'.$row3['SDT'].'">'; ?>
							<h3 class="mb-4">Password Settings</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  	<label>Old password</label>
									  	<input type="password" id ="old" name="old" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  	<label>New password</label>
									  	<input type="password" id ="new" name = "new" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									  	<label>Confirm new password</label>
									  	<input type="password" name ="confirm" class="form-control">
									</div>
								</div>
							</div>
							<div>
								<button type ="submit" name="update" class="btn btn-primary">Update</button>
								<button class="btn btn-light">Cancel</button>
							</div>
						</form>
					</div>
					
					<div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="History-tab">
							<div class="container">
								<div class="bg-white shadow rounded-lg d-block d-sm-flex" style="margin-bottom: 10px; width: 150px;">
									<div class="btn-group">
										<select class="form-select" aria-label="Default select example">
											<option selected>Filter history </option>
											<option value="1">Approved orders</option>
											<option value="2">Pending orders</option>
										</select>
										
									</div>
								</div>
								<?php 
								while($row1 = mysqli_fetch_assoc($result1)){
									$s ='';
									$s .= '<div class="bg-white shadow d-sm-flex justify-content-between my-4" style="border-radius: 10px;">';
									$s .= '<div class="media d-block d-sm-flex text-left text-sm-left">';
									$s .= sprintf('<a class="cart-item-thumb mx-auto mr-sm-4" style="width:220px; height:200px;" href="#"><img src="%s" alt="Product" style="width:250px; height:200px;"></a>', $row1['Url_image']);
									$s .= '<div style=" margin-top: 50px; padding-left: 40px;">';

									$s .= sprintf('<h3 class="product-card-title font-weight-semibold border-0 pb-0"><a class="nav-link" id="Product-tab" data-toggle="pill" href="Order_Status.html" role="tab" aria-controls="Product" aria-selected="false">%s</a></h3>', $row1['TenSP']);
									$s .= sprintf('<div><span class="text-muted mr-2">Date Order:</span>%s</div>', $row1['NgayDat']);
									$s .= sprintf('<div><span class="text-muted mr-2">Price</span>%s VND</div>',number_format($row1['GiaBan'], 0, '', ','));
									if( $row1['NgayGiao']==null){
										$s .= '<div><span class="text-muted mr-2">Date Delivery: </span></div>';
									}
									else{
										$s .= sprintf('<div><span class="text-muted mr-2">Date Delivery: </span>%s</div>', $row1['NgayGiao']);
									}
									$s .= '<div><span class="text-muted mr-2">Status: '.$row1['TrangThaiDH'].'</span></div>';
									$s .= '</div>';
									$s .= '</div>';
									$s .= '<div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem; margin-top: 50px; padding-right: 10px;">';
									$s .= sprintf('<a href="Status_History.php?IDDH=%s&type=car"><button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button"><polyline points="23 4 23 10 17 10"></polyline>', $row1['IDDH']);
									$s .= '<polyline points="1 20 1 14 7 14"></polyline>';
									$s .= '<i class="fa-solid fa-eye"></i>';
									$s .= 'View Order</button></a>';
									$s .= '<button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">';
									$s .= '<polyline points="3 6 5 6 21 6"></polyline>';
									$s .= '<i class="fa-solid fa-trash-can"></i>';
									$s .= '<line x1="10" y1="11" x2="10" y2="17"></line>';
									$s .= '<line x1="14" y1="11" x2="14" y2="17"></line>';
									$s .= 'Remove Order</button>';
									
									$s .= '</div>';
									$s .= '</div>';
									echo($s);
								}
								while($row2 = mysqli_fetch_assoc($result2)){
									$s ='';
									$s .= '<div class="bg-white shadow d-sm-flex justify-content-between my-4" style="border-radius: 10px;">';
									$s .= '<div class="media d-block d-sm-flex text-left text-sm-left">';
									$s .= sprintf('<a class="cart-item-thumb mx-auto mr-sm-4" style="width:220px; height:200px;" href="#"><img src="%s" alt="Product" style="width:250px; height:200px;"></a>', $row2['Url_image']);
									$s .= '<div style=" margin-top: 50px; padding-left: 40px;">';

									$s .= sprintf('<h3 class="product-card-title font-weight-semibold border-0 pb-0"><a class="nav-link" id="Product-tab" data-toggle="pill" href="Order_Status.html" role="tab" aria-controls="Product" aria-selected="false">%s</a></h3>', $row2['TenPK']);
									$s .= sprintf('<div><span class="text-muted mr-2">Date Order:</span>%s</div>', $row2['NgayDat']);
									$s .= sprintf('<div><span class="text-muted mr-2">Price</span>%s VND</div>',number_format($row2['Gia'], 0, '', ','));
									if( $row2['NgayGiao']==null){
										$s .= '<div><span class="text-muted mr-2">Date Delivery: </span></div>';
									}
									else{
										$s .= sprintf('<div><span class="text-muted mr-2">Date Delivery: </span>%s</div>', $row2['NgayGiao']);
									}
									$s .= '<div><span class="text-muted mr-2">Status: '.$row2['TrangthaiDH'].'</span></div>';
									$s .= '</div>';
									$s .= '</div>';
									$s .= '<div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem; margin-top: 50px; padding-right: 10px;">';
									$s .= sprintf('<a href="Status_History.php?IDDHPK=%s&type=accessory"><button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button"><polyline points="23 4 23 10 17 10"></polyline>', $row2['IDDHPK']);
									$s .= '<polyline points="1 20 1 14 7 14"></polyline>';
									$s .= '<i class="fa-solid fa-eye"></i>';
									$s .= 'View Order</button></a>';
									$s .= '<button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">';
									$s .= '<polyline points="3 6 5 6 21 6"></polyline>';
									$s .= '<i class="fa-solid fa-trash-can"></i>';
									$s .= '<line x1="10" y1="11" x2="10" y2="17"></line>';
									$s .= '<line x1="14" y1="11" x2="14" y2="17"></line>';
									$s .= 'Remove Order</button>';
									
									$s .= '</div>';
									$s .= '</div>';
									echo($s);
								}

								 ?>
									
							</div>
					</div>
				
			</div>
		</div>
	</section>
	<div class="modal123 hide container-fluid">
            <div class="modal_inner123"  style="padding :0px; overflow: hidden; height: 500px" >
                <div class="modal_header123" style="background: #e26e70; padding :15px; color: white;">
                <p></p>
                <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="modal_body123">
					<?php if($_GET['Wrong']==1) { ?>
						<h2 class="notification" >Mật khẩu cũ không đúng</h2>
					<?php }
					else { ?>
						<h2 class="notification" >Mật khẩu mới không trùng nhau</h2>
					<?php }
					?>    
            </div>
                <div class="modal_footer123">
                
                </div>
            </div>
            </div>
			<script>
                var modal = document.querySelector('.modal123');
                var iconClose = document.querySelector('.modal_header123 i');
            	 // Kiểm tra nếu người dùng đã đăng nhập, showModal sẽ là true
				 <?php
                    if(isset($_GET['Buy'])){ ?>
                        var showModal = true;
                    <?php }
                ?>;

                function toggleModal() {
                    modal.classList.toggle('hide');
                }

                if (showModal) {
                    modal.classList.remove('hide'); // Hiển thị modal tức thời
                }

                iconClose.addEventListener('click', toggleModal);
                modal.addEventListener('click', function(e) {
                    if (e.target == modal) {
                    toggleModal();
                    }
                });
            </script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>