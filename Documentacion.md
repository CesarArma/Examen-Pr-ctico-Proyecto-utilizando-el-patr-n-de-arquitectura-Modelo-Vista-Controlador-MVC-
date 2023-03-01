# Página de Registro de Productos

![Página de Registro de Productos](https://www.ceupe.com/images/easyblog_articles/3461/productos-en-estantera.jpg)

Esta página es una herramienta útil para registrar, modificar y eliminar productos. Con ella, los administradores podrán mantener una lista de productos actualizada, mientras que los visitantes podrán buscar y visualizar los productos disponibles.

## ¿Cómo se usa?

Para registrar un producto, inicia sesión como administrador usando la cuenta de usuario `cesarprda@gmail.com` y contraseña `123`. Una vez iniciada la sesión, podr

ás ver las casillas vacías que deben ser llenadas con la información del producto, como su nombre, cantidad, proveedor y categoría. Luego de llenar los campos, haz clic en el botón "Insertar" para completar el registro.

![Registro de productos](https://thumbs.dreamstime.com/b/un-bloc-de-notas-vac%C3%ADo-abierto-una-pluma-y-comprimido-en-escritorio-azul-hacer-lista-o-planificaci%C3%B3n-cuaderno-oficina-fondo-166466890.jpg)

En la parte inferior de la página, podrás ver la lista de productos registrados, y dos botones a la derecha de cada producto que permiten modificar y eliminar el producto. Si deseas cerrar la sesión, simplemente haz clic en "Cerrar sesión" en la parte inferior de la página.

## Instrucciones de instalación

Para instalar la página de manera local, sigue los siguientes pasos:

1.  Descarga la carpeta que contiene los archivos de la página en modelo vista controlador y el archivo .SQL de la base de datos.
2.  Arrastra o coloca la carpeta en `htdocs` de XAMPP.
3.  Inicia Apache y MySQL en XAMPP, y luego dirígete a PHP MyAdmin.
4.  Dentro de PHP MyAdmin, crea una base de datos llamada `aw2022`.
5.  Selecciona la base de datos que acabas de crear e importa el archivo SQL `aw2022`.
6.  Una vez se hayan importado correctamente los archivos, dirígete a la ruta de tu página local: `http://localhost/productos%20MVC/index.php`.