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

<section class="conoce-logros"><div class="contents">
    <h1>Logros Inspiradores</h1>

    <?php
        $args = array(
                    'post_type'      => 'inspira_logros',
                    'post_status'    => 'publish',
                    'order'          => 'asc',
                    'posts_per_page' => 8
                );
        $query = new WP_Query($args);

        if ( $query->have_posts() ) { ?>
            <ul class="logros">
                <?php while ($query->have_posts()) : $query->the_post();
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
        <?php }
        wp_reset_query();
    ?>
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
        <iframe width="308" height="208" src="https://www.youtube.com/embed/6gbiyDHnKx8?list=PLprzt7qzv68xth8M9JXO_Y4BpE8wcSgzr&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
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
