<?php 
require 'vendor/autoload.php';

$API_KEY = '';
$product_data = '';

$api_base_url = "http://localhost:8888/company-99/ws-admin/api/product/";
if(isset($_GET['itemId'])){

    $itemId = $_GET['itemId'];

    $client = new GuzzleHttp\Client();
    $res = $client->get($api_base_url . $itemId);
//    echo $res->getStatusCode();           // 200
//    echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
//    echo $res->getBody();                 // {"type":"User"...'
//    var_export($res->json());             // Outputs the JSON decoded data
    $product_data = $res->json();
    //echo $product_data;
}

if(!$product_data) {
    $homeURL = "http://localhost:8888/company-99/";
    header('Location: '. $homeURL);
}
?>

<script type="text/javascript">
    console.log('new');
    window.company = {};
    window.company.productData = 'something';//<?= $product_data; ?>;
    console.log(window.company.productData);
</script>

<div id="single-product">
    <div class="container">

        <?php require MC_ROOT.'/parts/section/single-product-gallery.php';?>
        
        <?php require MC_ROOT.'/parts/section/single-product-detail.php';?>

    </div><!-- /.container -->
</div><!-- /.single-product -->

<?php require MC_ROOT.'/parts/section/single-product-tab.php';?>

<?php require MC_ROOT.'/parts/section/recently-viewed.php';?>