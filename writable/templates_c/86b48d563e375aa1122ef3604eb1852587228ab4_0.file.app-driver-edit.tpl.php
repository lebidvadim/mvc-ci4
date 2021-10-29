<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-14 06:39:41
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-driver-edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12848252035ebd2dfd2ed952_60778404%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86b48d563e375aa1122ef3604eb1852587228ab4' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-driver-edit.tpl',
      1 => 1589456298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12848252035ebd2dfd2ed952_60778404',
  'variables' => 
  array (
    'shops' => 0,
    'ap' => 0,
    'group' => 0,
    'a' => 0,
    'i' => 0,
    'app' => 0,
    'z' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebd2dfd3126b8_78653310',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebd2dfd3126b8_78653310')) {
function content_5ebd2dfd3126b8_78653310 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12848252035ebd2dfd2ed952_60778404';
?>
<div class="mb-3"><a href="<?php echo site_url('cabinet/app-driver');?>
" class="btn btn-outline-dark">Назад</a></div>
<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item">
        <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
            <span>Весь заказ</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
            <span>По магазинам</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane" id="home1">
        <?php
$foreach_0_ap_sav['s_item'] = isset($_smarty_tpl->tpl_vars['ap']) ? $_smarty_tpl->tpl_vars['ap'] : false;
$_from = $_smarty_tpl->tpl_vars['shops']->value->app;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ap'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ap']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ap']->value) {
$_smarty_tpl->tpl_vars['ap']->_loop = true;
$foreach_0_ap_sav['item'] = $_smarty_tpl->tpl_vars['ap'];
?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><?php echo $_smarty_tpl->tpl_vars['ap']->value->username;?>
</li>
            </ol>


                    <div class="table-responsive mb-3">
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
$foreach_1_group_sav['s_item'] = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_from = $_smarty_tpl->tpl_vars['ap']->value->group;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$foreach_1_group_sav['item'] = $_smarty_tpl->tpl_vars['group'];
?>
                                <tr class="table-warning">
                                    <th colspan="3" class="text-center"><?php echo $_smarty_tpl->tpl_vars['group']->value->name;?>
</th>
                                </tr>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>
                                <?php
$foreach_2_a_sav['s_item'] = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_from = $_smarty_tpl->tpl_vars['ap']->value->app;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['a']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
$foreach_2_a_sav['item'] = $_smarty_tpl->tpl_vars['a'];
?>
                                    <?php if ($_smarty_tpl->tpl_vars['a']->value->id_gr == $_smarty_tpl->tpl_vars['group']->value->id) {?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value->name;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value->count;?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value->unit;?>
</td>
                                        </tr>
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars['a'] = $foreach_2_a_sav['item'];
}
if ($foreach_2_a_sav['s_item']) {
$_smarty_tpl->tpl_vars['a'] = $foreach_2_a_sav['s_item'];
}
?>
                            <?php
$_smarty_tpl->tpl_vars['group'] = $foreach_1_group_sav['item'];
}
if ($foreach_1_group_sav['s_item']) {
$_smarty_tpl->tpl_vars['group'] = $foreach_1_group_sav['s_item'];
}
?>
                            </tbody>
                        </table>
                    </div>

        <?php
$_smarty_tpl->tpl_vars['ap'] = $foreach_0_ap_sav['item'];
}
if ($foreach_0_ap_sav['s_item']) {
$_smarty_tpl->tpl_vars['ap'] = $foreach_0_ap_sav['s_item'];
}
?>
    </div>
    <div class="tab-pane show active" id="profile1">


        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Все заказ</li>
        </ol>


                <div class="table-responsive mb-3">
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
$foreach_3_group_sav['s_item'] = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_from = $_smarty_tpl->tpl_vars['app']->value['groups'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$foreach_3_group_sav['item'] = $_smarty_tpl->tpl_vars['group'];
?>
                            <tr class="table-warning">
                                <th colspan="3" class="text-center"><?php echo $_smarty_tpl->tpl_vars['group']->value->name;?>
</th>
                            </tr>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>
                            <?php
$foreach_4_a_sav['s_item'] = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_from = $_smarty_tpl->tpl_vars['app']->value['prod'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['a']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
$foreach_4_a_sav['item'] = $_smarty_tpl->tpl_vars['a'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['a']->value[0]->id_gr == $_smarty_tpl->tpl_vars['group']->value->id) {?>
                                    <?php
$foreach_5_z_sav['s_item'] = isset($_smarty_tpl->tpl_vars['z']) ? $_smarty_tpl->tpl_vars['z'] : false;
$_from = $_smarty_tpl->tpl_vars['a']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['z'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['z']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['z']->value) {
$_smarty_tpl->tpl_vars['z']->_loop = true;
$foreach_5_z_sav['item'] = $_smarty_tpl->tpl_vars['z'];
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['z']->value->name;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['z']->value->cou_sum;?>
 <?php echo $_smarty_tpl->tpl_vars['z']->value->unit;?>
</td>
                                        </tr>
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                    <?php
$_smarty_tpl->tpl_vars['z'] = $foreach_5_z_sav['item'];
}
if ($foreach_5_z_sav['s_item']) {
$_smarty_tpl->tpl_vars['z'] = $foreach_5_z_sav['s_item'];
}
?>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['a'] = $foreach_4_a_sav['item'];
}
if ($foreach_4_a_sav['s_item']) {
$_smarty_tpl->tpl_vars['a'] = $foreach_4_a_sav['s_item'];
}
?>
                        <?php
$_smarty_tpl->tpl_vars['group'] = $foreach_3_group_sav['item'];
}
if ($foreach_3_group_sav['s_item']) {
$_smarty_tpl->tpl_vars['group'] = $foreach_3_group_sav['s_item'];
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
</div><?php }
}
?>