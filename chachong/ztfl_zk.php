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
        var setting_zk = {
            check: {
                enable: true,
                chkboxType: {"Y": "ps", "N": "ps"}
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
                beforeClick: beforeClick_zk,
                onCheck: onCheck_zk
            }
        };

        function beforeClick_zk(treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree_zk");
            zTree.checkNode(treeNode, !treeNode.checked, null, true);
            return false;
        }

        function onCheck_zk(e, treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree_zk"),
                zk_nodes = zTree.getCheckedNodes(true),
                zk_v = "";
            for (var i = 0, l = zk_nodes.length; i < l; i++) {
                zk_v += zk_nodes[i].name + ",";
            }
            if (zk_v.length > 0) zk_v = zk_v.substring(0, zk_v.length - 1);
            var zkObj = $("#ztfl_zk_sel");
            zkObj.attr("value", zk_v);

            zk_id_v = "";
            for (var i = 0, l = zk_nodes.length; i < l; i++) {
                zk_id_v += zk_nodes[i].id + ",";
            }
            if (zk_id_v.length > 0) zk_id_v = zk_id_v.substring(0, zk_id_v.length - 1);
            var zkidObj = $("#ztfl_zk_id_sel");
            zkidObj.attr("value", zk_id_v);
        }

        function showMenu_zk() {
            var zkObj = $("#ztfl_zk_sel");
            var zkOffset = $("#ztfl_zk_sel").offset();
            $("#menuContent_zk").css({
                left: zkOffset.left + "px",
                top: zkOffset.top + zkObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zk);

            var zkidObj = $("#ztfl_zk_id_sel");
            var zkidOffset = $("#ztfl_zk_id_sel").offset();
            $("#menuContent_zk").css({
                left: zkidOffset.left + "px",
                top: zkidOffset.top + zkidObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zk);
        }

        function hideMenu_zk() {
            $("#menuContent_zk").fadeOut("fast");
            $("body").unbind("mousedown", onBodyDown_zk);
        }

        function onBodyDown_zk(event) {
            if (!(event.target.id == "menuBtn_zk" || event.target.id == "ztfl_zk_sel" || event.target.id == "menuContent_zk" || $(event.target).parents("#menuContent_zk").length > 0)) {
                hideMenu_zk();
            }
        }

        $(document).ready(function () {
            $.fn.zTree.init($("#tree_zk"), setting_zk, zNodes4);
        });
        //-->
    </SCRIPT>

    <?php
//    mysql
//    $ztflzk = @$_REQUEST['ztfl_zk_id_sel'];
//    if ($ztflzk != '') {
//        $ztflzk = explode(',', $ztflzk);
//    }
//    $zNodes4 = "[ ";
//    $ms_tsfl4 = new con_mysql2();
//    $sql_tsfl4 = ser("v_ecs_category", "cat_id,parent_id,cat_name", "cat_desc='1000'  and cat_id>='10369' order by cat_id ");
//    $rs_tsfl4 = $ms_tsfl4->sdb($sql_tsfl4);
//    while ($tsfl_data4 = mysqli_fetch_assoc($rs_tsfl4)) {
//        $zNodes4 = $zNodes4 . "{id:" . trim($tsfl_data4['cat_id']) . ", pId:" . trim($tsfl_data4['parent_id']) . ", name:'" . trim($tsfl_data4['cat_name']) . "'";
//        if ($ztflzk != '') {
//            if (in_array($tsfl_data4[0], $ztflzk)) {
//                $zNodes4 .= ", checked:true";
//            }
//        }
//        $zNodes4 .= "},";
//    }
//    $zNodes4 = substr(trim($zNodes4), 0, strlen(trim($zNodes4)) - 1);
//    $zNodes4 = $zNodes4 . " ]";
//    echo "<SCRIPT type='text/javascript'> var zNodes4=" . $zNodes4 . ";</SCRIPT>";

    $ztflzk = @$_REQUEST['ztfl_zk_id_sel'];
    if ($ztflzk != '') {
        $ztflzk = explode(',', $ztflzk);
    }
    $zNodes4 = "[ ";
    $sql_tsfl4 = ser("v_ecs_category", "cat_id,parent_id,cat_name", "cat_desc='1000'  and cat_id>='10369' order by cat_id ");
    $ms = new con_mssql();

    $rs_tsfl4 = $ms->sdb($sql_tsfl4);
    while ($tsfl_data4 = odbc_fetch_array($rs_tsfl4)) {
        $zNodes4 = $zNodes4 . "{id:" . trim($tsfl_data4['cat_id']) . ", pId:" . trim($tsfl_data4['parent_id']) . ", name:'" . trim(iconv('gbk', 'utf-8//IGNORE',$tsfl_data4['cat_name'])) . "'";
        if ($ztflzk != '') {
            if (in_array($tsfl_data4[0], $ztflzk)) {
                $zNodes4 .= ", checked:true";
            }
        }
        $zNodes4 .= "},";
    }
    $zNodes4 = substr(trim($zNodes4), 0, strlen(trim($zNodes4)) - 1);
    $zNodes4 = $zNodes4 . " ]";
    echo "<SCRIPT type='text/javascript'> var zNodes4=" . $zNodes4 . ";</SCRIPT>";
    ?>


</HEAD>

<BODY id="body4">

<div class="content_wrap">
    <div class="zTreeDemoBackground left">
        <ul id="zk_ul" class="list">
            <li class="title"><input id="ztfl_zk_id_sel" name="ztfl_zk_id_sel" type="hidden" readonly
                                     value="<?php echo @$_REQUEST["ztfl_zk_id_sel"] ?>" style="width:1px;"/><input
                    id="ztfl_zk_sel" name="ztfl_zk_sel" value="<?php echo @$_REQUEST["ztfl_zk_sel"] ?>" type="text"
                    readonly value="" style="width:208px;" onclick="showMenu_zk();"/>
                &nbsp;&nbsp;<a id="menuBtn_zk" href="#" onclick="showMenu_zk(); return false;">多选</a></li>
        </ul>
    </div>
</div>

<div id="menuContent_zk" class="menuContent" style="display:none; top:0px;left:0px;">
    <ul id="tree_zk" class="ztree" style="margin-top:0; width:200px; height: 300px;"></ul>
</div>
</BODY>
</HTML>