
<!--表格模式开始-->
		<div id="div_pic" name="div_pic" style="display:none">
			<table  width="770" border=0 cellspacing=0 >
			<tr><td width=256></td><td width=256></td><td width=256></td></tr>	
<?php
			$n=0;
			
			//while($tsfl_data3=mysqli_fetch_array($rs_tsfl3))
			foreach ($tsfl_data3_array as $key => $tsfl_data3)
			{
				$n=$n+1;
			$colnn=$n%3;
			if ($colnn==1){echo "<tr><td>";}
			else{echo "<td>";}
				echo "<table border=0 cellspacing=0><tr><td rowspan=8><img src=http://www.ecsponline.com".trim($tsfl_data3['slt'])." width=120 height=120></td><td height=25><input type='checkbox' name='checkbox[]' value=$n />&nbsp;&nbsp;<input style='width:15px' name='amount1[]' id='amount1' type='text' maxlength='1' size='1' value=2 /></td></tr>";
				if (strlen(trim($tsfl_data3['sm']))>36){
					echo "<tr><td width='280' height=15>书名：".mb_substr(trim($tsfl_data3['sm']),0,18,'utf8')."</td></tr>";
				}
				else{
					echo "<tr><td>书名：".trim($tsfl_data3['sm'])."</td></tr>";
				}
				
				echo "<tr><td height=15>书号：".trim($tsfl_data3['isbn'])."</td></tr>";
				$isbn11=trim($tsfl_data3['isbn']);
				if (strlen(trim($tsfl_data3['zzh']))>36){
					echo "<tr><td>作者：".mb_substr(trim($tsfl_data3['zzh']),0,18)."</td></tr>";
				}
				else{
					echo "<tr><td>作者：".trim($tsfl_data3['zzh'])."</td></tr>";
				}
				echo "<tr><td>开本：".trim($tsfl_data3['kb'])."</td></tr>";
				if($tsfl_data3['cbrq']==''){
					echo "<tr><td></td></tr>";
				} 
				else{
				echo "<tr><td>出版年月：".substr(trim($tsfl_data3['cbrq']),0,4)."年".str_pad(str_replace('/','',str_replace('-','',substr(trim($tsfl_data3['cbrq']),5,2))),2,'0',STR_PAD_LEFT)."月</td></tr>";
				}
				echo "<tr><td>定价：￥".trim(sprintf('%.2f',$tsfl_data3['dj']))."</td></tr>";
				echo "<tr><td>库存：";
	
				if($tsfl_data3['kc']>0){
					echo '纸本可供'."</td></tr></table>";
					} 
					else{
						$ms_tsfl4=new con_mysql2();
				        $sql_tsfl4 = ser("ecs_book","sm,isbn,zzh,kb,cbrq,dj,kc","jz=2 and isbn='%{$isbn11}%' " );
				        $rs_tsfl4= $ms_tsfl4->sdb($sql_tsfl4);
						$tsfl_data4=mysqli_fetch_assoc($rs_tsfl4);
							$dj11=trim($tsfl_data4['dj']);
							if ($dj11==null){
								//echo 'POD可供';
								echo '可预订'."</td></tr></table>";
							}
							else{
								//echo '可预订';
								echo 'POD可供'."</td></tr></table>";
								}
						}
				
				
			if ($colnn==0){echo "</td></tr>";}
			else{echo "</td>";}
				
			}
			
			?>			
			</table>
			</div>
			<!--表格模式结束-->