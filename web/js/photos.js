var Photos = (function ($, undefined) {
    'use strict';

    /**
     * Initialize prettyPhoto
     * @private
     */
    var _createPrettyPhoto = function () {
        $("a[rel^='prettyPhoto']").prettyPhoto({
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            slideshow: 3000,
            overlay_gallery: true,
            social_tools: '<div class="pp_social"><div class="save"><a id="dwn_img" href="#" class="save-button"></a></div><div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href='+location.href+'&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div></div>',
            changepicturecallback: function () {
                // provide download image link
                var img = $('#fullResImage').attr('src');
                $('#dwn_img').attr('href', '/download-img?img=' + img);
            }
        });
    };

    /**
     * Bind album launcher links to the proper image collection
     * @private
     */
    var _bindAlbumLaunchers = function () {
        var albumLaunchers = $('.veure_album a');
        albumLaunchers.click(function (e) {
            e.preventDefault();
            var albumId = $(this).attr('data-album');
            var fotoItems = $("a[rel^='prettyPhoto[" + albumId + "]']");
            var apiImages = [];
            var apiDescriptions = [];
            for (var i = 0; i < fotoItems.length; i++) {
                apiImages[i] = $(fotoItems[i]).attr('href');
                apiDescriptions[i] = $(fotoItems[i]).attr('title')
            }
            $.prettyPhoto.open(apiImages, '', apiDescriptions);
        });
    };

    /**
     * Initialize the component
     */
    var init = function () {

        // initialize prettyPhoto
        _createPrettyPhoto();

        _bindAlbumLaunchers();
    };

    return {
        init: init
    };

})(jQuery);

$(document).ready(function () {
    'use strict';

    Photos.init();
});