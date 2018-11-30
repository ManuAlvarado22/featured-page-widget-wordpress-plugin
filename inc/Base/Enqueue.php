<?php
/**
 * @package FeaturedPage
 */

namespace FeaturedPage\Base;

use FeaturedPage\Base\BaseController;

class Enqueue extends BaseController
{
    /**
     * Register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Enqueue scripts and stylesheets
     * @return
     */
    public function enqueue_scripts()
    {
        wp_enqueue_style( 'featured-page-style', $this->plugin_url . 'assets/dist/css/style.css' );

        wp_enqueue_script( 'featured-page-app', $this->plugin_url . 'assets/src/scripts/app.js', [], false, true );
    }
}