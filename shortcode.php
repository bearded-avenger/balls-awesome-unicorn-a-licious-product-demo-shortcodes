<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class bAuAlPdSSC {

	function __construct(){

		// register sc's
		add_shortcode('ba_boxes',	array($this,'ba_demo_boxes'));
		add_shortcode('ba_cta',		array($this,'ba_demo_cta'));

		// fix for br's and p's with shortcodes on different lines
		add_filter( 'the_content', 	array($this,'ba_demos_shortcode_empty_paragraph_fix'));
	}

	// boxes with lightboxes
	function ba_demo_boxes($atts,$content = null) {

		$defaults = array(
			'span' 	=> 3,
			'thumb' => '',
			'img'	=> '',
			'alt'	=> '',
			'title' => ''
		);

		$atts = shortcode_atts($defaults, $atts);

		$hash 		= rand();
		$getthumb 	= $atts['thumb'];
		$getimg 	= $atts['img'];
		$getimgalt 	= $atts['alt'];
		$gettitle 	= $atts['title'];

		$image = sprintf('<a class="demo-lb-link" href="#demo-lb-%s"><img src="%s" alt="%s"></a><div class="demo-lb" id="demo-lb-%s"><a href="#close"><img src="%s" alt="%s"></a></div>',
						$hash,
						$getthumb,
						$getimgalt,
						$hash,
						$getimg,
						$getimgalt);

		$title = $atts['title'] ? sprintf('<h4 class="demo-box-title">%s</h4>',$atts['title']) : false;

		$out = sprintf('<div class="demo-box col-sm-%s">%s%s%s</div>',$atts['span'],$image,$title,do_shortcode($content));

		return $out;
	}

	// call to action
	function ba_demo_cta($atts,$content = null) {

		$defaults = array(
			'link'	=> '#',
			'price'	=> '',
			'docs'	=> '#'
		);

		$atts = shortcode_atts($defaults, $atts);

		$ctaleft = sprintf('<div class="col-sm-6 npl ba-cta-left"><a class="ba-btn" href="%s">documentation</a></div>',$atts['docs']);
		$ctaright = sprintf('<div class="col-sm-6 npr ba-cta-right"><a class="ba-btn" href="%s">buy now &nbsp;$%s</a></div>',$atts['link'],$atts['price']);

		$out = sprintf('<div class="ba-cta clear">%s%s</div>',$ctaleft,$ctaright);

		return $out;
	}

	function ba_demos_shortcode_empty_paragraph_fix($content) {
	    $array = array (
	        '<p>[' => '[',
	        ']</p>' => ']',
	        ']<br />' => ']'
	    );

	    $content = strtr($content, $array);

		return $content;
	}


}
new bAuAlPdSSC;


