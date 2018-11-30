<?php
class ivanapagewidget_Featured_Page extends WP_Widget 
{
    public function __construct()
    {
        $widget_options = [
            'classname'   => 'featured-page-widget',
            'description' => 'Nicely highlight pages from your site'
        ];
    
        parent::__construct( 'featured_page', 'Featured Page', $widget_options );
    }

    public function widget( $args, $instance )
    {
        $page_slug = $instance['page_slug'];
        $page = get_page_by_path( $page_slug );
        $page_id = $page->ID;

        $featured_page_image_args = [
            'class' => 'featured-page-box__image'
        ]; ?>
            
        <div class="featured-page-box">
            <a 
                href="<?php echo esc_url( get_permalink( $page_id ) ); ?>" 
                class="featured-page-box__link-wrapper"
            >
                <h3 class="featured-page-box__title">
                    <?php echo esc_html( get_the_title( $page_id ) ); ?>
                </h3>

                <div class="featured-page-box__image-container">
                    <?php echo get_the_post_thumbnail( $page_id, 'full', $featured_page_image_args ); ?>
                </div>
            </a>
        </div>

        <?php
    }

    public function form( $instance )
    {
        if ( ! empty( $instance['page_slug'] ) )
        {
            $page_slug = $instance['page_slug'];
        }
        else
        {
            $page_slug = '';
        } ?>

        <div>
            <label
                for="<?php echo $this->get_field_id( 'page_slug' ); ?>"
            >
                Page Slug:
            </label>

            <input
                type="text"
                class="widefat"
                id="<?php echo $this->get_field_id( 'page_slug' ); ?>"
                name="<?php echo $this->get_field_name( 'page_slug' ); ?>"
                value="<?php echo esc_attr( $page_slug ); ?>"
            />
        </div>

        <?php
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['page_slug'] = strip_tags( $new_instance['page_slug'] );

        return $instance;
    }
}

// Register the widget.
function ivanapagewidget_register_featured_page_widget()
{
    register_widget( 'ivanapagewidget_Featured_Page' );
}
add_action( 'widgets_init', 'ivanapagewidget_register_featured_page_widget' );

function ivanapagewidget_scripts()
{
    wp_enqueue_style( 'ivanapagewidget-style', plugin_dir_url( __FILE__ ) . 'public/styles/style.css', [], '1.0.0' );
    
    wp_enqueue_script( 'ivanapagewidget-scrolling-behaviors', plugin_dir_url( __FILE__ ) . 'public/js/scrolling-behaviors.js', [], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ivanapagewidget_scripts' );