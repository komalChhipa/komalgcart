<?php
  $main_categories   = $this->category->get_header_parent_category();
  $sub_categories    = $this->category->get_sub_categories();
  $header_categories = $this->category->get_header_parent_category(1);
  $brands            = $this->brands->get_all_brands(); 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title><?php echo $this->page_title; ?></title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/blue.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/content.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/owl.transitions.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/rateit.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/jquery.countdownTimer.css">

<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.11.1.min.js"></script>

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/font-awesome.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<script src="<?php echo base_url(); ?>assets/themes/default/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.11.1.min.js"></script>

<!-- Fonts -->
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">

            <ul class="list-unstyled">
            <?php

              if (is_user_logged_in())
              {
              ?>
                <li><a href="#">Welcome&nbsp<?php echo get_loggedin_info('username'); ?></a></li>
                <li><a href="<?php echo base_url(); ?>#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                <li><a href="<?php echo site_url('authentication/logout'); ?>"><?php _el('logout');?></a></li>
                 <div class="dropdown" style="float: right;">
                  <div class="btn-group btn-group-sm">
                  <a class="btn btn-primary  dropdown-toggle" href="<?php echo base_url(); ?>#" id="dropdownMenuLink" data-toggle="dropdown"  >

                 <div class="icon fa fa-user"> My Account </div> </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo site_url('profile') ?>">My profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url('profile/edit') ?>"><?php _el('edit_profile');?></a></li>
                     <li><a class="dropdown-item" href="#">My Orders</a></li>
                  </div>
                </div>
                </div>
            <?php
              }
              else
              {
              ?>

            <li><a href="<?php echo base_url(); ?>#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="<?php echo base_url(); ?>#"><i class="icon fa fa-check"></i>Checkout</a></li>
            <li><a href="<?php echo site_url('authentication'); ?>"><i class="icon fa fa-lock"></i>Login</a></li>
            <li><a href="<?php echo site_url('vendor'); ?>"><i class="icon fa fa-user"></i>Sell</a></li>
           <?php 
             }
           ?>
          </ul>

        </div>
        <!-- /.cnt-account -->

        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
          <!-- ============================================================= LOGO ============================================================= -->

          <div class="logo"> <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/themes/default/images/logo.png" alt="logo"> </a> </div>

          <!-- /.logo -->
          <!-- ===================================================== LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
          <!-- /.contact-row -->
          <!-- ==================================================== SEARCH AREA ============================================================= -->
    <style>    
      .search-field:focus {
      outline: none;
      }

    </style>
            <div class="search-area">
            <form action="<?php echo base_url('products/search') ?>" name="search" method='post'>

              <div class="control-group">

                 <select id="Categories" name="category_id"  data-toggle="dropdown" ><b class="Caret"></b>
                 <option value="" class="dropdown">Categories</option>
                  <?php

                  foreach ($main_categories as  $main_category)
                  {
                  ?>
                 <option class="dropdown"  value="<?php echo $main_category['id']; ?>"><?php echo ucwords($main_category['name']); ?></option>

                 <?php 
                  }
                  ?>
                </select>

                <input class="search-field" name="name" id="name"  style="border-style: hidden;" autocomplete="off" placeholder="Search here..." />
                 <button type="submit" id='save' name="submit" class="search-button"></button>
               <!-- <a class="search-button"  href="#" ></a>-->
                </div>
            </form>
          </div>

          <div class="list-unstyle" id="search_result" style="position:absolute;background-color: white;margin-left: 130px;width:470px;">
        
          </div>

          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

          <div class="dropdown dropdown-cart"> <a href="<?php echo base_url(); ?>#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">2</span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">$</span><span class="value">600.00</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="<?php echo base_url(); ?>detail.html"><img src="assets/themes/default/images/cart.jpg" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="<?php echo base_url(); ?>index.php?page-detail">Simple Product</a></h3>
                      <div class="price">$600.00</div>
                    </div>
                    <div class="col-xs-1 action"> <a href="<?php echo base_url(); ?>#"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                  <div class="clearfix"></div>
                  <a href="<?php echo base_url(); ?>checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total-->

              </li>
            </ul>
            <!-- /.dropdown-menu-->
          </div>
          <!-- /.dropdown-cart -->

          <!-- ===================================== SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /.main-header -->

  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">

                 <li class="active dropdown yamm-fw"> <a href="<?php echo base_url(); ?>" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                <?php

                  foreach ($header_categories as  $header_category)
                  {
                  ?>

                <li class="dropdown yamm mega-menu"><a href="<?php echo base_url().'categories/get_parent_category_products/'.$header_category['id']; ?>" data-hover="dropdown" class="dropdown-toggle"  data-toggle="dropdown"><?php echo ucwords($header_category['name']); ?> </a>
                                        <!-- /.accordion-heading -->
                  <ul class="dropdown-menu container"  id="<?php echo $header_category['id']; ?>">
                    <li>
                      
                     <div class="yamm-content">

                        <div class="row customli">

                       
                    <?php
                      $counter = 0;

                        foreach ($sub_categories as $sub_category)
                        {
                          if ($sub_category['category_id'] == $header_category['id'])
                          {
                            if ($counter < 4)
                            {
                            ?>
                         <div  class="col-xs-12 col-sm-6 col-md-3 col-menu " >
                            <ul class="links">
                              <li><a href="<?= site_url('categories/'.$header_category['slug']."/".$sub_category['slug']); ?>"><?php echo ucwords($sub_category['name']);  $counter++; ?></a></li>   
                                </ul>
                         </div>
                          <?php
                            }
                            elseif ($counter >= 4)
                            {
                            ?>
                           <div class="col-xs-12 col-sm-6 col-md-3 col-menu" >
                            <ul class="links">
                              <li><a href="<?= site_url('categories/'.$header_category['slug']."/".$sub_category['slug']); ?>"><?php echo ucwords($sub_category['name']);$counter++; ?>  </a></li>                                   
                             </ul>
                             </div>
                            <?php
                              }
                              else
                              {
                            ?>
                           <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                            <ul class="links">
                              <li><a href="<?= site_url('categories/'.$header_category['slug']."/".$sub_category['slug']); ?>"><?php echo ucwords($sub_category['name']);$counter++; ?></a></li>                                  
                             </ul>
                            </div>
                             <?php
                                }
                              ?>
                        <?php
                            }
                          } //sub categories foreach end
                          ?>
                            
                      <!-- /.yamm-content -->
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
             <?php
              }
             ?>
              </ul>

              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
          </div>
          <!-- /.navbar-collapse -->

        </div>
        <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default/ -->
    </div>
    <!-- /.container-class -->

  </div>
  <!-- /.header-nav -->
  <!-- ============================================== NAVBAR : END ============================================== -->

