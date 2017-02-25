// JavaScript Document

$(".nivo-controlNav a:last-child").addClass('last-child');
$(".column_grid div:last-child").addClass('last-child');
$(".partner li:last-child").addClass('last-child');
$("#rightcol .rightcol-block:last-child").addClass('last-child');
$(".offer li:last-child").addClass('last-child');
$("#footer-bottom .common4 ul li:last-child").addClass('last-child');
$(".breadcrumb li:last-child").addClass('last-child');
$(".review-list li:last-child").addClass('last-child');
$(".info-content li:last-child").addClass('last-child');
$(".accordin-block:last-child").addClass('last-child');
$("table#checkout-tab tr td:last-child").addClass('last-child');
$(".Featured .block1st:last-child").addClass('last-child');
$("table th:last-child").addClass('last-child');
$("table th:last-child span").addClass('last-child');
$("table tr.padding.bot td:last-child").addClass('last-child');
$("table td:last-child").addClass('last-child');
$("table#cart.wish th:last-child span").addClass('last-child');
$("table#cart.wish td:last-child").addClass('last-child');
$(".typography .typ-block p:last-child").addClass('last-child');
$(".buttons-block .button-cart:last-child").addClass('last-child');
$(".full-elements .accordin-block:last-child").addClass('last-child');
$(".full-elements .accordin-block:last-child p").addClass('last-child');



// CURRENCY SELECT BOX REPLACEMENT 

$("#default-usage-select").selectbox({
	effect: "fade"
});

// END CURRENCY SELECT BOX REPLACEMENT 

// CATEGORY SELECT BOX REPLACEMENT 
$("form.search2 .select2").selectbox({  //first select
	effect: "fade"
});

$("form.search2 .select").selectbox({ //second select
	effect: "fade"
});
$(document).ready(function() {	
	// CATEGORY SELECT BOX POSITIONING
	
	var mainwidth = $('form.search2 .select').outerWidth();
	$('.search2 .sel1 .jquery-selectbox ').css('width', mainwidth);
	$('.search2 .sel1 .jquery-selectbox .jquery-selectbox-list').css('width', mainwidth);
	$('.search2 .sel1 .jquery-selectbox .jquery-selectbox-moreButton').css('width', mainwidth);
	var currentitem = $('form.search2 .select').outerWidth()-6;
	$('.search2 .sel1 .jquery-selectbox .jquery-selectbox-currentItem').css('width', currentitem);
	
	var mainwidth = $('form.search2 .select2').outerWidth();
	$('.search2 .sel2 .jquery-selectbox ').css('width', mainwidth);
	$('.search2 .sel2 .jquery-selectbox .jquery-selectbox-list').css('width', mainwidth);
	$('.search2 .sel2 .jquery-selectbox .jquery-selectbox-moreButton').css('width', mainwidth);
	var currentitem = $('form.search2 .select2').outerWidth()-6;
	$('.search2 .sel2 .jquery-selectbox .jquery-selectbox-currentItem').css('width', currentitem);
	
	
});	

// END CATEGORY SELECT BOX REPLACEMENT 

// CART PAGE SELECT BOX REPLACEMENT 

$("form .general-select .select").selectbox({  //first select
	effect: "fade"
});

// END CATEGORY SELECT BOX REPLACEMENT
Cufon.now(); 