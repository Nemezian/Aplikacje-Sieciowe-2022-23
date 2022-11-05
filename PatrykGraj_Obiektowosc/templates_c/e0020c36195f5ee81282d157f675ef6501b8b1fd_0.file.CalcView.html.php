<?php
/* Smarty version 4.2.1, created on 2022-11-05 19:55:23
  from 'C:\xampp\htdocs\PatrykGraj_Obiektowosc\app\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6366b19b45eec3_37170743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0020c36195f5ee81282d157f675ef6501b8b1fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PatrykGraj_Obiektowosc\\app\\CalcView.html',
      1 => 1667674521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6366b19b45eec3_37170743 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14986927846366b19b43fc92_13130223', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'content'} */
class Block_14986927846366b19b43fc92_13130223 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14986927846366b19b43fc92_13130223',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div class="row">
	<div class="col-md-12 col-lg-9  col-lg-offset-1 text-center">	

	<h1 class="title">Kalkulator kredytowy</h1>

	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
		<fieldset>
			<label for="x" class="text-shadows">Kwota kredytu:</label>
			<input id="x" type="text" placeholder="wartość x" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
">
			
			<label for="y" class="text-shadows">Na ile lat?:</label>
			<input id="y" type="text" placeholder="wartość y" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
"></br>

			<label for="interest" class="text-shadows">Oprocentowanie w skali roku:</label>
					<select id="interest" name="interest" class="form-select">

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->interest_name))) {?>
<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['res']->value->interest_name;?>
</option>
<option value="" disabled="true">---</option>
<?php }?>
						<option value="2procent">2%</option>
						<option value="25procent">2.5%</option>
						<option value="3procent">3%</option>
						<option value="35procent">3.5%</option>
					</select></br>

			<button type="submit" class="btn btn-default">Oblicz</button>
		</fieldset>
	</form>
</div>


<div class="col-md-2 col-lg-10">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
		<h4 class="text-shadows">Wystąpiły błędy: </h4>
		<ol class="text-shadows">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
		<h4 class="text-shadows">Informacje: </h4>
		<ol class="text-shadows">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4 class="text-shadows">Rata:</h4>
	<p class="text-shadows">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
