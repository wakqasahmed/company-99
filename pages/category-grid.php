<?php
    $isListView = isset($_GET['view']) && ($_GET['view'] == 'list') ? true : false;
?>
<section id="category-grid">
    <div class="container">
        
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

            <?php require MC_ROOT.'/parts/widgets/sidebar/product-filter.php';?>

            <?php require MC_ROOT.'/parts/widgets/sidebar/special-offers.php';?>

            <?php require MC_ROOT.'/parts/widgets/sidebar/sidebar-banner.php';?>

            <?php require MC_ROOT.'/parts/widgets/sidebar/featured-products.php';?>

        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->

        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

            <?php require MC_ROOT.'/parts/section/recommended-products.php';?>
            
            <?php require MC_ROOT.'/parts/section/category-products.php';?>
            
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->    
    </div><!-- /.container -->
</section><!-- /#category-grid -->