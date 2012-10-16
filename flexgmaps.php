<?php
/*
	Plugin Name: FlexGMaps
	Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
	Description: FlexGMaps enables you to embed a google map on a page and let it act responsively
	Version: 0.0.1
	Author: Drew Frisk
	Author URI: http://drewfrisk.com
	License: WTFPL
	License URI: http://sam.zoy.org/wtfpl/ 

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
                    Version 2, December 2004

 Copyright (C) 2004 Sam Hocevar <sam@hocevar.net>

 Everyone is permitted to copy and distribute verbatim or modified
 copies of this license document, and changing it is allowed as long
 as the name is changed.

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. You just DO WHAT THE FUCK YOU WANT TO.

*/

function flexgmaps_registerShortcode($atts, $content = null) {
	extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "flex" => 'true',
      "src" => 'https://maps.google.com/maps?q=New+York,+NY&hl=en&ll=40.714419,-74.0069&spn=0.005733,0.009645&sll=40.771637,-73.960648&sspn=0.045826,0.077162&oq=New+York+&hnear=New+York&t=m&z=17'
   ), $atts));
	
	$html = '<div ';
	
	if(!$flex) $html .= '>';
	else $html .= 'class="flexgmaps-embed-container">';
	
	$html .= '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ';
	
	if(!$flex) {
		$html .= 'width="' . $width . '" height="' .$height .' "';
	}
	
	$html .= 'src="'.$src;
	$html .= '&output=embed"></iframe></div>';	
	
	return $html;
}

function flexgmaps_registerStyles() {
	
/*
  .embed-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    
    iframe, object, embed {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  }
*/		
	$styles = "<!-- Styles for FlexGMaps -->\n";
	$styles .= '<style type="text/css">.flexgmaps-embed-container{position:relative; padding-bottom:56.25%;/* 16/9 ratio */height:0; overflow:hidden;} .flexgmaps-embed-container iframe, object, embed { position:absolute; top:0; left:0; width:100%; height:100%;}</style>';
	echo $styles;
}

add_action('wp_head', 'flexgmaps_registerStyles');
add_shortcode("flexgmaps", "flexgmaps_registerShortcode");

?>