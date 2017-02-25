/* ---------- @ Circle Hover -----------*/
jQuery.noConflict()(function($){
  $(document).ready(function ()
  {

  $('.circle').hover(
    function() {
      $(this).stop().animate({'margin-top': '-10px'}, 'normal');
    },
    function() {
      $(this).stop().animate({'margin-top': '0'}, 'fast');
  });
  });
});

/* ---------- @ Portfolio -----------*/
jQuery.noConflict()(function($){
 $(function(){
      var $container = $('#portfolio');
                $container.isotope({
                  itemSelector : '.block',
                  layoutMode : 'masonry'
                  
                });
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });
    });
});

/* ---------- @ Top Toggle -----------*/
jQuery.noConflict()(function($){
    var Speed = 300;
    var EaseMethod = 'easeInOutCirc';
    var sliderAnimation = 'slide';
    var topH = jQuery('.top-section .span12').height();
    jQuery('.top-section .span12').height('2px').css({
        padding: '0px'
    }).addClass('hidden');
    jQuery('.top-section a.toggle').addClass('toggleDown');
    jQuery('.top-section a.toggle').live('click', function () {
        var c = jQuery(this).parent().find('.span12');
        if (c.hasClass('hidden')) {
            c.stop().animate({
                height: topH,
                padding: "0px 0px"
            }, {
                duration: Speed
            }).removeClass('hidden');
            jQuery(this).removeClass('toggleDown');
        } else {
            c.stop().animate({
                height: "2px",
                padding: "0px"
            }, {
                duration: Speed
            }).addClass('hidden');
            jQuery(this).addClass('toggleDown');
        }
    });
  });
/* ---------- @ Prettyphoto -----------*/
jQuery.noConflict()(function($){

    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({hook: 'data-rel'});
    jQuery('a[data-rel]').each(function() {
        jQuery(this).attr('rel', $(this).attr('data-rel')).removeAttr('data-rel');
    });
    

});
/* ---------- @ Contact From -----------*/
jQuery.noConflict()(function($){
$(document).ready(function ()
{ // 
    $("#ajax-contact-form").submit(function ()
    {
        //
        var str = $(this).serialize(); // 
        $.ajax(
        {
            type: "POST",
            url: "contact.php",
            data: str,
            success: function (msg)
            {
                $("#note").ajaxComplete(function (event, request, settings)
                {
                    if (msg == 'OK') //
                    {
                        result = '<div class="notification_ok">Message was sent to website administrator, thank you!</div>';
                        $("#fields").hide();
                    }
                    else
                    {
                        result = msg;
                    }
                    $(this).html(result);
                });
            }
        });
        return false;
    });
});
});

/* ---------- @ Loding -----------*/
jQuery.noConflict()(function($){
    $(window).load(function() {
        $(".loading").fadeOut(1000);    
    });
});
