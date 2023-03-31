<?php
/*
 * Plugin Name:       Student widget
 * Plugin URI:        #
 * Description:       Plugin giúp nhập liệu thông tin sinh viên
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            lengocviet
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       student-widget
 * Domain Path:       /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
final class Student_Widget{
    const VERSION = '1.0.0';

    private static $_instance = null;

    public static function instance() {
        if ( self::$_instance === null ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    }

    public function register_widgets() {
        require_once( __DIR__. '/widgets/st-widget.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Student_Widget() );
    }

}
Student_Widget::instance();