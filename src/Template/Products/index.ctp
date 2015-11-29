<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Detail'), ['controller' => 'OrderDetail', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetail', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('serial') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('img_src_bg') ?></th>
                <th><?= $this->Paginator->sort('img_small') ?></th>
                <th><?= $this->Paginator->sort('type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->serial) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= h($product->img_src_bg) ?></td>
                <td><?= h($product->img_small) ?></td>
                <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div> -->
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
    <title><?= $product_title ?></title>

    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>

    <!-- Links -->
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
    <!-- <script src='js/device.min.js'></script> -->
  </head>
  <body>
  <div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>  
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="./">mpp<small>limited company</small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Cần giúp đỡ?</p>
          <a href="callto:#">043-643-3122</a>
          <small><span>Fax:</span>  0436433121  </small>
        </div>
      </div>


      <div id="stuck_container" class="stuck_container">
        <div class="container">   
        <nav class="navbar navbar-default navbar-static-top pull-left">            

            <div class="">  
              <ul class="nav navbar-nav sf-menu" data-type="navbar">
                <li>
                    <?= $this->Html->link(__('TRANG CHỦ'), ['controller' => 'pages']) ?>
                  <!-- <a href="./">TRANG CHỦ</a> -->
                </li>
                <li>
                    <?= $this->Html->link(__('GIỚi THIỆU'), ['controller' => 'pages', 'action' => 'about']) ?>
                  <!-- <a href="about.html">GIỚI THIỆU</a> -->
                </li>
                <li class="dropdown active">
                    <?= $this->Html->link(__('SẢN PHẨM'). 
                            $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-menu-down', 'aria-hidden' => 'true']), 
                            ['controller' => 'products','action' => 'index'],
                            ['escape'=> false]
                        )
                    ?>
                  <!-- <a href="index-2.html">PRODUCTS<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a> -->
                  <ul class="dropdown-menu">
                    <?php foreach($types_product as $type): ?>
                    <li>
                        <?= $this->Html->link(__(h($type->name)), ['controller' => 'productTypes', 'action' => 'view', h($type->id)]) ?>
                        <ul class="dropdown-menu">
                          <?php foreach($products1 as $product): 
                                if(h($product->type_id) === h($type->id)) :?>
                          <li>
                            <?= $this->Html->link(__(h($product->name)), ['controller' => 'products', 'action' => 'view', h($product->id)]) ?>
                           <!--  <a href="#">Latest</a> -->
                          </li>
                          <?php endif;
                                endforeach; ?>
                          <?php foreach($products2 as $product): 
                                if(h($product->type_id) === h($type->id)) : ?>
                          <li>
                            <?= $this->Html->link(__(h($product->name)), ['controller' => 'products', 'action' => 'view', h($product->id)]) ?>
                           <!--  <a href="#">Latest</a> -->
                          </li>
                          <?php endif;
                                endforeach; ?>
                          <?php foreach($products3 as $product): 
                                if(h($product->type_id) === h($type->id)) : ?>
                          <li>
                            <?= $this->Html->link(__(h($product->name)), ['controller' => 'products', 'action' => 'view', h($product->id)]) ?>
                           <!--  <a href="#">Latest</a> -->
                          </li>
                          <?php endif;
                                endforeach; ?>                     
                        </ul>
                      <!-- <a href="#">Lorem ipsum</a> -->
                    </li>
                    <?php endforeach; ?>
                    <!-- <li>
                      <a href="#">Conse ctetur </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="#">Latest</a>
                          </li>
                          <li>
                            <a href="#">Archive</a>
                          </li>                      
                        </ul>
                    </li> -->
                  </ul>
                </li> 
                <li class="dropdown">
                    <?= $this->Html->link(__('HỆ THỐNG PHÂN PHỐI'). 
                            $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-menu-down', 'aria-hidden' => 'true']), 
                            ['controller' => 'AreaDistribution','action' => 'index'],
                            ['escape'=> false]
                        )
                    ?>
                  <!-- <a href="index-2.html">PRODUCTS<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a> -->
                  <ul class="dropdown-menu">
                    <?php foreach($areas as $area): ?>
                    <li>
                        <?= $this->Html->link(__(h($area->name)), ['controller' => 'areaDistribution', 'action' => 'view', h($area->id)]) ?>
                      <!-- <a href="#">Lorem ipsum</a> -->
                    </li>
                    <?php endforeach; ?>
                    <!-- <li>
                      <a href="#">Conse ctetur </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="#">Latest</a>
                          </li>
                          <li>
                            <a href="#">Archive</a>
                          </li>                      
                        </ul>
                    </li> -->
                  </ul>
                </li> 
                <li class="dropdown">
                    <?= $this->Html->link(__('DỊCH VỤ'). 
                            $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-menu-down', 'aria-hidden' => 'true']), 
                            ['controller' => 'services','action' => 'index'],
                            ['escape'=> false]
                        )
                    ?>
                  <!-- <a href="index-2.html">SERVICES<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a> -->
                  <ul class="dropdown-menu">
                    <?php foreach($services as $service): ?>
                    <li>
                        <?= $this->Html->link(__(h($service->name)), ['controller' => 'services', 'action' => 'view', h($service->id)]) ?>
                      <!-- <a href="#">Lorem ipsum</a> -->
                    </li>
                    <?php endforeach; ?>
                    <!-- <li>
                      <a href="#">Conse ctetur </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="#">Latest</a>
                          </li>
                          <li>
                            <a href="#">Archive</a>
                          </li>                      
                        </ul>
                    </li> -->
                  </ul>
                </li>                
                <!-- <li>
                  <a href="index-3.html">PROJECTS</a>
                </li> -->
                
                <li>
                  <?= $this->Html->link(__('LIÊN HỆ'), ['controller' => 'contacts', 'action' => 'index']) ?>
                  <!-- <a href="index-4.html">LIÊN HỆ</a> -->
                </li>
              </ul>                           
            </div>
        </nav>   
        <!-- <form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
          <label class="search-form_label">
            <input class="search-form_input" type="text" name="s" autocomplete="off" placeholder=""/>
            <span class="search-form_liveout"></span>
          </label>
          <button class="search-form_submit fa-search" type="submit"></button>
        </form> -->
             
        </div>

      </div>  
    </header>
  <!--========================================================
                            CONTENT
  =========================================================-->
  <main>
    <div class="tab-products">
      <ul id="tabs">
          <li><a href="#" name="tab1">One</a></li>
          <li><a href="#" name="tab2">Two</a></li>
          <li><a href="#" name="tab3">Three</a></li>
          <li><a href="#" name="tab4">Four</a></li>    
      </ul>

      <div id="content"> 
          <div id="tab1">A</div>
          <div id="tab2">B</div>
          <div id="tab3">C</div>
          <div id="tab4">D</div>
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
    <?= $this->Html->script(['TMSearch', 'jquery.rd-parallax']) ?>
    <?= $this->Html->script('tabs') ?>

    <!-- <script src="js/bootstrap.min.js"></script>
     <script src="js/tm-scripts.js"></script></script> -->
     

  </body>
</html>
