<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Películas</title>
    <style>
        body { font-family: Arial; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        nav { display: flex; gap: 10px; margin-bottom: 25px; }
        .boton { padding: 9px 14px; border: 1px solid #bbb; border-radius: 6px; text-decoration: none; }
        article { border: 1px solid #ddd; border-radius: 8px; padding: 16px; margin: 15px 0; }
        a { color: #2457a6; }
    </style>
</head>
<body>
    <h1>Catálogo de películas</h1>

    <nav>
        <a class="boton" href="index.php?action=listar">Todas</a>
        <a class="boton" href="index.php?action=cienciaFiccion">Ciencia ficción</a>
        <a class="boton" href="index.php?action=nueva">+ Agregar película</a>
    </nav>

    <?php if (empty($peliculas)): ?>
        <p>No hay películas para mostrar.</p>
    <?php endif; ?>

    <?php foreach ($peliculas as $pelicula): ?>
        <article>
            <h2><?= htmlspecialchars($pelicula['titulo']) ?></h2>
            <p><?= htmlspecialchars($pelicula['genero']) ?> · <?= (int) $pelicula['anio'] ?></p>
            <a href="index.php?action=detalle&id=<?= (int) $pelicula['id'] ?>">Ver detalle</a>
        </article>
    <?php endforeach; ?>
</body>
</html>
