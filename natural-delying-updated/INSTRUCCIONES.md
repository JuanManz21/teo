# Instrucciones para ejecutar el proyecto "Natural Delying" en XAMPP

Sigue estos pasos para poner en marcha la aplicación en tu entorno local.

## Paso 1: Mover los archivos del proyecto

1.  **Copia todos los archivos** de la carpeta `natural-delying-updated` que te he proporcionado.
2.  **Pégalos** dentro de la carpeta `htdocs` de tu instalación de XAMPP. La ruta suele ser `C:\xampp\htdocs\`. Te recomiendo crear una carpeta específica para el proyecto, por ejemplo: `C:\xampp\htdocs\natural-delying`.

## Paso 2: Crear e importar la base de datos

1.  **Inicia los servicios de Apache y MySQL** en tu panel de control de XAMPP.
2.  Abre tu navegador y ve a `http://localhost/phpmyadmin/`.
3.  Haz clic en la pestaña **"Bases de datos"**.
4.  En el campo "Crear base de datos", escribe `natural_delying` y haz clic en **"Crear"**.
5.  Una vez creada la base de datos, selecciónala en la lista de la izquierda.
6.  Haz clic en la pestaña **"Importar"**.
7.  Haz clic en **"Seleccionar archivo"** y busca el archivo `setup.sql` que se encuentra dentro de la carpeta de tu proyecto.
8.  Haz clic en **"Continuar"** en la parte inferior de la página.

Esto creará todas las tablas necesarias y añadirá los productos y el usuario administrador.

## Paso 3: Acceder a la aplicación

1.  Abre tu navegador y ve a `http://localhost/natural-delying/` (o el nombre de la carpeta que hayas creado en `htdocs`).
2.  ¡Listo! Ya puedes navegar por la página.

## Credenciales del administrador

*   **Usuario:** admin
*   **Contraseña:** admin

Con estas credenciales podrás acceder al panel de administración desde la página de inicio de sesión.
