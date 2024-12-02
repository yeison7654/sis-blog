<?php
class Login extends Controllers
{
    public function __construct()
    {
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

    public function singIn()
    {
        if (!$_POST) {
            $data = array(
                "title" => "Ocurrio un error inesperado",
                "description" => "Metodo del formulario no encontrado",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }
        $userName = strClean($_POST["txtUserName"]);
        $userPassword = strClean($_POST["txtPassword"]);
        if ($userName == "" || $userPassword == "") {
            $data = array(
                "title" => "Ocurrio un error inesperado",
                "description" => "No se permite el ingreso de campos vacios",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }
        $userPassword = md5($userPassword);
        $request = $this->model->select_user($userName, $userPassword);
        if (!is_array($request)) {
            $data = array(
                "title" => "Ocurrio un error inesperado",
                "description" => "Usuario o contraseña incorrectos/Usuario no creado",
                "status" => false,
                "datetime" => date("Y-m-d H:i:s"),
            );
            echo json_encode($data);
            die();
        }
        if (count($request) > 0) {
            $_SESSION["chat"]["infoUSer"] = $request;
            $_SESSION["Login"] = true;
            $data = array(
                "title" => "Correcto",
                "description" => "Inicio de sesion para el usuario {$userName} completado",
                "status" => true,
                "datetime" => date("Y-m-d H:i:s"),
                "url" => base_url() . "/chat",
            );
            echo json_encode($data);
            die();
        }
    }
}