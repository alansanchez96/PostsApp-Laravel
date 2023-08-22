# Blog Auto-Adminitrable

## Prologo

En esta aplicacion he volcado gran parte de mi conocimiento en arquitectura de software. En este caso he utilizado la arquitectura DDD (hexagonal para conocedores) donde nos desintoxicamos del núcleo de Laravel que trae por defecto para hacerlo más escalable al momento de agregar mas microservicios y/o funcionalidades dentro de la misma aplicación sin necesidad de realizar una conexion proxy con otra microservicio.
Se han utilizado muchas tecnicas de codigo limpio que se describen en el famoso libro ***Clean Code*** por lo que hace que la aplicación tenga mucha escala a futuro y la implementacion de 1 o más servicios sea muy sencilla.

## Indice
<a href="#indice"></a>

1. [Requisitos](#requisitos)
2. [Deployment Local](#deploymentlocal)

## Requisitos
<a href="#requisitos"></a>

1) Requisitos
    * PHP 8.0 o +[Web oficial](https://www.php.net/downloads)
    * Composer 2.2 o +[Web oficial](https://getcomposer.org/download/)
    * MySQL [Web oficial](https://www.mysql.com/downloads/)
    * Node 16 o + [Web oficial](https://nodejs.org/es)

## Deployment Local
<a href="#deploymentlocal"></a>

1) Ejecute el siguiente comando en la raiz de su proyecto

    ```bash
        $ cp .env.example .env
    ```

2) Verifique que las credenciales de tu base de datos local (MySQL) coincidan con las variables de entorno en .env

    ```bash
        DB_HOST=
        DB_PORT=
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
    ```

3) Copie y pegue el siguiente comando ejecutable en la raiz del proyecto.

    ```bash
        $ composer install && npm install
    ```

4) Corra las migraciones en tu base de datos y los seeders

    ```bash
        $ php artisan migrate
    ```
    ```bash
        $ php artisan db:seed
    ```

5) Para levantar cada microservicio de manera local ejecute en 2 terminales distintas en la raíz del proyecto

    ```bash
        $ php artisan serve
    ```

    ```bash
        $ npm run dev
    ```

6) Ya puedes ver la aplicación corriendo en tu sistema


## Disfruta de la aplicación

# Author

[![linkedin-shield-alansanchez]][linkedin-alansanchez-url] [![portfolio]][portfolio-alansanchez] <br>

<p align="left"><a href="#indice">Volver al Indice</a></p>

[portfolio]: https://img.shields.io/badge/-Portfolio-orange?style=for-the-badge&logo=appveyor

[linkedin-shield-alansanchez]: https://img.shields.io/badge/-Alan_Sanchez-black.svg?style=for-the-badge&logo=linkedin&color=0A66C2
[linkedin-alansanchez-url]: https://linkedin.com/in/alansanchez96
[portfolio-alansanchez]: https://dev-alansan.netlify.app/