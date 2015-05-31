var Concerts = (function ($, undefined) {
    'use strict';

    /**
     * Initialize the accordion
     * @private
     */
    var _createAccordion = function () {
        $('#llista_anys').accordion({
            header: 'h3',
            heightStyle: 'content',
            collapsible: true
        });
    };

    /**
     * Initialize the component
     */
    var init = function () {

        // initialize prettyPhoto
        _createAccordion();
    };

    return {
        init: init
    };

})(jQuery);

$(document).ready(function () {
    'use strict';

    Concerts.init();
});