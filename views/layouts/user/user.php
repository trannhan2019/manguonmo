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
	<link rel="stylesheet" href="../views/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../views/assets/css/custom_theme.css">

  	<script type="text/javascript" src="../views/assets/js/jquery.min.js"></script>
  	<script type="text/javascript" src="../views/assets/js/bootstrap.min.js"></script>
 	<title>Tài khoản</title>
 </head>
 <body>
 	<div class="container categories_website">
	 	<div class="row">
	 		<div class="col-sm-12 categories_title"><a style="color: black;" href="#">Quản lý tài khoản</a></div>
	 	</div>
	 </div>
 	<div class="container menu_of_infomation">	<div class="row">
 		<?php require('left_menu.php') ?>
 		<div class="col-sm-9 menu_left">
      <h3>Chi tiết</h3>
    <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Real name:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="<?php echo $user_name ?>" disabled>
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Level:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd" placeholder="<?php if($permission==0){
        echo('Normal user');
      }else{
        echo('Admin user');
      } ?>" disabled>
    </div>
  </div>
</form>
 			</div>
 		</div>
 	</div>
 </body>
 </html>
 <?php 
	require('views/layouts/general/footer.php');
 ?>
