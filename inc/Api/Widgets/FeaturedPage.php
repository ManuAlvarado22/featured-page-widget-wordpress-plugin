<?php
/**
 * @package FeaturedPage
 */

namespace FeaturedPage\Api\Widgets;

use FeaturedPage\Api\Callbacks\WidgetsCallbacks;
use WP_Widget;

class FeaturedPage extends WP_Widget
{
    /**
     * Widget unique identifier
     * @var string
     */
    public $widget_id;

    /**
     * Widget name
     * @var string
     */
    public $widget_name;

    /**
     * Widget options array
     * @var class 
     */
    public $widget_options = [];

    /**
     * WidgetCallbacks instance
     * @var class 
     */
    public $callbacks;

    /**
     * Assigns values to the widget properties
     * @return
     */
    public function __construct()
    {
        $this->widget_id = 'featured_page_widget';
        $this->widget_name = 'Featured Page';
        $this->callbacks = new WidgetsCallbacks;

        $this->widget_options['classname'] = $this->widget_id;
        $this->widget_options['description'] = 'Make your site pages stand out';
        $this->widget_options['customize_selective_refresh'] = true;
    }

    /**
     * Calls the parent constructor and calls register hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        parent::__construct( $this->widget_id, $this->widget_name, $this->widget_options );

        add_action( 'widgets_init', [ $this, 'register_widget' ] );
    }

    /**
     * Register hook for WordPress widgets
     * @return
     */
    public function register_widget()
    {
        register_widget( $this );
    }

    /**
     * Outputs the content of the widget
     * @param array $args Sidebar arguments array
     * @param array $instance This instance options array
     * @return
     */
    public function widget( $args, $instance )
    {
        $page_slug = $instance['page_slug'];
        $page = get_page_by_path( $page_slug );
        $page_id = $page->ID;

        $featured_page_image_args = [
            'class' => 'featured-page-box__image'
        ];

        $this->callbacks->featured_page_widget( $page_id, $featured_page_image_args );
    }

    /**
     * Outputs the options form on admin
     * @param array $instance This instance options array
     * @return
     */
    public function form( $instance )
    {
        $page_slug = '';

        if ( ! empty( $instance['page_slug'] ) )
        {
            $page_slug = $instance['page_slug'];
        }

        $this->callbacks->featured_page_form( $this, $page_slug );
    }

    /**
     * Processing widget options on save
     * @param array $new_instance The new options
     * @param array $old_instance The current options
     * @return array Updated options
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['page_slug'] = sanitize_text_field( $new_instance['page_slug'] );

        return $instance;
    }
}