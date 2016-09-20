<!DOCTYPE html>
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
        var setting_zyfl = {
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
                beforeClick: beforeClick_zyfl,
                onCheck: onCheck_zyfl
            }
        };

        function beforeClick_zyfl(treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree_zyfl");
            zTree.checkNode(treeNode, !treeNode.checked, null, true);
            return false;
        }

        function onCheck_zyfl(e, treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree_zyfl"),
                zyfl_nodes = zTree.getCheckedNodes(true),
                zyfl_v = "";
            for (var i = 0, l = zyfl_nodes.length; i < l; i++) {
                zyfl_v += zyfl_nodes[i].name + ",";
            }
            if (zyfl_v.length > 0) zyfl_v = zyfl_v.substring(0, zyfl_v.length - 1);
            var zyflObj = $("#zyfl_sel");
            zyflObj.attr("value", zyfl_v);

            zyfl_id_v = "";
            for (var i = 0, l = zyfl_nodes.length; i < l; i++) {
                zyfl_id_v += zyfl_nodes[i].id + ",";
            }
            if (zyfl_id_v.length > 0) zyfl_id_v = zyfl_id_v.substring(0, zyfl_v.length - 1);
            var zyflidObj = $("#zyfl_id_sel");
            zyflidObj.attr("value", zyfl_id_v);
        }


        function showMenu_zyfl() {
            var zyflObj = $("#zyfl_sel");
            var zyflOffset = $("#zyfl_sel").offset();
            $("#menuContent_zyfl").css({
                left: zyflOffset.left + "px",
                top: zyflOffset.top + zyflObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zyfl);

            var zyflidObj = $("#zyfl_id_sel");
            var zyflidOffset = $("#zyfl_id_sel").offset();
            $("#menuContent_zyfl").css({
                left: zyflidOffset.left + "px",
                top: zyflidOffset.top + zyflidObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zyfl);
        }

        function SelectAll_zyfl() {
            var zTree = $.fn.zTree.getZTreeObj("tree_zyfl");
            zTree.checkAllNodes(true);

            var zyflObj = $("#zyfl_sel");
            var zyflOffset = $("#zyfl_sel").offset();
            $("#menuContent_zyfl").css({
                left: zyflOffset.left + "px",
                top: zyflOffset.top + zyflObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zyfl);

            var zyflidObj = $("#zyfl_id_sel");
            var zyflidOffset = $("#zyfl_id_sel").offset();
            $("#menuContent_zyfl").css({
                left: zyflidOffset.left + "px",
                top: zyflidOffset.top + zyflidObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zyfl);
        }

        function Selectno_zyfl() {
            var zTree = $.fn.zTree.getZTreeObj("tree_zyfl");
            zTree.checkAllNodes(false);

            var zyflObj = $("#zyfl_sel");
            var zyflOffset = $("#zyfl_sel").offset();
            $("#menuContent_zyfl").css({
                left: zyflOffset.left + "px",
                top: zyflOffset.top + zyflObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zyfl);

            var zyflidObj = $("#zyfl_id_sel");
            var zyflidOffset = $("#zyfl_id_sel").offset();
            $("#menuContent_zyfl").css({
                left: zyflidOffset.left + "px",
                top: zyflidOffset.top + zyflidObj.outerHeight() + "px"
            }).slideDown("fast");
            $("body").bind("mousedown", onBodyDown_zyfl);
        }

        function hideMenu_zyfl() {
            $("#menuContent_zyfl").fadeOut("fast");
            $("body").unbind("mousedown", onBodyDown_zyfl);
        }
        function onBodyDown_zyfl(event) {
            if (!(event.target.id == "menuBtn_zyfl" || event.target.id == "zyfl_sel" || event.target.id == "menuContent_zyfl" || $(event.target).parents("#menuContent_zyfl").length > 0)) {
                hideMenu_zyfl();
            }
        }

        $(document).ready(function () {
            $.fn.zTree.init($("#tree_zyfl"), setting_zyfl, zNodes2);
        });
        //-->
    </SCRIPT>

    <?php
    $zyfl = @$_REQUEST['zyfl_id_sel'];
    if ($zyfl != '') {
        $zyfl = substr(trim($zyfl), 0, strlen(trim($zyfl)) - 1);
        $zyfl = explode(',', $zyfl);
    }
    $zNodes2 = "[ ";
    $ms_tsfl2 = new con_mysql2();
    $sql_tsfl2 = ser("v_ecs_category", "cat_id,parent_id,cat_name", "cat_desc='30'  order by cat_id ");
    $rs_tsfl2 = $ms_tsfl2->sdb($sql_tsfl2);
    while ($tsfl_data2 = mysqli_fetch_assoc($rs_tsfl2)) {
        $zNodes2 = $zNodes2 . "{id:" . trim($tsfl_data2['cat_id']) . ", pId:" . trim($tsfl_data2['parent_id']) . ", name:'" . trim($tsfl_data2['cat_name']) . "'";
        if ($zyfl != '') {
            if (in_array($tsfl_data2[0], $zyfl)) {
                $zNodes2 .= ", checked:true";
            }
        }
        $zNodes2 .= "},";
    }
    $zNodes2 = substr(trim($zNodes2), 0, strlen(trim($zNodes2)) - 1);
    $zNodes2 = $zNodes2 . " ]";
    echo "<SCRIPT type='text/javascript'> var zNodes2=" . $zNodes2 . ";</SCRIPT>";
    //exit;
    ?>
</HEAD>
<BODY id="body2">

<div class="content_wrap" style="margin-top:0px;padding-top:0px" topmargin="0">
    <div class="zTreeDemoBackground left" style="margin-top:0px;padding-top:0px" topmargin="0">
        <ul id="zyflul" class="list">
            <li class="title"><input id="zyfl_id_sel" name='zyfl_id_sel' type="hidden" readonly
                                     value="<?php echo @$_REQUEST["zyfl_id_sel"] ?>" style="width:0px;"/><input
                    id="zyfl_sel" name='zyfl_sel' type="text" readonly value="<?php echo @$_REQUEST["zyfl_sel"] ?>"
                    style="width:208px;" onclick="showMenu_zyfl();"/>
                &nbsp;&nbsp;<a id="menuBtn_zyfl" href="#" onclick="showMenu_zyfl(); return false;">多选</a>&nbsp;&nbsp;<a
                    id="SelectAll_zyfl" href="#" onclick="SelectAll_zyfl(); return false;">全选</a>&nbsp;&nbsp;<a
                    id="SelectAll_zyfl" href="#" onclick="Selectno_zyfl(); return false;">全不选</a></li>
        </ul>
    </div>
</div>
<!--<div id="menuContent_zyfl" class="menuContent" style="display:none; position: absolute;top:20px;">-->
<div id="menuContent_zyfl" class="menuContent" style="display:none; top:0px;left:0px;">

    <ul id="tree_zyfl" class="ztree" style="margin-top:0; width:200px; height: 300px;"></ul>
</div>
</BODY>
</HTML>