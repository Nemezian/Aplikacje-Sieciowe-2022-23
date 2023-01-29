<?php
/* Smarty version 4.1.0, created on 2023-01-29 19:31:19
  from 'C:\xampp\htdocs\Projekt_PG_AS\app\views\ClubCreation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d6bb77648fc6_65383241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0443d078b7bef5bcbb59d22560d48ffb8cd10840' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\app\\views\\ClubCreation.tpl',
      1 => 1674907411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d6bb77648fc6_65383241 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_127004353863d6bb775a6b75_02229734', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_127004353863d6bb775a6b75_02229734 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_127004353863d6bb775a6b75_02229734',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
clubCreate" method="post">
	<fieldset>
		<legend>Tworzenie nowego klubu</legend>
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
