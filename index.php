<?php
/**
 * Plugin Name: Wordpress Bangla Pack
 * Plugin URI: https://github.com/thirdsailor/Wordpress-Bangla-Pack/
 * Description: Wordpress Bangla Pack is a simple, smart & easy plugin by which you can localize your Wordpress site in Bangla.
 * Version: 1.0
 * Author: Third Sailor
 * Author URI: www.thirdsailor.com/
 * License: GNU (General Public License) Version 3.0
 */

 //To Update the Plugin 
if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'Wordpress Bangla Pack', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/thirdsailor/Wordpress-Bangla-Pack', // the github API url of your github repo
        'raw_url' => 'https://raw.github.com/thirdsailor/Wordpress-Bangla-Pack/master', // the github raw url of your github repo
        'github_url' => 'https://github.com/thirdsailor/Wordpress-Bangla-Pack', // the github url of your github repo
        'zip_url' => 'https://github.com/thirdsailor/Wordpress-Bangla-Pack/zipball/master', // the zip url of the github repo
        'sslverify' => true // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '2.2', // which version of WordPress does your plugin require?
        'tested' => '4.1.1', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.MD' // which file to use as the readme for the version number
    );
    new WPGitHubUpdater($config);
}

//Main Plugin Codes

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