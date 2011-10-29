<?php /* Smarty version Smarty 3.1.4, created on 2011-10-28 16:18:49
         compiled from "./templates/contest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17035116474ea9901ec7f298-57661854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50a6809e2a4acc03b804e45f1daf9174444030b0' => 
    array (
      0 => './templates/contest.tpl',
      1 => 1319815128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17035116474ea9901ec7f298-57661854',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ea9901ed7963',
  'variables' => 
  array (
    'contest' => 0,
    'problems' => 0,
    'problem' => 0,
    'users' => 0,
    'user' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ea9901ed7963')) {function content_4ea9901ed7963($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h2><?php echo $_smarty_tpl->tpl_vars['contest']->value['name'];?>
</h2>

<table class="results">

<tr>
<th>Contestant</th>
<?php  $_smarty_tpl->tpl_vars['problem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['problem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['problems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['problem']->key => $_smarty_tpl->tpl_vars['problem']->value){
$_smarty_tpl->tpl_vars['problem']->_loop = true;
?>
<th><a href="http://www.spoj.pl/problems/<?php echo $_smarty_tpl->tpl_vars['problem']->value['code'];?>
/"><?php echo $_smarty_tpl->tpl_vars['problem']->value['code'];?>
</a></th>
<?php } ?>
<th>Solved</th>
<th>Time</th>
</tr>

<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['uid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['uid']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
<tr><td class="name"><?php echo $_smarty_tpl->tpl_vars['user']->value['realname'];?>
</td>

<?php  $_smarty_tpl->tpl_vars['problem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['problem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->tpl_vars['uid']->value]['problems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['problem']->key => $_smarty_tpl->tpl_vars['problem']->value){
$_smarty_tpl->tpl_vars['problem']->_loop = true;
?> 
	<?php if ($_smarty_tpl->tpl_vars['problem']->value['state']=='AC'){?>
	<td class="accepted"><?php echo $_smarty_tpl->tpl_vars['problem']->value['time'];?>
 (<?php echo $_smarty_tpl->tpl_vars['problem']->value['fails'];?>
)</td>
	<?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['problem']->value['fails']==0){?>
		<td class="notdone">-</td>
		<?php }else{ ?>
		<td class="failed">(<?php echo $_smarty_tpl->tpl_vars['problem']->value['fails'];?>
)</td>
		<?php }?>
	<?php }?>
<?php } ?>
<td class="solved"><?php echo $_smarty_tpl->tpl_vars['user']->value['solved'];?>
</td><td class="total"><?php echo $_smarty_tpl->tpl_vars['user']->value['total'];?>
</td>
</tr>
<?php } ?>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>