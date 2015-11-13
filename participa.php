<?php
/**
 * Template Name: Participa
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<section class="participa-actividades"><div class="contents">
    <h1>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ico-eventos.png" alt="" />
        <span>
            <strong>Participa</strong> en nuestras próximas <strong>actividades</strong>
        </span>
    </h1>

    <?php
        $args = array(
                    'post_type'      => 'inspira_eventos',
                    'post_status'    => 'publish',
                    'order'          => 'asc',
                    'posts_per_page' => 6
                );
        $query = new WP_Query($args);

        if ( $query->have_posts() ) { ?>
            <ul class="inspira-eventos">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li><div><a href="<?php echo the_permalink(); ?>">
                        <img src="<?php echo get_field('imagen')['sizes']['voluntarios-thumb']; ?>"  alt="" />
                        <strong><?php the_title(); ?></strong>
                        <date><?php echo get_field('fecha'); ?></date>

                        <span class="button white">Participar</span>
                    </a></div></li>
                <?php endwhile; ?>
            </ul>
        <?php }
        wp_reset_query();
    ?>
</div></section>

<section class="participa-inspiracion"><div class="contents">
    <h1>Red de <strong>Inspiración</strong></h1>

    <?php juicer_feed('name=inspira&per=6'); ?>
</div></section>

<section class="participa-dona"><div class="contents">
    <h1>Se parte de la comunidad de <strong>voluntarios amigos</strong></h1>
    <a href="<?php echo get_permalink( get_page_by_path('contribuye') ); ?>" class="more-link">Dona</a>
</div></section>

<section class="participa-beneficios"><div class="contents">
    <h1>Beneficios</h1>

    <div class="carousel">
        <?php
            $args = array(
                        'post_type'      => 'inspira_beneficios',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 20
                    );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul class="inspira-beneficios">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li><div>
                            <?php the_content(); ?>
                        </div></li>
                    <?php endwhile; ?>
                </ul>
            <?php }
            wp_reset_query();
        ?>
    </div>
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
                <a href="<?php the_permalink(); ?>" class="title">
                    <span class="thumb">
                        <?php the_post_thumbnail('participa-blog'); ?>
                    </span>
                    <strong class="title"><?php the_title(); ?></strong>
                </a>
                <date><?php the_date(); ?></date>
                <?php the_excerpt(); ?>

                <a class="more-link" href="<?php echo get_permalink(); ?>">Ver más &raquo;</a>
            </li>

        <?php endforeach;
        wp_reset_postdata(); ?>
    </ul>
</div></section>

<?php get_footer(); ?>
