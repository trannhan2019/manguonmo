<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div class="col-sm-3">
        <a href="/manguonmo/user/infomation">Chi tiết</a>
 		<a href="/manguonmo/user/change_infomation">Thay đổi thông tin</a>
 		<a href="/manguonmo/user/list_item_in_cart">Quản lý giỏ hàng</a>
 		<a href="/manguonmo/user/list_item_paid">Sảm phẩm đã mua</a>

 		<?php 
 		// if user have permission above 0 , will acces to admin control
 		if ($permission>=1) { ?>
			<a href="/manguonmo/admin/cart_manager">Quản lý đơn hàng(admin only)</a>
 			<a href="/manguonmo/admin/item_manager">Quản lý mặt hàng(admin only)</a>
 		<?php } ?>
		<a href="/manguonmo/user/log_out">Đăng xuất</a>
 	</div>
</body>
</html>
