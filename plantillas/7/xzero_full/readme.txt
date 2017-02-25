<--HELP FILE TEMPLATE FOR PRESSFOLIO-->

PRESSFOLIO
Created: 02/08/2009
By: Jasmin Krhan
Contact Info: www.jasminweb.net and mrjasmin_90@hotmail.com 

Thank you for purchasing my theme. If you have any questions that are beyond the scope of this help file, please feel free to email, via my user page contact form. Thanks so much!

--TABLE OF CONTENTS--

A) HTML Structure 
B) CSS Files
C) Javascript 
D) Additional 


----------------------------------------------------------------------------------------------------------

A) HTML Structure

This theme is a fixed layout and is built upon the 960 grid system. The 960 grid system starts with the div called container_12. The layout consists of one centered column.

All the content is wrapped up with a div called "main". The countdown time is shown in a h3 class named time. The tooltip is shown in the div called tooltip.

If you want to add a update news, please find the div named #slidertext and add a new <li> element with the news.

The social icons are wrapped up with a div called "socialicons".

-----------------------------------------------------------------------------------------------------------------------------

B) CSS

I'm using 5 CSS files in this theme. The first one is a generic reset file. Many browser interpret the default behavior of html elements differently. By using a general reset CSS file, we can work round this. This file also contains some general styling, such as anchor tag colors, font-sizes, etc. Keep in mind, that these values might be overridden somewhere else in the file. 
The second one is style.css and contains the website styling. If you want to change anything you have open the style.css file.
The third one is the 960.gs.
The 4:th one is the ie6.css and is used to fix the ie6 bugs.
The fifth css file is ie7.css and is used to fix the bugs in ie7.

---------------------------------------------------------------------------------------------------------------------------

C) Javascript

This theme imports three Javascript files.

  1) jQuery
  2) jcarousel
  3) tooltip
  4) countdown

1) jQuery is a Javascript library that greatly reduces the amount of code that you must write. 
2) the slider is using jcarousel to slide the text.
3) tooltip is used for the tooltip
4) Countdown is the script used for the timer.

To change the countdown date open index.html and fin line 74:

austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 15);

+1 is the number of years from the current date.
1 is the month 
15 is the day

The only thing you have to do is to change these values to fit your needs.	

----------------------------------------------------------------------------------------------------------------------------

Once again, thank you so much for purchasing this theme. As I said at the beginning, I'd be glad to help you if you have any questions relating to this theme. No guarantees, but I'll do my best to assist. If you have a more general question relating to the themes on ThemeForest, you might consider visiting the forums and asking your question in the "Item Discussion" section. 

Jasmin Krhan