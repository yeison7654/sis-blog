<?php
class ListaController extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método para mostrar la lista de publicaciones
    public function lista()
    {
        // Obtener todas las publicaciones desde el modelo
        $posts = $this->model->getPosts();

        // Preparar datos para pasar a la vista
        $data = [
            'page_id' => 2,
            'page_tag' => 'Lista de Publicaciones',
            'page_title' => 'Publicaciones Disponibles',
            'page_name' => 'lista',
            'posts' => $posts
        ];

        // Renderizar la vista
        $this->views->getView($this, "lista", $data);
    }

    // Método para mostrar detalles de una publicación específica
    public function detalle($id)
    {
        // Obtener los detalles de una publicación por ID
        $post = $this->model->getPostById($id);

        if (!$post) {
            // Manejar caso de publicación no encontrada
            echo "Publicación no encontrada.";
            die();
        }

        // Preparar datos para pasar a la vista
        $data = [
            'page_id' => 3,
            'page_tag' => 'Detalles de la Publicación',
            'page_title' => 'Detalles',
            'page_name' => 'detalle',
            'post' => $post
        ];

        // Renderizar la vista de detalle
        $this->views->getView($this, "detalle", $data);
    }
}
