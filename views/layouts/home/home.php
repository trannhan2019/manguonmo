<?php 
   if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
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
      <title>Sách điện tử</title>
   </head>
   <body>
      <?php 
         require('views/layouts/general/header.php');
         require('views/layouts/general/slide.php');
         ?>
      <div class="container categories_website">
         <div class="row">
            <div class="categories_title">
               <center><H1 style="color: #777777;">
                  <?php if (isset($category) &&$category->getName()!=null) {
                     echo $category->getName();
                   ?>
                  <?php }else{
                     echo "Tất cả";
                  } ?>
               </H1></center>
            </div>
         </div>
      </div>
      <div id="content_categories" class="container">
         <?php
            foreach ($listBook as $value) {
            ?>
         <div class="col-sm-3 item_categories">
            <center>
               <!-- Set image for item -->
               <img style="width: 100%;" src="<?php echo $value['avatar'];?>">
               <h1 style="display: block;"><?php echo number_format($value['price']).' VND'; ?></h1>
               <div class="line"></div>
               <div class="frame_name col-sm-12" style="display: inline;">
                  <a href="#" class="name_of_item"><?php echo $value['name']; ?></a>
               </div>
               <br>
               <button type="button" onclick="return location.href='/manguonmo/user/add_item/<?php echo $value['id'] ?>';
               " class="btn btn-success btn_add_cart" style="text-transform: uppercase;">Add to card</button>
            </center>
         </div>
         <?php
            }
             ?>
      </div>
      <div class="container-fluid" id="banner_website">
         <center>
            <h1 style="color: white; font-size: 70px; height: 200px; line-height: 200px">Best books seller of the year</h1>
            <p style="color: white;">Search the book from the comfort of your home or office.</p>
         </center>
      </div>
      <div class="container categories_website">
         <center>
            <h1 style="color: #777777;">Top Sale</h1>
         </center>
      </div>
      <div id="content_topsell" class="container">
         <?php
            foreach ($topSell as $value) {
            ?>
         <div class="col-sm-3 item_categories">
            <center>
               <!-- Set image for item -->
               <img style="width: 100%;" src="<?php echo $value['avatar'];?>">
               <h1 style="display: block;"><?php echo number_format($value['price']).' VND'; ?></h1>
               <div class="line"></div>
               <div class="frame_name col-sm-12" style="display: inline;">
                  <a href="#" class="name_of_item"><?php echo $value['name']; ?></a>
               </div>
               <br>
               <button type="button" onclick="return location.href='/manguonmo/user/add_item/<?php echo $value['id'] ?>';
               " class="btn btn-success btn_add_cart" style="text-transform: uppercase;">Add to card</button>
            </center>
         </div>
         <?php
            }
            ?>
      </div>
   </body>
</html>
<?php 
   require('views/layouts/general/footer.php');
   ?>