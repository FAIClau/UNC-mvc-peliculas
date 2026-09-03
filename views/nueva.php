<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nueva película</title>
    <style>
        body { font-family: Arial; max-width: 700px; margin: 40px auto; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea { width: 100%; box-sizing: border-box; padding: 8px; margin-top: 5px; }
        textarea { min-height: 100px; }
        .errores { background: #fee; border: 1px solid #d88; padding: 12px 18px; }
        button { margin-top: 20px; padding: 10px 18px; }
    </style>
</head>
<body>
    <h1>Nueva película</h1>

    <?php if (!empty($errores)): ?>
        <div class="errores">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="index.php?action=guardar" method="POST">
        <label>Título</label>
        <input name="titulo" value="<?= htmlspecialchars($datos['titulo'] ?? '') ?>" required>

        <label>Género</label>
        <input name="genero" value="<?= htmlspecialchars($datos['genero'] ?? '') ?>" required>

        <label>Año</label>
        <input
            type="number"
            name="anio"
            min="1895"
            max="<?= (int) date('Y') + 5 ?>"
            value="<?= htmlspecialchars((string) ($datos['anio'] ?? '')) ?>"
            required
        >

        <label>Descripción</label>
        <textarea name="descripcion" required><?= htmlspecialchars($datos['descripcion'] ?? '') ?></textarea>

        <button type="submit">Guardar película</button>
    </form>

    <p><a href="index.php?action=listar">← Cancelar</a></p>
</body>
</html>
