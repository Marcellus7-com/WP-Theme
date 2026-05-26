(function ($) {
    $(document).on('ready', function () {

        if (XPSC_ajax_data.stillValid && null !== XPSC_ajax_data.endDate) {
            $('#lvgshoptimer').countDown();
        } else {
            $(".xpsc-product-coutdown-wrapper").hide();
        }
        $('.xpsc-product-coutdown-wrapper-alt #lvgshoptimer').countDown({
            label_mm: 'mins',
            label_ss: 'secs',
            separator: '|',
        });

    })

})(jQuery);
