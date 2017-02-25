

/***************************************************
			SuperFish Menu
***************************************************/	
// initialise plugins
	jQuery.noConflict()(function(){
		jQuery('ul#menu').superfish();
	});
	
	
	
jQuery.noConflict()(function($) {
  if ($.browser.msie && $.browser.version.substr(0,1)<7)
  {
	$('li').has('ul').mouseover(function(){
		$(this).children('ul').css('visibility','visible');
		}).mouseout(function(){
		$(this).children('ul').css('visibility','hidden');
		})
  }
}); 



/***************************************************
			Nivo Slider
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {
            $('#slider').nivoSlider({
                pauseTime:5000,
                pauseOnHover:false,
				captionOpacity:0.9
            });        
    });
});

/***************************************************
			PRETTY PHOTO
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {  

$("a[rel^='prettyPhoto']").prettyPhoto({opacity:0.80,default_width:200,default_height:344,theme:'facebook',hideflash:false,modal:false});

});
});

/***************************************************
			TWITTER FEED
***************************************************/
jQuery.noConflict()(function($){
	$(document).ready(function () {
		// start jqtweet!
		JQTWEET.loadTweets();
	});
})

/***************************************************
			TIPSY
***************************************************/
jQuery.noConflict()(function($){
    
    $('#example-1').tipsy();
    
    $('#north').tipsy({gravity: 'n'});
    $('#south').tipsy({gravity: 's'});
    $('#east').tipsy({gravity: 'e'});
    $('#west').tipsy({gravity: 'w'});
    
    $('#auto-gravity').tipsy({gravity: $.fn.tipsy.autoNS});
    
    $('.social').tipsy({fade: true});
	$('.service-tipsy').tipsy({fade: true, gravity: 's'});
    
    $('#example-custom-attribute').tipsy({title: 'id'});
    $('#example-callback').tipsy({title: function() { return this.getAttribute('original-title').toUpperCase(); } });
    $('#example-fallback').tipsy({fallback: "Where's my tooltip yo'?" });
    
    $('#example-html').tipsy({html: true });
    
  });		 


/***************************************************
			SLIDES
***************************************************/	
jQuery.noConflict()(function($){
	$('#slides').slides({
		preload: true,
		generateNextPrev: false
	});
	$('#slides2').slides({
		preload: true,
		generateNextPrev: false,
		generatePagination: true
	});
});


/***************************************************
			ACCORDION SLIDER
***************************************************/
jQuery.noConflict()(function($){
	$('.kwicks').kwicks({
		max : 900,
		spacing : 0
	});
});
			
/***************************************************
			VERTICAL ACCORDION SLIDER
***************************************************/

jQuery.noConflict()(function($){
$('#ca-container').contentcarousel();
});
jQuery.noConflict()(function($) {
	$('#va-accordion').vaccordion();
});

jQuery.noConflict()(function($){
$(document).ready(function() {
	$('ul#filter a').click(function() {
		$(this).css('outline','none');
		$('ul#filter .current').removeClass('current');
		$(this).parent().addClass('current');
		
		var filterVal = $(this).text().toLowerCase().replace(' ','-');
				
		if(filterVal == 'all') {
			$('ul#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
		} else {
			
			$('ul#portfolio li').each(function() {
				if(!$(this).hasClass(filterVal)) {
					$(this).fadeOut('normal').addClass('hidden');
				} else {
					$(this).fadeIn('slow').removeClass('hidden');
				}
			});
		}

		return false;
	});
});
});

jQuery.noConflict()(function($){
$(document).ready(function() {
	$('ul#filter-sidebar a').click(function() {
		$(this).css('outline','none');
		$('ul#filter-sidebar .current').removeClass('current');
		$(this).parent().addClass('current');
		
		var filterVal = $(this).text().toLowerCase().replace(' ','-');
				
		if(filterVal == 'all') {
			$('ul#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
		} else {
			
			$('ul#portfolio li').each(function() {
				if(!$(this).hasClass(filterVal)) {
					$(this).fadeOut('normal').addClass('hidden');
				} else {
					$(this).fadeIn('slow').removeClass('hidden');
				}
			});
		}
		
		return false;
	});
});
});	
