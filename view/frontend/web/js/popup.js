
define([
    'jquery',
    'jquery/jquery.cookie'
], function ($) {
    'use strict';

    $.widget('mikielis.popupPromo', {
        cookieName: 'mikielis_popup_promo',

        cookie: function() {
            var now = new Date().getTime(),
                expiryDate = now + (10 * 60 * 1000);
            $.cookie(this.cookieName, 1, {path: '/', expires: expiryDate});
        },

        _create: function () {
            var options = this.options;

            /** Close popup */
            $(options.close).click(function () {
                $(options.container).fadeOut();
            });

            /** Copy promo code */
            $(options.button).click(function () {
                var $temp = $('<input>');
                $('body').append($temp);
                $temp.val($(options.code).val()).select();
                document.execCommand("copy");
                $temp.remove();
                $(options.button).text($(options.button).data('copied'));
            });

            /** Display */
            if ($.cookie(this.cookieName) != 1) {
                if (options.displaySettings == 'after_x_seconds') {
                    setTimeout(function () {
                        $(options.container).fadeIn();
                        this.cookie();
                    }, parseInt(options.displayDelay) * 1000);
                } else if (options.displaySettings == 'before_closing') {
                    $(options.container).fadeIn();
                    this.cookie();
                }
            }
        }
    });

    return $.mikielis.popupPromo;

});