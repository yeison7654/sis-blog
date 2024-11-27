<?php
class LoginController extends Controllers
{
    public function __construct()
    {
        session_start(["name" => NAME_SESION]);
        parent::__construct();
    }

    // Método para mostrar la vista de login
    public function login()
    {
        $data['page_id'] = 1; // ID de la página
        $data['page_tag'] = "Login | MagtimusPro";
        $data['page_title'] = "Iniciar sesión | MagtimusPro";
        $data['page_name'] = "Login";
        $data["page_filejs"] = array(
            "file1" => "Login/login.js", // Script para el login
            "file2" => "libraries/validate.js" // Librería para validaciones si la tienes
        );
        $this->views->getView($this, "login", $data);
    }

    // Método para manejar el registro de usuarios
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $data = array(
                "title" => "Ocurrio un error inesperado",
                "description" => "Método del formulario no encontrado",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }

        // Obtener los datos del formulario
        $nombre_completo = strClean($_POST["nombre_completo"]);
        $correo = strClean($_POST["correo"]);
        $usuario = strClean($_POST["usuario"]);
        $contrasena = strClean($_POST["contrasena"]);
        $contrasena_confirm = strClean($_POST["contrasena_confirm"]);

        // Validación básica de campos
        if (empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contrasena) || empty($contrasena_confirm)) {
            $data = array(
                "title" => "Error",
                "description" => "No se permite el ingreso de campos vacíos",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }

        // Verificar si las contraseñas coinciden
        if ($contrasena != $contrasena_confirm) {
            $data = array(
                "title" => "Error",
                "description" => "Las contraseñas no coinciden",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }

        // Encriptar la contraseña antes de guardarla
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        // Llamar al modelo para insertar el usuario en la base de datos
        $request = $this->model->insert_user($nombre_completo, $contrasena_encriptada, $correo, $usuario);

        if ($request > 0) {
            $data = array(
                "title" => "Correcto",
                "description" => "Registro completado satisfactoriamente",
                "status" => true,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        } else {
            $data = array(
                "title" => "Error",
                "description" => "No se logró completar el registro",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }
    }

    // Método para manejar el inicio de sesión
    public function singIn()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $data = array(
                "title" => "Error",
                "description" => "Método del formulario no encontrado",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }

        // Obtener los datos del formulario de login
        $usuario = strClean($_POST["usuario"]);
        $contrasena = strClean($_POST["contrasena"]);

        // Validar que no estén vacíos
        if (empty($usuario) || empty($contrasena)) {
            $data = array(
                "title" => "Error",
                "description" => "Los campos no pueden estar vacíos",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }

        // Verificar las credenciales del usuario
        $request = $this->model->select_user($usuario, $contrasena);

        // Si no se encuentra el usuario
        if (!is_array($request)) {
            $data = array(
                "title" => "Error",
                "description" => "Usuario o contraseña incorrectos",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }

        // Si se encuentra el usuario y la contraseña es correcta
        if (count($request) > 0) {
            $_SESSION["chat"]["infoUser"] = $request;
            $_SESSION["Login"] = true;
            $data = array(
                "title" => "Correcto",
                "description" => "Inicio de sesión para el usuario {$usuario} completado",
                "status" => true,
                "datetime" => date("Y-m-d H:i:s"),
                "url" => base_url() . "/chat", // Redirigir al chat o página principal
            );
            echo json_encode($data);
            die();
        }
    }
}
?>
