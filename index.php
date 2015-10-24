<?php
/**
 * @package WordPress
 * @subpackage Inspira_ac
 * @since Inspira 0.1
 */

get_header(); ?>

<main class="mastcontent" role="main"><div class="contents">

    <h1 class="blog-header">
        <span class="text">
            Inspírate
            <small>en nuestro</small>
            <strong>Blog</strong>
        </span>
    </h1>

    <div class="home-search">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
            <label>
                <input type="hidden" name="post_type" value="post" />
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            </label>
        </form>
    </div>

    <?php if ( have_posts() ) : ?>
        <ol class="simple-posts">
            <?php while ( have_posts() ) : the_post(); ?>
                <li class="clear"><article>
                    <figure><?php the_post_thumbnail('index-thumb'); ?></figure>

                    <div class="content">
                        <header>
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </header>

                        <footer>
                            <date><?php the_date(); ?></date> /
                            <?php
                                $count      = 0;
                                $categories = get_the_category();
                                foreach ($categories as $category) {
                                    $count++;
                                    if ($category->cat_name != 'Featured') {
                                        echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
                                        if( $count != count($categories) ){
                                            echo ', ';
                                        }
                                    }
                                }
                            ?>
                        </footer>

                        <?php the_excerpt(); ?>

                        <a class="more-link" href="<?php echo get_permalink(); ?>">Ver más &raquo;</a>
                    </div>
                </article></li>
            <?php endwhile; ?>
        </ol>
    <?php else : ?>
        <div class="no-results">
            <h1>No se encontraron resultados</h1>
            <p>Intenta con otra búsqueda.</p>
        </div>
    <?php endif; ?>

    <div class="pagination">
        <?php echo paginate_links(  ); ?>
    </div>
</div></main>

<?php get_footer(); ?>
