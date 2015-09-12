<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */

get_header(); ?>

    <section class="blog single"><div class="contents">

        <article class="single-entry">
            <?php while ( have_posts() ) : the_post(); ?>
                <header>
                    <h1><?php the_title(); ?></h1>
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

                <div class="content">
                    <figure class="featured-img">
                        <?php the_post_thumbnail( 'single-thumb' ); ?>
                    </figure>

                    <?php the_content(); ?>

                    <?php comments_template(); ?>
                </div>
            <?php endwhile; ?>

            <?php get_sidebar(); ?>
        </article>

    </div></section>

<?php get_footer(); ?>
