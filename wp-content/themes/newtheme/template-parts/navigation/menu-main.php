<nav class="header__menu">
    <?php
    /**
     * @theme_location (type: string) vị trí của menu sử dụng để hiển thị
     * @menu_class (type: string[]) Định nghĩa lớp CSS được áp dụng cho menu
     * @container_class (type: string[]) Định nghĩa lớp CSS được áp dụng cho thẻ bao quanh menu.
     * @container (type: true/false) Điều này cho phép chúng ta bao bọc menu trong một thẻ div có chứa các lớp CSS được định nghĩa bằng đối số 'container_class'.
     * @%2$s có nghĩa là chứa lớp CSS được định nghĩa bằng đối số 'menu_class'
     * @%3$s có nghĩa là hiển thị danh sách các thẻ ul
     */
    wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class'     => 'menu-wrapper', // có thể tạo nhiều giá trị vd: 'menu_class' => 'menu-wrapper custom-class1 custom-class1'
        'container_class' => 'header__menu',
        'container'       => true,
        'items_wrap'      => '<ul class="%2$s" id="primary-menu-ul">%3$s</ul>',
        'fallback_cb'     => false    
    ]);
    ?>
</nav>