</header>


<!-- main container -->
  <!-- ============================================== CONTAINER  : START ============================================== -->

    <?php $this->load->view('themes/default/includes/alerts');
    ?>

    <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('register');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->

<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-12 col-sm-12 create-new-account">
<h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>
</div>
<form id="signup_form" method="post" action="<?php echo site_url('vendor/authentication/signup') ?>" class="register-form outer-top-xs" role="form">

<div class="col-md-6 col-sm-6 create-new-account">
    
    
        <div class="form-group">
            <label class="info-title" for="firstname"><?php _el('firstname');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="firstname" name="firstname" >
        </div>
         <div class="form-group">
            <label class="info-title" for="lastname"><?php _el('lastname');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="lastname" name="lastname" >
        </div>
        <div class="form-group">
            <label class="info-title" for="mobile"><?php _el('mobile_no');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="mobile" name="mobile" >
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php _el('email');?> <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" name="email" >
        </div>

        <div class="form-group">
            <label class="info-title" for="password"><?php _el('password');?><span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
        </div>
         <div class="form-group">
            <label class="info-title" for="confirm_password"><?php _el('confirm_password');?><span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="confirm_password"  name="confirm_password">
        </div>
       

</div>
<div class="col-md-6 col-sm-6 create-new-account">
    <!--<h4 class="" ></h4>
    <p class=""></p>

    <form id="login_form" method="post" action="<?php echo site_url('vendor/authentication'); ?>" class="register-form outer-top-xs" role="form">
    -->
     <div class="form-group">
            <label class="info-title" for="address"><?php _el('address');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="address" name="address" >
        </div>
      <div class="form-group">
            <label class="info-title" for="shop_name"><?php _el('shop_name');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="shop_name" name="shop_name" >
        </div>
         <div class="form-group">
            <label class="info-title" for="shop_number"><?php _el('shop_number');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="shop_number" name="shop_number" >
        </div>        
        
        <div class="form-group">
            <label class="info-title" for="owner_name"><?php _el('owner_name');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="owner_name" name="owner_name" >
        </div>
        <div class="form-group">
            <label class="info-title" for="shop_details"><?php _el('pincode');?> <span>*</span></label>
            <input type="number" class="form-control unicase-form-control text-input" id="pincode" name="pincode" >
        </div>
        <div class="form-group">
            <label class="info-title" for="registration_number"><?php _el('registration_number');?> <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="registration_number" name="registration_number" >
        </div>

       <!-- <div class="radio outer-xs">
            
            <a href="<?php echo site_url('authentication/forgot_password'); ?>" class="forgot-password pull-right"><?php _el('forgot_password')?></a>
        </div>
        -->
   
    
