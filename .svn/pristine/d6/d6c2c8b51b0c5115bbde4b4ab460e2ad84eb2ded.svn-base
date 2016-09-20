<!--表格模式开始-->
<div id="div_list" name="div_list">
	<table  width="770" border=0 cellspacing=0 >
		<tr>
			<td width=70 bgcolor="#EDEDED" align=center><b>序号</b></td>
			<td height=30 width=20 bgcolor="#EDEDED" ><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /></td>
			<td width=30 bgcolor="#EDEDED" align=center ><b>数量</b></td>
			<td width=230 bgcolor="#EDEDED" align=center><b>书名</b></td>
			<td width=90 bgcolor="#EDEDED" align=center><b>书号</b></td>
			<td width=120 bgcolor="#EDEDED" align=center><b>作者</b></td>
			<td width=50 bgcolor="#EDEDED" align=center><b>开本</b></td>
			<td width=90 bgcolor="#EDEDED" align=center><b>出版日期</b></td>
			<td width=40 bgcolor="#EDEDED" align=center><b>价格</b></td>
			<td width=70 bgcolor="#EDEDED" align=center><b>库存</b></td>
		</tr>	
<?php
	$n=$_REQUEST["n"];
	if ($n==null or $n==0){$n=0;}
	//$n=0;
	//while($tsfl_data3=mysqli_fetch_array($rs_tsfl3))
		
	is_array($tsfl_data3_array)?null:$tsfl_data3_array = array(); //如果该变量不是一个有效数组，则设置该变量为一个空数组即array()，
	foreach ($tsfl_data3_array as $key => $tsfl_data3)
	{
		$n=$n+1;
		echo "<tr><td height=25 width=15 align=center></td>";
		echo "<td height=25 width=15><input type='checkbox' name='checkbox[]' value=$n /></td>";
		echo "<td><input style='width:15px' name='amount1[]' id='amount1' type='text' maxlength='1' size='1' value=2 /></td>";
		if (strlen(trim($tsfl_data3['sm']))>36){
			echo "<td width='280'>".mb_substr(trim($tsfl_data3['sm']),0,18,'utf8')."</td>";
		}
		else{
			echo "<td>".trim($tsfl_data3['sm'])."</td>";
		}
		
		echo "<td>".trim($tsfl_data3['isbn'])."</td>";
		$isbn11=trim($tsfl_data3['isbn']);
		if (strlen(trim($tsfl_data3['zzh']))>20){
			echo "<td>".mb_substr(trim($tsfl_data3['zzh']),0,20)."</td>";
		}
		else{
			echo "<td>".trim($tsfl_data3['zzh'])."</td>";
		}
		echo "<td align=right>".trim($tsfl_data3['kb'])."</td>";
		if($tsfl_data3['cbrq']==''){
			echo "<td></td>";
		} 
		else{
		echo "<td align=right>".substr(trim($tsfl_data3['cbrq']),0,4)."年".str_pad(str_replace('/','',str_replace('-','',substr(trim($tsfl_data3['cbrq']),5,2))),2,'0',STR_PAD_LEFT)."月</td>";
		}
		echo "<td align=right>￥".trim(sprintf('%.2f',$tsfl_data3['dj']))."</td>";
		echo "<td align=right>";

		if($tsfl_data3['kc']>0){
			echo '纸本可供';
			} 
			else{
				$ms_tsfl4=new con_mysql2();
				$sql_tsfl4 = ser("ecs_book","sm,isbn,zzh,kb,cbrq,dj,kc","jz=2 and isbn='%{$isbn11}%' " );
				$rs_tsfl4= $ms_tsfl4->sdb($sql_tsfl4);
				$tsfl_data4=mysqli_fetch_assoc($rs_tsfl4);
					$dj11=trim($tsfl_data4['dj']);
					if ($dj11==null){
						//echo 'POD可供';
						echo '可预订';
					}
					else{
						//echo '可预订';
						echo 'POD可供';
						}
				}
		echo "</td></tr>";		
	}	
?>			
	</table>
</div>
			<!--表格模式结束-->