<?php
/**--------------------- DAY 4 --------------------------- */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Student_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'student-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Student Widget', 'text-domain');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-person';
    }



    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }


    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        // Section cho phần nhập tên
        $this->start_controls_section(
            'name_section',
            [
                'label' => __( 'Họ và tên', 'elementor-custom-widget' ),
            ]
        );
        
        $this->add_control(
            'first_name',
            [
                'label' => __( 'Họ và tên đệm', 'elementor-custom-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your first name', 'elementor-custom-widget' ),
            ]
        );
        
        $this->add_control(
            'last_name',
            [
                'label' => __( 'Tên', 'elementor-custom-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your last name', 'elementor-custom-widget' ),
            ]
        );
        
        $this->end_controls_section();
        // Section cho phần nhập Ngày sinh
        $this->start_controls_section(
            'dob_section',
            [
                'label' => __('Ngày sinh', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'day',
            [
                'label' => __('Ngày', 'text-domain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '',
                'min' => 1,
                'max' => 31,
                'step' => 1,
            ]
        );

        $this->add_control(
            'month',
            [
                'label' => __('Tháng', 'text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '01' => 'Tháng 01',
                    '02' => 'Tháng 02',
                    '03' => 'Tháng 03',
                    '04' => 'Tháng 04',
                    '05' => 'Tháng 05',
                    '06' => 'Tháng 06',
                    '07' => 'Tháng 07',
                    '08' => 'Tháng 08',
                    '09' => 'Tháng 09',
                    '10' => 'Tháng 10',
                    '11' => 'Tháng 11',
                    '12' => 'Tháng 12',
                ],
            ]
        );

        $this->add_control(
            'year',
            [
                'label' => __('Năm', 'text-domain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '',
                'min' => 1900,
                'max' => date('Y'),
                'step' => 1,
            ]
        );
        $this->end_controls_section();

        // Note Section
        $this->start_controls_section(
            'note_section',
            [
                'label' => __('Note', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'note',
            [
                'label' => __('Note', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'rows' => 5,
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $first_name = $settings['first_name'];
        $last_name = $settings['last_name'];
       
        // Date of Birth Output
        $dob = $settings['day'] . '/' . $settings['month'] . '/' . $settings['year'];
        echo '<div class="name-section">';
        echo '<h3>Họ và tên sinh viên: ' . $first_name . ' ' . $last_name . '</h3>';
        echo '</div>';
        echo '<div class="student-widget">';
        echo '<div class="student-widget__dob">' . __('Ngày sinh:', 'text-domain') . ' ' . $dob . '</div>';
        echo '<div class="student-widget__note">' . __('Ghi chú:', 'text-domain') . ' ' . $settings['note'] . '</div>';
        echo '</div>';
    }
}