</div>
<button type="submit" class="btn-upper btn btn-primary btn-lg btn-block checkout-page-button"><?php _el('signup')?></button>

</form>


            </div> <!--row-->
        </div><!--sign-in-page-->
    </div>

    <!-- ============================================== CONTAINER  : END============================================== -->
 <!-- ============================================== BRANDS CAROUSEL ============================================== -->

     <!--/.owl-carousel #logo-slider -->

    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
           <?php

            foreach ($brands as $brand)
            {
            ?>
          <div class="item m-t-15"> <a href="<?php echo base_url(); ?>#" class="image"> <img data-echo="<?php echo base_url() ?><?php echo $brand['logo']; ?>" src="<?php echo base_url() ?><?php echo $brand['logo']; ?>" alt="brand" style="max-height:110px;max-width:166px;height:auto;width:auto;"> </a> </div>
          <?php
            }

          ?>
        </div>
        <div class="customNavigation">
              <a class="btn play"></a>
        </div>
         <!--/.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->
    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>
          <!-- /.module-heading -->

          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>+(888) 123-4567<br>
                    +(888) 456-7890</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="<?php echo base_url(); ?>#">flipmart@themesground.com</a></span> </div>
              </li>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Customer Service</h4>
          </div>
          <!-- /.module-heading -->

          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="<?php echo base_url(); ?>#" title="Contact us">My Account</a></li>
              <li><a href="<?php echo base_url(); ?>#" title="About us">Order History</a></li>
              <li><a href="<?php echo base_url(); ?>#" title="faq">FAQ</a></li>
              <li><a href="<?php echo base_url(); ?>#" title="Popular Searches">Specials</a></li>
              <li class="last"><a href="<?php echo base_url(); ?>#" title="Where is my order?">Help Center</a></li>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Corporation</h4>
          </div>
          <!-- /.module-heading -->

          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Your Account" href="<?php echo base_url(); ?>#">About us</a></li>
              <li><a title="Information" href="<?php echo base_url(); ?>#">Customer Service</a></li>
              <li><a title="Addresses" href="<?php echo base_url(); ?>#">Company</a></li>
              <li><a title="Addresses" href="<?php echo base_url(); ?>#">Investor Relations</a></li>
              <li class="last"><a title="Orders History" href="<?php echo base_url(); ?>#">Advanced Search</a></li>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Why Choose Us</h4>
          </div>
          <!-- /.module-heading -->

          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="<?php echo base_url(); ?>#" title="About us">Shopping Guide</a></li>
              <li><a href="<?php echo base_url(); ?>#" title="Blog">Blog</a></li>
              <li><a href="<?php echo base_url(); ?>#" title="Company">Company</a></li>
              <li><a href="<?php echo base_url(); ?>#" title="Investor Relations">Investor Relations</a></li>
              <li class=" last"><a href="<?php echo base_url(); ?>contact-us.html" title="Suppliers">Contact Us</a></li>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="GooglePlus"></a></li>
          <li class="rss pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="RSS"></a></li>
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="<?php echo base_url(); ?>#" title="Youtube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="<?php echo base_url(); ?>assets/themes/default/images/payments/1.png" alt=""></li>
            <li><img src="<?php echo base_url(); ?>assets/themes/default/images/payments/2.png" alt=""></li>
            <li><img src="<?php echo base_url(); ?>assets/themes/default/images/payments/3.png" alt=""></li>
            <li><img src="<?php echo base_url(); ?>assets/themes/default/images/payments/4.png" alt=""></li>
            <li><img src="<?php echo base_url(); ?>assets/themes/default/images/payments/5.png" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods -->
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/echo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery.easing-1.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/themes/default/js/typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>

