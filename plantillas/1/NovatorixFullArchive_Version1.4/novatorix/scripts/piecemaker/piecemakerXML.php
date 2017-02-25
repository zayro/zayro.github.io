<?php echo '<?xml version="1.0" encoding="utf-8" ?>';
	require_once('../../../../../wp-load.php');
	GLOBAL $shortname;	
	$imageWidth = get_option($shortname.'_imageWidth');
	$imageHeight = get_option($shortname.'_imageHeight');
	$segments = get_option($shortname.'_segments');
	$tweenTime = get_option($shortname.'_tweenTime');
	$tweenDelay = get_option($shortname.'_tweenDelay');
	$tweenType = get_option($shortname.'_tweenType');
	$zDistance = get_option($shortname.'_zDistance');
	$expand = get_option($shortname.'_expand');
	$innerColor = get_option($shortname.'_innerColor');
	$textBackground = get_option($shortname.'_textBackground');
	$shadowDarkness = get_option($shortname.'_shadowDarkness');
	$textDistance = get_option($shortname.'_textDistance');	
	$autoPlay = get_option($shortname.'_autoplay');

	$get_custom_options = get_option($shortname.'_slider_cp');
	$get_images_count = get_option($shortname.'_slider_images_count');
	$get_custom_url = get_option($shortname.'_piecemaker_text_url');
	$get_custom_headline =  str_replace("'","\'",get_option($shortname.'_piecemaker_text_headline'));
	$get_custom_description = str_replace("'","\'",get_option($shortname.'_piecemaker_text_description'));	

if ($get_custom_url[$shortname.'_piecemaker_text_url_1']){
echo '
	<Piecemaker>
	<Settings>
		<imageWidth>'. $imageWidth . '</imageWidth>
		<imageHeight>'. $imageHeight . '</imageHeight>
		<segments>'. $segments . '</segments>
		<tweenTime>'. $tweenTime . '</tweenTime>
		<tweenDelay>'. $tweenDelay . '</tweenDelay>
		<tweenType>'. $tweenType . '</tweenType>
		<zDistance>'. $zDistance . '</zDistance>
		<expand>'. $expand . '</expand>
		<innerColor>'. $innerColor . '</innerColor>
		<textBackground>'. $textBackground . '</textBackground>
		<shadowDarkness>' . $shadowDarkness . '</shadowDarkness>
		<textDistance>'. $textDistance . '</textDistance>
		<autoplay>' . $autoPlay .  '</autoplay>
	</Settings>
	';}
	
	$found_images = 0;
	for($i = 1; $i <= $get_images_count; $i++) 
	{
		if ($get_custom_url[$shortname.'_piecemaker_text_url_'.$i])
		{
echo '<Image Filename="'.$get_custom_url[$shortname.'_piecemaker_text_url_'.$i] .'">
	';
			
			if (($get_custom_description[$shortname.'_piecemaker_text_description_'.$i]) or ($get_custom_headline[$shortname.'_piecemaker_text_headline_'.$i])){
echo '<Text>
		<headline>'. $get_custom_headline[$shortname.'_piecemaker_text_headline_'.$i] .'</headline>
		<paragraph>&nbsp;</paragraph>
		<paragraph>'. $get_custom_description[$shortname.'_piecemaker_text_description_'.$i] .'</paragraph>
	</Text>';
	}
			
echo '
	</Image>
	';
			$found_images = $found_images + 1;
		}
	}
	
	if ( $found_images == 0 )
	{	

echo '
<Piecemaker>
  <Settings>
    <imageWidth>900</imageWidth>
    <imageHeight>400</imageHeight>
    <segments>7</segments>
    <tweenTime>1.2</tweenTime>
    <tweenDelay>0.1</tweenDelay>
    <tweenType>easeInOutBack</tweenType>
    <zDistance>0</zDistance>
    <expand>20</expand>
    <innerColor>0x111111</innerColor>
    <textBackground>0x0064C8</textBackground>
    <shadowDarkness>100</shadowDarkness>
    <textDistance>25</textDistance>
    <autoplay>12</autoplay>
  </Settings>


  <Image Filename="splash.gif">
    <Text>
      <headline>Description Text</headline>
      <break>Ӂ</break>
      <paragraph>Here you can add a description text for every single image.</paragraph>
      <break>Ӂ</break>
      <inline>This is HTML text loaded from the external XML file and formatted with an external CSS file. So it\'s pretty simple to set this text. You can also easily add</inline>
      <a href="http://www.modularweb.net/piecemaker" target="_blank">Ӂhyperlinks</a>
      <paragraph>. This one leads you to the official Piecemaker website, by the way.</paragraph>
    </Text>
  </Image>
  <Image Filename="image2.jpg">
    <Text>
      <headline>Description Text</headline>
      <break>Ӂ</break>
      <paragraph>Here you can add a description text for every single image.</paragraph>
      <break>Ӂ</break>
      <inline>This is HTML text loaded from the external XML file and formatted with an external CSS file. So it\'s pretty simple to set this text. You can also easily add</inline>
      <a href="http://www.modularweb.net/piecemaker" target="_blank">Ӂhyperlinks</a>
      <paragraph>. This one leads you to the official Piecemaker website, by the way.</paragraph>
    </Text>
  </Image>
  <Image Filename="image3.jpg">
    <Text>
      <headline>Description Text</headline>
      <break>Ӂ</break>
      <paragraph>Here you can add a description text for every single image.</paragraph>
      <break>Ӂ</break>
      <inline>This is HTML text loaded from the external XML file and formatted with an external CSS file. So it\'s pretty simple to set this text. You can also easily add</inline>
      <a href="http://www.modularweb.net/piecemaker" target="_blank">Ӂhyperlinks</a>
      <paragraph>. This one leads you to the official Piecemaker website, by the way.</paragraph>
    </Text>
  </Image>
  <Image Filename="image4.jpg">
    <Text>
      <headline>Description Text</headline>
      <break>Ӂ</break>
      <paragraph>Here you can add a description text for every single image.</paragraph>
      <break>Ӂ</break>
      <inline>This is HTML text loaded from the external XML file and formatted with an external CSS file. So it\'s pretty simple to set this text. You can also easily add</inline>
      <a href="http://www.modularweb.net/piecemaker" target="_blank">Ӂhyperlinks</a>
      <paragraph>. This one leads you to the official Piecemaker website, by the way.</paragraph>
    </Text>
  </Image>
  <Image Filename="image5.jpg">
    <Text>
      <headline>Description Text</headline>
      <break>Ӂ</break>
      <paragraph>Here you can add a description text for every single image.</paragraph>
      <break>Ӂ</break>
      <inline>This is HTML text loaded from the external XML file and formatted with an external CSS file. So it\'s pretty simple to set this text. You can also easily add</inline>
      <a href="http://www.modularweb.net/piecemaker" target="_blank">Ӂhyperlinks</a>
      <paragraph>. This one leads you to the official Piecemaker website, by the way.</paragraph>
    </Text>
  </Image>
  <Image Filename="image6.jpg">
    <Text>
      <headline>Description Text</headline>
      <break>Ӂ</break>
      <paragraph>Here you can add a description text for every single image.</paragraph>
      <break>Ӂ</break>
      <inline>This is HTML text loaded from the external XML file and formatted with an external CSS file. So it\'s pretty simple to set this text. You can also easily add</inline>
      <a href="http://www.modularweb.net/piecemaker" target="_blank">Ӂhyperlinks</a>
      <paragraph>. This one leads you to the official Piecemaker website, by the way.</paragraph>
    </Text>
  </Image>
  ';
	}
	
	echo '
	</Piecemaker>';
?>