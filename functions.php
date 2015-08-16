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

if ( ! function_exists('inspira_setup') ) :

    function inspira_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(660, 320, false);
        add_image_size('modal-thumb', 320, 370, true);
        add_image_size('mini-thumb', 150, 150, true);

        register_nav_menus( array(
            'primary' => __('Main Nav', 'inspira')
        ) );
    }

endif;
add_action('after_setup_theme', 'inspira_setup');

function inspira_scripts() {
    wp_enqueue_style('inspira-fonts', '//fonts.googleapis.com/css?family=Raleway:100,300,900,700,400,600,500|Lato:300,700,400,900|Josefin+Sans:700');
    wp_enqueue_style('inspira-styles', get_stylesheet_uri());

    wp_register_script('inspira-scripts', get_template_directory_uri().'/js/scripts.js');
    wp_enqueue_script('inspira-scripts');
}
add_action('wp_enqueue_scripts', 'inspira_scripts');

if ( function_exists('register_field_group') ) {
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
            'hide_on_screen' => array (
            )
        ),
        'menu_order' => 0
    ));
}

include_once('acf-options-page.php');
?>
