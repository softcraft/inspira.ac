# Tema Inspira.ac
Tema de Wordpress oficial para Inspira.ac.

## Instalación
1. Instalar wordpress normalmente.
2. Agregar el tema a la carpeta de `wp-themes`.
3. Instalar y activar el plugin [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
4. Instalar y activar el plugin [Contact Form 7](https://wordpress.org/plugins/contact-form-7/screenshots/)
5. Descargar [el wordpress mexicano](https://es-mx.wordpress.org) y copiar la carpeta `wp-content/languages` en el servidor (sólo es necesaria esta carpeta).

## Configuración (desde el admin)
1. Editar las configuraciones generales (nombre del sitio, dirección, etc. etc.). Asegurarse de cambiar el idioma de WordPress a "Español de México".
2. Configurar los permalinks. No olviden crear y actualizar el archivo `.htaccess` si es que WordPress no pudo hacerlo automáticamente.
3. Seleccionar el tema en el menu de Apariencia - Temas.
4. Crear un nuevo menú en `Apariencia -> Menús`. Después de crearlo, en la pestaña "Gestionar Lugares" pueden seleccionar en dónde aparecerá. Asignenlo a `Main Nav`. Este es el menú del header.
5. En la pantalla de `Editar Menus`, abajo del saludo que aparece arriba a la derecha de la pantalla hay dos botones: `Opciones de pantalla` y `Ayuda`. Click en `Opciones de pantalla` y asegúrense que en las propiedades avanzadas del menú está seleccionado `Descripción`. Al crear nuevos elementos para el menú, el campo de "etiqueta" es el título de la sección en grande, mayúsculas y negritas; mientras que el campo de descripción es el texto que aparecerá abajo en una fuente un poco más pequeña.
6. En la barra lateral, hasta abajo habrá un menú que dice "Options". Aquí encontrarán los campos para poner la URL de Facebook y Twitter de la organización. Estos aparecen en el footer.
7. Crear dos páginas estáticas: `Home` (no olviden asignar la plantilla de '`Home`') y `Blog`. Después, en las opciones de `Lectura` seleccionar que la página frontal muestre una página estática, seleccionando `Home`, y `Blog` como la página de entradas.

## Agregando contenido:
* Los slugs de las páginas tienen que ser: `descubre`, `conoce`, `participa`, `contribuye`, `blog`.

### Home > Presencia
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Acciones`.
* El título de cada post es el "label" que aparece. Es importante para que las imágenes salgan adecuadamente que estos sean: `Difunde`, `Dona`, `Participa` e `Inspira`. La capitalización no importa.
* El contenido de cada post es el texto que aparece en la parte de la derecha en grande. No debe tomar más de 2 líneas.

### Home > Facebook
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Facebook Posts`.
* Es importante que todas las imágenes de los custom posts de Facebook sean del mismo tamaño. Recomiendo 1000x350. Pueden usar el mismo editor de WR para generar estos tamaños, pero es muy importante que al momento de agregarlas sean del mismo tamaño.

### Home > Logros
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Logros Home`.
* Todos los campos son requeridos. Las imagenes cambian de tamaño automáticamente, pueden subir cualquier foto.

## Blog
* Es importante que todos los posts tengan una imágen. El diseño depende mucho de ello.

## Conoce

### Logros
* Es un custom post, se encuentra en el sidebar bajo el nombre de `Logros`.
* WordPress no hace fácil el limitar la cantidad de taxonomias que pueden agregar a un elemento (cosa buena), así que dependerá de ustedes no ponerle más de un año o más de una ciudad a los logros.

### Conoce > Categorías
* Esta es la primer sección de la página de conoce (con bolitas a la izquierda y la descripción a la derecha).
* Estos elementos son parte de una taxonomía custom llamada "Proyecto" que se encuentra en el sidebar bajo "Logros" (porque es una taxonomía de logros).
* El "Nombre" es el título de la categoría. El slug es importante que sea: `inspira-vida`, `inspira-jovenes`, `inspira-padres-y-maestros`, `inspira-cuidados`, `inspira-animalia`, `inspira-viajes` para que el color de la bolita de la izquierda sea el correcto.
* Hay un campo extra llamado "Subtitle" que es el texto que aparece abajo del título en la bolita de la izquierda.

### Contribuye
* Al crear esta página, lo que se agregue en el WYSIWYG es el contenido que aparecerá en "dona". Por ahora será un formulario de contacto que manejaremos con [Contact Form 7](https://wordpress.org/plugins/contact-form-7/screenshots/). Una vez instalado el plugin hay que crear (o editar) el formulario de contacto (aparece un nuevo menú en el sidebar llamado "Contact"). Esto depende mucho de sus configuraciones, pero el HTML del formulario debe verse como esto:

```
<ul>
  <li><label>
        Nombre Completo
        [text* nombre]
    </label></li>
  <li><label>
        Fecha de Nacimiento
        [text* fecha-nacimiento]
    </label></li>
  <li><label>
        Estado
        [text* estado]
    </label></li>
  <li><label>
        Municipio
        [text* municipio]
    </label></li>
  <li><label>
        Ciudad
        [text* ciudad]
    </label></li>
  <li><label>
        CP
        [text* cp]
    </label></li>
</ul>
<div class="buttons">[submit "Siguiente"]</div>
```

Básicamente, una lista desordenada con un label que contiene texto y es input por línea. Los asteriscos significan que son campos requeridos. La configuración de cómo y cuando se mandan estos campos queda a su criterio y la pueden editar en la tab de "Mail". Una vez creado y guardado su formulario, copien el short-code (algo como `[contact-form-7 id="71" title="Dona Form"]`) y péguenlo como el contenido de la página de contribuye (en el WYSIWYG).

El formulario se ve distinto al PSD por dos motivos: consistencia con el diseño de los formularios (creo que sólo es el borde que cambia de color, puedo cambiarlo) y tiene labels y no placeholders. Los placeholders no son labels, y usarlos como tal es mala accesibilidad y usabilidad. Puedo cambiarlos, pero no lo recomiendo (usuarios de IE sólo verán inputs sin saber qué tienen que escribir en cada campo).
