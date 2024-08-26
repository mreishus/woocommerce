<?php
/**
 * WooCommerce Option Registry
 *
 * This class manages a registry of WooCommerce options. It provides methods to register
 * individual options or arrays of options, and to retrieve all registered options.
 *
 */

/**
 * WC_Option_Registry Class.
 */
class WC_Option_Registry {
    /**
     * The single instance of the class.
     *
     * @var WC_Option_Registry|null
     */
    private static $instance = null;

    /**
     * Array of registered option names.
     *
     * @var array
     */
    private $options = array();

    /**
     * Main WC_Option_Registry Instance.
     *
     * Ensures only one instance of WC_Option_Registry is loaded or can be loaded.
     *
     * @return WC_Option_Registry - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Register a single option.
     *
     * @param string $option_name The name of the option to register.
     */
    public function register_option( $option_name ) {
        if ( ! in_array( $option_name, $this->options ) ) {
            $this->options[] = $option_name;
        }
    }

    /**
     * Register multiple options at once.
     *
     * @param array $option_names An array of option names to register.
     */
    public function register_options( $option_names ) {
        foreach ( $option_names as $option_name ) {
            $this->register_option( $option_name );
        }
    }

    /**
     * Get all registered options.
     *
     * @return array An array of all registered option names.
     */
    public function get_registered_options() {
        return $this->options;
    }
}
