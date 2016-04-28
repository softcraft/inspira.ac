<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */

get_header(); ?>

    <section class="eventos single"><div class="contents">

        <article class="single-entry">
            <?php while ( have_posts() ) : the_post(); ?>
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>

                <footer>
                    <date><?php echo date_i18n('F j Y g:i a', get_field('fecha')); ?></date>
                </footer>

                <figure class="featured-img">
                    <?php the_post_thumbnail( 'single-thumb' ); ?>
                </figure>

                <?php the_content(); ?>

                <div class="map">
                    <?php  $location = get_field('google_map');

                    if( !empty($location) ): ?>
                        <div class="acf-map event_map">
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="confirmar-asistencia">
                    <h2>Confirma tu asistencia</h2>
                    <?php echo do_shortcode( '[contact-form-7 id="114" title="Eventos - Confirmar Asistencia"]' ); ?>
                </div>
            <?php endwhile; ?>

        </article>

    </div></section>

<?php get_footer(); ?>
