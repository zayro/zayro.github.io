/*
 * BriskButton for Websites - jQuery Plugin (v1.00)
 * Copyright 2011, SOYOS Online Solutions
 *
 * Project Website:
 * http://www.soyos.net/labs/briskbutton/
 *
 * More Scripts:
 * http://www.soyos.net/labs/
 *
 * Requires Easing Plugin for Window Animations:
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Latest Update 11.09.2011
 */

//Helper Functions
function rnd(){ return String((new Date()).getTime()).replace(/\D/gi,'') }
//PlugIn
(function($){
  $.fn.extend({
    //plugin name - BriskButton
    BriskButton: function(options) {
      //Settings BriskButton and the default values--------------------------------------------------------------------
      var defaults = {
        BriskButtonSourceID:        '',                 /* ID of the Source Element */
        BriskButtonPlacementID:     '',                 /* ID of the Placement Element for RELATIVE POSITIONING, leave blank for ABOSLUTE POSITIONING (body)  */
        DeleteSourceID:            false,               /* true, false */
        BriskButtonCaption:         'More Information', /* Some Text/HTML for the Caption Area */
        BriskButtonCaptionStyle:    '',                 /* Additional CSS Class for the Caption Area */
        BriskButtonPositionTop:     100,                /* pixels */
        BriskButtonPositionLeft:    100,                /* pixels */
        BriskButtonWidth:           200,                /* pixels */
        BriskButtonHeight:          60,                 /* pixels */
        BriskButtonMaxWidth:        550,                /* pixels */
        BriskButtonMaxHeight:       200,                /* pixels */
        BriskButtonContentPadding:  20,                 /* pixels */
        BriskButtonStyleBorderSize: 12,                 /* pixels */
        BriskButtonAnimationSpeed:  400,                /* millisseconds */

        BriskButtonStyle:           'BriskButton-green',/* Name for Image Folder and CSS Styles */
        BriskButtonAnimation:       'easeOutExpo'
      };

      var id = "BriskButton-" + rnd();
      /*
      $("<div>", {
        id: id
      })
      .appendTo("body");
      alert(options.BriskButtonPlacementID);
      */
      if (options.BriskButtonPlacementID != undefined) {
          //Set Position from Placement Element
          $("<div>", {
            id: id
          })
          .appendTo("#"+options.BriskButtonPlacementID);
      } else {
          $("<div>", {
            id: id
          })
          .appendTo("body");
      }
      /*---------------------------------------------------------------------------------------------------------------
      Posible BriskButtonAnimation:
      - easeInQuad
      - easeOutQuad
      - easeInOutQuad
      - easeInCubic
      - easeOutCubic
      - easeInOutCubic
      - easeInQuart
      - easeOutQuart
      - easeInOutQuart
      - easeInQuint
      - easeOutQuint
      - easeInOutQuint
      - easeInSine
      - easeOutSine
      - easeInOutSine
      - easeInExpo
      - easeOutExpo
      - easeInOutExpo
      - easeInCirc
      - easeOutCirc
      - easeInOutCirc
      - easeInElastic
      - easeOutElastic
      - easeInOutElastic
      - easeInBack
      - easeOutBack
      - easeInOutBack
      - easeInBounce
      - easeOutBounce
      - easeInOutBounce
      ---------------------------------------------------------------------------------------------------------------*/
      //Assign current element to variable
      var options = $.extend(defaults, options);
      return $('#'+id).each(function() {
        var o =options;
        //Generate the new BriskButton --------------------------------------------------------------------------------
        var BriskButtonContent = $('#'+o.BriskButtonSourceID).html();
        if (o.DeleteSourceID == true) { $('#'+o.BriskButtonSourceID).remove(); }
        $(this).html(
          '<div class="BriskButton active">' +
          '  <table cellpadding="0" cellspacing="0" border="0">' +
          '    <tr>' +
          '      <td class="table-tl"></td>' +
          '      <td class="table-tm"></td>' +
          '      <td class="table-tr"></td>' +
          '    </tr>' +
          '    <tr>' +
          '      <td class="table-lm" valign="top" ><img class="table-lm-bg" style="width: '+(o.BriskButtonStyleBorderSize)+'px; height: 10px" src="images/'+o.BriskButtonStyle+'/ml.png"></td>' +
          '      <td class="table-mm" valign="middle" align="center"><img class="table-mm-content" style="width: '+(o.BriskButtonWidth-(o.BriskButtonStyleBorderSize*2))+'px; height: '+(o.BriskButtonHeight-(o.BriskButtonStyleBorderSize*2))+'px;" src="images/'+o.BriskButtonStyle+'/mm.png">' +
          '      </td>' +
          '      <td class="table-rm" valign="top" ><img class="table-rm-bg" style="width: '+(o.BriskButtonStyleBorderSize)+'px; height: 10px" src="images/'+o.BriskButtonStyle+'/mr.png"></td>' +
          '    </tr>' +
          '    <tr>' +
          '      <td class="table-bl"></td>' +
          '      <td class="table-bm"></td>' +
          '      <td class="table-br"></td>' +
          '    </tr>' +
          '  </table>'+
          '</div>'+
          '<div class="'+o.BriskButtonCaptionStyle+' caption" style="position: absolute; width: '+(o.BriskButtonWidth)+'px; height: '+o.BriskButtonHeight+'px; line-height: '+o.BriskButtonHeight+'px; overflow: hidden;">'+
             o.BriskButtonCaption +
          '</div>'+
          '<div class="content" style="position: absolute;  left: 10px; position: absolute; width: '+(o.BriskButtonMaxWidth-20)+'px; height: '+(o.BriskButtonMaxHeight-(o.BriskButtonStyleBorderSize*2))+'px; overflow: auto;">'+
            BriskButtonContent +
          '</div>'
        );
        //BriskButton Objects -----------------------------------------------------------------------------------------
        var BriskButton             = $(this).find(".BriskButton");
        var BriskButtonBGl_con      = $(this).find(".table-lm");
        var BriskButtonBGl_img      = $(this).find(".table-lm-bg");
        var BriskButtonBGr_con      = $(this).find(".table-rm");
        var BriskButtonBGr_img      = $(this).find(".table-rm-bg");
        var BriskButtonBackground   = $(this).find(".table-mm-content");
        var BriskButtonContent      = $(this).find(".content");
        var BriskButtonCaption      = $(this).find(".caption");
        //Initial Configuration ---------------------------------------------------------------------------------------
        FocusBriskButton(BriskButton);
        //Draw BriskButton
        DrawBriskButton();
		
        //BriskButton Functions ---------------------------------------------------------------------------------------
        function DrawBriskButton() {
          BriskButton.removeClass('active');
          BriskButton.addClass(o.BriskButtonStyle);
          BriskButtonContent.hide();

          BriskButton.css({
            width: o.BriskButtonWidth,
            height: o.BriskButtonHeight,
            top: o.BriskButtonPositionTop,
            left: o.BriskButtonPositionLeft
          });
          BriskButtonCaption.css({
            width: o.BriskButtonWidth,
            height: o.BriskButtonHeight,
            top: o.BriskButtonPositionTop,
            left: o.BriskButtonPositionLeft
          });
          BriskButtonContent.css({
            width: o.BriskButtonMaxWidth-(o.BriskButtonContentPadding*2),
            height: o.BriskButtonMaxHeight-(o.BriskButtonContentPadding*2),
            top: (o.BriskButtonPositionTop+(o.BriskButtonHeight/2))-(o.BriskButtonMaxHeight/2)+o.BriskButtonContentPadding,
            left: (o.BriskButtonPositionLeft+(o.BriskButtonWidth/2))-(o.BriskButtonMaxWidth/2)+o.BriskButtonContentPadding
          });
          o.BriskButtonStatus = 'minimized';
          BriskButtonBGl_img.css('height', (o.BriskButtonHeight-(o.BriskButtonStyleBorderSize*2)));
          BriskButtonBGr_img.css('height', o.BriskButtonHeight-(o.BriskButtonStyleBorderSize*2));
		  
          return(false);
        }
        //-------------------------------------------------------------------------------------------------------------
        function MaximizeBriskButton() {
          o.BriskButtonTemp = true;
          o.BriskButtonStatus = 'maximized';
          FocusBriskButton(BriskButton);
          BriskButtonCaption.animate({
            'opacity': '0'
          }, {
            queue: false
          });
          //Change Style
          BriskButtonBGr_img.attr('src', 'images/'+o.BriskButtonStyle+'/active_mr.png');
          BriskButtonBGl_img.attr('src', 'images/'+o.BriskButtonStyle+'/active_ml.png');
          BriskButtonBackground.attr('src', 'images/'+o.BriskButtonStyle+'/active_mm.png');

          BriskButtonBGl_img.animate({
            height: o.BriskButtonMaxHeight-(o.BriskButtonStyleBorderSize*2)}, {
            queue: false,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation
          });
          BriskButtonBGr_img.animate({
            height: o.BriskButtonMaxHeight-(o.BriskButtonStyleBorderSize*2)}, {
            queue: false,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation
          });
          BriskButtonBackground.animate({
            width: o.BriskButtonMaxWidth-(o.BriskButtonStyleBorderSize*2),
            height: o.BriskButtonMaxHeight-(o.BriskButtonStyleBorderSize*2)}, {
            queue: false,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation
          });
          //Set new BriskButton Position
          BriskButton.animate({
            width: o.BriskButtonMaxWidth,
            height: o.BriskButtonMaxHeight,
            top: (o.BriskButtonPositionTop+(o.BriskButtonHeight/2))-(o.BriskButtonMaxHeight/2),
            left: (o.BriskButtonPositionLeft+(o.BriskButtonWidth/2))-(o.BriskButtonMaxWidth/2)}, {
            queue: false,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation,
            complete: function() {
              o.BriskButtonStatus = 'maximized';
              if (o.BriskButtonTemp == true) {
              BriskButtonContent.show().css('opacity', '0').animate({
                'opacity': '1'
              }, {
                queue: false
              });
              BriskButtonCaption.animate({
                'opacity': '0'
              }, {
                queue: false
              });

              }
            }
          });
          return(false);
        }
        //-------------------------------------------------------------------------------------------------------------
        function MinimizeBriskButton() {
          o.BriskButtonStatus = 'processing';
          BriskButtonContent.stop().hide();
          o.BriskButtonTemp = false;
          BriskButton.removeClass('active');
          //Change Style
          BriskButtonBGr_img.attr('src', 'images/'+o.BriskButtonStyle+'/mr.png');
          BriskButtonBGl_img.attr('src', 'images/'+o.BriskButtonStyle+'/ml.png');
          BriskButtonBackground.attr('src', 'images/'+o.BriskButtonStyle+'/mm.png');
          BriskButtonBGl_img.animate({
            height: o.BriskButtonHeight-(o.BriskButtonStyleBorderSize*2)}, {
            queue: true,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation
          });
          BriskButtonBGr_img.animate({
            height: o.BriskButtonHeight-(o.BriskButtonStyleBorderSize*2)}, {
            queue: true,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation
          });
          BriskButtonBackground.animate({
            width: o.BriskButtonWidth-(o.BriskButtonStyleBorderSize*2),
            height: o.BriskButtonHeight-(o.BriskButtonStyleBorderSize*2)}, {
            queue: true,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation
          });
          BriskButton.animate({
            width: o.BriskButtonWidth,
            height: o.BriskButtonHeight,
            top: o.BriskButtonPositionTop,
            left: o.BriskButtonPositionLeft}, {
            queue: false,
            duration: o.BriskButtonAnimationSpeed,
            easing: o.BriskButtonAnimation,
            complete: function() {
              o.BriskButtonStatus = 'minimized';
              BriskButtonCaption.animate({
                'opacity': '1'
              }, {
                queue: false
              });
            }
          });
          return(false);
        }
        //-------------------------------------------------------------------------------------------------------------
        function FocusBriskButton(BriskButton) {
          $(".BriskButton").removeClass('active');
          if (BriskButton.hasClass('BriskButton')) BriskButton.addClass('active');
          if (($('body').data('BriskButtonMaxZIndex')) == null) {
            $('body').data( 'BriskButtonMaxZIndex' , BriskButton.css('z-index'));
          }
          i = $('body').data('BriskButtonMaxZIndex');
          i++;
          BriskButton.css('z-index', i);
          BriskButtonCaption.css('z-index', i);
          BriskButtonContent.css('z-index', i);
          $('body').data( 'BriskButtonMaxZIndex' , BriskButton.css('z-index'));
        }
        //Attach Events to BriskButton ---------------------------------------------------------------------------------
        $(this).mouseenter(function() {
          MaximizeBriskButton();		
          /*
          switch (o.BriskButtonStatus) {
            case 'minimized':
              MaximizeBriskButton();
              break;
            case 'maximized':
              //MinimizeBriskButton();
              break;
            default:
              break;
          }
          */
        });
        $(this).mouseleave(function() {
              MinimizeBriskButton();
        });
      });
    }
  });
})(jQuery);