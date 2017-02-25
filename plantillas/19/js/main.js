$(document).ready(function(){
	
	"use strict";
	
	// jQuery nivo slider
	$('#top .slider .nivoSlider').nivoSlider({
		controlNav: false,
		pauseTime: 5000
	});
	
	// jQuery figure hover effect
	$('figure.figure-hover').hover(
		function() { $(this).children("a").children("div").animate({opacity:1}, 200); },
		function() { $(this).children("a").children("div").animate({opacity:0}, 200); }
	);
	
	// prettyPhoto for image gallery modal popup
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		theme: 'facebook',
		hook: 'data-rel'
	});
	
	// jQuery smooth scrolling
	$('#top .nav-menu ul li a').bind('click', function(event) {
		var $anchor = $(this);		
		$('html, body').stop().animate({
			scrollTop: parseInt($($anchor.attr('href')).offset().top, 0)
		}, 2000,'easeInOutExpo');
		event.preventDefault();
	});
	
	// jQuery placeholder for IE
	$("input, textarea").placeholder();
	
	
	/* Back to top scroll */
	$(window).scroll(function(){
		var $scrollup = $('.scrollup');
		if ($(this).scrollTop() > 100) { $scrollup.slideDown(); }
		else { $scrollup.slideUp(); }
	}); 
	
	$('.scrollup').click(function(){
		$("html, body").stop().animate({ scrollTop: 0 }, 2000, 'easeInOutExpo');
		return false;
	});
	/* End Back to top scroll */
	
	
	/* Twitter integration */
	$.ajax({ // Twitter integration (JSON format) with AJAX
            url: 'http://api.twitter.com/1/statuses/user_timeline.json/',
            type: 'GET',
            dataType: 'jsonp',
            data: {
                screen_name: 'envato', // Your twitter username
                include_rts: true,
                count: 2,
                include_entities: true
            },
            success: function(tweet) {
				var $tweets = $(".tweets ul");
				var id			= 0;
				var tweet_num	= tweet.length;
				var tweet_text	= "";
				
				$tweets.hide();
	
				while(id < tweet_num) {
					tweet_text	+= '<li><p>' + JQTWEET.ify.clean(tweet[id].text) + '</p><span class="date">- <a href="http://twitter.com/' + tweet[id].user.screen_name + '/status/' + tweet[id].id_str + '" target="_blank">' +  JQTWEET.timeAgo(tweet[id].created_at) + '</a></span></li>';
					id++;
				}
				
				$tweets.html(tweet_text);
				$tweets.hide().fadeIn(1000);
            }
		});
	
	var JQTWEET = { // Twitter data format function
		timeAgo: function(dateString) { // twitter date string format function
			var rightNow = new Date();
			var then = new Date(dateString);
			
			if ($.browser.msie) {
				// IE can't parse these crazy Ruby dates
				then = Date.parse(dateString.replace(/( \+)/, ' UTC$1'));
			}
			
			var diff = rightNow - then;
			var second = 1000,
			minute = second * 60,
			hour = minute * 60,
			day = hour * 24;
	 
			if (isNaN(diff) || diff < 0) { return ""; }
			if (diff < second * 2) { return "right now"; }
			if (diff < minute) { return Math.floor(diff / second) + " seconds ago"; }
			if (diff < minute * 2) { return "1 minute ago"; }
			if (diff < hour) { return Math.floor(diff / minute) + " minutes ago"; }
			if (diff < hour * 2) { return "1 hour ago"; }
			if (diff < day) { return  Math.floor(diff / hour) + " hours ago"; }
			if (diff > day && diff < day * 2) { return "1 day ago"; }
			if (diff < day * 365) { return Math.floor(diff / day) + " days ago"; }
			else { return "over a year ago"; }
		}, // timeAgo()
		 
		ify: {
			link: function(tweet) { // twitter link string replace function
				return tweet.replace(/\b(((https*\:\/\/)|www\.)[^\"\']+?)(([!?,.\)]+)?(\s|$))/g, function(link, m1, m2, m3, m4) {
					var http = m2.match(/w/) ? 'http://' : '';
					return '<a class="twtr-hyperlink" target="_blank" href="' + http + m1 + '">' + ((m1.length > 25) ? m1.substr(0, 24) + '...' : m1) + '</a>' + m4;
				});
			},
			
			at: function(tweet) { // twitter at (@) character format function
				return tweet.replace(/\B[@＠]([a-zA-Z0-9_]{1,20})/g, function(m, username) {
					return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/intent/user?screen_name=' + username + '">@' + username + '</a>';
				});
			},
			
			list: function(tweet) { // twitter list string format function
				return tweet.replace(/\B[@＠]([a-zA-Z0-9_]{1,20}\/\w+)/g, function(m, userlist) {
					return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/' + userlist + '">@' + userlist + '</a>';
				});
			},
			
			hash: function(tweet) { // twitter hash (#) string format function
				return tweet.replace(/(^|\s+)#(\w+)/gi, function(m, before, hash) {
					return before + '<a target="_blank" class="twtr-hashtag" href="http://twitter.com/search?q=%23' + hash + '">#' + hash + '</a>';
				});
			},
			
			clean: function(tweet) { // twitter clean all string format function
				return this.hash(this.at(this.list(this.link(tweet))));
			}
		} // ify
	};
	/* End twitter integration */
	
	
	// Email subcribe process function
	$("#form-subscribe input[type='text']").live('focus keypress',function(){ // Checking subcribe form when focus event
		var $email = $(this);
		if ($email.val() === "Please enter your email address" || $email.val() === "Please enter a valid email address" || $email.val() === "Subscribe process completed" || $email.val() === "Email is already registered") {
			$(this).val('').css({'backgroundColor':'#FFF'});
		}
	});
	
	$("#form-subscribe").submit(function(){ // Checking subcribe form when submit to database
		var $email	= $(this).find("input[type='text']");
		var $submit	= $(this).find("input[type='submit']");
		
		var email_pattern = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
		if(email_pattern.test($email.val()) === false) {
			$email.val('Please enter a valid email address').css({'backgroundColor':'#ffb2b2'});
		} else {
			var submitData = $(this).serialize();
			$email.attr('disabled','disabled');
			$submit.attr('disabled','disabled');
			$.ajax({ // Subcribe process with AJAX
				type: "POST",
				url: "subcribe.php",
				data: submitData + "&action=add",
				dataType: "html",
				success: function(msg){
					if(parseInt(msg, 0) !== 0)
						{
						var msg_split = msg.split("|");
						
						if(msg_split[0] === 'success') {
							$submit.removeAttr('disabled');
							$email.removeAttr('disabled').val(msg_split[1]).css({'backgroundColor':'#a5ffa5'}); 
							} else {
							$submit.removeAttr('disabled');
							$email.removeAttr('disabled').val(msg_split[1]).css({'backgroundColor':'#ffb2b2'});
							}
						}
					}
				});
			}
		return false;
	});
	
	/* Customizer */
	$("#customize h5").click(function() {
		$("#customize .wrapper").slideToggle();
	});
	
	$("#customize .colors a").click(function(e) {
		var $color = $(this).attr('class');
		$('head').append('<link rel="stylesheet" type="text/css" href="css/customizer/'+ $color +'.css">');
		$('#main .features .item img').each(function(index, element) {
            $(element).attr('src', 'images/features/' + $color + '/' + element.src.substr(element.src.lastIndexOf('/')));
        });
		e.preventDefault();
	});
	/* End customizer */

});