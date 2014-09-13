Leadaki Frontend
================


1) Instalación version ligera con composer
-------------------------------------------

Esta version no incluye las dependencias que se instalan a traves de __composer__.

1. Siga las instrucciones en el sitio para instalar composer: [https://getcomposer.org/doc/00-intro.md]()
2. Ejecutar: `composer install` en la carpeta del proyecto para instalar las dependencias.
3. Dar permisos de escritura a la carpeta __cache__
4. Crear un archivo __config/config.php__ basado en el archivo __config/config.php.dist__

2) Instalación version fat
---------------------------

Esta versión ya incluye las dependecias instaladas en el paso anterior con composer, esta versión es ideal para instalar
en hosting compartidos a los que no siempre se tiene la posibilidad de conectar por SSH.

1. Dar permisos de escritura a la carpeta __cache__
2. Crear un archivo __config/config.php__ basado en el archivo __config/config.php.dist__

