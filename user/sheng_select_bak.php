<?php
require("../config.php");
require("../DB/con_mssql.php");
require("../DB/DAO.php");
header("Content-type: text/html; charset=utf-8");
$ms=new con_mssql();
$Query = "select sheng_name from sheng_info order by sheng_name";
$AdminResult=$ms->sdb($Query);
?>
<select id='sheng' name='sheng' height='18' onchange="selectCity(this.options[this.selectedIndex].value);">
	<option value='-1' ></option>
	<?php
	while($sheng=odbc_fetch_row($AdminResult)){
		$sheng1=odbc_result($AdminResult,1);
		$sheng2=iconv('GBK','UTF-8',$sheng1);
		echo "<option value='".trim($sheng2)."'>".trim($sheng2)."</option>";
	}
	echo "</select>";

	?>
