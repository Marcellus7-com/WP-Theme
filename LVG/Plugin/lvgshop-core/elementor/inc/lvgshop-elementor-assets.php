<?php

if (!defined('ABSPATH')) exit(); // Exit if accessed directly

if (!class_exists('Lvgshop_Elementor_Addons_Assests')) {

    class Lvgshop_Elementor_Addons_Assests
    {

        /**
         * [$_instance]
         * @var null
         */
        private static $_instance = null;

        /**
         * [instance] Initializes a singleton instance
         * @return [Lvgshop_Elementor_Addons_Assests]
         */
        public static function instance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * [__construct] Class construcotr
         */
        public function __construct() {

            // Register Scripts
            add_action('wp_enqueue_scripts', [$this, 'register_assets']);
            add_action('admin_enqueue_scripts', [$this, 'register_assets']);


            add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'],15);

        }

        /**
         * All available styles
         *
         * @return array
         */
        public function get_styles() {

            $style_list = [

                'lvgshop-main-css' => [
                    'src' => LVGSHOP_PL_ASSETS . 'css/lvgshop-elementor.css',
                    'version' => 1.1
                ],

            ];
            return $style_list;

        }

        /**
         * All available scripts
         *
         * @return array
         */
        public function get_scripts() {


            $script_list = [

                'lvgshop-main-js' => [
                    'src' => LVGSHOP_PL_ASSETS . 'js/lvgshop-elementor.js',
                    'version' => 1.1,
                    'deps' => ['jquery']
                ],

                'back-min' => [
                    'src' => LVGSHOP_PL_ASSETS . 'js/back.min.js',
                    'version' => 1.1,
                    'deps' => ['jquery']
                ],

                'global-drivers' => [
                    'src' => LVGSHOP_PL_ASSETS . 'js/global-dividers.min.js',
                    'version' => 1.1,
                    'deps' => ['jquery']
                ],


            ];


            return $script_list;

        }

        /**
         * Register scripts and styles
         *
         * @return void
         */
        public function register_assets() {
            $scripts = $this->get_scripts();
            $styles = $this->get_styles();

            // Register Scripts
            foreach ($scripts as $handle => $script) {
                $deps = (isset($script['deps']) ? $script['deps'] : false);
                wp_register_script($handle, $script['src'], $deps, $script['version'], true);
            }

            // Register Styles
            foreach ($styles as $handle => $style) {
                $deps = (isset($style['deps']) ? $style['deps'] : false);
                wp_register_style($handle, $style['src'], $deps, $style['version']);
            }


        }


        /**
         * [enqueue_scripts]
         * @return [void] Frontend Scripts
         */
        public function enqueue_scripts() {

            // CSS
            wp_enqueue_style('lvgshop-main-css');


            // JS
            wp_enqueue_script('lvgshop-main-js');

            if (is_user_logged_in()) {
                wp_enqueue_script('back-min');
                $main_values = array(
                    'lvgshop_shapes' => lvgshop_get_svg_shapes()
                );
                wp_localize_script('back-min', 'lvgshop_elementor_object', $main_values);
            }
            wp_enqueue_script('global-drivers');


        }

    }

    Lvgshop_Elementor_Addons_Assests::instance();

}