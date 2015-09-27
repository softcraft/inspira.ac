<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */

class Menu_With_Description extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><strong>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</strong><br /><small>' . $item->description . '</small>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

function custom_excerpt_length( $length ) {
    return 13;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if ( ! function_exists('inspira_setup') ) :

    function inspira_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('html5', array( 'search-form' ));

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(660, 320, false);
        add_image_size('index-thumb', 500, 300, true);
        add_image_size('single-thumb', 605, 330, true);
        add_image_size('logros-thumb', 200, 160, false);
        add_image_size('logros-list', 211, 211, false);
        add_image_size('voluntarios-thumb', 95, 95, true);
        add_image_size('facebook-thumb', 1000, 350, true);
        add_image_size('participa-blog', 320, 180, true);
        add_image_size('conoce-intro-logo', 380, 9999, false);

        register_nav_menus( array(
            'primary' => __('Main Nav', 'inspira')
        ) );
    }

endif;
add_action('after_setup_theme', 'inspira_setup');

function inspira_scripts() {
    wp_enqueue_style('inspira-fonts', '//fonts.googleapis.com/css?family=Raleway:100,300,900,700,400,600,500|Lato:300,700,400,900|Josefin+Sans:400');
    wp_enqueue_style('inspira-accordion', get_template_directory_uri().'/css/raccordion.css');
    wp_enqueue_style('inspira-slick', get_template_directory_uri().'/css/slick.css');
    wp_enqueue_style('inspira-styles', get_stylesheet_uri());

    wp_register_script('inspira-accordion', get_template_directory_uri().'/js/jquery.raccordion.js', array('jquery'));
    wp_register_script('inspira-easing', get_template_directory_uri().'/js/jquery.animation.easing.js', array('jquery'));
    wp_register_script('inspira-slick', get_template_directory_uri().'/js/slick.js', array('jquery'));
    wp_register_script('inspira-scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'));
    wp_enqueue_script('inspira-accordion');
    wp_enqueue_script('inspira-easing');
    wp_enqueue_script('inspira-slick');
    wp_enqueue_script('inspira-scripts');
}
add_action('wp_enqueue_scripts', 'inspira_scripts');

