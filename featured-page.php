<?php
/**
 * @package FeaturedPage
 * 
 * Plugin Name: Featured Page
 * Plugin URI: http://manuela.sgedu.site/ivana-fashion-blog
 * Description: This plugin adds widgets to nicely highlight pages of your site
 * Version: 1.0.0
 * Author: Manuel Alvarado
 * Author URI: http://manuela.sgedu.site/ivana-fashion-blog
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0
 * Text Domain: featured-page
 * Domain Path: /languages
 */

if ( ! defined ( 'ABSPATH' ) )
{
    die;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) )
{
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Calls the activate method to activate the Featured Page plugin
 */
function activate_featured_page_plugin()
{
    FeaturedPage\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_featured_page_plugin' );

/**
 * Calls the deactivate method to deactivate the Featured Page plugin
 */
function deactivate_featured_page_plugin()
{
    FeaturedPage\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_featured_page_plugin' );

if ( class_exists( 'FeaturedPage\\Init' ) )
{
    FeaturedPage\Init::register_services();
}