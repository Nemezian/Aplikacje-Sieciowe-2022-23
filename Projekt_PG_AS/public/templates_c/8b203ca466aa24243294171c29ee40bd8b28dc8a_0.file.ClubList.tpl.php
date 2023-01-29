<?php
/* Smarty version 4.1.0, created on 2023-01-29 23:21:29
  from 'C:\xampp\htdocs\Projekt_PG_AS\app\views\ClubList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d6f1699c8e54_70076813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b203ca466aa24243294171c29ee40bd8b28dc8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\app\\views\\ClubList.tpl',
      1 => 1675030887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d6f1699c8e54_70076813 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124080827663d6f1693c0f33_69308479', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_167202953263d6f16941fdd8_69203367', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_124080827663d6f1693c0f33_69308479 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_124080827663d6f1693c0f33_69308479',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="mb-3">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
clubList">
<legend><center><h2><b>Lista klubów</b></h2></center></legend><br>
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwa klubu" name="sf_clubname" /><br />
		<button type="submit">Filtruj</button>
	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_167202953263d6f16941fdd8_69203367 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_167202953263d6f16941fdd8_69203367',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if (\core\RoleUtils::inRole("User") && !(\core\RoleUtils::inRole("Player")) && !(\core\RoleUtils::inRole("Administrator")) && !(\core\RoleUtils::inRole("Captain"))) {?>
	<div>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
clubCreateShow">Utwórz klub</a>
	</div>	
<?php }?>

<table class="table" id="tab_people">
<thead>
	<tr>
		<th scope="col">Nazwa klubu</th>
		<th scope="col">Wygrane</th>
		<th scope="col">Remisy</th>
		<th scope="col">Porażki</th>
		<th scope="col">Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clubs']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
<tr><th scope="row"><?php echo $_smarty_tpl->tpl_vars['c']->value["club_name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["wins"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["draws"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["losses"];?>
</td><td><?php if (\core\RoleUtils::inRole("User") && !(\core\RoleUtils::inRole("Player")) && !(\core\RoleUtils::inRole("Administrator")) && !(\core\RoleUtils::inRole("Captain"))) {?><a class="button-small pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
clubJoin/<?php echo $_smarty_tpl->tpl_vars['c']->value['club_id'];?>
">Dołącz</a>&nbsp;<?php }
if ((\core\RoleUtils::inRole("Captain") && \core\SessionUtils::load("clid",true) == $_smarty_tpl->tpl_vars['c']->value['club_id'])) {?><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
clubEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['club_id'];?>
">Edytuj</a>&nbsp;<?php }
if ((\core\RoleUtils::inRole("Captain") && \core\SessionUtils::load("clid",true) == $_smarty_tpl->tpl_vars['c']->value['club_id']) || \core\RoleUtils::inRole("Administrator")) {?><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
clubDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['club_id'];?>
">Usuń</a><?php }
if ((\core\RoleUtils::inRole("Player") && \core\SessionUtils::load("clid",true) == $_smarty_tpl->tpl_vars['c']->value['club_id'])) {?><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
clubLeave/<?php echo $_smarty_tpl->tpl_vars['c']->value['club_id'];?>
">Opuść</a><?php }?></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
