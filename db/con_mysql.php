<?php
    date_default_timezone_set(TIMEZONE);
	
	class con_mysql
	{
		public $srv=MySQL_DB_HOST;
        public $usr=MySQL_DB_USER;
        public $pwd=MySQL_DB_PASSWORD;
        public $dbname=MySQL_DB_NAME;
        public $link;
		
		
		
		public function conmy()
		{
			$this->link=mysqli_connect($this->srv,$this->usr,$this->pwd,$this->dbname);
		}
		
		public function clo()
		{
			mysqli_close($this->link);
		}
		
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