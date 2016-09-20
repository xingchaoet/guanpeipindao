<HTML>
<HEAD>
	<TITLE>checkbox</TITLE>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="../scrp/listcheck/demo.css" type="text/css">
	<link rel="stylesheet" href="../scrp/listcheck/zTreeStyle.css" type="text/css">
	<!--	<script type="text/javascript" src="../scrp/listcheck/jquery-1.4.4.min.js"></script>-->
	<script type="text/javascript" src="../dist/js/jquery.min.js"></script>

	<script type="text/javascript" src="../scrp/listcheck/jquery.ztree.core-3.5.js"></script>
	<script type="text/javascript" src="../scrp/listcheck/jquery.ztree.excheck-3.5.js"></script>
<!--	<script type="text/javascript" src="../scrp/listcheck/query.ztree.exedit-3.5.js"></script>-->
	<SCRIPT type="text/javascript">
		<!--
		var setting_sk = {
			check: {
				enable: true,
				chkboxType: {"Y":"ps", "N":"ps"}
			},
			view: {
				dblClickExpand: false
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeClick: beforeClick_sk,
				onCheck: onCheck_sk
			}
		};
        		
		function beforeClick_sk(treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("tree_sk");
			zTree.checkNode(treeNode, !treeNode.checked, null, true);
			return false;
		}
		
		function onCheck_sk(e, treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("tree_sk"),
			sk_nodes = zTree.getCheckedNodes(true),
			sk_v = "";
			for (var i=0, l=sk_nodes.length; i<l; i++) {
				sk_v += sk_nodes[i].name + ",";
			}
			if (sk_v.length > 0 ) sk_v = sk_v.substring(0, sk_v.length-1);
			var skObj = $("#ztfl_sk_sel");
			skObj.attr("value", sk_v);
			
			sk_id_v = "";
			for (var i=0, l=sk_nodes.length; i<l; i++) {
				sk_id_v += sk_nodes[i].id + ",";
			}
			if (sk_id_v.length > 0 ) sk_id_v = sk_id_v.substring(0, sk_id_v.length-1);
			var skidObj = $("#ztfl_sk_id_sel");
			skidObj.attr("value", sk_id_v);
		}

		function showMenu_sk() {
			var skObj = $("#ztfl_sk_sel");
			var skOffset = $("#ztfl_sk_sel").offset();
			$("#menuContent_sk").css({left:skOffset.left + "px", top:skOffset.top + skObj.outerHeight() + "px"}).slideDown("fast");

			$("body").bind("mousedown", onBodyDown_sk);
			
			var skidObj = $("#ztfl_sk_id_sel");
			var skidOffset = $("#ztfl_sk_sel").offset();
			$("#menuContent_sk").css({left:skidOffset.left + "px", top:skidOffset.top + skidObj.outerHeight() + "px"}).slideDown("fast");

			$("body").bind("mousedown", onBodyDown_sk);
		}
		function hideMenu_sk() {
			$("#menuContent_sk").fadeOut("fast");
			$("body").unbind("mousedown", onBodyDown_sk);
		}
		function onBodyDown_sk(event) {
			if (!(event.target.id == "menuBtn_sk" || event.target.id == "ztfl_sk_sel" || event.target.id == "menuContent_sk" || $(event.target).parents("#menuContent_sk").length>0)) {
				hideMenu_sk();
			}
		}

		$(document).ready(function(){
			$.fn.zTree.init($("#tree_sk"), setting_sk, zNodes3);
		});
		//-->
	</SCRIPT>
	
	<?php
		$ztflsk = @$_REQUEST['ztfl_sk_id_sel'];
		if ($ztflsk !='') {
			$ztflsk = explode(',', $ztflsk);
		}
		$zNodes4="[ ";
		$zNodes3="[ ";
		$ms_tsfl3=new con_mysql2();
		$sql_tsfl3 = ser("v_ecs_category","cat_id,parent_id,cat_name","cat_desc='1000'  and cat_id<'10369' order by cat_id " );
		$rs_tsfl3 = $ms_tsfl3->sdb($sql_tsfl3);
		while($tsfl_data3=mysqli_fetch_assoc($rs_tsfl3))
		{
			$zNodes3=$zNodes3."{id:".trim($tsfl_data3['cat_id']).", pId:".trim($tsfl_data3['parent_id']).", name:'".trim($tsfl_data3['cat_name'])."'";
			if ($ztflsk!='') {
				if (in_array($tsfl_data3[0], $ztflsk)) {
					$zNodes3.=", checked:true";
				}
			}
			$zNodes3.="},";
		}
	$zNodes3=substr(trim($zNodes3),0,strlen(trim($zNodes3))-1)	;
	$zNodes3=$zNodes3." ]";
	echo "<SCRIPT type='text/javascript'> var zNodes3=".$zNodes3.";</SCRIPT>";
	
?>
	

 </HEAD>

<BODY id="body3">

<div class="content_wrap">
	<div class="zTreeDemoBackground left">
		<ul id="sk_ul" class="list">
			<li class="title"><input id="ztfl_sk_id_sel" name="ztfl_sk_id_sel" type="hidden" readonly value="<?php echo @$_REQUEST["ztfl_sk_id_sel"]?>" style="width:1px;"  /><input id="ztfl_sk_sel"  name="ztfl_sk_sel" type="text" readonly value="<?php echo @$_REQUEST["ztfl_sk_sel"]?>" style="width:208px;" onclick="showMenu_sk();" />
		&nbsp;&nbsp;<a id="menuBtn_sk" href="#" onclick="showMenu_sk(); return false;">多选</a></li>
		</ul>
	</div>
</div>

<div id="menuContent_sk" class="menuContent" style="display:none; top:0px;left:0px;">
	<ul id="tree_sk" class="ztree" style="margin-top:0; width:200px; height: 300px;"></ul>
</div>
</BODY>
</HTML>