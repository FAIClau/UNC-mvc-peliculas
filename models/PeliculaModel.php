<?php

class PeliculaModel
{
    private string $archivo;

    public function __construct()
    {
        $this->archivo = __DIR__ . '/../data/peliculas.json';
    }

    private function obtenerDatos(): array
    {
        if (!file_exists($this->archivo)) {
            return [];
        }

        $contenido = file_get_contents($this->archivo);
        $datos = json_decode($contenido ?: '[]', true);

        return is_array($datos) ? $datos : [];
    }

    public function obtenerTodas(): array
    {
        return $this->obtenerDatos();
    }

    public function obtenerPorId(int $id): ?array
    {
        foreach ($this->obtenerDatos() as $pelicula) {
            if ((int) $pelicula['id'] === $id) {
                return $pelicula;
            }
        }

        return null;
    }

    public function obtenerPorGenero(string $genero): array
    {
        return array_values(array_filter(
            $this->obtenerDatos(),
            fn($p) => $p['genero'] === $genero
        ));
    }

    public function agregar(array $pelicula): void
    {
        $peliculas = $this->obtenerDatos();
        $ids = array_column($peliculas, 'id');
        $pelicula['id'] = empty($ids) ? 1 : max($ids) + 1;
        $peliculas[] = $pelicula;

        file_put_contents(
            $this->archivo,
            json_encode($peliculas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        );
    }
}
