var Concerts = (function ($, undefined) {
  'use strict';

  var _createAccordion = function () {
    $('#llista_anys').accordion({
      header: 'h3',
      heightStyle: 'content',
      collapsible: true
    });
  };

  var init = function () {
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
