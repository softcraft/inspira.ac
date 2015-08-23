<?php
/**
 * Template Name: Descubre
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<section class="descubre-mision"><div class="contents">
    <?php while ( have_posts() ) : the_post(); ?>
        <h1>Misión</h1>

        <div class="conts">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</div></section>

<section class="descubre-voluntarios"><div class="contents">
    <h1>Nuestro eje es la formación integral de voluntarios</h1>
    <p>Propiciamos que los <strong>voluntarios</strong> descubran su <strong>potencial interior</strong> y desarrollen nuevas capacidades para <strong>experimentar</strong> la vida de una forma más <strong>plena</strong> y <strong>feliz</strong>.</p>

    <div class="carousel">
        <?php
            $args = array(
                        'post_type'      => 'inspira_voluntarios',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 20
                    );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul class="inspira-voluntarios">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li>
                            <img src="<?php echo get_field('imagen')['sizes']['thumbnail']; ?>"  alt="" />
                            <strong><?php echo get_field('nombre'); ?></strong>
                            <?php echo get_field('ocupacion'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }
            wp_reset_query();
        ?>

        <p>Conoce algunos de nuestros voluntarios</p>
    </div>

    <figure>
        <iframe width="308" height="208" src="https://www.youtube.com/embed/6gbiyDHnKx8?list=PLprzt7qzv68xth8M9JXO_Y4BpE8wcSgzr&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </figure>
</div></section>

<section class="descubre-apoyo"><div class="contents">
    <img src="<?php echo get_template_directory_uri(); ?>/img/ico-dona-big.png" alt="" />

    <div class="conts">
        <h1>Tu apoyo hace la <strong>diferencia</strong></h1>
        <p>Recibimos donativos anónimos de parte de nuestros voluntarios, empresas, instituciones y público en general.</p>
    </div>
</div></section>

<section class="descubre-foot"><div class="contents">
    <img src="<?php echo get_template_directory_uri(); ?>/img/bg-descubre-foot.jpg" alt="" />
    <div class="conts">
        <p>En <strong>inspira</strong> estamos abriéndonos a <strong>nuevas ideas</strong>, a <strong>nuevas formas de vivir</strong>, en las que nos responsabilizamos amorosamente de nuestras vidas y de nuestro mundo</p>
    </div>
</div></section>

<?php get_footer(); ?>
