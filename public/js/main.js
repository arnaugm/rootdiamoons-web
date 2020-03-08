var Main = (function ($, undefined) {
  'use strict';

  var toggleDrawer = function() {
    $('#drawer').toggleClass('active');
  };

  var _onOpenMenuDrawer = function () {
    $('#drawer_menu_open').click(toggleDrawer);
  };

  var _onCloseMenuDrawer = function () {
    $('#drawer_menu_close').click(toggleDrawer);
  };

  var init = function () {
    _onOpenMenuDrawer();
    _onCloseMenuDrawer();
  };

  return {
    init: init
  };

})(jQuery);

$(document).ready(function () {
  'use strict';

  Main.init();
});
