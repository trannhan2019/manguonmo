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
      <title>Giỏ hàng
      </title>
   </head>
   <body>
      <div class="container categories_website">
         <div class="row">
            <div class="col-sm-12 categories_title">
               <a style="color: black;" href="#">Thêm mặt hàng
               </a>
            </div>
         </div>
      </div>
      <div class="container menu_of_infomation">
         <div class="row">
            <?php require('views/layouts/user/left_menu.php') ?>
            <div class="col-sm-9 menu_left">
               <?php if (empty($id_item)) {?>
               <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="name">Tên:
                     </label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter book name" name="name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="price">Giá:
                     </label>
                     <div class="col-sm-10">          
                        <input type="nummber" class="form-control" id="price" placeholder="Enter book price" name="price">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="avatar">Link ảnh:
                     </label>
                     <div class="col-sm-10">          
                        <input type="nummber" class="form-control" id="avatar" placeholder="Enter link image of book" name="avatar">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="sel1">Select list:
                     </label>
                     <div class="col-sm-10">
                        <select class="form-control" id="sel1" name="category">
                           <?php 
                              foreach ($list_category as $value) {
                              ?>
                           <option value="<?php echo $value['id'] ?>">
                              <?php echo $value['name']; ?>
                           </option>
                           <?php 
                              }
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="insert_item">Submit
                        </button>
                     </div>
                  </div>
               </form>
               <?php } else { ?>
               <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="name">Tên:
                     </label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter book name" name="name" value="<?php
                           echo $item_data->getName();
                        ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="price">Giá:
                     </label>
                     <div class="col-sm-10">          
                        <input type="nummber" class="form-control" id="price" placeholder="Enter book price" name="price" value="<?php
                           echo $item_data->getPrice();
                        ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="avatar">Link ảnh:
                     </label>
                     <div class="col-sm-10">          
                        <input type="nummber" class="form-control" id="avatar" placeholder="Enter link image of book" name="avatar" value="<?php
                           echo $item_data->getAvatar();
                        ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2" for="sel1">Select list:
                     </label>
                     <div class="col-sm-10">
                        <select class="form-control" id="sel1" name="category">
                           <?php 
                              foreach ($list_category as $value) {
                              ?>
                           <option value="<?php echo $value['id'] ?>" <?php 
                                 if($value['id']==$item_data->getCategoryId()){
                                    echo "selected='selected'";
                                 }
                            ?>>
                              <?php echo $value['name']; ?>
                           </option>
                           <?php 
                              }
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="update_item">Update
                        </button>
                     </div>
                  </div>
               </form>
               <?php } ?>
            </div>
         </div>
      </div>
   </body>
</html>
<?php 
   if (empty($id_item)) {
   $this->action_insert_item();
}else{
   $this->action_update_item($id_item);
}
   require('views/layouts/general/footer.php');
   ?>