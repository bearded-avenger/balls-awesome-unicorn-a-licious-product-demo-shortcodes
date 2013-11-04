<?php
/*
Author: Nick Haskins
Author URI: http://nickhaskins.com
Plugin Name: Balls Awesome Unicorn-a-licious Product Demo Shortcodes
Plugin URI: https://github.com/bearded-avenger/balls-awesome-unicorn-a-licious-product-demo-shortcodes
Version: 1.0
Description: Demo shortcodes i use for my product demos
Demo: http://edd-galleries-pro.nickhaskins.co/
*/

class bAuAlPdS {

	const version = '1.0';

	function __construct() {

        $this->url  = plugins_url( '', __FILE__ );

		require_once('shortcode.php');

		add_action('wp_enqueue_scripts',array($this,'scripts'));

	}

	function scripts(){

		wp_register_style( 'baualpds-style', $this->url.'/css/style.css', self::version, true);

		wp_enqueue_style('baualpds-style');
	}

}
new bAuAlPdS;