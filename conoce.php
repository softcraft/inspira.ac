<?php
/**
 * Template Name: Conoce
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<section class="conoce-intro"><div class="contents">
    <figure>
    </figure>

    <div class="content">
        <h1><img src="<?php echo get_template_directory_uri() ?>/img/header-inspira-vida.jpg" alt="Inspira Vida" /></h1>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</div></section>

<section class="conoce-participa"><div class="contents">
    <h1>
        <strong>Participa</strong> en nuestras
        <br />
        <strong>próximas</strong> actividades
    </h1>

    <ul>
        <li class="cursos"><a href="#">
            Cursos
        </a></li>

        <li class="eventos"><a href="#">
            Eventos
        </a></li>

        <li class="voluntariado"><a href="#">
            Voluntariado
        </a></li>
    </ul>
</div></section>

<section class="conoce-banner"><div class="contents">
    <div class="content">
        <blockquote>
            Si lo puedes
            <strong>soñar</strong>
            <span class="puedes">lo puedes</span>
            <strong class="lograr">lograr</strong>
        </blockquote>
        <p class="author">Lidia Pérez</p>
    </div>
</div></section>

<?php get_footer(); ?>
