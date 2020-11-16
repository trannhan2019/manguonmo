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
            <div class="col-sm-12 categories_title"><a style="color: black;" href="#">Quản lý tài khoản</a></div>
         </div>
      </div>
      <div class="container menu_of_infomation">
         <div class="row">
            <?php require('left_menu.php') ?>
            <div class="col-sm-9 menu_left">
               <h3>Giỏ hàng</h3>
               <table class="table">
                  <thead>
                     <tr>
                        <th>Tên mặt hàng</th>
                        <th>Giá</th>
                        <th>Thể loại</th>
                        <th>Ngày đặt</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $total = 0;
                     if (!empty($list_item)) {
                        foreach ($list_item as $value) {
                           $total += $value['price'];
                     ?>
                     <tr>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo number_format($value['price']).' VND'; ?></td>
                        <td><?php echo $value['category']; ?></td>
                        <td><?php echo $value['date']; ?></td>
                        <td><a onclick="return confirm('Delete item?');" href="./remove_item_from_cart/<?php echo $value['id'] ?>">Xoá</a></td>
                     </tr>
                     <?php
                        }
                     }
                     ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td>Tổng cộng</td>
                        <td><?php echo number_format($total).' VND'; ?></td>
                        <td></td>
                        <td></td>
                        <td>
                           <form action="./order_item">
                              <button type="submit" class="btn btn-primary">Đặt hàng</button>
                           </form>
                        </td>
                     </tr>
                     </tfoot>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>
<?php 
   require('views/layouts/general/footer.php');
   ?> 