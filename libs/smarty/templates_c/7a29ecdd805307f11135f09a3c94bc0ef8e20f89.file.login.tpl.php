<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-17 23:47:01
         compiled from "vistas\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9408001915ad664e5b82034-32272619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-18 00:13:23
         compiled from "vistas\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14136813255ad6718300ff98-34885521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a29ecdd805307f11135f09a3c94bc0ef8e20f89' => 
    array (
      0 => 'vistas\\login.tpl',
<<<<<<< HEAD
      1 => 1524001543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9408001915ad664e5b82034-32272619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad664e5bb9c61_92470765',
  'variables' => 
  array (
    'url_base' => 0,
=======
      1 => 1524003200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14136813255ad6718300ff98-34885521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url_base' => 0,
    'mensaje' => 0,
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad671830aa211_15160947',
),false); /*/%%SmartyHeaderCode%%*/?>
<<<<<<< HEAD
<?php if ($_valid && !is_callable('content_5ad664e5bb9c61_92470765')) {function content_5ad664e5bb9c61_92470765($_smarty_tpl) {?><!DOCTYPE html>
=======
<?php if ($_valid && !is_callable('content_5ad671830aa211_15160947')) {function content_5ad671830aa211_15160947($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
<html>
<head>
	<?php echo $_smarty_tpl->getSubTemplate ("include_css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<title>Login</title>
</head>
<body background="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
img/wallpaper.jpg">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!-- ----------------------------------------------------------------------------- -->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 mx-auto card text-center">
				<div class="mx-auto" style="margin-top: 10px"><h4>Iniciar sesión</h4></div>
				<hr>
				<form method="post">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">@</span>
						</div>
						<input name="correo" id="correo" type="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required="Ingrese su correo" autofocus title="Ingrese su correo">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-lock" id="basic-addon1"></span>
						</div>
						<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" autofocus title="Mínimo 6 / Máximo 21" required="Mínimo 6 / Máximo 21"/>
					</div>
					<?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?> 
						<div style="color: red"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
						<br>
					 <?php }?>
					<input id="check" type="checkbox" aria-label="Recordarme">Recordarme
					<br>
					<button id="btnLogin" class="btn btn-success" style="margin: 20px 0px ">Iniciar Sesión</button>
				</form>
				<a href="#" style="margin: 5px 0px">Registrarse</a>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>