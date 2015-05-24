$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		overlay_gallery: false,
		slideshow: false,
        social_tools: '<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div><div class="twitter"><a id="dwn_img" href="#" class="save-button" onclick="image_link()"></a></div>'
	});
});

function image_link() {
    var img = $("#fullResImage").attr('src');
    $("#dwn_img").attr("href", "download_img.php?img=" + img);
}