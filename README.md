Leadaki Frontend
================

Esta versión ya incluye las dependecias instaladas por composer, así que es ideal para instalar
en hosting compartidos a los que no siempre se tiene la posibilidad de conectar por SSH.

Los pasos para hacer funcionar las landings de leadaki PHP en tu sitio son:

1. Clonar este repositorio a tu servidor web.
2. Dar permisos de escritura a la carpeta __cache__
3. Editar el archivo __config/config.php__ para que la línea 6 refleje el código de sitio proporcionado por Leadaki.
4. En la línea 52 de __config/config.php__ introducir la URL completa del sitio ("http://www.ejemplo.com")