<script>

var BASE_URL = "<?php echo base_url(); ?>";
          var temp = document.querySelectorAll('.customli');
          console.log(temp);
          var t = document.querySelector('.yamm-content');
         temp.forEach((e)=>{
          if(e.children.length === 0)
          {
          e.style.display='none';
          e.parentNode.style.display='none'
          var p = e.parentNode;
          p.parentNode.style.display='none'
          }
         })

  $(document).ready(function(){ 

 $('#name').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:BASE_URL + 'products/autocomplete_search',
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
      console.log(data);
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});


$.validator.addMethod("emailExists", function(value, element)
{
    var mail_id = $(element).val();
    var ret_val = '';
    $.ajax({
        url:BASE_URL+'vendor/authentication/email_exists',
        type: 'POST',
        data: { email: mail_id },
        async: false,
        success: function(msg)
        {
            if(msg==1)
            {
                ret_val = false;
            }
            else
            {
                ret_val = true;
            }
        }
    });

    return ret_val;

}, "<?php _el('email_exists')?>");

$("#signup_form").validate({
    rules: {
        firstname: {
            required: true,
        },
        lastname: {
            required: true,
        },
         shop_name: {
            required: true,
        },
        owner_name: {
            required: true,
        },
         shop_number: {
            required: true,
        },
        pincode: {
            required: true,
            number: true,

        },
        registration_number: {
            required: true,
             number: true,

        },
        address: {
            required: true,
        },
        mobile: {
            required: true,
            number: true,
            minlength:10,

        },
        email: {
            required: true,
            email: true,
            emailExists: true,
        },
        password: {
            required: true,
            minlength: 8
        },
        confirm_password: {
            required: true,
            equalTo: "#password",
        },
        role: {
            required: true,
        },
    },
    messages: {
        firstname: {
            required:"<?php _el('please_enter_', _l('firstname'))?>",
        },
        lastname: {
            required:"<?php _el('please_enter_', _l('lastname'))?>",
        },
        shop_name: {
            required:"<?php _el('please_enter_', _l('shop_name'))?>",
        },
        owner_name: {
            required:"<?php _el('please_enter_', _l('owner_name'))?>",
        },
        shop_number: {
            required:"<?php _el('please_enter_', _l('shop_number'))?>",
        },
        pincode: {
            required:"<?php _el('please_enter_', _l('pincode'))?>",
        },
        address: {
            required:"<?php _el('please_enter_', _l('address'))?>",
        },
        registration_number: {
            required:"<?php _el('please_enter_', _l('registration_number'))?>",
        },
        mobile: {
            required:"<?php _el('please_enter_', _l('mobile_no'))?>",
            minlength :'Please enter a valid 10 digit mobile number',
       },
        email: {
            required:"<?php _el('please_enter_', _l('email'))?>",
            email:"<?php _el('please_enter_valid_', _l('email'))?>"
        },
        password: {
            required:"<?php _el('please_enter_', _l('password'))?>",
            minlength: "<?php _el('password_min_length_must_be_', 8)?>",
        },
        confirm_password: {
            required:"<?php _el('please_enter_', _l('password'))?>",
            equalTo: "<?php _el('conf_password_donot_match')?>",
        },
        role: {
            required:"<?php _el('please_select_', _l('role'))?>",
        },
    },
});

   </script>
</body>
</html>