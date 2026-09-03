# Ejemplo MVC en PHP vainilla

Ejemplo didáctico sin Laravel ni base de datos.

Flujo principal:

Navegador → index.php → Controller → Model → JSON → View → Response

Incluye listado, filtro, detalle, alta de películas, validación HTML5 y del servidor, persistencia JSON y redirección después de POST.

## Ejecutar

Desde esta carpeta:

    php -S localhost:8000

Luego abrir http://localhost:8000

La carpeta `data` debe tener permisos de escritura.

## Para discutir en clase

- ¿Quién conoce el JSON?
- ¿Quién recibe GET y POST?
- ¿Quién genera HTML?
- ¿Qué cambiaría si reemplazáramos JSON por una BD?
- ¿Por qué guardar() redirecciona?
