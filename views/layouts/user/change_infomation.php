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
      <div class="container menu_of_infomation">
         <div class="row">
            <?php require('left_menu.php') ?>
            <div class="col-sm-9 menu_left">
               <h3>Chi tiết</h3>
               <form class="form-horizontal" action="./update_user" method="POST">
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="realname">Tên thật:</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="realname" name="realname" placeholder="<?php echo $user_name ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="change_name">Thay đổi</button>
                     </div>
                  </div>
               </form>
               <h3>Thay đổi mật khẩu</h3>
               <form class="form-horizontal" action="./change_password" method="POST">
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="email">Mật khẩu cũ:</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="email" name="old_pass">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="email">Mật khẩu mới:</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="email" name="new_pass">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="email">Nhập lại mật khẩu mới:</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="email" name="re_new_pass">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="change_pass">Thay đổi</button>
                     </div>
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