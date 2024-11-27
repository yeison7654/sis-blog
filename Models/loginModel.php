<?php
class UsersModel extends Mysql
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

    // Método para insertar un usuario
    public function insert_user($nombre_completo, $contrasena, $correo, $usuario)
    {
        try {
            $sql = "INSERT INTO `users` (`nombre_completo`, `username`, `password`, `email`) 
                    VALUES (?, ?, ?, ?)";
            $arrData = array(
                $nombre_completo,
                $usuario,
                password_hash($contrasena, PASSWORD_DEFAULT),
                $correo
            );
            return $this->insert($sql, $arrData);
        } catch (Exception $e) {
            return false; // Manejo básico de errores
        }
    }

    // Método para seleccionar un usuario por username o email
    public function select_user($usuario_o_email)
    {
        $sql = "SELECT id, username, email, password 
                FROM users 
                WHERE username = ? OR email = ?";
        $arrData = array($usuario_o_email, $usuario_o_email);
        return $this->select($sql, $arrData);
    }
}
