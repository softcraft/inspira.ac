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
        var content = jQuery(this).find('.conts').html();

        jQuery('.categorias-logros-content').html(content);
    });

    jQuery('.categorias-logros').find('.inspira-vida').click();
});
