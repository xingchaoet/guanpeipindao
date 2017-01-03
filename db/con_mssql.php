<?php
    date_default_timezone_set('PRC');
	//date_default_timezone_set(timezone);
	class con_mssql
	{
		public $srv=SQLServer_DB_HOST;					//服务器地址
        public $usr=SQLServer_DB_USER;					//数据库用户名
        public $pwd=SQLServer_DB_PASSWORD;				//数据密码
        public $dbname=SQLServer_DB_NAME;				//数据库名
		public $drv=SQLServer_DB_DRIVER;				//数据库驱动名称
        public $conn;									//数据库连接变量

        protected static $_connection;

		// 连接数据库
		public function conms()
		{
            if (self::$_connection === null) {
                $c="Driver={$this->drv};Server=$this->srv;Database=$this->dbname;";
                $this->conn=odbc_connect($c,$this->usr,$this->pwd);
                self::$_connection = $this->conn;
            }else{
                $this->conn = self::$_connection;
            }

		}
		//
		public function clo()
		{
			odbc_close($this->conn);
		}
		// 断开数据库连接
		public function sdb($sql)
		{
			$this->conms();
			$rs=odbc_exec($this->conn,$sql);
			if(!$rs)
			{
				echo "Error in query preparation/execution.<br />";
//              $open = fopen("D:/phpStudy/WWW/guanpeipindao/db/log.txt", "a");
//				fwrite($open, print_r(iconv('GBK', 'UTF-8', odbc_errormsg()) , true)."\r\n");
//				fclose($open);
				die( print_r( iconv('GBK', 'UTF-8', odbc_errormsg()), true));
			}
			else
			{
				return $rs;
			}

			$this->clo();
		}
	}
	
?>