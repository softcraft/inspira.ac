<?php
/**
 * Template Name: Contribuye
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */
get_header(); ?>

<section class="contribuye-intro">
    <div class="contents">
        <h1>
            Sé parte de nuestra comunidad de
            <em>Voluntarios</em>
            <strong>Amigos</strong>
        </h1>

        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg-contribuye-intro.png" alt="" />
        </figure>

        <hr />
    </div>

    <h2>Con tu donativo mensual contribuyes a:</h2>

    <ul class="objetivos">
        <li class="parque"><div class="contents">
            <p>Renovar un parque y una escuela cada mes.</p>
        </div></li>

        <li class="voluntarios"><div class="contents">
            <p>La capacitación de voluntarios permanentes en nuestros centros a nivel nacional.</p>
        </div></li>

        <li class="fase-terminal"><div class="contents">
            <p>Acompañar a personas en fase terminal sosteniendo un equipo de tanatólogos profesionales.</p>
        </div></li>

        <li class="lideres"><div class="contents">
            <p>La formación de líderes juveniles a través de conferencias, campamentos y talleres.</p>
        </div></li>

        <li class="animales"><div class="contents">
            <p>Generar campañas de amor, respeto y adopción para los animales.</p>
        </div></li>
    </ul>
</section>

<section class="contribuye-foot"><div class="contents">
    <img src="<?php echo get_template_directory_uri(); ?>/img/bg-contribuye-foot.jpg" alt="" />

    <h1>
        Tú puedes ser parte
        <strong>de nuestro movimiento</strong>
    </h1>

    <div class="conts">
        <p>Con tu aportación <strong>ayudas</strong> a que más personas encuentren <strong>inspiración</strong> en su vida</p>
    </div>
</div></section>

<?php get_footer(); ?>