function create_fb() {
    $labels = array(
        'name'               => _x('Facebook Posts', 'post type general name'),
        'singular_name'      => _x('Facebook Post', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Value'),
        'edit_item'          => __('Edit Value'),
        'new_item'           => __('New Value'),
        'view_item'          => __('View Value'),
        'search_items'       => __('Search Values'),
        'not_found'          => __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );
    $args = array(
        'label'             => __('Facebook Posts'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'fb'),
        'supports'          => array('title', 'editor'),
        'show_in_nav_menus' => false
    );
    register_post_type('inspira_fb', $args);
}
add_action('init', 'create_fb');

function create_acciones() {
    $labels = array(
        'name'               => _x('Acciones', 'post type general name'),
        'singular_name'      => _x('Acción', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Value'),
        'edit_item'          => __('Edit Value'),
        'new_item'           => __('New Value'),
        'view_item'          => __('View Value'),
        'search_items'       => __('Search Values'),
        'not_found'          => __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );
    $args = array(
        'label'             => __('Acciones'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'acciones'),
        'supports'          => array('title', 'editor'),
        'show_in_nav_menus' => false
    );
    register_post_type('inspira_acciones', $args);
}
add_action('init', 'create_acciones');

function create_logros_home() {
    $labels = array(
        'name'               => _x('Logros Home', 'post type general name'),
        'singular_name'      => _x('Logro', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Value'),
        'edit_item'          => __('Edit Value'),
        'new_item'           => __('New Value'),
        'view_item'          => __('View Value'),
        'search_items'       => __('Search Values'),
        'not_found'          => __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );
    $args = array(
        'label'             => __('Logros Home'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'logros_home'),
        'supports'          => array(null),
        'show_in_nav_menus' => false
    );
    register_post_type('inspira_logros_home', $args);
}
add_action('init', 'create_logros_home');

function create_logros() {
    $labels = array(
        'name'               => _x('Logros', 'post type general name'),
        'singular_name'      => _x('Logro', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Value'),
        'edit_item'          => __('Edit Value'),
        'new_item'           => __('New Value'),
        'view_item'          => __('View Value'),
        'search_items'       => __('Search Values'),
        'not_found'          => __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );
    $args = array(
        'label'             => __('Logros'),
        'labels'            => $labels,
        'public'            => false,
        'taxonomies'        => array('category'),
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'logros'),
        'supports'          => array('title', 'editor'),
        'show_in_nav_menus' => false
    );
    register_post_type('inspira_logros', $args);
}
add_action('init', 'create_logros');

function create_logros_taxonomies() {
    register_taxonomy('logro_year', 'inspira_logros', array(
        'label'        => __( 'Year' ),
        'rewrite'      => array( 'slug' => 'year' ),
        'show_ui'      => true,
        'query_var'    => true,
        'capabilities' => array(
            'assign_terms' => 'edit_posts',
            'edit_terms'   => 'manage_categories'
        )
    ));

    register_taxonomy('project', 'inspira_logros', array(
        'label'        => __( 'Proyecto' ),
        'rewrite'      => array( 'slug' => 'project' ),
        'show_ui'      => true,
        'query_var'    => true,
        'capabilities' => array(
            'assign_terms' => 'edit_posts',
            'edit_terms'   => 'manage_categories'
        )
    ));
}
add_action( 'init', 'create_logros_taxonomies' );

function create_voluntarios() {
    $labels = array(
        'name'               => _x('Voluntarios', 'post type general name'),
        'singular_name'      => _x('Voluntario', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Value'),
        'edit_item'          => __('Edit Value'),
        'new_item'           => __('New Value'),
        'view_item'          => __('View Value'),
        'search_items'       => __('Search Values'),
        'not_found'          => __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );
    $args = array(
        'label'             => __('Voluntarios'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'voluntarios'),
        'supports'          => array(''),
        'show_in_nav_menus' => false
    );
    register_post_type('inspira_voluntarios', $args);
}
add_action('init', 'create_voluntarios');

if ( function_exists('register_field_group') ) {
    register_field_group(array (
        'id' => 'acf_logros-fields',
        'title' => 'Logros Fields',
        'fields' => array (
            array (
                'key'           => 'field_55d1067ba3eab',
                'label'         => 'Cantidad',
                'name'          => 'cantidad',
                'type'          => 'text',
                'instructions'  => 'Número que aparece en grande.',
                'required'      => 1,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'none',
                'maxlength'     => 8
            ),
            array (
                'key'           => 'field_55d1069ba3eac',
                'label'         => 'Etiqueta',
                'name'          => 'etiqueta',
                'type'          => 'wysiwyg',
                'instructions'  => 'La descripción que aparece abajo de la cantidad.',
                'required'      => 1,
                'default_value' => '',
                'toolbar'       => 'basic',
                'media_upload'  => 'no'
            ),
            array (
                'key'           => 'field_55d106b7a3ead',
                'label'         => 'Imagen',
                'name'          => 'imagen',
                'type'          => 'image',
                'instructions'  => 'La imagen que aparece.',
                'required'      => 1,
                'save_format'   => 'object',
                'preview_size'  => 'logros-thumb',
                'library'       => 'uploadedTo'
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'     => 'post_type',
                    'operator'  => '==',
                    'value'     => 'inspira_logros_home',
                    'order_no'  => 0,
                    'group_no'  => 0
                ),
            ),
        ),
        'options' => array (
            'position'          => 'normal',
            'layout'            => 'no_box',
            'hide_on_screen'    => array ()
        ),
        'menu_order' => 0
    ));

    register_field_group(array (
        'id' => 'acf_logro',
        'title' => 'Logro',
        'fields' => array (
            array (
                'key'           => 'field_55d150c02ddfc',
                'label'         => 'imagen',
                'name'          => 'imagen',
                'type'          => 'image',
                'instructions'  => 'Imagen del logro',
                'required'      => 1,
                'save_format'   => 'object',
                'preview_size'  => 'logros-list',
                'library'       => 'uploadedTo'
            ),
            array (
                'key' => 'field_55d8ea1f423a0',
                'label' => 'estadisticas',
                'name' => 'estadisticas',
                'type' => 'textarea',
                'instructions' => 'Descripción. Este campo aparecerá en el roll-over de la sección de "Conoce". Una estadística por línea. No más de 4.',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'     => 'post_type',
                    'operator'  => '==',
                    'value'     => 'inspira_logros',
                    'order_no'  => 0,
                    'group_no'  => 0
                ),
            ),
        ),
        'options' => array (
            'position'          => 'normal',
            'layout'            => 'no_box',
            'hide_on_screen'    => array ()
        ),
        'menu_order' => 0
    ));

    register_field_group(array (
        'id'     => 'acf_links-externos',
        'title'  => 'Links Externos',
        'fields' => array (
            array (
                'key'           => 'field_55420c34e0956',
                'label'         => 'Facebook',
                'name'          => 'facebook',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
            array (
                'key'           => 'field_55420c48e0957',
                'label'         => 'Twitter',
                'name'          => 'twitter',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0
                ),
            ),
        ),
        'options' => array (
            'position'       => 'normal',
            'layout'         => 'no_box',
            'hide_on_screen' => array ()
        ),
        'menu_order' => 0
    ));

    register_field_group(array (
        'id'     => 'acf_proyectos',
        'title'  => 'Proyectos',
        'fields' => array (
            array (
                'key'           => 'field_55d8ed0307732',
                'label'         => 'Subtitle',
                'name'          => 'subtitle',
                'type'          => 'text',
                'instructions'  => 'Texto corto que aparece abajo del título hasta arriba de la sección "Conoce".',
                'required'      => 1,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
            array (
                'key'           => 'field_55d8f2bdff2af',
                'label'         => 'logo',
                'name'          => 'logo',
                'type'          => 'image',
                'instructions'  => 'El logo que aparece en la parte derecha al seleccionar un botón. Sin restricciones de dimensiones, pero no debería pasar de 335px de ancho.',
                'save_format'   => 'url',
                'preview_size'  => 'conoce-intro-logo',
                'library'       => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'     => 'ef_taxonomy',
                    'operator'  => '==',
                    'value'     => 'project',
                    'order_no'  => 0,
                    'group_no'  => 0,
                ),
            ),
        ),
        'options' => array (
            'position'       => 'normal',
            'layout'         => 'no_box',
            'hide_on_screen' => array (),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array (
        'id'     => 'acf_voluntarios',
        'title'  => 'Voluntarios',
        'fields' => array (
            array (
                'key'           => 'field_55da3c9eaa442',
                'label'         => 'Nombre',
                'name'          => 'nombre',
                'type'          => 'text',
                'required'      => 1,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
            array (
                'key'           => 'field_55da3cbaaa443',
                'label'         => 'Ocupación',
                'name'          => 'ocupacion',
                'type'          => 'text',
                'required'      => 1,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
            array (
                'key'           => 'field_55da3cc6aa444',
                'label'         => 'Imagen',
                'name'          => 'imagen',
                'type'          => 'image',
                'required'      => 1,
                'save_format'   => 'object',
                'preview_size'  => 'voluntarios-thumb',
                'library'       => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'inspira_voluntarios',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position'       => 'normal',
            'layout'         => 'no_box',
            'hide_on_screen' => array (),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array (
        'id'     => 'acf_acciones',
        'title'  => 'Acciones',
        'fields' => array (
            array (
                'key'           => 'field_55f46294817d5',
                'label'         => 'Link',
                'name'          => 'link',
                'type'          => 'text',
                'instructions'  => 'EL link a donde va a apuntar el título.',
                'required'      => 1,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'none',
                'maxlength'     => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'inspira_acciones',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position'       => 'normal',
            'layout'         => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

include_once('acf-options-page.php');
?>
