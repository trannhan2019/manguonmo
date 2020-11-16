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
      <title>Giỏ hàng</title>
   </head>
   <body>
      <div class="container categories_website">
         <div class="row">
            <div class="col-sm-12 categories_title"><a style="color: black;" href="#">Quản lý mặt hàng</a></div>
         </div>
      </div>
      <div class="container menu_of_infomation">
         <div class="row">
            <?php require('views/layouts/user/left_menu.php') ?>
            <div class="col-sm-9 menu_left">
               <h3 style="float: left;">Mặt hàng</h3>
               <form action="./view_insert_item" method="post">
                  <button type="submit" style="float: right;" type="button" class="btn btn-info">Thêm mặt hàng</button>
               </form>
               <table class="table">
                  <thead>
                     <tr>
                     	<th>Ảnh</th>
                        <th>Tên mặt hàng</th>
                        <th>Giá</th>
                        <th>Thể loại</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     if (empty($list_book_success)) {
                        return;
                     }
                        foreach ($list_book_success as $value) {
                     ?>
                     <tr>
                     	<td><img src="<?php echo $value['avatar']; ?>"></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo number_format($value['price']).' VND'; ?></td>
                        <td><?php echo $value['category']; ?></td>
                        <td><a onclick="return confirm('Edit item?');" href="./view_insert_item/<?php echo $value['id'] ?>">Sửa</a></td>
                        <td><a onclick="return confirm('Delete item?');" href="./remove_item/<?php echo $value['id'] ?>">Xoá</a></td>
                     </tr>
                     <?php
                        }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>
<?php 
   require('views/layouts/general/footer.php');
   ?>