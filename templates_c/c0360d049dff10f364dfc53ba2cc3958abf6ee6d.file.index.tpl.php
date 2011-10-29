<?php /* Smarty version Smarty 3.1.4, created on 2011-10-29 18:40:41
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18852289284ea98fc324f598-88339751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1319910037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18852289284ea98fc324f598-88339751',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ea98fc32d6e6',
  'variables' => 
  array (
    'stats' => 0,
    'stat' => 0,
    'problems' => 0,
    'problem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ea98fc32d6e6')) {function content_4ea98fc32d6e6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h2>User Statistics</h2>

<table>
<tr><th>Username</th><th>Submissions</th><th>Accepted</th><th>Ratio</th></tr>
<?php  $_smarty_tpl->tpl_vars['stat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stat']->key => $_smarty_tpl->tpl_vars['stat']->value){
$_smarty_tpl->tpl_vars['stat']->_loop = true;
?>
<tr>
	<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['realname'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['submissions'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['accepted'];?>
</td>
	<td>
		<?php if ($_smarty_tpl->tpl_vars['stat']->value['submissions']!=0){?>
			<?php echo sprintf("%.0f",($_smarty_tpl->tpl_vars['stat']->value['accepted']/$_smarty_tpl->tpl_vars['stat']->value['submissions']*100));?>
%
		<?php }else{ ?>-
		<?php }?>
	</td>
</tr>
<?php } ?>
</table>

<h2>Problem Statistics</h2>

<div id="problemchart" style="width: 100%; height: 400px"></div>

<table>
<tr>
<?php  $_smarty_tpl->tpl_vars['problem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['problem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['problems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['problems']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['problem']->key => $_smarty_tpl->tpl_vars['problem']->value){
$_smarty_tpl->tpl_vars['problem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['problems']['index']++;
?>
<td class="<?php if ($_smarty_tpl->tpl_vars['problem']->value['accepted']>0){?>probok<?php }else{ ?>probfail<?php }?>">
	<a href="http://www.spoj.pl/problems/<?php echo $_smarty_tpl->tpl_vars['problem']->value['code'];?>
/"><?php echo $_smarty_tpl->tpl_vars['problem']->value['code'];?>
</a> 
	<?php echo sprintf("%.0f",($_smarty_tpl->tpl_vars['problem']->value['accepted']/($_smarty_tpl->tpl_vars['problem']->value['accepted']+$_smarty_tpl->tpl_vars['problem']->value['failed'])*100));?>
%
</td>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['problems']['index']%5==4){?>
</tr>
<tr>
<?php }?>
<?php } ?>
</tr>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>