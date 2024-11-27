<?php
class RecibirController extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método para procesar el formulario de agregar publicación
    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recibir datos del formulario
            $author = strClean($_POST['author']);
            $title = strClean($_POST['title']);
            $content = strClean($_POST['content']);
            $is_active = isset($_POST['is_active']) ? 1 : 0;

            // Insertar datos en la base de datos
            $result = $this->model->saveFormData($author, $title, $content, $is_active);

            // Verificar resultado
            if ($result) {
                header("Location: " . base_url() . "/lista");
            } else {
                echo "Error al guardar la publicación.";
            }
        } else {
            echo "Método no permitido.";
        }
    }

    // Método para procesar el formulario de actualizar publicación
    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recibir datos del formulario
            $author = strClean($_POST['author']);
            $title = strClean($_POST['title']);
            $content = strClean($_POST['content']);
            $is_active = isset($_POST['is_active']) ? 1 : 0;

            // Actualizar datos en la base de datos
            $result = $this->model->updateFormData($id, $author, $title, $content, $is_active);

            // Verificar resultado
            if ($result) {
                header("Location: " . base_url() . "/lista");
            } else {
                echo "Error al actualizar la publicación.";
            }
        } else {
            echo "Método no permitido.";
        }
    }
}
