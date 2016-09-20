<?php
    date_default_timezone_set(TIMEZONE);
	
	class con_mysql3
	{
		public $srv=MySQL_DB_HOST3;					//服务器地址
        public $usr=MySQL_DB_USER3;					//数据库用户名
        public $pwd=MySQL_DB_PASSWORD3;				//数据密码
        public $dbname=MySQL_DB_NAME3;				//数据库名
        public $link;								//数据库连接变量
		
		
		
		// 连接数据库
		public function conmy()
		{
			$this->link=mysqli_connect($this->srv,$this->usr,$this->pwd,$this->dbname);

		}
		
		// 断开数据库连接
		public function clo()
		{
			mysqli_close($this->link);
		}
		
		// 查改删数据库
		public function sdb($sql)
		{
			$this->conmy();
			$this->link->query("set names utf8");
			$rs=$this->link->query($sql);
			if(!$rs)
			{
				echo "Error in query preparation/execution.<br />";
				die( print_r( mysqli_error($this->link), true));
			}
			else
			{
				return $rs;
			}
		}
	}
?>