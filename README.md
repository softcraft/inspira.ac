# Tema Inspira.ac
Tema de Wordpress oficial para Inspira.ac.

## Instalación
1. Instalar wordpress normalmente.
2. Agregar el tema a la carpeta de `wp-themes`.
3. Instalar y activar el plugin [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
4. Descargar [el wordpress mexicano](https://es-mx.wordpress.org) y copiar la carpeta `wp-content/languages` en el servidor (sólo es necesaria esta carpeta).

## Configuración (desde el admin)
1. Editar las configuraciones generales (nombre del sitio, dirección, etc. etc.). Asegurarse de cambiar el idioma de WordPress a "Español de México".
2. Configurar los permalinks. No olviden crear y actualizar el archivo `.htaccess` si es que WordPress no pudo hacerlo automáticamente.
3. Seleccionar el tema en el menu de Apariencia - Temas.
4. Crear un nuevo menú en `Apariencia -> Menús`. Después de crearlo, en la pestaña "Gestionar Lugares" pueden seleccionar en dónde aparecerá. Asignenlo a `Main Nav`. Este es el menú del header.
5. En la pantalla de `Editar Menus`, abajo del saludo que aparece arriba a la derecha de la pantalla hay dos botones: `Opciones de pantalla` y `Ayuda`. Click en `Opciones de pantalla` y asegúrense que en las propiedades avanzadas del menú está seleccionado `Descripción`. Al crear nuevos elementos para el menú, el campo de "etiqueta" es el título de la sección en grande, mayúsculas y negritas; mientras que el campo de descripción es el texto que aparecerá abajo en una fuente un poco más pequeña.
6. En la barra lateral, hasta abajo habrá un menú que dice "Options". Aquí encontrarán los campos para poner la URL de Facebook y Twitter de la organización. Estos aparecen en el footer.
7. Crear dos páginas estáticas: `Home` (no olviden asignar la plantilla de '`Home`') y `Blog`. Después, en las opciones de `Lectura` seleccionar que la página frontal muestre una página estática, seleccionando `Home`, y `Blog` como la página de entradas.

## Agregando contenido:

### Home > Presencia
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Acciones`.
* El título de cada post es el "label" que aparece. Es importante para que las imágenes salgan adecuadamente que estos sean: `Difunde`, `Dona`, `Participa` e `Inspira`. La capitalización no importa.
* El contenido de cada post es el texto que aparece en la parte de la derecha en grande. No debe tomar más de 2 líneas.

### Home > Facebook
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Facebook Posts`.
* Es importante que todas las imágenes de los custom posts de Facebook sean del mismo tamaño. Recomiendo 1000x350. Pueden usar el mismo editor de WR para generar estos tamaños, pero es muy importante que al momento de agregarlas sean del mismo tamaño.

### Home > Logros
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Logros`.
* Todos los campos son requeridos. Las imagenes cambian de tamaño automáticamente, pueden subir cualquier foto.

## Blog
* Es importante que todos los posts tengan una imágen. El diseño depende mucho de ello.
