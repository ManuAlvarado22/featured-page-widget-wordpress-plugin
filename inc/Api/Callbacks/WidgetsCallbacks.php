<?php
/**
 * @package FeaturedPage
 */

namespace FeaturedPage\Api\Callbacks;

use FeaturedPage\Base\BaseController;

class WidgetsCallbacks extends BaseController
{
    /**
     * Featured Page widget front-end view
     * @param integer $page_id The id of the featured page
     * @param array $image_args Optional arguments for the page image
     * @return
     */
    public function featured_page_widget( $page_id, $image_args )
    { ?>

        <div class="featured-page-box">
            <a 
                href="<?php echo esc_url( get_permalink( $page_id ) ); ?>" 
                class="featured-page-box__link-wrapper"
            >
                <h3 class="featured-page-box__title">
                    <?php echo esc_html( get_the_title( $page_id ) ); ?>
                </h3>

                <div class="featured-page-box__image-container">
                    <?php echo get_the_post_thumbnail( $page_id, 'full', $image_args ); ?>
                </div>
            </a>
        </div>
    
    <?php
    }

    /**
     * Featured Page widget form
     * @param class $widget_instance The current instance of the widget
     * @param string The slug of the page being featured
     * @return
     */
    public function featured_page_form( $widget_instance, $page_slug )
    { ?>
        
        <div>
            <label
                for="<?php echo $widget_instance->get_field_id( 'page_slug' ); ?>"
            >
                Page Slug:
            </label>

            <input
                type="text"
                class="widefat"
                id="<?php echo $widget_instance->get_field_id( 'page_slug' ); ?>"
                name="<?php echo $widget_instance->get_field_name( 'page_slug' ); ?>"
                value="<?php echo esc_attr( $page_slug ); ?>"
            />
        </div>

    <?php 
    }
}