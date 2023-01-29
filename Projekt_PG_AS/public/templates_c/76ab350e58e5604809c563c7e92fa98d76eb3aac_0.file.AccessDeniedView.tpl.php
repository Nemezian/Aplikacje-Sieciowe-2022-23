<?php
/* Smarty version 4.1.0, created on 2023-01-28 00:53:08
  from 'C:\xampp\htdocs\Projekt_PG_AS\app\views\AccessDeniedView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d463e4236b50_70815340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76ab350e58e5604809c563c7e92fa98d76eb3aac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\app\\views\\AccessDeniedView.tpl',
      1 => 1674860193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d463e4236b50_70815340 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_200896123163d463e42005e6_84337227', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_200896123163d463e42005e6_84337227 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_200896123163d463e42005e6_84337227',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="container">
	<h1 color = 'red'>Odmowa dostępu</h1>

	</div>
<?php
}
}
/* {/block 'top'} */
}
