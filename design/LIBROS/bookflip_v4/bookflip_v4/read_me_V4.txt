Bookflip V4.0
This version uses a complete different engine that performs far better across modern browsers.
Please abide by the copywite instuctions, you are free to use the script however if you wish to remove the links & copywrite notice/s then buy a licence http://coastworx.com/bookflip.php


1. The book is wrapped in a div container called "myBook" in the html file bookflip.html, there is no need to enter bookflip.js unless you are a advanced with javascript.

Place this at the required location in your webpage:
<div id="myBook"></div>
	

2. A new div(id="pages") is required, this will contain your books pages. Place the div anywhere in your html file but NOT within the bookflip div:

<div id="pages" style="width:1px;height:1px;overflow:hidden;">
	<div style="text-align:center;color:#ffffff"><p style="font-size: 2em;"><br><br><br>Leave instructions<br>here or<br>leave it blank.</p></div>	
	<div>Pg0 </div>
	<div>Pg1 </div>
	<div>Pg2 </div>
	<div>Pg3 </div>
</div>



3. Upload the bookflipjs folder containing bookflip.js & link to it in the head section of your document:
<script type="text/javascript" src="bookflipjs/bookflip.js"></script>

-Upload black_gradient.png to your server in the same folder as your book document.

4. near the bottom of your document insert the javascript code:

<script type="text/javascript">
/****************************************************************************
//** Software License Agreement (BSD License)
//** Book Flip slideshow script- Copyright 2011, Will Jones (coastworx.com)
//** This Script is wholly developed and owned by CoastWorx.com
//** Copywrite: http://www.coastworx.com/
//** You are free to use this script so long as this coptwrite notices
//** and link back to http://www.coastworx.com stays intact in its entirety.
//** If you want to remove the link back to http://www.coastworx.com then purchase a licence.
//** You are NOT Permitted to claim this script as your own or
//** use this script for commercial purposes without the express
//** permission of CoastWorx Technologies!
//***************************************************************************/

pWidth=400; //width of each page
pHeight=482; //height of each page

numPixels=20;  //size of block in pixels to move each pass
pSpeed=15; //speed of animation, more is slower

startingPage="0";//select page to start from, for last page use "e", eg. startingPage="e"
allowAutoflipFromUrl = true; //true allows querystring in url eg bookflip.html?autoflip=5

pageBackgroundColor="#CCCCCC";
pageFontColor="#ffffff";

pageBorderWidth="1";
pageBorderColor="#3D4D5D";
pageBorderStyle="solid";  //dotted, dashed, solid, double, groove, ridge, inset, outset, dotted solid double dashed, dotted solid

pageShadowLeftImgUrl ="black_gradient.png";
pageShadowWidth = 80;
pageShadowOpacity = 60;
pageShadow=1 //0=shadow off, 1= shadow on left page

allowPageClick=true; //allow page turn by clicking the page directly
allowNavigation=true; //this builds a drop down list of pages for auto navigation.
pageNumberPrefix="page "; //displays in the drop down list of pages if enabled

ini();
</script>



Below that can go any number of divs(pages), the only limitation is how well the viewers browser and browser's javascript engine can cope with what you have inserted.

Each page div is sized according to the settings at the bottom of the html file containing the book:

pWidth=400; //width of each page
pHeight=482; //height of each page

Other setting are named to be as self-explanatory as possible.


It is best to have some basic knowledge of html or have someone assist if you are still learning. But as a guide it is best to use the demo as a template and modiy/add your content and or pages as required.
To see how a page might look as a stand alone, paste the div(page) code to a seperate html file, give the div the same height and width attributes as your myPageW and myPageH settings and load into a browser.

eg. div with height width settings as new html file:

<div name="Home" style="width:400px;height:482px;background:#055123 url(spongebob/page0.jpg);color:#ffffff;">
			<div align=center>
			<h1>Are You Ready Kids?</h1>
			</div>
		</div>

Please review the comments section of the website (http://coastworx.com/bookflip.php) as there is a good chance any questions you may have, have already been asked and answered and its a couple of pages long. 
If you need help with basic html ask a friend who can help or hire a professional.

Cheers
Will



