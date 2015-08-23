jQuery(document).ready(function() {

    // Home Actions
    jQuery('.inspira-actions').on('click', 'li', function() {
        var $el    = jQuery(this),
            $small = jQuery('.inspira-actions'),
            $big   = jQuery('.full');

        $small.find('li').removeClass('active');
        $el.addClass('active');

        $big.find('.bigaction').removeClass('active');
        $big.find('.' + $el.data('big')).addClass('active');
    });


    jQuery('.inspira-actions li').first().click();

    // Home Accordion
    jQuery('.facebook-list').raccordion({
        speed        : 1000,
        sliderWidth  : 1000,
        sliderHeight : 300,
        autoCollapse : true
   });

    // Conoce Categorias
    jQuery('.categorias-logros').on('click', 'li', function() {
        var $el     = jQuery(this),
            content = $el.find('.conts').html();

        jQuery('.categorias-logros').find('li').removeClass('active');
        $el.addClass('active');

        jQuery('.categorias-logros-content').html(content);
    });

    jQuery('.categorias-logros').find('.inspira-vida').click();

    // Contribuye
    var $objetivos = jQuery('.objetivos li').hide(),
        i = 0;

    (function cycle() {
      $objetivos.eq(i)
                .fadeIn({
                  duration: 400,
                  easing: 'swing'
                })
                .delay(5000)
                .fadeOut(400, cycle);

      i = ++i % $objetivos.length;
    })();
});
