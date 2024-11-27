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
}