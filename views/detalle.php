<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Detalle</title>
</head>
<body style="font-family:Arial;max-width:750px;margin:40px auto">
    <?php if ($pelicula): ?>
        <h1><?= htmlspecialchars($pelicula['titulo']) ?></h1>
        <p><strong>Género:</strong> <?= htmlspecialchars($pelicula['genero']) ?></p>
        <p><strong>Año:</strong> <?= (int) $pelicula['anio'] ?></p>
        <p><?= nl2br(htmlspecialchars($pelicula['descripcion'])) ?></p>
    <?php else: ?>
        <h1>Película no encontrada</h1>
    <?php endif; ?>

    <p><a href="index.php?action=listar">← Volver al listado</a></p>
</body>
</html>
