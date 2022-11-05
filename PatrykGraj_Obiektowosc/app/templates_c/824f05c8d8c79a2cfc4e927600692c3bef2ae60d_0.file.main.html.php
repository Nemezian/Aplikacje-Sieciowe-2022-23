<?php
/* Smarty version 4.2.1, created on 2022-11-05 20:06:37
  from 'C:\xampp\htdocs\PatrykGraj_Obiektowosc\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6366b43d260197_83792385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '824f05c8d8c79a2cfc4e927600692c3bef2ae60d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PatrykGraj_Obiektowosc\\templates\\main.html',
      1 => 1667674591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6366b43d260197_83792385 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Patryk Graj">
	
	<title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Kalkulator kredytowy" ?? null : $tmp);?>
</title>

	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/gt_favicon.png">
	
	<!-- Bootstrap itself -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/magister.css">

	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">

<nav class="mainmenu">
	<div class="container">
		<div class="dropdown">
			<button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<li><a href="#head" class="active">Kalkulator</a></li>
				<li><a href="#contact">Kontakt</a></li>
			</ul>
		</div>
	</div>
</nav>


<!-- Main (Home) section -->
<section class="section" id="head">
	<div class="container">

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19756022006366b43d25cc32_55896192', 'content');
?>

            
	</div>
</section>

<!-- Fourth (Contact) section -->
<section class="section" id="contact">
	<div class="container">
	
		<h2 class="text-center title">Kontakt</h2>

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text-center">
				<p>Główne maile:</p>
				<p><b>patryk.graj@o365.us.edu.pl</b><br><br></p>
				<p><b>logicpatryk@gmail.com</b><br><br></p>
				<ul class="list-inline list-social">
					<li><a href="https://github.com/Nemezian" class="btn btn-link"><i class="fa fa-github fa-fw"></i> Github</a></li>
				</ul>
			</div>
		</div>

	</div>
</section>


<!-- Load js libs only when the page is loaded. -->
<?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/modernizr.custom.72241.js"><?php echo '</script'; ?>
>
<!-- Custom template scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/magister.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'content'} */
class Block_19756022006366b43d25cc32_55896192 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19756022006366b43d25cc32_55896192',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
