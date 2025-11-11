**Instrucciones para la configuración de la base de datos**

Para configurar la base de datos para la aplicación Natural Delying, siga estos pasos:

1. **Inicie XAMPP:** Abra el panel de control de XAMPP y asegúrese de que los módulos de Apache y MySQL estén en funcionamiento.

2. **Abra phpMyAdmin:** Haga clic en el botón `Admin` de la fila de MySQL para abrir phpMyAdmin en su navegador.

3. **Cree la base de datos:**
    * Vaya a la pestaña `Bases de datos`.
    * En el campo `Crear base de datos`, introduzca `natural_delying` y haga clic en `Crear`.

4. **Importe el archivo `setup.sql`:**
    * Seleccione la base de datos `natural_delying` recién creada en la barra lateral izquierda.
    * Vaya a la pestaña `Importar`.
    * Haga clic en `Elegir archivo` y seleccione el archivo `setup.sql` de la carpeta del proyecto.
    * Haga clic en `Continuar` en la parte inferior de la página para importar la estructura de la base de datos y los datos iniciales.

Una vez completados estos pasos, su base de datos estará lista para la aplicación.
