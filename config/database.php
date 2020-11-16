<?php 
	/**
	 * configure database at here
	 */
	class Database
	{
		public static $dbc;
		private static $db_host = 'localhost';
		private static $db_user = 'root';
		private static $db_password ='';
		private static $db_name = 'banhang_php';
		private static $collation = 'utf8';

		public static function connect()
		{
			self::$dbc = mysqli_connect(self::$db_host,self::$db_user,self::$db_password,self::$db_name);

			if (!self::$dbc) {
				echo 'Cannot connect <br>';
			}else{
				mysqli_set_charset(self::$dbc, self::$collation);
				date_default_timezone_set('Asia/Ho_Chi_Minh');
			}
		}
	}

 ?>
