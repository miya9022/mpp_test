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
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
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
    <title><?= $page_title ?></title>

    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>

    <!-- Links -->
    <?= $this->Html->css('camera.css') ?>
    <?= $this->Html->css('search.css') ?>
    <?= $this->Html->css('google-map.css') ?>

    <!--JS-->
    <?= $this->Html->script(['jquery', 'jquery-migrate-1.2.1.min', 'rd-smoothscroll.min','skype-uri']) ?>
    <!-- <script src="js/jquery.js"></script>
    // <script src="js/jquery-migrate-1.2.1.min.js"></script>
    // <script src="js/rd-smoothscroll.min.js"></script> -->


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
    <!-- // <script src='js/device.min.js'></script> -->
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
                <li class="dropdown">
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
                <li class="active">
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
      <div class="row">
        <div class="col-md-9 col-sm-10 col-xs-10">
          <div class="field_news">
            <h3>ABCDERGF</h3>
            <?= $this->Html->link($this->Html->image('iphone.jpg', ['alt' => '']), ['controller' => 'news', 'action' => 'view', 1], ['escape' => false]) ?>

            <!-- <a href="#"><?= $this->Html->image('iphone.jpg', ['alt' => '']) ?></a> -->
            <a href="#" class="title">Hendrerit Sed Diam Ullamcorper»</a>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
          </div>
          <div class="field_news">
            <h3>ABCDERGF</h3>
            <a href="#"><?= $this->Html->image('iphone.jpg', ['alt' => '']) ?></a>
            <a href="#" class="title">Hendrerit Sed Diam Ullamcorper»</a>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
          </div>
          <div class="field_news">
            <h3>ABCDERGF</h3>
            <a href="#"><?= $this->Html->image('iphone.jpg', ['alt' => '']) ?></a>
            <a href="#" class="title">Hendrerit Sed Diam Ullamcorper»</a>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
          </div>
          <div class="field_news">
            <h3>ABCDERGF</h3>
            <a href="#"><?= $this->Html->image('iphone.jpg', ['alt' => '']) ?></a>
            <a href="#" class="title">Hendrerit Sed Diam Ullamcorper»</a>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
          </div>
          <div class="field_news">
            <h3>ABCDERGF</h3>
            <a href="#"><?= $this->Html->image('iphone.jpg', ['alt' => '']) ?></a>
            <a href="#" class="title">Hendrerit Sed Diam Ullamcorper»</a>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
          </div>
        </div>
      </div>
    </div>
   </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="top-border">

    <section class="well1">
      <div class="container"> 
            <p class="rights">
              Mpp Limited Company  &#169; <span id="copyright-year"></span>
              <!-- <a href="index-5.html">Privacy Policy</a> -->
              <!-- More Business Website Templates at <a rel="nofollow" href="http://www.templatemonster.com/category/business-web-templates/" target="_blank">TemplateMonster.com</a> -->
            </p>          
      </div> 
    </section>    
  </footer>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->    
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('tm-scripts') ?>


  </body>
</html>
