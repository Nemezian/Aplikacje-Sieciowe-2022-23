<?php
/* Smarty version 4.1.0, created on 2023-01-28 00:09:23
  from 'C:\xampp\htdocs\Projekt_PG_AS\app\views\RegistrationView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d459a3d6c925_95402942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a8828564bf6deab613403835d8ca4d49e561b18' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\app\\views\\RegistrationView.tpl',
      1 => 1674860959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d459a3d6c925_95402942 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118739533463d459a3d0bc29_21323621', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_118739533463d459a3d0bc29_21323621 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_118739533463d459a3d0bc29_21323621',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
registration" method="post" class="well form-horizontal">
<fieldset>
	
<legend><center><h2><b>Rejestracja konta</b></h2></center></legend><br>

         <div class="mb-3">
			<label for="id_login" class="form-label">Login: </label></br>
			<input id="id_login" class="form-control" type="text" name="registration_login" />
		</div>
        <div class="mb-3">	
			<label for="id_reg_pass" class="form-label">Hasło: </label></br>
			<input id="id_reg_pass" class="form-control" type="password" name="registration_pass" />
		</div>
		<div class="mb-3">
			<label for="id_rep_pass" class="form-label">Powtórz hasło: </label></br>
			<input id="id_rep_pass" class="form-control" type="password" name="repeated_pass" /><br />
		</div>
			<button type="submit" class="btn btn-primary">Zarejestruj konto</button> 
	</fieldset>
</form>	
</div>
	</div>
<?php
}
}
/* {/block 'top'} */
}
