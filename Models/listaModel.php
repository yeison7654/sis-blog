<?php
class ListaModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    // Obtener todas las publicaciones activas
    public function getPosts()
    {
        $sql = "SELECT * FROM tbl_posts WHERE is_active = 1";
        return $this->select_all($sql);
    }

    // Obtener una publicación específica por ID
    public function getPostById($id)
    {
        $sql = "SELECT * FROM tbl_posts WHERE id = ?";
        $arrData = array($id);
        return $this->select($sql, $arrData);
    }

    // Agregar una nueva publicación
    public function addPost($author, $title, $content, $is_active)
    {
        $sql = "INSERT INTO tbl_posts (author, title, content, is_active) VALUES (?, ?, ?, ?)";
        $arrData = array($author, $title, $content, $is_active);
        return $this->insert($sql, $arrData);
    }

    // Actualizar una publicación
    public function updatePost($id, $title, $content, $is_active)
    {
        $sql = "UPDATE tbl_posts SET title = ?, content = ?, is_active = ? WHERE id = ?";
        $arrData = array($title, $content, $is_active, $id);
        return $this->update($sql, $arrData);
    }

    // Eliminar una publicación
    public function deletePost($id)
    {
        $sql = "DELETE FROM tbl_posts WHERE id = ?";
        $arrData = array($id);
        return $this->delete($sql, $arrData);
    }
}
