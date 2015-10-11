<?php
/**
 * @package WordPress
 * @subpackage Inspira_ac
 * @since Inspira 0.1
 */
?>

    </main><!-- /main content -->
</div><!-- /#no-footer -->

<footer class="mastfoot" role="contentinfo">
    <nav class="footer-sections clear"><div class="contents">
        <a href="<?php echo get_permalink( get_page_by_path('conoce') ); ?>" class="conoce">
            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-conoce.jpg" alt="Conoce" />
            <strong>Qué hacemos</strong>
        </a>

        <a href="<?php echo get_permalink( get_page_by_path('participa') ); ?>" class="participa">
            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-participa.jpg" alt="Participa" />
            <strong>En las actividades</strong>
        </a>

        <a href="<?php echo get_permalink( get_page_by_path('contribuye') ); ?>" class="contribuye">
            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-contribuye.jpg" alt="Contribuye" />
            <strong>Con tus donativos</strong>
        </a>

        <a href="<?php echo get_permalink( get_page_by_path('blog') ); ?>" class="inspirate">
            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-inspirate.jpg" alt="Inspírate" />
            <strong>En nuestro blog</strong>
        </a>
    </div></nav>

    <div class="foot-box">
        <a href="<?php echo get_field('facebook', 'option'); ?>" target="_blank" class="facebook">Facebook</a>
        <a href="<?php echo get_field('twitter', 'option'); ?>" target="_blank" class="twitter">Twitter</a>

        <div class="subscribe">
            Suscríbete a nuestra red de Inspiración
        </div>
    </div>
</div></footer>

</div><!-- /#page -->

<?php wp_footer(); ?>

</div></body>
</html>
