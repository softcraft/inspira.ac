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

    <section class="home-video"><div class="contents">
        <h1>
            En Inspira, estamos comprometidos con la
            <strong>creación de una nueva cultura</strong>
        </h1>

        <div class="cont clear">
            <figure>
                <iframe width="308" height="208" src="https://www.youtube.com/embed/6gbiyDHnKx8?list=PLprzt7qzv68xth8M9JXO_Y4BpE8wcSgzr&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </figure>

            <div class="content">
                <p>que mejore las relaciones con las <em>personas</em>, la <em>naturaleza</em> y la <em>vida</em>, eligiendo vivir desde principios y valores claros para generar realidades positivas.</p>
            </div>
        </div>

        <a href="<?php echo get_permalink( get_page_by_path('descubre') ); ?>" class="button">¿Quiénes somos?</a>
    </div></section>

    <section class="nuestra-cultura"><div class="contents">
        <h1>Nuestra Cultura</h1>

        <figure>
            <img src="<?php echo get_template_directory_uri() ?>/img/cultura-vive.jpg" alt="" />
        </figure>

        <ul class="cultura-atributos">
            <li class="alegria">La Alegría</li>
            <li class="libertad">La Libertad</li>
            <li class="conocimiento">El Conocimiento</li>
            <li class="respeto">El Respeto</li>
            <li class="amor">El Amor</li>
        </ul>
    </div></section>

    <section class="home-amplia"><div class="contents">
        <div class="content">
            <h1>
                Amplía
                <small>tu perspectiva de la vida</small>
            </h1>

            <p>A los seres humanos se nos <strong>dificulta confiar</strong> en nosotros mismos, en los demás y <strong>en la vida</strong>. Esto es porque nos hemos permitido que <strong>el miedo nos limite</strong> y no asumimos un compromiso real <strong>con nuestras decisiones</strong>.</p>

            <a href="<?php echo get_permalink( get_page_by_path('conoce') ); ?>" class="button">Ver Más</a>
        </div>

        <figure>
            <img src="<?php echo get_template_directory_uri() ?>/img/amplia.jpg" alt="" />
        </figure>
    </div></section>

    <section class="home-presencia"><div class="contents">
        <header>
            <hgroup>
                <h1>
                    <strong>Tu presencia en inspira</strong>
                    tiene un gran impacto en el mundo
                </h1>
                <h2>¿Cómo colaborar?</h2>
            </hgroup>
        </header>

        <?php
            $args = array(
                        'post_type'      => 'inspira_acciones',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 4
                    );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul class="inspira-actions">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                            $class = strtolower(get_the_title());
                        ?>
                        <li class="action-<?php echo  $class; ?>" data-big="bigaction-<?php echo  $class; ?>">
                            <strong><?php the_title(); ?></strong>
                        </li>
                    <?php endwhile; ?>
                </ul>

                <div class="full">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                            $class = strtolower(get_the_title());
                        ?>
                        <div class="bigaction bigaction-<?php echo  $class; ?>">
                            <strong><a href="/<?php echo $class; ?>"><?php the_title(); ?></a></strong>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php }
            wp_reset_query();
        ?>
    </div></section>

    <section class="home-logros"><div class="contents">
        <h1>
            Logros que inspiran
            <small>El mundo no es mejor si no lo construyes</small>
        </h1>

        <?php
            $args = array(
                        'post_type'      => 'inspira_logros_home',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 8
                    );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul class="logros-list">
                    <?php while ($query->have_posts()) : $query->the_post();
                        $image = get_field('imagen');
                    ?>
                        <li>
                            <?php if( !empty($image) ): ?>
                                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>

                            <strong class="cantidad"><?php echo get_field('cantidad'); ?></strong>
                            <?php echo get_field('etiqueta'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }
            wp_reset_query();
        ?>

        <a href="<?php echo get_permalink( get_page_by_path('participa') ); ?>" class="button pink">Conoce Más</a>
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
