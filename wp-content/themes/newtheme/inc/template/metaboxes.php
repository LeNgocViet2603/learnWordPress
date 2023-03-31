<?php
    global $post;
    $product_price = get_post_meta($post->ID,'product_price',true);
    $product_price_sale = get_post_meta($post->ID,'product_price_sale',true);
    $product_quantity = get_post_meta($post->ID,'product_quantity',true);
?>
<table class="form-table">
    <tr>
        <th scope="row"><label for=>Giá sản phẩm:</label></th>  
        <td>
        <input name="product_price" type="text" class="regular-text" value="<?php echo ($product_price)?$product_price:''; ?>" />
        </td>                  
        
    </tr>
    <tr>
        <th scope="row"><label for=>Giá khuyến mãi:</label></th>  
        <td>
        <input name="product_price_sale" type="text" class="regular-text" value="<?php echo ($product_price_sale)?$product_price_sale:''; ?>" />
        </td>                                      
    </tr>
    <tr>
        <th scope="row"><label>Số lượng:</label></th>  
        <td>
        <input name="product_quantity" type="number" class="regular-text" value="<?php echo ($product_price)?$product_quantity:''; ?>" />
        </td>                                      
    </tr>
</table>