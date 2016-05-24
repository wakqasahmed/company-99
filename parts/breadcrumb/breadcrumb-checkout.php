<!-- ========================================= BREADCRUMB ========================================= -->
<?php if($headerStyle == 1):?>
<div id="top-mega-nav">
    <div class="container">
        <nav>
            <ul class="inline">
                <li class="dropdown le-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-list"></i> Shop by Department
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                        <li><a href="#">CPUs, Processors</a></li>
                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                        <li><a href="#">Graphics, Video Cards</a></li>
                        <li><a href="#">Interface, Add-On Cards</a></li>
                        <li><a href="#">Laptop Replacement Parts</a></li>
                        <li><a href="#">Memory (RAM)</a></li>
                        <li><a href="#">Motherboards</a></li>
                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                        <li><a href="#">Motherboard Components</a></li>
                    </ul>
                </li>

                <li class="breadcrumb-nav-holder"> 
                    <ul>
                        <li class="breadcrumb-item current gray">
                            <a href="#">Checkout Process</a>
                        </li>
                    </ul>
                </li><!-- /.breadcrumb-nav-holder -->
            </ul>
        </nav>
    </div><!-- /.container -->
</div><!-- /#top-mega-nav -->
<?php else : ?>
<div id="breadcrumb-alt">
    <div class="container">
        <div class="breadcrumb-nav-holder minimal">
            <ul>
                <li class="dropdown breadcrumb-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        shop by department
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                        <li><a href="#">CPUs, Processors</a></li>
                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                        <li><a href="#">Graphics, Video Cards</a></li>
                        <li><a href="#">Interface, Add-On Cards</a></li>
                        <li><a href="#">Laptop Replacement Parts</a></li>
                        <li><a href="#">Memory (RAM)</a></li>
                        <li><a href="#">Motherboards</a></li>
                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                        <li><a href="#">Motherboard Components</a></li>
                    </ul>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item current">
                    <a href="#">Checkout Process</a>
                </li>
            </ul><!-- /.breadcrumb-nav-holder -->
        </div>
    </div><!-- /.container -->
</div>
<?php endif;?>
<!-- ========================================= BREADCRUMB : END ========================================= -->