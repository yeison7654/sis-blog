<?php
class LoginModel extends Mysql
{
    private $id;
    private $nombre_completo;
    private $contrasena;
    private $correo;
    private $usuario;

    public function __construct()
    {
        parent::__construct();
    }  
}
