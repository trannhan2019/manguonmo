<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	 <div class="container" id="header_website">
		<img class="col d-flex align-items-center justify-content-center" src="/manguonmo/views/assets/images/logo.png">
		<?php if (empty($_SESSION['id'])) {?>
			<a class="login" href="/manguonmo/user/register_user">Register</a>
			<a class="login" href="/manguonmo/user/login_user">Login</a>
		<?php } else {?>

			<a class="login" href="/manguonmo/user/infomation">Xin chào <?php echo $user_name ?>. Quản lý tài khoản</a>
			 <a class="cart" href="/manguonmo/user/list_item_in_cart">Cart:<span style="color: red;">
			 	(<?php 
			 		if (isset($_SESSION['current_cart_id'])) {
			 			echo $this->cart->countItemInCart($_SESSION['current_cart_id']);
			 		}else{
			 			echo "0";
			 		}
			 	 ?>)</span></a>

		<?php } ?>
	 </div>
	 <nav class="navbar navbar-default" id="nav_website">
	 	<div class="container-fluid">
	 		<ul class="nav navbar-nav">
	 			<li class="active"><a href="/manguonmo">Trang chủ</a></li>
				<li class="dropdown">
					<a class ="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo "/manguonmo/home/item_short/1" ?>">Sách giáo khoa</a></li>
       					<li><a href="<?php echo "/manguonmo/home/item_short/2" ?>">Sách văn học</a></li>
          				<li><a href="<?php echo "/manguonmo/home/item_short/3" ?>">Truyện</a></li>
					</ul>
				</li>
	 		</ul>
	 	</div>
	 </nav>
</body>
</html>
