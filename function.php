add_action( 'wp_ajax_get_variation_id_from_attributes', 'get_variation_id_from_attributes' );
add_action( 'wp_ajax_nopriv_get_variation_id_from_attributes', 'get_variation_id_from_attributes' );
function get_variation_id_from_attributes() {
    $colour = $_POST['colour'];
    $size = $_POST['size'];
    $product_id = intval($_POST['prod_id']);
    //echo $colour.'-'.$size.'-'.$product_id.'-';

    $variation_id = find_matching_product_variation_id ( $product_id,array(
        'attribute_colour' => $colour,
        'attribute_size' => $size
    ));

    echo $variation_id;
    wp_die();
}
function find_matching_product_variation_id($product_id, $attributes)
{
    //return $product_id;
    //return print_r($attributes);
    return (new \WC_Product_Data_Store_CPT())->find_matching_product_variation(
        new \WC_Product($product_id),
        $attributes
    );
}
