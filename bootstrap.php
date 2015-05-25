<?php

/*
 * Plugin Name: Papi: Property Terms
 * Description: Select specific terms
 * Version: 1.0.0
 * Author: Ralev.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Include Property Terms
 *
 * @since 1.0.0
 */

function include_property_terms() {
  include_once('class-papi-property-terms.php');
}

add_action('papi_include_properties', 'include_property_terms');
