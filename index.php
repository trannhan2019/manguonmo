<?php 
	ob_start();
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	/**
	 * @package		Website bán hàng online
	 * @author 		Mai Manh Duy
	 * @email 		duymmpd95@gmail.com
	 * @copyright 	Copyright (c) 2018
	 * @since 		Version 1.0
	 * @filesource 	index.php
	 */

	// Gọi kết nối CSDL
	require_once('config/database.php');
	Database::connect();

	// Nhận đường dẫn từ URL
	$URL = isset($_GET['url']) ? $_GET['url'] : null;
	$URL = rtrim($URL, '/\\');

	// Xử lý đường dẫn thành Controller, Action
	$arr_url = explode('/', $URL);
	$controller = !empty($arr_url[0]) ? $arr_url[0] : "home";
	$action = isset($arr_url[1]) ? $arr_url[1] : "index";
	$param = isset($arr_url[2]) ? $arr_url[2] : null;

	// Trỏ tới file Controller và thực hiện điều hướng
	$fileName = 'controllers/'.ucfirst($controller).'Controller.php';

	if(file_exists($fileName)) {
		include($fileName);

		$className = ucfirst($controller).'Controller';

		$object = new $className;

		if(!method_exists($object, $action)) {
			echo 'Lỗi không tồn tại phương thức';
		} else {
			if(!empty($param)) {
				$object->$action($param);
			} else {
				$object->$action();
			}
		}
	} else {
		echo 'Lỗi không tồn tại thư mục';
	}
 ?>
 