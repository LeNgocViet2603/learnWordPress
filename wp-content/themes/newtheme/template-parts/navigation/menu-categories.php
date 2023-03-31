<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Danh mục sản phẩm</span>
    </div>
    <?php
    /**Ở đây có thể hiển thị  menu dọc hoặc danh sách các mục trong taxonomy sản phẩm */
    // wp_nav_menu([
    //     'theme_location' => 'vertical',
    //     'menu_class'     => 'menu-wrapper',
    //     'items_wrap'      => '<ul class="%2$s" id="departments-menu-ul">%3$s</ul>',
    //     'fallback_cb'     => false    
    // ]);
    $args = array( 
        'hide_empty' => 0,
        'taxonomy' => 'product-cate',
        ); 
        $cates = get_categories( $args ); 
    ?>
    <ul>
        <?php foreach ( $cates as $cate ) {  
            $term_id = $cate->term_id;    
        ?>
        <li data-term-id="<?php echo $term_id; ?>">
            <a href="<?php echo get_term_link($cate->slug, 'product-cate'); ?>"><?php echo $cate->name; ?></a>
        </li>
        <?php } ?>
    </ul>
        
</div>