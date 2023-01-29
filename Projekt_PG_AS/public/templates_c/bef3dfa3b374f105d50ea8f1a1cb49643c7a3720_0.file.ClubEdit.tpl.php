<?php
/* Smarty version 4.1.0, created on 2023-01-29 23:14:29
  from 'C:\xampp\htdocs\Projekt_PG_AS\app\views\ClubEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d6efc596c0c3_96246479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bef3dfa3b374f105d50ea8f1a1cb49643c7a3720' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\app\\views\\ClubEdit.tpl',
      1 => 1675028845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d6efc596c0c3_96246479 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122472269463d6efc581a3e4_67752680', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_122472269463d6efc581a3e4_67752680 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_122472269463d6efc581a3e4_67752680',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div>
<?php if (\core\ParamUtils::getFromCleanURL(0,true,'Błędne wywołanie aplikacji') == "clubCreateShow") {?>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
clubCreate" method="post">
	<fieldset>
		<legend>Tworzenie nowego klubu</legend>
<?php }
if (\core\ParamUtils::getFromCleanURL(0,true,'Błędne wywołanie aplikacji') == "clubEdit") {?>
	<legend>Edycja nazwy klubu</legend>
<?php }?>
		<div>
            <label for="id_clubname">Nazwa klubu</label>
            <input id="id_clubname" type="text" placeholder="nazwa nowego klubu" name="id_clubname">
        </div>
		<div>
			<input type="submit" value="Zapisz"/>
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
clubList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
