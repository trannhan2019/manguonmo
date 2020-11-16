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
               <h3 style="float: left;"><?php 
               if (!isset($data)) {
                  echo "Đơn hàng chờ thanh toán";
               }else{
                  echo "Chi tiết đơn hàng";
               }
                ?></h3>
               <table class="table">
                  <thead>
                     <?php if (!isset($data)) {?>
                     <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th></th>
                     </tr>
                   <?php  } else{?>

                     <tr>
                        <th>Mã sách</th>
                        <th>Tên sách</th>
                        <th>Giá</th>
                     </tr>
                   <?php } ?>
                  </thead>
                  <tbody>
                      <?php 
                     if (!empty($list_cart)) {
                        foreach ($list_cart as $value) {
                     ?>
                     <tr>
                        <td><?php echo $value['id']; ?></td>
                        <!-- <td><?php echo number_format($value['price']).' VND'; ?></td> -->
                        <td><?php echo $value['name']; ?></td>
                        <td><a href="./cart_manager/<?php echo $value['id'] ?>">Chi tiết</a></td>
                     </tr>
                     <?php
                        }
                     }
                     ?> 

                     <?php 
                     $amount = 0;
                     if (!empty($books)) {
                        foreach ($books as $value) {
                           $amount += $value['price_item'];
                     ?>
                     <tr>
                        <td><?php echo $value['id_item']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo number_format($value['price_item']).' VND'; ?></td> 
                     </tr>
                     <?php
                        }

                        ?>
                        <tr>
                           <td><b>Tổng</b></td>
<td><b><?php echo  number_format($amount).' VND';?></b></td>
<td><form method="post"><button type="submit" class="btn btn-success" name="thanhtoan">Xác nhận đã thanh toán</button></form></td>
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