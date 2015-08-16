<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */ ?>

<aside class="sidebar secondary">

    <?php get_search_form(); ?>

    <div class="sidebar-box">
        <h2>Entradas Recientes</h2>
        <?php $args = array(
            'numberposts' => 8
        );

        $recent_posts = wp_get_recent_posts( $args, ARRAY_A ); ?>

        <ul>
            <?php
                foreach( $recent_posts as $recent ){
                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                }
            ?>
        </ul>
    </div>

    <div class="sidebar-box">
        <h2>Archivos</h2>
        <?php $args = array(
            'type'            => 'monthly',
            'limit'           => '',
            'format'          => 'html',
            'before'          => '',
            'after'           => '',
            'show_post_count' => false,
            'echo'            => 1,
            'order'           => 'DESC'
        ); ?>

        <ul>
            <?php wp_get_archives( $args ); ?>
        </ul>
    </div>

</aside><!-- .secondary -->

