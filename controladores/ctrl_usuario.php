<?php

require_once ("clases/usuario.php");
require_once ("clases/template.php");


class ControladorUsuario extends ControladorIndex {

	function inicio () {

		if(isset($_POST["correo"])){
			$usr = new Usuario();
			$correo = $_POST["correo"]; 
			$pass = sha1($_POST["password"]);

			if($usr->login($correo,$pass)){
				$this->redirect("inicio","principal");
				exit;
			}else{
				echo "ERROR CONTROLADOR LOGIN";
			}

		}else{

		}

	}

	function registro () {

	}	

	function perfil ($params) {
		
		$usuario = (new Usuario())->obtenerPorId($params);
		$datos = array(
			"usuario" => $usuario,
		);
		$tpl = Template::getInstance();
		$tpl->mostrar("perfil", $datos);
	}

	function editar_perfil ($params) {

	}
}

?>