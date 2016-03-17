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
        <a href="<?php echo get_permalink( get_page_by_path('descubre') ); ?>" class="inspirate">
            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-inspirate.jpg" alt="Descubre" />
            <strong>Quienes somos</strong>
        </a>

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
    </div></nav>

    <div class="foot-box">
        <a href="<?php echo get_field('facebook', 'option'); ?>" target="_blank" class="facebook">Facebook</a>
        <!--<a href="<?php echo get_field('twitter', 'option'); ?>" target="_blank" class="twitter">Twitter</a>-->
        <a href="mailto:<?php echo get_field('mail', 'option'); ?>" target="_blank" class="mail">Email</a>

        <div class="subscribe">
            Suscríbete a nuestra red de Inspiración
            <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
            <div id="mc_embed_signup">
              <form action="//inspira.us7.list-manage.com/subscribe/post?u=0367bbfc22583f07097f56d65&amp;id=88ea1a39f1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
              <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Correo electrónico" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0367bbfc22583f07097f56d65_88ea1a39f1" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Enviar" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
</form>
</div>
        </div>
    </div>
</div></footer>

</div><!-- /#page -->

<?php wp_footer(); ?>

</div></body>
</html>
