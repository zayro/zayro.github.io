function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}


jQuery(document).ready(function(){
	jQuery('.options').slideUp();
	jQuery('.slide-panel h3').click(function(){
		jQuery(this).parent().next('.options').slideToggle('slow');
	});
	jQuery('.slide-panel img').click(function(){
		jQuery(this).parent().next('.options').slideToggle('slow');
		if (jQuery(this).attr("src") === 'http://'+window.location.hostname+'/wp-content/themes/novatorix/css/dbmin.png') {
				jQuery(this).attr("src", 'http://'+window.location.hostname+'/wp-content/themes/novatorix/css/dbplus.png');
		} else {
			    jQuery(this).attr("src", 'http://'+window.location.hostname+'/wp-content/themes/novatorix/css/dbmin.png');
		}
	});
});