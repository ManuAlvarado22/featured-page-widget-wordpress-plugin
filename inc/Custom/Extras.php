<?php
/**
 * @package FeaturedPage
 */

namespace FeaturedPage\Custom;

class Extras
{
	/**
     * Register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		add_filter( 'dynamic_sidebar_params', [ $this, 'add_sidebar_class' ] );
	}

    /**
     * Add a new CSS class to the sidebar containing the Featured Page widget(s)
     * @param array $parameters The sidebar parameters array
     * @return array $parameters The sidebar parameters array
     */
	public function add_sidebar_class( $parameters )
	{
        if ( preg_match( '/featured_page_widget-{0,}/', $parameters[0]['widget_id'] ) )
        {
            // $classname = 'class="featured_pages"';
            // $classname = 'class="payes"';
            // $parameters[0]['class'] = str_replace( 'class="', $classname, $params[0]['class'] );
            // $parameters[0]['class'] = 'Oui!';
            $parameters[0]['class'] = 'featured-pages-nya';
        }

        return $parameters;
	}
}