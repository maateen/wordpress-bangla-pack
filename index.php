<?php
/**
 * Plugin Name: Wordpress Bangla Pack
 * Plugin URI: https://github.com/thirdsailor/Wordpress-Bangla-Pack/
 * Description: Wordpress Bangla Pack is a simple, smart & easy plugin by which you can localize your Wordpress site in Bangla.
 * Version: 1.1
 * Author: Third Sailor
 * Author URI: http://www.thirdsailor.com/
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
 
 //To Update the plugin from github
add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {
	include_once 'updater.php';
	define( 'WP_GITHUB_FORCE_UPDATE', true );
	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin
		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'wp-bangla-pack',
			'api_url' => 'https://api.github.com/repos/thirdsailor/Wordpress-Bangla-Pack',
			'raw_url' => 'https://raw.github.com/thirdsailor/Wordpress-Bangla-Pack/master',
			'github_url' => 'https://github.com/thirdsailor/Wordpress-Bangla-Pack',
			'zip_url' => 'https://github.com/thirdsailor/Wordpress-Bangla-Pack/archive/master.zip',
			'sslverify' => true,
			'requires' => '2.2',
			'tested' => '4.1',
			'readme' => 'README.md',
			'access_token' => '',
		);
		new WP_GitHub_Updater( $config );
	}
}
//End Updater
?>