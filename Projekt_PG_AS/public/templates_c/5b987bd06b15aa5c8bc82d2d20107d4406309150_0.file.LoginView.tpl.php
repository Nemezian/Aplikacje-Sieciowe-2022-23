<?php
/* Smarty version 4.1.0, created on 2023-01-28 00:42:35
  from 'C:\xampp\htdocs\Projekt_PG_AS\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d4616b0d4a30_51327840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b987bd06b15aa5c8bc82d2d20107d4406309150' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\app\\views\\LoginView.tpl',
      1 => 1674861008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d4616b0d4a30_51327840 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_135257644163d4616b0749c0_81824935', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_135257644163d4616b0749c0_81824935 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_135257644163d4616b0749c0_81824935',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
<legend><center><h2><b>Logowanie do systemu</b></h2></center></legend><br>
	<fieldset>
        <div class="mb-3">
			<label for="id_login">Login: </label></br>
			<input id="id_login" type="text" name="login" maxlength="30" size="30"/>
		</div>
        <div class="mb-3">
			<label for="id_pass">Hasło: </label></br>
			<input id="id_pass" type="password" name="pass" maxlength="30" size="30"/><br />
		</div>
		<button type="submit" class="btn btn-primary">Zaloguj</button>
	</fieldset>
</form>	
<?php
}
}
/* {/block 'top'} */
}
