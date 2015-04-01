<?php
/**
 * Plugin Name: Wordpress Bangla Pack
 * Plugin URI: http://lab.ugcoder.com/wpbangla/
 * Description: Wordpress Bangla Pack is a simple, smart & easy plugin by which you can localize your Wordpress site in Bangla.
 * Version: 1.0
 * Author: Ungratified Coder
 * Author URI: http://ugcoder.com/
 * License: GNU (General Public License) Version 3.0
 */

	function bn_lang_pack($domain='default') {	
		$path=plugin_dir_path(__FILE__);
		$wpbangla_mo= $path . "/bnlangpack/bn_BD.mo";
		return $wpbangla_mo;
	}
	
 add_filter ('load_textdomain_mofile','bn_lang_pack' );
 
 
	function english_to_bengali($number) {
		$english = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0'); 
		$bengali = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
		return str_replace($english, $bengali, $number);
}

 add_filter('number_format_i18n', 'english_to_bengali', 10, 1);
 add_filter('pre_date_i18n', 'english_to_bengali', 10, 2);
 add_filter( 'get_the_time', 'english_to_bengali' );
 add_filter( 'the_date', 'english_to_bengali' );
 add_filter( 'get_the_date', 'english_to_bengali' );
 add_filter( 'comments_number', 'english_to_bengali' );
 add_filter( 'get_comment_count', 'english_to_bengali' );
 add_filter( 'get_comment_date', 'english_to_bengali' );
 add_filter( 'get_comment_time', 'english_to_bengali' );
 add_filter( 'get_archives_link', 'english_to_bengali' );
 add_filter( 'wp_list_categories', 'english_to_bengali' );
 
?>