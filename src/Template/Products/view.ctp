<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Detail'), ['controller' => 'OrderDetail', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetail', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Serial') ?></th>
            <td><?= h($product->serial) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Img Src Bg') ?></th>
            <td><?= h($product->img_src_bg) ?></td>
        </tr>
        <tr>
            <th><?= __('Img Small') ?></th>
            <td><?= h($product->img_small) ?></td>
        </tr>
        <tr>
            <th><?= __('Product Type') ?></th>
            <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Order Detail') ?></h4>
        <?php if (!empty($product->order_detail)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Shop Id') ?></th>
                <th><?= __('Shop Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Area Id') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->order_detail as $orderDetail): ?>
            <tr>
                <td><?= h($orderDetail->id) ?></td>
                <td><?= h($orderDetail->product_id) ?></td>
                <td><?= h($orderDetail->created) ?></td>
                <td><?= h($orderDetail->price) ?></td>
                <td><?= h($orderDetail->shop_id) ?></td>
                <td><?= h($orderDetail->shop_name) ?></td>
                <td><?= h($orderDetail->customer_id) ?></td>
                <td><?= h($orderDetail->area_id) ?></td>
                <td><?= h($orderDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderDetail', 'action' => 'view', $orderDetail->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetail', 'action' => 'edit', $orderDetail->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetail', 'action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
 -->

 <?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <?= $this->Html->charset() ?>
    <!-- <meta charset="utf-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <?= $this->Html->meta(['name' => 'viewport', 
                           'content' => 'IE=edge, chrome=1, width=device-width, initial-scale=1', 
                           'http-equiv' => 'X-UA-Compatible']) ?>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?= $this->Html->meta('format-detection', 'telephone=no') ?>
    <!-- <meta name="format-detection" content="telephone=no"/> -->

    <?= $this->Html->meta('favicon.ico',
          'images/favicon.ico',
          ['type' => 'icon']
        ) ?>
    <!-- <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
    <title><?= $page_title ?></title>

    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>

    <!-- Links -->
    <?= $this->Html->css('camera.css') ?>
    <?= $this->Html->css('search.css') ?>

    <!--JS-->
    <?= $this->Html->script(['jquery', 'jquery-migrate-1.2.1.min', 'rd-smoothscroll.min']) ?>
    <!-- <script src="js/jquery.js"></script>
    // <script src="js/jquery-migrate-1.2.1.min.js"></script> -->
   <!--  <script src="js/rd-smoothscroll.min.js"></script> -->


    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <?= $this->Html->script('device.min') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>
    <?= $this->Html->css('style.css') ?>
    <!-- <script src='js/device.min.js'></script> -->
    <style>
      .jumbotron {
        top: 80%;
      }
    </style>
  </head>
  <body>
  <div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>  
      <div class="container-fluid top-sect header_bg_p">
        <div class="navbar-header" style="background-color: transparent">
          <h1 class="navbar-brand">
            <!-- <a data-type='rd-navbar-brand'  href="./" data-src="img/header-bg_1.jpg"></a> -->
            <?= $this->Html->image('header-bg_1.jpg', ['alt' => '', 'url' => ['controller' => 'pages']]) ?>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Cần giúp đỡ?</p>
          <a href="callto://+84986662019">098-666-2019</a>
            
          <!-- <small><span>Fax:</span>  043-643-3121  </small> -->
          <!-- <small><span>Hours:</span>  6am-4pm PST M-Th; &nbsp;6am-3pm PST Fri</small> -->
        </div>
        <div class="text-right" id="SkypeButton_Call_hoangduong_2012_1" style="margin-left: 1100px">
             <script type="text/javascript">
               Skype.ui({
                 "name": "dropdown",
                 "element": "SkypeButton_Call_hoangduong_2012_1",
                 "participants": ["hoangduong_2012"]
               });
             </script>
            </div>
      </div>


      <div id="stuck_container" class="stuck_container">
        <div class="container">   
        <nav class="navbar navbar-default navbar-static-top pull-left">            

            <div class="">  
              <ul class="nav navbar-nav sf-menu" data-type="navbar">
                <li>
                    <?= $this->Html->link(__('TRANG CHỦ'), ['controller' => 'pages']) ?>
                </li>
                <li>
                    <?= $this->Html->link(__('GIỚI THIỆU'), ['controller' => 'pages', 'action' => 'about']) ?>
                </li>
                <li class="dropdown active">
                    <?= $this->Html->link(__('SẢN PHẨM'). 
                            $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-menu-down', 'aria-hidden' => 'true']), 
                            ['controller' => 'products','action' => 'index'],
                            ['escape'=> false]
                        )
                    ?>
                  <ul class="dropdown-menu">
                    <?php foreach($types_product as $type): ?>
                    <li>
                        <?= $this->Html->link(__(h($type->name)), ['controller' => 'products', 'action' => 'index', h($type->id)]) ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </li> 
                <li class="dropdown">
                    <?= $this->Html->link(__('HỆ THỐNG PHÂN PHỐI'). 
                            $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-menu-down', 'aria-hidden' => 'true']), 
                            ['controller' => 'AreaDistribution','action' => 'index'],
                            ['escape'=> false]
                        )
                    ?>
                  <ul class="dropdown-menu">
                    <?php foreach($areas as $area): ?>
                    <li>
                        <?= $this->Html->link(__(h($area->name)), ['controller' => 'areaDistribution', 'action' => 'view', h($area->id)]) ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <li>
                    <?= $this->Html->link(__('TIN TỨC'), ['controller' => 'news', 'action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link(__('LIÊN HỆ'), ['controller' => 'contacts', 'action' => 'index']) ?>
                </li>
              </ul>                           
            </div>
        </nav>
        </div>

      </div>  
    </header>
  <!--========================================================
                            CONTENT
  =========================================================-->
  <main>
    <div class="container form-control-static">
      <ul id="tabs">
        <?php $count = 1;
              foreach($types_product as $type): ?>
          <li id=<?= isset($active_type) ? ($active_type == $count ? 'current' : '') : ($count == 1 ? 'current' : '') ?>>
            <?= $this->Html->link(__(h($type->name)), '#', ['name' => 'tab' .$count]) ?>
          </li>
        <?php $count++;
              endforeach; ?>   
      </ul>

      <div id="content"> 
        <?php $count = 1;
              foreach($types_product as $type): ?>
              <div id= <?= 'tab' . $count ?>>
                <div class="maincontent-area">
                  <div class="zigzag-bottom"></div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="latest-product">
                                  <div class="product-carousel owl-carousel owl-theme owl-responsive-1000 owl-loaded">
                                    <?php 
                                      if(isset($products1) && $count == 1) :
                                      foreach ($products1 as $product): ?>
                                      <div class="single-product">
                                          <div class="product-f-image">
                                              <?= $this->Html->image($product->img_small, ['alt' => '']) ?>
                                              <div class="product-hover">
                                                  <!-- <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                                  <?= $this->Html->link('<i class="fa fa-link"></i> Xem chi tiết', ['controller' => 'products', 'action' => 'view', h($product->id)], ['class' => 'view-details-link', 'escape'=> false]) ?>
                                                  <!-- <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a> -->
                                              </div>
                                          </div>
                                          <h2>
                                            <?= $this->Html->link(_(h($product->name)), ['controller' => 'products', 'action' => 'view', h($product->id)]) ?>
                                            <!-- <a href="single-product.html">Samsung Galaxy s5- 2015</a> -->
                                          </h2>
                                          
                                          <!-- <div class="product-carousel-price">
                                              <ins>$700.00</ins> <del>$100.00</del>
                                          </div> --> 
                                      </div>
                                    <?php 
                                      endforeach; 
                                      endif; ?>

                                    <?php 
                                      if(isset($products2) && $count == 2) :
                                      foreach ($products2 as $product): ?>
                                      <div class="single-product">
                                          <div class="product-f-image">
                                              <?= $this->Html->image($product->img_small, ['alt' => '']) ?>
                                              <div class="product-hover">
                                                  <!-- <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                                  <?= $this->Html->link('<i class="fa fa-link"></i> Xem chi tiết', ['controller' => 'products', 'action' => 'view', h($product->id)], ['class' => 'view-details-link', 'escape'=> false]) ?>
                                                  <!-- <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a> -->
                                              </div>
                                          </div>
                                          <h2>
                                            <?= $this->Html->link(_(h($product->name)), ['controller' => 'products', 'action' => 'view', h($product->id)]) ?>
                                            <!-- <a href="single-product.html">Samsung Galaxy s5- 2015</a> -->
                                          </h2>
                                          
                                          <!-- <div class="product-carousel-price">
                                              <ins>$700.00</ins> <del>$100.00</del>
                                          </div> --> 
                                      </div>
                                    <?php 
                                      endforeach; 
                                      endif; ?>

                                      <?php 
                                      if(isset($products3) && $count == 3) :
                                      foreach ($products3 as $product): ?>
                                      <div class="single-product">
                                          <div class="product-f-image">
                                              <?= $this->Html->image($product->img_small, ['alt' => '']) ?>
                                              <div class="product-hover">
                                                  <!-- <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                                  <?= $this->Html->link('<i class="fa fa-link"></i> Xem chi tiết', ['controller' => 'products', 'action' => 'view', h($product->id)], ['class' => 'view-details-link', 'escape'=> false]) ?>
                                                  <!-- <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a> -->
                                              </div>
                                          </div>
                                          <h2>
                                            <?= $this->Html->link(_(h($product->name)), ['controller' => 'products', 'action' => 'view', h($product->id)]) ?>
                                            <!-- <a href="single-product.html">Samsung Galaxy s5- 2015</a> -->
                                          </h2>
                                          
                                          <!-- <div class="product-carousel-price">
                                              <ins>$700.00</ins> <del>$100.00</del>
                                          </div> --> 
                                      </div>
                                    <?php 
                                      endforeach; 
                                      endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
        <?php $count++;
              endforeach; ?>   
      </div>
    </div>
  </main>
  <!--========================================================
                            FOOTER
  =========================================================-->
  <footer>
   <section class="well1">
      <div class="container"> 
            <p class="rights">
              Business Company  &#169; <span id="copyright-year"></span>
              <a href="index-5.html">Privacy Policy</a>
            </p>          
      </div> 
    </section>    
  </footer>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->  
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('tm-scripts') ?>
    <?= $this->Html->script(['jquery.cookie', 'tmstickup', 'jquery.ui.totop', 'superfish', 'jquery.rd-navbar', 'wow']) ?>
    
    <?= $this->Html->meta(
          'viewport',
          'width=device-width,initial-scale=1.0,user-scalable=0'
        );
    ?>

    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> -->    
    <?= $this->Html->script(['TMSearch', 'jquery.rd-parallax', 'owl.carousel.min']) ?>
    <?= $this->Html->script('tabs') ?> 

    <!-- <script src="js/bootstrap.min.js"></script>
     <script src="js/tm-scripts.js"></script></script> -->
     <script>
        $('.product-carousel').owlCarousel({
            loop:true,
            nav:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:5,
                }
            }
        });  
     </script>

  </body>
</html>