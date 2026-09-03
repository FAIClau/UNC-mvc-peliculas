<?php
require_once __DIR__ . '/../models/PeliculaModel.php';

class PeliculaController
{
    private PeliculaModel $modelo;

    public function __construct()
    {
        $this->modelo = new PeliculaModel();
    }

    public function index(): void
    {
        $peliculas = $this->modelo->obtenerTodas();
        require __DIR__ . '/../views/peliculas.php';
    }

    public function detalle(): void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $pelicula = $this->modelo->obtenerPorId($id);
        require __DIR__ . '/../views/detalle.php';
    }

    public function cienciaFiccion(): void
    {
        $peliculas = $this->modelo->obtenerPorGenero('Ciencia ficción');
        require __DIR__ . '/../views/peliculas.php';
    }

    public function nueva(): void
    {
        $errores = [];
        $datos = [
            'titulo' => '',
            'genero' => '',
            'anio' => '',
            'descripcion' => '',
        ];

        require __DIR__ . '/../views/nueva.php';
    }

    public function guardar(): void
    {
        $datos = [
            'titulo' => trim($_POST['titulo'] ?? ''),
            'genero' => trim($_POST['genero'] ?? ''),
            'anio' => trim($_POST['anio'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
        ];

        $errores = [];

        if ($datos['titulo'] === '') {
            $errores[] = 'El título es obligatorio.';
        }

        if ($datos['genero'] === '') {
            $errores[] = 'El género es obligatorio.';
        }

        $anio = filter_var($datos['anio'], FILTER_VALIDATE_INT);
        $anioMaximo = (int) date('Y') + 5;

        if ($anio === false || $anio < 1895 || $anio > $anioMaximo) {
            $errores[] = "El año debe estar entre 1895 y {$anioMaximo}.";
        }

        if ($datos['descripcion'] === '') {
            $errores[] = 'La descripción es obligatoria.';
        }

        if ($errores) {
            require __DIR__ . '/../views/nueva.php';
            return;
        }

        $this->modelo->agregar([
            'titulo' => $datos['titulo'],
            'genero' => $datos['genero'],
            'anio' => $anio,
            'descripcion' => $datos['descripcion'],
        ]);

        // POST -> procesar -> guardar -> redireccionar
        header('Location: index.php?action=listar');
        exit;
    }
}
