<?php /* Smarty version Smarty 3.1.4, created on 2011-10-27 18:07:17
         compiled from "./templates/contests.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3377223704ea98fc5eda568-86685071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b9b2f863010b6ebf5200dc1ab98a2231e32ae11' => 
    array (
      0 => './templates/contests.tpl',
      1 => 1319734891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3377223704ea98fc5eda568-86685071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contests' => 0,
    'contest' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ea98fc60991f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ea98fc60991f')) {function content_4ea98fc60991f($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/vscm/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h2>Contests</h2>

<table>
<tr><th>Date</th><th>Duration</th><th>Name</th></tr>
<?php  $_smarty_tpl->tpl_vars['contest'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contest']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contests']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contest']->key => $_smarty_tpl->tpl_vars['contest']->value){
$_smarty_tpl->tpl_vars['contest']->_loop = true;
?>
<tr>
  <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['contest']->value['start'],"%b %e, %Y %H:%M");?>
</td>
  <td><?php echo ($_smarty_tpl->tpl_vars['contest']->value['stop']-$_smarty_tpl->tpl_vars['contest']->value['start'])/60/60;?>
 hours</td>
  <td><?php if (time()>$_smarty_tpl->tpl_vars['contest']->value['start']){?>
		<a href="contest.php?cid=<?php echo $_smarty_tpl->tpl_vars['contest']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['contest']->value['name'];?>
</a>
	  <?php }else{ ?>
		<?php echo $_smarty_tpl->tpl_vars['contest']->value['name'];?>

	  <?php }?>
	<?php if (time()>=$_smarty_tpl->tpl_vars['contest']->value['start']&&time()<=$_smarty_tpl->tpl_vars['contest']->value['stop']){?>
		<span class="label success">Running</span>
	<?php }?>
	<?php if (time()>$_smarty_tpl->tpl_vars['contest']->value['stop']){?>
		<span class="label warning">Ended</span>
	<?php }?>
	<?php if (time()<$_smarty_tpl->tpl_vars['contest']->value['start']){?>
		<span class="label notice">Scheduled</span>
	<?php }?>
  </td>
</tr>
<?php } ?>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>