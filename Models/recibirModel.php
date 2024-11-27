<?php
class RecibirModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método para guardar datos enviados desde un formulario
    public function saveFormData($author, $title, $content, $is_active)
    {
        $sql = "INSERT INTO tbl_posts (author, title, content, is_active) VALUES (?, ?, ?, ?)";
        $arrData = array($author, $title, $content, $is_active);
        return $this->insert($sql, $arrData);
    }

    // Actualizar datos de una publicación existente desde el formulario
    public function updateFormData($id, $author, $title, $content, $is_active)
    {
        $sql = "UPDATE tbl_posts SET author = ?, title = ?, content = ?, is_active = ? WHERE id = ?";
        $arrData = array($author, $title, $content, $is_active, $id);
        return $this->update($sql, $arrData);
    }
}
