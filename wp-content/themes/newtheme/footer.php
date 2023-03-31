<?php global $theme_uri; ?>
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <?php get_template_part('template-parts/footer/footer', 'widgets'); ?>
        <?php get_template_part('template-parts/footer/footer', 'bottom'); ?>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<?php wp_footer(); ?>
<script>
    var ajax_url = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
    jQuery(document).ready(function($) {
        $('.hero__categories ul').on('click', 'li', function(e) {
            e.preventDefault();
            var term_id = $(this).data('term-id');            

            $.ajax({
                url: ajax_url,
                type: 'post',
                dataType:'html',
                data: {
                    action: 'load_posts_by_term',
                    term_id: term_id,
                    //post_type: post_type
                },
                success: function(response) {
                    $('#list-product').html(response);
                }
            });
        })
    })
</script>
</body>

</html>