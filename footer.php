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
        <a href="#" class="conoce">
            <img src="<?php echo get_template_directory_uri() ?>/img/footer-conoce.jpg" alt="Conoce" />
            <strong>Qué hacemos</strong>
        </a>

        <a href="#" class="participa">
            <img src="<?php echo get_template_directory_uri() ?>/img/footer-participa.jpg" alt="Participa" />
            <strong>En las actividades</strong>
        </a>

        <a href="#" class="contribuye">
            <img src="<?php echo get_template_directory_uri() ?>/img/footer-contribuye.jpg" alt="Contribuye" />
            <strong>Con tus donativos</strong>
        </a>

        <a href="#" class="inspirate">
            <img src="<?php echo get_template_directory_uri() ?>/img/footer-inspirate.jpg" alt="Inspírate" />
            <strong>En nuestro blog</strong>
        </a>
    </div></nav>

    <div class="foot-box">
        <a href="<?php echo get_field('facebook', 'option'); ?>" class="facebook">Facebook</a>
        <a href="<?php echo get_field('twitter', 'option'); ?>" class="twitter">Twitter</a>

        <div class="subscribe">
            Suscríbete a nuestra red de Inspiración
        </div>
    </div>
</div></footer>

</div><!-- /#page -->

<?php wp_footer(); ?>

</body>
</html>
