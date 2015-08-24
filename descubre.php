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

<section class="descubre-experiencias"><div class="contents">
    <img src="<?php echo get_template_directory_uri(); ?>/img/bg-experiencias.jpg" alt/"" />
</div></section>

<section class="descubre-centros"><div class="contents">
    <h1>Centros <strong>Inspira</strong></h1>

    <p>Somos una organización sin fines de lucro, estamos presentes en 11 centros de la República Mexicana</p>
</div></section>

<section class="descubre-apoyo"><div class="contents">
    <a href="<?php echo get_permalink( get_page_by_path('contribuye') ); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ico-dona-big.png" alt="" />
    </a>

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
