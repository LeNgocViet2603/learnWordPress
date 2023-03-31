<?php
global $theme_prefix, $theme_uri;
$theme_prefix   = 'newtheme';
$theme_main_uri = get_template_directory();
$theme_uri      = get_template_directory_uri() . '/assets';
$theme_dir      = get_template_directory();
$theme_version  = '1.0';

// Đăng ký các thành phần hỗ trợ cho theme: menu, post_thumbnail...
include_once $theme_dir . '/inc/theme_support.php';

// Đăng ký style,scripts cho theme: css, js
include_once $theme_dir . '/inc/scripts.php';

// Đăng ký sidebar, widgets
include_once $theme_dir . '/inc/widgets.php';

// Đăng ký customizer
include_once $theme_dir . '/inc/customizers.php';

// Đăng ký shortcodes
include_once $theme_dir . '/inc/shortcodes.php';

/**-----------------------------DAY 2-------------------------------- */
// Tạo custom post type product

function create_post_type()
{
    $label = array(
        'name' => 'Sản phẩm',
        'singular_name' => 'Sản phẩm'
    );

    $args = array(
        'labels' => $label,
        'description' => 'Post type đăng sản phẩm',
        'supports' => array(
            'title',
            'editor', // Vùng soạn thảo
            'excerpt',  // mô tả ngắn cho sản phẩm
            // 'author', // chọn tác giả
            'thumbnail', // tính năng chọn ảnh đại diện
            'custom-fields',
            'revisions'
        ),
        // 'taxonomies' => array( 'category', 'post_tag' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 3,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_in_admin_bar' => true,
        'menu_icon' => 'dashicons-cart',
        'capability_type' => 'post'
    );
    register_post_type('product', $args);
}
add_action('init', 'create_post_type');


/**
 * hiển thị danh sách các bài post type ra trang chủ bao gồm post type post và product
 */
add_filter('pre_get_posts', 'get_custom_post_type');
function get_custom_post_type($query)
{
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'product'));
    return $query;
}

/**------------------------------------ DAY 3 ------------------------------------------ */

/**
 * Đăng kí taxonomy
 */
add_action('init', 'create_taxonomy', 0); // khởi tạo,đưa hàm create_taxonomy vào trong hook

/**Hàm tạo mới một taxonomy */
function create_taxonomy()
{
    /**Khai báo tham số là nhãn hiển thị cho custom taxonomy */
    $labels = [
        'name' => 'Danh mục sản phẩm',
        'singular' => 'Danh mục sản phẩm',
        'menu_name' => 'Danh mục sản phẩm'
    ];
    /**khai báo mảng các tham số,có thể tìm hiểu nó trên trang của wp */
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

    register_taxonomy('product-cate', 'product', $args); // Sử dụng hàm register_taxonomy để tiến hành đăng kí một custom taxonomy
}

// thêm metaboxes trong custom post type
add_action('add_meta_boxes', 'newtheme_add_custom_box');
function newtheme_add_custom_box()
{
    add_meta_box('thong-tin', 'Thông tin sản phẩm', 'output_metaboxe', 'product');
}
function output_metaboxe()
{
    global $theme_dir;
    include_once $theme_dir . '/inc/template/metaboxes.php'; // template chứa các thẻ HTML cần hiển thị
}
// lưu giá trị người dùng nhập vào trong custom metabox
add_action('save_post', 'save_post_product');
function save_post_product($post_id)
{
    $product_price = $_REQUEST['product_price'];
    $product_price_sale = $_REQUEST['product_price_sale'];
    $product_quantity = $_REQUEST['product_price_sale'];

    update_post_meta($post_id, 'product_price', $product_price);
    update_post_meta($post_id, 'product_price_sale', $product_price_sale);
    update_post_meta($post_id, 'product_quantity', $product_quantity);
}


/**-------------------------------- Day 4 -------------------------------------- */

/**
 * Đăng kí customizer   để người dùng nhập liệu và hiển thị các giá trị màu sắc của text
 * @wp_customizer là tham số được lấy từ đối tượng WP_Customize_Manager
 * Khi bạn gọi hàm add_action() để đăng ký hàm callback với hook customize_register,
 * WordPress sẽ tự động truyền đối tượng WP_Customize_Manager vào hàm callback thông qua biến $wp_customize
 * Class WP_Customize_Manager chứa các phương thức và thuộc tính để quản lý các setting và control trong Theme Customization API.
 */
// function newtheme_customizer_register($wp_customize)
// {
//     // Add setting
//     $wp_customize->add_setting('newtheme_text_color', array(
//         'default'           => '#000000',
//         'transport' => 'refresh', // xác định rằng khi setting này được thay đổi, sẽ sử dụng refresh để cập nhật lại trang.
//         'sanitize_callback' => 'sanitize_hex_color',
//     ));

//     // Add control
//     $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'newtheme_text_color', array(
//         'label'    => __('Text Color', 'mytheme'),
//         'section'  => 'colors',
//         'settings' => 'mytheme_text_color',
//     )));
// }
// add_action( 'customize_register', 'newtheme_customize_register' );


/**---------------------- DAY 5 ---------------------------- */
function load_posts_by_term() {
    $term_id = $_POST['term_id'];
    
    $args = array(
      'post_type' => 'product',
      'tax_query' => array(
        array(
          'taxonomy' => 'product-cate',
          'field' => 'term_id',
          'terms' => $term_id
        )
      )
    );


  
    $query = new WP_Query($args);
    $html = '';
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        global $post;
        $html .= '<div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="blog__item">';
        $html .= '<div class="blog__item__pic">';
        $html .= get_the_post_thumbnail($post->ID, 'medium');
        $html .= '</div>';
        $html .= '<div class="blog__item__text">';
        $html .= '<ul>';
        $html .= '<li><i class="fa fa-calendar-o"></i> ' . get_the_date('', $post->ID) . '</li>';
        $html .= '<li><i class="fa fa-comment-o"></i> ' . get_comments_number($post->ID) . '</li>';
        $html .= '</ul>';

        if ($post->post_type == 'product') {
            $html .= '<ul>';
            $html .= '<li><strong>Giá gốc: </strong><span>' . get_post_meta($post->ID, 'product_price', true) . '</span></li>';
            $html .= '<li><strong>Giá Khuyến mãi:</strong><span>' . get_post_meta($post->ID, 'product_price_sale', true) . '</li>';
            $html .= '</ul>';
        }

        $html .= '<h5><a href="' . get_the_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h5>';
        $html .= '<p>' . get_the_excerpt($post->ID) . '</p>';
        $html .= '<a href="' . get_the_permalink($post->ID) . '" class="blog__btn">READ MORE <span class="arrow_right"></span></a>';
        $html .= '</div>';
        $html .= '</div>
                </div>';
            
      }
    }else{
        $html .= '<p>Không có dữ liệu</p>';
    }
    echo $html;
    wp_reset_postdata();
  
    wp_die();
  }
  add_action('wp_ajax_load_posts_by_term', 'load_posts_by_term');
  add_action('wp_ajax_nopriv_load_posts_by_term', 'load_posts_by_term');