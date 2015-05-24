$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		//social_tools: true,
		slideshow: 3000,
		overlay_gallery: true,
        social_tools: '<div class="twitter"><a id="dwn_img" href="#" class="save-button" onclick="image_link()"></a></div><div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'
	});
});

function image_link() {
    var img = $("#fullResImage").attr('src');
    $("#dwn_img").attr("href", "download_img.php?img=" + img);
}

function obreAlbum(rel) {
	var foto_items = $("a[rel^='prettyPhoto["+rel+"]']");
	var api_images = [];
	var api_descriptions = [];
	for(var i = 0; i < foto_items.length; i++) {
		api_images[i] = $(foto_items[i]).attr("href");
		api_descriptions[i] = $(foto_items[i]).attr("title")
	}
	$.prettyPhoto.open(api_images, '', api_descriptions);
}