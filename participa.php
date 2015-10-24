<?php
/**
 * Template Name: Participa
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<section class="participa-actividades"><div class="contents">
    <h1><strong>Participa</strong> en nuestras próximas <strong>actividades</strong></h1>
</div></section>

<section class="participa-inspiracion"><div class="contents">
    <h1>Red de <strong>Inspiración</strong></h1>

    <?php juicer_feed('name=inspira'); ?>
</div></section>

<section class="participa-dona"><div class="contents">
    <h1><img src="" alt="Se parte de la comunidad de voluntarios amigos" /></h1>
    <a href="<?php echo get_permalink( get_page_by_path('contribuye') ); ?>">Dona</a>
</div></section>

<section class="participa-beneficios"><div class="contents">
</div></section>

<section class="participa-blog"><div class="contents">
    <h1>Mira nuestro <strong>Blog</strong></h1>

    <ul>
        <?php
            global $post;
            $args         = array( 'numberposts' => 4 );
            $recent_posts = get_posts( $args );

        foreach( $recent_posts as $post ) :
          setup_postdata($post); ?>

            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('participa-blog'); ?>
                    <?php the_title(); ?>
                </a>
                <date><?php the_date(); ?></date>
                <p><?php the_excerpt(); ?></p>

                <a class="more-link" href="<?php echo get_permalink(); ?>">Ver más &raquo;</a>
            </li>

        <?php endforeach;
        wp_reset_postdata(); ?>
    </ul>
</div></section>

<?php get_footer(); ?>
