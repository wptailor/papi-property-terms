<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Property Taxonomy
 *
 * @version 1.0.0
 */

class Papi_Property_Terms extends Papi_Property {

    /**
     * The default value.
     *
     * @var int
     * @since 1.0.0
     */

    public $default_value = array();

    /**
     * Get default settings.
     *
     * @since 1.0.0
     *
     * @return array
     */

    public function get_default_settings() {
        return array(
        );
    }

    /**
     * Generate the HTML for the property.
     *
     * @since 1.0.0
     */

    public function html() {

        // Get settings
        $settings    = $this->get_settings();

        // Property options
        $options = $this->get_options();

        // Database value.
        $value = $this->get_value();

        // Get comments
        //
        // $comments = get_comments(
        //     array(
        //         'status' => 'approve'
        //     )
        // );

        $taxonomies = array('category');
        $args = array(
                    'hierarchical'      => false,
                    'hide_empty'        => false
                );
        $terms = get_terms( $taxonomies, $args );

        ?>
            <div class="papi-property-relationship">
                <input type="hidden" name="<?php echo $options->slug; ?>[]" />
                <div class="relationship-inner">
                    <div class="relationship-top-left">
                        <strong><?php _e( 'Search', 'papi' ); ?></strong>
                        <input type="search" />
                    </div>
                    <div class="relationship-top-right">

                    </div>
                    <div class="papi-clear"></div>
                </div>
                <div class="relationship-inner">
                    <div class="relationship-left">
                        <ul>
                            <?php foreach ( $terms as $term ): ?>
                                <li>
                                    <input type="hidden" data-name="<?php echo $options->slug; ?>[]"
                                           value="<?php echo $term->term_id; ?>"/>
                                    <a href="#"><?php echo $term->name; ?></a>
                                    <span class="icon plus"></span>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="relationship-right">
                        <ul>
                            <?php foreach ( $value as $term_id ): ?>
                                <li>
                                    <input type="hidden" name="<?php echo $options->slug; ?>[]"
                                           value="<?php echo $term_id; ?>"/>
                                    <a href="#"><?php echo get_term($term_id, 'category')->name; ?></a>
                                    <span class="icon minus"></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="papi-clear"></div>
                </div>
            </div>
        <?php
    }

    /**
    * Format the value of the property before we output it to the application.
    *
    * @param mixed $value
    * @param string $slug
    * @param int $post_id
    *
    * @since 1.0.0
    *
    * @return mixed
    */

    // This function is not required since it does this in the base class.

    // public function format_value ($value, $slug, $post_id) {
    //  return $value;
    // }

    /**
     * Update the value of the property before we save it to the database.
     *
     * @param mixed $value
     * @param string $slug
     * @param int $post_id
     *
     * @since 1.0.0
     *
     * @return mixed
     */

    // This function is not required since it does this in the base class.

    // public function update_value ($value, $slug, $post_id) {
    //  return $value;
    // }
}
