## Proyecto Web de peliculas para Digital House

Esta web contiene un listado de peliculas y sus detalles, como actores o fechas de estreno. Tambien tenemos recomendaciones o la 
posibilidad de agregar o modificar peliculas (si somos Admin).

## Instalación

Para comenzar a probar el proyecto en nuestra maquina primero necesitamos realizar ciertos pasos.

Cuando descarguemos el proyecto debemos realizar una actualización de los paquetes de Laravel con el comando: 

```
composer update
```

***El proyecto fue realizado con la versíon 5.8 de Laravel y la versión 7.2.8 de PHP.***

**[Descargar PHP 7.2 para Windows](https://windows.php.net/download#php-7.2)**

Una vez que tengamos actualizados los paquetes debememos levantar la base de datos MySQL llamada **"movies_db"** incluida en el proyecto. En este caso fue utilizado el software *MySQL Workbench*. El archivo .env de Laravel esta configurado con los siguientes datos:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=movies_db
DB_USERNAME=root
DB_PASSWORD=root
```

Una vez que tengamos los paquetes de Laravel actualizados y la base de datos funcionando ya podemos empezar a trabajar con el proyecto. No se olviden
de realizar el comando 
```
php artisan serv
```
para levantar el servidor de Laravel.

## Tips a tener en cuenta

- La pagína web tiene en funcionamiento una API que se accede a través de *http://localhost:8000/api/peliculas* el cual nos devuelve los detalles de las peliculas en formato JSON.

- Solo pueden acceder al A/B/M el usuario "Admin" o "admin". Se debe registrar un usuario con cualquier de esos nombres.

###### Proyecto realizado por Candela Grosso para el curso de desarrollo Web Full Stack de Digital House