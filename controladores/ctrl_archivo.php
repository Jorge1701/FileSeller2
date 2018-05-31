	<?php

require_once ("clases/archivo.php");
require_once ("controladores/ctrl_index.php");
require_once ("clases/usuario.php");
require_once ("clases/comentarios.php");

class ControladorArchivo extends ControladorIndex {

	function descargar($params = array()) {
		(new Archivo ())->bajar("uploads/" . $params[1]);
	}

	function ver($params = array()) {
		if (isset ($_POST["comentario"])) {
			$id = Auth::estaLogueado();
			if ($id != null) {
				(new Comentarios ())->enviarComentario ($params[0], (new Usuario ())->obtenerPorId ($id)->getCorreo (), $_POST["comentario"]);
			}
		}

		$tpl = Template::getInstance();
		$archivo = (new Archivo())->obtenerPorId($params[0]);
		$duenio = (new usuario())->obtenerPorId($archivo->getDuenio());
		$datos = array(
			"archivo" => $archivo,
			"duenio" => $duenio,
			"url_ver_perfil_duenio" => (new ControladorIndex())->getUrl("usuario", "perfil"),
			"comentarios" => (new Comentarios ())->obtenerComentarios ($params[0])
		);
		$tpl->mostrar("ver_archivo", $datos);
	}

	function eliminar($params = array()) {
		$tpl = Template::getInstance();
		$usuario_logueado =  (new usuario())->obtenerPorId(Auth::estaLogueado());
		$flag = false;

		if($usuario_logueado != null){

			$a = (new Archivo())->obtenerPorId($params[0]);
			$duenio = (new usuario())->obtenerPorId($a->getDuenio());

			if($usuario_logueado->getId() == $duenio->getId() || $usuario_logueado->esAdmin()){

				if($usuario_logueado->esAdmin()){

					$contenido = "Su archivo "."<strong>".$a->getNombre()."</strong>"." ha sido eliminado por contenido indebido.";

					if((new Notificacion())->enviar($duenio->getId(),$contenido)){
						$flag = true;
					}
				}

				if ((new Archivo())->eliminar($a->getId())) {


					$nuevos_archivos = (new Archivo())->getArchivosUser($duenio->getId());
					
					if($flag){
						$datos = array(
							"archivo_subido" => "Archivo eliminado correctamente",
							"lista_archivos" => $nuevos_archivos,
						);

					}else{
						$datos = array(
							"archivo_subido" => "Archivo eliminado correctamente(Fallo notificar)",
							"lista_archivos" => $nuevos_archivos,
						);
					}

					$tpl->mostrar("inicio",$datos);

					}else{ //error al eliminar

						$datos = array(
							"archivo_subido" => "Hubo un error al procesar su solicitud",
						);

						$tpl->mostrar("inicio",$datos);
					}

				}else{

					$datos = array(
						"archivo_subido" => "Archivo Elimina.. opa te la creiste, suerte la proxima!",
					);

					$tpl->mostrar("inicio", $datos);

				}


				}else{//redirigir al inicio
					$datos = array(
						"archivo_subido" => "Debe loguearse para ver esta pagina",
					);

					$tpl->mostrar("inicio",$datos);
				}

			}



			function subir() {

				$tpl = Template::getInstance();
				$id = Auth::estaLogueado();
				if (isset($_FILES["archivo"]) && isset($_POST["nombre"])) {
					$subidoOK = (new Archivo())->subir($id);
					if ($subidoOK == 0) {
						$datos = array(
							"archivo_subido" => "Su archivo fue subido exitosamente",
                "active_incio" => "active", //Activar el boton inicio del header
                "lista_archivos" => (new Archivo())->getListado(), //Lista de futuras recomendaciones
            );
						$tpl->mostrar("inicio", $datos);
						return;
					} elseif ($subidoOK == 1) {
						$mensaje = "El archivo excede el tamaño maximo soportado (100MB)";
					} else {
						$mensaje = "Hubo un error al subir el archivo, es posible que haya un problema en la configuracion del servidor, o que no se haya podido mover el archivo.";
					}
					$datos = array(
						"active_subir_archivo" => "active",
						"nombre_archivo" => $_POST["nombre"],
						"descripcion_archivo" => $_POST["descripcion"],
						"precio_archivo" => isset($_POST["precio"]) ? $_POST["precio"] : "",
						"moneda_archivo" => $_POST["moneda"],
						"mensaje" => $mensaje,
					);
					$tpl->mostrar("subir_archivo", $datos);
				} else {

					if (!$id) {
						(new ControladorIndex())->redirect("inicio", "principal");
					}
					$datos = array(
						"active_perfil" => "active",
					);
					$tpl->mostrar("subir_archivo", $datos);
				}
			}

		}

		?>
