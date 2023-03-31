// jQuery(document).ready(function($) {
//     $('.hero__categories ul').on('click','li',function(e){
//         e.preventDefault();
//         var term_id = $(this).data('term-id');
//         var post_type = $(this).data('post-type');        
//         //var ajax_url = '/wp-admin/admin-ajax.php';
//         console.log(term_id);

//         $.ajax({
//             url: ajax_url,
//             type: 'post',
//             data: {
//                 action: 'load_posts_by_term',
//                 term_id: term_id,
//                 post_type: post_type
//             },
//             success: function(response) {
//                 $('.taxonomy-posts-container').html(response);
//             }
//         });
//     })
// })