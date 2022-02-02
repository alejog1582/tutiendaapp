# Prueba tecnica Tu Tienda App.

## Ambiente Requerido

- "php": "^7.3|^8.0", -"laravel/framework": "^8.40", -Mysql

## Instalacion

1. Clonar el repositorio en el folder del servidor web en uso o en el de su elección, este folder debe tener permisos para que php se pueda ejecutar por CLI y permisos de lectura y escritura para el archivo .env.

```
https://github.com/alejog1582/tutiendaapp.git
```
2. Instalar paquetes ejecutando en la raíz del folder.

```
composer install
```

3. Crear BD con COLLATE 'utf8mb4_general_ci'.

```
`CREATE DATABASE prueba_tutiendaapp COLLATE 'utf8mb4_general_ci`;
```

4. Duplique el archivo .env.example incluido en uno de nombre .env y dentro de este ingrese los valores de las variables de entorno necesarias, las básicas serían las siguientes:

- ```DB_DATABASE=prueba_tutiendaapp``` Variable de entorno para el nombre de BD.
- ```DB_HOST="value"``` Variable de entorno para el host de BD.
- ```DB_PORT="value"```Variable de entorno para el puerto de BD.
- ```DB_USERNAME="value"```Variable de entorno para el usuario de BD.
- ```DB_PASSWORD="value"```Variable de entorno para la contraseña de BD.
- ```CLOUDINARY_URL=CLOUDINARY_URL=cloudinary://115445911984168:ASTSHUy78PnxDQYURtw45jKXJ8E@dikbf3xct``` Conexion con Cloudinary donde se guardara las imagenes en la cracion de productos.
- ```CLOUDINARY_NOTIFICATION_URL=CLOUDINARY_URL=cloudinary://115445911984168:ASTSHUy78PnxDQYURtw45jKXJ8E@dikbf3xct``` Conexion con Cloudinary donde se guardara las imagenes en la cracion de productos.

5. En la raiz del sitio ejecutar:

- ```php artisan migrate``` Crea la estructura de BD.

6. Levantar el servidor bajo la URL http://127.0.0.1:8000.

```
php artisan serve
```

7. Se debe registrar el usuario que tiene los permisos para crear marcas, productos y visulizar ordenes de pedido. Este usaurio es cliente_tutiendaapp@example.com. 

8. Uva vez se alla ingreado con el usuario administradro en el home podra administar las marcas, productos y pedidos.

## Descripcion de Rutas

- / => URL deinicio del sitio.
- /login => Autenticacion
- /register => Formulario de registro
- /dashboard => Historial de pedidios con base al correo electronico del usuario vs la creacion del pedido. Para el usuario administrador muestra los enlaces a las rutas de administracion del sitio.
- /marcas => Administracion de marcas. middleware con usuario administrador.
- /marcas/new => Creacion de una marcas. middleware con usuario administrador.
- /administracion/productos => Creacion de un producto. middleware con usuario administrador.
- /productosexistentes => Administracion de productos activos. middleware con usuario administrador.
- /productosdesactivados => Administracion de productos inactivos. middleware con usuario administrador.
- /administracion/pedidos => Administracion de productos. middleware con usuario administrador.

## Autor

Jose Alejandro Gonzalez Rondon alejog1582@gmail.com. 
