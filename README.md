# Laravel Image Gallery CRUD

Galería de imágenes web. Permite añadir imágenes y ponerle un título, luego muestra el listado con posibilidad de eliminar las fotos que no queramos o editarlas (solo el título).

La aplicación cuenta con test unitarios básicos para rutas y comprobar que existe la base de datos. La base es sqlite para evitar las complicaciones de tener que instalar un motor de bases de datos para testear un ejemplo de CRUD.


## Qué es Laravel

Laravel es un framework de código abierto para desarrollar aplicaciones y servicios web con PHP 5, PHP 7 y PHP 8. Su filosofía es desarrollar código PHP de forma elegante y simple, evitando el "código espagueti". Fue creado en 2011 y tiene una gran influencia de frameworks como Ruby on Rails, Sinatra y ASP .NET MVC.​

## Instalar el proyecto
Para instalar el proyecto es necesario clonar el repositorio si tienes git instalado (esto es opcional, puedes descargarlo [aquí](https://git-scm.com/downloads)) en el pc o puedes descargar el .zip desde [aquí](https://github.com/JDamianCabello/laravel-image-gallery/archive/refs/heads/master.zip).

El comando para clonar el repositorio (en caso de no descargar el .zip) desde la consola es:

    git clone https://github.com/JDamianCabello/laravel-image-gallery.git

De una forma u otra tendrás una carpeta llamada **laravel-image-gallery-master**

Para ejecutar los comandos de PHP, necesitas tener PHP instalado, según tu plataforma puedes seguir un tutorial u otro:


|[Windows](https://code.tutsplus.com/es/tutorials/how-to-install-php-on-windows--cms-35435)|[Linux](https://www.scriptcase.net/docs/es_es/v9/manual/02-scriptcase-installation/06-linux_php/)|[Mac](https://www.neoguias.com/instalar-php-macos/)|
|--|--|--|

Una vez instalado PHP, necesitamos instalar composer, esto se puede hacer [desde su web](https://getcomposer.org/doc/00-intro.md). Donde también encontraremos información de uso e instalación.

Con todo listo entramos dentro de la carpeta, abrimos un terminal/cmd y usamos el comando de composer para instalar las dependencias:

    composer install

Se instalaran todas las dependencias necesarias para ejecutar la galería web. Una vez acabada la instalación usaremos el comando de laravel para ejecutar el servidor local:

    php artisan serve

Con esto tendremos el servidor en local para probar la galería en la url [127.0.0.1:8000](http://127.0.0.1:8000)

## FAQ

- Si tienes problemas con la base de datos, dentro del proyecto vamos a la carpeta `database`, dentro de la misma encontraremos un fichero llamado `database.sqlite`.

  Eliminamos el fichero y creamos un nuevo fichero llamado igual **database.sqlite** y ejecutamos en el terminal/cmd el comando que nos crea la estructura de tablas en la base de datos el cual es: **`php artisan migrate`**.


