<?php
/**
 * Template Name: Conoce
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<section class="conoce-intro"><div class="contents">
    <?php
        $projects = get_terms('project', array(
            hide_empty => '0'
        ));

        if ($projects) { ?>
            <ul class="categorias-logros">
                <?php foreach ($projects  as $project ) {
                    $image     = get_field('logo', $project)['sizes']['conoce-intro-logo'];
                    $subtitle  = get_field('subtitle', $project);
                ?>
                    <li class="<?php echo $project->slug; ?>">
                        <div class="text">
                            <strong><?php echo $project->name; ?></strong>
                            <span><?php echo $subtitle; ?></span>
                        </div>

                        <div class="conts">
                            <h1><img src="<?php echo $image; ?>" alt="" /></h1>
                            <?php echo $project->description; ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php }
    ?>

    <div class="categorias-logros-content"></div>
</div></section>

<section class="conoce-logros pagination-wrap"><div class="contents">
    <h1>Logros Inspiradores</h1>

    <div class="pagination-filter">
        <label class="styled-select year">
            <span class="text">Año</span>
            <span class="select-wrap">
                <?php
                    wp_dropdown_categories( array(
                        'show_option_all' => 'Todos ',
                        'taxonomy'        => 'logro_year',
                        'class'           => 'logro_year',
                        'value_field'     => 'slug'
                    ) );
                ?>
            </span>
        </label>

        <label class="styled-select project">
            <span class="text">Proyecto</span>
            <span class="select-wrap">
                <?php
                    wp_dropdown_categories( array(
                        'show_option_all' => 'Todos',
                        'taxonomy'        => 'project',
                        'class'           => 'project',
                        'value_field'     => 'slug'
                    ) );
                ?>
            </span>
        </label>
    </div>

    <div class="pagination-results">
        <?php
            $paged = get_query_var('paged', 1);

            $args = array(
                        'post_type'      => 'inspira_logros',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 8,
                        'paged'          => $paged,
                        'logro_year'     => get_query_var('logro_year'),
                        'project'        => get_query_var('project'),
                    );

            query_posts($args); ?>

                <ul class="logros">
                    <?php while (have_posts()) : the_post();
                        $image = get_field('imagen');
                    ?>
                        <li>
                            <?php if( !empty($image) ): ?>
                                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>

                            <span class="info">
                                <strong><?php the_title(); ?></strong>
                                <?php echo get_field('estadisticas'); ?>
                            </span>

                            <span class="meta">
                                <em class="proyecto"><?php
                                    $projects = get_the_terms( $post->ID, 'project' );

                                    foreach($projects as $taxindex => $taxitem) {
                                        echo $taxitem->name;
                                    }
                                ?></em>
                                <em class="ciudad"><?php
                                    $centros = get_the_terms( $post->ID, 'centros' );

                                    if ($centros) {
                                        $centro = array_values($centros)[0];
                                        $estado = get_field('estado', $centro);
                                        echo $estado;
                                    }
                                ?></em>
                                <em class="year"><?php
                                    $year = get_the_terms( $post->ID, 'logro_year' );

                                    foreach($year as $taxindex => $taxitem) {
                                        echo $taxitem->name;
                                    }
                                ?></em>
                            </span>
                        </li>
                    <?php endwhile; ?>
                </ul>

            <div class="pagination-triggers">
                <span class="prev"><?php next_posts_link('Logros Anteriores...') ?></span>
                <span class="next"><?php previous_posts_link('Logros Recientes...') ?></span>
            </div>

        <?php wp_reset_query(); ?>
    </div>
</div></section>

<section class="conoce-participa"><div class="contents">
    <h1>
        <strong>Participa</strong> en nuestras
        <br />
        <strong>próximas</strong> actividades
    </h1>

    <ul>
        <li class="cursos"><a href="<?php echo get_permalink( get_page_by_path('participa') ); ?>#proximos-eventos">
            Cursos
        </a></li>

        <li class="eventos"><a href="<?php echo get_permalink( get_page_by_path('participa') ); ?>#proximos-eventos">
            Eventos
        </a></li>

        <li class="voluntariado"><a href="<?php echo get_permalink( get_page_by_path('contribuye') ); ?>">
            Voluntariado
        </a></li>
    </ul>
</div></section>

<section class="conoce-imagen"><div class="contents">
    <h1>
        Una imagen dice más
        <small>que mil palabras</small>
    </h1>

    <figure>
        <?php putRevSlider( 'youtube-gallery2' ); ?>
    </figure>
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
