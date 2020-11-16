<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	require('views/layouts/general/header.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="/manguonmo/views/assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/manguonmo/views/assets/css/custom_theme.css">
      <script type="text/javascript" src="/manguonmo/views/assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="/manguonmo/views/assets/js/bootstrap.min.js"></script>
	<title>Đăng nhập</title>
</head>
<body>
	 </nav>

	<div class="container categories_website">
	 	<div class="row">
	 		<div class="col-sm-12 categories_title"><a style="color: black;" href="#">Thông tin tài khoản ?</a></div>
	 	</div>
	 </div>
	<div class="container" style="margin-bottom: 20px;">
		<h4>Đăng ký</h4>
		<form action="" method="POST">
	 		<div class="form-group">
	 			<label for="sUsername">Tên đăng nhập:</label>
				<input type="text" id="sUsername" name="username" class="form-control"></input>
	 		</div>	
	 		<div class="form-group">
	 			<label for="sPws">Mật khẩu:</label>
				<input type="password" id="sPws" name="password" class="form-control"></input>
	 		</div>
	 		<button type="submit" class="btn btn-default" name="login">Đăng nhập</button>
	 	</form>
	</div>
</body>
</html>
<?php 
	require('views/layouts/general/footer.php');
 ?>