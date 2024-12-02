<?php
class LoginModel extends Mysql
{
    private $id;

    private $username;
    private $contrasena;
    private $correo;

    public function __construct()
    {
        parent::__construct();
    }  

    public function insert_user($username, $contrasena, $correo)
    {
        $sql = "INSERT INTO `users` (`username`, `contrasena`, `correo`) 
        VALUES (?, ?, ?);";
        $arrData = array(
            $this->username = $username,
            $this->contrasena = $contrasena,
            $this->correo = $correo,
        );
        $request = $this->insert($sql, $arrData);
        return $request;
    }
    public function select_user($username, $contrasena)
    {
        $sql = "SELECT u.id,u.username,u.email FROM users AS u
                WHERE (u.username=? AND u.`contrasena`=?) OR (u.email=? AND u.`contrasena`=?);";
        $arrData = array(
            $this->username = $username,
            $this->contrasena = $contrasena,
            $this->correo = $username,
            $this->contrasena = $contrasena,
        );
        $request = $this->select($sql, $arrData);
        return $request;
    }
}
