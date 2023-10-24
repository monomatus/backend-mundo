Backend Evaluacion Mundo Pacifico


Requisitos:
- Laragon

Instrucciones:
1) Clonar repositorio en la carpeta de Laragon "C:/Laragon/www"
2) Iniciar Laragon
3) Seleccionar opcion de "Iniciar Todo" y luego seleccionar el boton "Base de Datos"
4) crear una base de datos, con el nombre "mundopacifico"
5) Iniciar Terminal, dirigirse a carpeta clonada con "cd mundo-app" y ejecutar comando

   "composer install"

En la misma consola debemos ingresar los siguientes comandos:

    "cp .env.example .env"
    "php artisan keye:generate"

Esto creara los archivos de configuracion de la base de datos.
        
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=mundopacifico
        DB_USERNAME=root
        DB_PASSWORD=

Con esto se finaliza la configuracion de la Base de Datos.



Para inicializar la API

Ejecuar los siguietnes comandos

* php artisan migrate:fresh
* php artisan db:seed

Con esto la API quedará ejecutandose en 

    mundo-app.test/



Herramientas utilizadas

- PHP 8.1.10
- Composer version 2.4.1
- Base de Datos MySql





