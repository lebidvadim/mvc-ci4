<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-12 04:23:42
         compiled from "/home/dimckale/lebid.pro/ci4/modules/ModShops/Views/cabinet/shops/app-view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7683512535eba6b1e07f3e4_91072046%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3c8fda731cf3aa26e032d362ad3a7bc03655ada' => 
    array (
      0 => '/home/dimckale/lebid.pro/ci4/modules/ModShops/Views/cabinet/shops/app-view.tpl',
      1 => 1589275418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7683512535eba6b1e07f3e4_91072046',
  'variables' => 
  array (
    'cat' => 0,
    'c' => 0,
    'app' => 0,
    'a' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5eba6b1e0a27a9_59356090',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5eba6b1e0a27a9_59356090')) {
function content_5eba6b1e0a27a9_59356090 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7683512535eba6b1e07f3e4_91072046';
?>
<div class="mb-3"><a href="<?php echo site_url('cabinet/app');?>
" class="btn btn-outline-dark">Назад</a></div>
<div class="pb-4">
    <div class="table-responsive ">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th width="50">#</th>
                <th>Найменование</th>
                <th width="100">Количество</th>
            </tr>
            </thead>
            <tbody>

            <?php
$foreach_0_c_sav['s_item'] = isset($_smarty_tpl->tpl_vars['c']) ? $_smarty_tpl->tpl_vars['c'] : false;
$_from = $_smarty_tpl->tpl_vars['cat']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['c']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
$foreach_0_c_sav['item'] = $_smarty_tpl->tpl_vars['c'];
?>
                <?php if ($_smarty_tpl->tpl_vars['c']->value->count != 0) {?>
                    <tr class="table-warning">
                        <th colspan="3" class="text-center"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</th>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>
                    <?php
$foreach_1_a_sav['s_item'] = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_from = $_smarty_tpl->tpl_vars['app']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['a']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
$foreach_1_a_sav['item'] = $_smarty_tpl->tpl_vars['a'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['a']->value->id_gr == $_smarty_tpl->tpl_vars['c']->value->id) {?>
                            <tr>
                                <th><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['a']->value->product[0]->name;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['a']->value->count;?>
</th>
                            </tr>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['a'] = $foreach_1_a_sav['item'];
}
if ($foreach_1_a_sav['s_item']) {
$_smarty_tpl->tpl_vars['a'] = $foreach_1_a_sav['s_item'];
}
?>
                <?php }?>
            <?php
$_smarty_tpl->tpl_vars['c'] = $foreach_0_c_sav['item'];
}
if ($foreach_0_c_sav['s_item']) {
$_smarty_tpl->tpl_vars['c'] = $foreach_0_c_sav['s_item'];
}
?>
            </tbody>
        </table>
    </div>
</div><?php }
}
?>