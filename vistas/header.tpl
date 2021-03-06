<nav class="navbar navbar-expand-lg navbar-dark cabecera">
	<img class="navbar-brand icono" src="{$url_base}img/icono.png" onclick="window.location='{$url_inicio}'">
	<a class="navbar-brand font-weight-bold tituloheader" href="#" title="Ir a inicio" onclick="window.location='{$url_inicio}'" >{$nombre_proyecto}</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<form class="form-inline mx-auto" action="{$url_base}inicio/buscar" method="GET" onsubmit="return false">
			<input type="text" hidden id="url_base" value="{$url_base}">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Nombre, tipo o dueño" aria-label="Search" name="busqueda" id="busqueda">
				<div class="input-group-btn">
					<button class="btn btn-outline-success" id="btnBuscar" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>
		<ul class="navbar-nav menu">
			{if isset($usuario)}
			<li class="nav-item dropdown">
				<a class="nav-link fas fa-bell" id="campanaNotif" href="#" title="Notificaciones" data-toggle="dropdown">
					{$notifs = $usuario->getNotificaciones()}
					{if !empty($notifs)}
					{$nuevas = 0}
					{foreach $notifs as $notif}
					{if $notif->getVista() == false}
					{$nuevas = $nuevas+1 }
					{/if}
					{/foreach}
					{if $nuevas != 0}
					<div id="notifAlert">
						<span class="fas fa-comment"></span>
						<span class="num" id="cantNotificaciones">{$nuevas}</span>
					</div>
					{/if}
					{/if}
				</a>

				<div class="dropdown-menu dropdown-menu-right menu-notificaciones" id="notificaciones">
					<h6 class="menu-notificaciones-titulo"><span class="fas fa-bell"></span> Notificaciones</h6>
					<table class="table">
						<tbody>
							{if !empty($notifs)}
							{foreach $notifs as $notif}
							{if $notif->getVista() == false}
							<tr class="notification nueva" id="{$notif->getId()}">
								<th scope="row"><i class="fa fa-dot-circle"></i></th>	
								<td>{$notif->getContenido()}</td>
								<td><div class="eliminar_notificacion" onclick="eliminarNotificacion({$notif->getId()})"><i class="fa fa-times"></i></div></td>
							</tr>
							{/if}
							{/foreach}
							{foreach $notifs as $notif}
							{if $notif->getVista() == true}
							<tr class="notification" id="{$notif->getId()}">
								<th scope="row"><i class="fa fa-dot-circle"></i></th>	
								<td>{$notif->getContenido()}</td>
								<td><div class="eliminar_notificacion" onclick="eliminarNotificacion({$notif->getId()})"><i class="fa fa-times"></i></div></td>
							</tr>
							{/if}
							{/foreach}
							{else}
							<tr>
								<th>No tienes ninguna notificación</th>
							</tr>
							{/if}

						</tbody>
					</table>
				</div><!-- agregado -->
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link fas fa-inbox {if isset($active_mensajes)} {$active_mensajes} {/if}" href="#" title="Mensajes" data-toggle="dropdown">
					{if isset($notificacionesMensaje)}
					<span class="fas fa-comment"></span>
					<span class="num">{count($notificacionesMensaje)}</span>
					{/if}
				</a>


				<div class="dropdown-menu dropdown-menu-right menu-notificaciones" id="notif-mensajes">
					<h6 class="menu-notificaciones-titulo"><span class="fa fa-inbox"></span> Mensajes</h6>
					<table class="table">
						<tbody>
							{if isset($notificacionesMensaje)}
							{foreach $notificacionesMensaje as $notiMens}
							<tr class="notification" onClick="window.location='{$url_mensaje}/{$notiMens->getCorreo()}'">
								<th scope="row">{$notiMens->getNombre()}</th>
								<td>{$notiMens->getMensaje()}</td>
							</tr>
							{/foreach}
							{else}
							<tr>
								<th>No tienes mensajes nuevos</th>
							</tr>
							{/if}
						</tbody>
					</table>
					<div class="ver_conversaciones"><a onClick="window.location='{$url_mensaje}'" href="#">Ver conversaciones</a></div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle {if isset($active_perfil)} {$active_perfil} {/if} " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="{$url_base}{$usuario->getImagen()}" title="Cuenta de File Seller" class="rounded-circle img-user">
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#" onClick="window.location='{$url_perfil}'"><i class="fas fa-user menu-perfil" aria-hidden="true"></i>Mi perfil</a>
					<a class="dropdown-item" href="#" onClick="window.location='{$url_subir_archivo}'"><i class="fas fa-upload menu-perfil" ></i>Subir archivo </a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#" onClick="window.location='{$url_logout}'"><i class="fas fa-sign-out-alt menu-perfil"></i>Cerrar sesión</a>
				</div>
			</li>
			{else}
			<li class="nav-item {if isset($active_iniciarSesion)} {$active_iniciarSesion} {/if}">
				<a class="nav-link" href="#" title="Iniciar sesión" onClick="window.location='{$url_login}'">Iniciar sesión</a>
			</li>
			<li class="nav-item {if isset($active_registrarse)} {$active_registrarse} {/if}">
				<a class="nav-link" href="#" title="Registrarse" onClick="window.location='{$url_registro}'">Registrarse</a>
			</li>
			{/if}
		</ul>
	</div>
</nav>

