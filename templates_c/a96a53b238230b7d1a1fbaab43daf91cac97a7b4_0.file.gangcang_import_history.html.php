<?php
/* Smarty version 3.1.29, created on 2016-09-20 18:04:41
  from "D:\WWW\guanpeipindao\templates\chachong\gangcang_import_history.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57e109b9d14185_59340249',
  'file_dependency' => 
  array (
    'a96a53b238230b7d1a1fbaab43daf91cac97a7b4' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\chachong\\gangcang_import_history.html',
      1 => 1470383130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e109b9d14185_59340249 ($_smarty_tpl) {
?>
                <div class="">
                    <!--<a href="http://localhost/guanpeipindao/chachong/chachong.php">馆藏查重</a>-->
                    <!--<button onclick="return_to_guancangchachong();">馆藏查重</button>-->

                    <div  onmouseover="toggle_click();" class="panel-group" id="accordion">
                        <?php
$_from = $_smarty_tpl->tpl_vars['pici_info_collection']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_pici_0_saved_item = isset($_smarty_tpl->tpl_vars['pici']) ? $_smarty_tpl->tpl_vars['pici'] : false;
$_smarty_tpl->tpl_vars['pici'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['pici']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pici']->value) {
$_smarty_tpl->tpl_vars['pici']->_loop = true;
$__foreach_pici_0_saved_local_item = $_smarty_tpl->tpl_vars['pici'];
?>

                        <div id="" class="panel panel-default">
                            <div class="piciinfo">
                                <div class="">
                                    <h5 class="panel-title">
                                        <div class="toggle" data-parent="#accordion" href="#<?php echo $_smarty_tpl->tpl_vars['pici']->value['gc_dr_pc'];?>
">

                                            <span class="label label-default">批次号:</span>
                                            <?php echo $_smarty_tpl->tpl_vars['pici']->value['gc_dr_pc'];?>

                                            <span class="label label-default" style="margin-left: 50px">导入时间:</span>
                                            <?php echo $_smarty_tpl->tpl_vars['pici']->value['uptime'];?>

                                        </div>
                                    </h5>
                                </div>

                                <div id="<?php echo $_smarty_tpl->tpl_vars['pici']->value['gc_dr_pc'];?>
" class="panel-collapse collapse">
                                    <!--<span class="label label-default">isbn:</span>-->
                                    <div class="panel-body">

                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['pici']->value['gc_dr_pc'];
$_tmp1=ob_get_clean();
$_from = $_smarty_tpl->tpl_vars['pici']->value[$_tmp1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_isbn_1_saved_item = isset($_smarty_tpl->tpl_vars['isbn']) ? $_smarty_tpl->tpl_vars['isbn'] : false;
$_smarty_tpl->tpl_vars['isbn'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['isbn']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['isbn']->value) {
$_smarty_tpl->tpl_vars['isbn']->_loop = true;
$__foreach_isbn_1_saved_local_item = $_smarty_tpl->tpl_vars['isbn'];
?>
                                        <span class="label label-primary"> <?php echo $_smarty_tpl->tpl_vars['isbn']->value;?>
 </span>
                                        <?php
$_smarty_tpl->tpl_vars['isbn'] = $__foreach_isbn_1_saved_local_item;
}
if ($__foreach_isbn_1_saved_item) {
$_smarty_tpl->tpl_vars['isbn'] = $__foreach_isbn_1_saved_item;
}
?>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-danger btn-xs delpici" >删除批次</button>
                                <!--<button class="btn btn-danger btn-xs" onclick="delpici();">删除批次</button>-->

                            </div>
                        </div>

                        <?php
$_smarty_tpl->tpl_vars['pici'] = $__foreach_pici_0_saved_local_item;
}
if ($__foreach_pici_0_saved_item) {
$_smarty_tpl->tpl_vars['pici'] = $__foreach_pici_0_saved_item;
}
?>

                    </div>
                </div>
<?php }
}
