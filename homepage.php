<?php
/**
 * Template Name: Homepage
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<main class="mastcontent" role="main">
    <section class="page-intro home-inspira"><div class="contents">
        <img src="<?php echo get_template_directory_uri() ?>/img/header-home.jpg" alt="" />

        <div class="text">
            <div>
                <h1>Inspiramos</h1>
                Y acompañamos a las personas a descubrir su potencial y expresar <strong>su amor a la vida</strong>
            </div>
        </div>
    </div></section>

    <section class="nuestra-cultura"><div class="contents">
        <h1>Nuestra Cultura</h1>
    </div></section>

    <section class="home-facebook"><div class="contents">
        <h1>Nuestro facebook está lleno de <strong>Inspiración</strong></h1>

        <?php
            $args = array(
                        'post_type'      => 'inspira_fb',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 10
                    );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <div class="facebook-list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="slide">
                            <?php the_content(); ?>
                            <div class="caption"></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php }
            wp_reset_query();
        ?>
    </div></section>

    <section class="page-intro home-footer"><div class="contents">
        <img src="<?php echo get_template_directory_uri() ?>/img/bg-home-footer.jpg" alt="" />

        <div class="text">
            <div>
                Un mundo mejor, más humano, donde haya más respeto y amor, depende de humanos con una mayor conciencia
            </div>
        </div>
    </div></section>

</main>

<?php get_footer(); ?>
