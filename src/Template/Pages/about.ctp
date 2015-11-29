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
<html lang="en">
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
    <title><?= $about_title ?></title>

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
                <li class="active">
                    <?= $this->Html->link(__('GIỚi THIỆU'), ['controller' => 'pages', 'action' => 'about']) ?>
                  <!-- <a href="about.html">GIỚI THIỆU</a> -->
                </li>
                <li class="dropdown">
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

      <section class="well well4">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
              <h2>
                Sơ
                <small>
                  lược
                </small>
              </h2>
              <!-- <img class="" src="images/page-2_img1.jpg" alt=""> -->
              <!-- <p class="lead">
                Folor sit amet conse ctetur adipisicing elit
              </p> -->
              <p>
                Công ty TNHH Mai Phương là một công ty có uy tín hàng đầu trong lĩnh vực bao bì tại Hà Nội.
                <br /><br />
                Có khả năng cung cấp linh hoạt và dịch vụ thuận lợi, nhanh chóng. Mai Phương đã được sự tín nhiệm lâu dài của bạn hàng trong cả nước. Để đạt được điều đó, công ty Mai Phương đã không ngừng mở rộng hợp tác, liên doanh, liên kết với các ngân hàng, công ty tài chính, trung tâm khoa học kỹ thuật, công ty tư vấn thiết kế, các đối tác chuyên nghiệp trong và ngoài nước để liên tục tìm ra những giải pháp tối ưu phục vụ khách hàng.

                
              </p>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h2>
               Lịch
               <small>
                  sử
                </small>
              </h2>

              <article class='media offs2'>
                <div class="media-left text-center">
                  <time datetime='1998'>1998 -</time>
                </div>
                <div class="media-body">                  
                  <p>
                    Năm thành lập bắt đầu chỉ là cơ sở sản xuất nhỏ với diện tích không đầy 600m2, lấy tên là Cơ sở Nhựa Phương Liên tại 106 Vĩnh Hưng - Hoàng Mai – Hà Nội.
                  </p>
                </div>
              </article>

              <article class='media'>
                <div class="media-left text-center">
                  <time datetime='2005'>2005 -</time>
                </div>
                <div class="media-body">                  
                  <p>
                    Ban lãnh đạo đã mở thêm nhà máy tại TS13, KCN Tiên Sơn - Bắc Ninh với diện tích trên 7.000m2, đồng thời đặt tên thành Công ty TNHH Mai Phương.
                  </p>
                </div>
              </article>
              
              <article class='media'>
                <div class="media-left text-center">
                  <time datetime='2015'>Nay  -</time>
                </div>
                <div class="media-body">                  
                  <p>
                    Hiện tại, công ty Mai Phương đã sản xuất được nhiều chủng loại bao bì như: PE, PP, HDPE, màng chit, màng Pallet và thanh cửa nhựa uPVC... Với sản lượng trung bình hơn 1000 tấn trong một tháng và mở rộng mạng lưới bán hàng ra khắp các tỉnh biền Bắc như: Bắc Ninh, Hải Phòng, Lạng Sơn…
                  </p>
                </div>
              </article>

              <!-- <article class='media'>
                <div class="media-left text-center">
                  <time datetime='2015'>2009 -</time>
                </div>
                <div class="media-body">                  
                  <p>
                    Suspen disse sit amet vehicula nisl, nefauci bus nisl. Proin ac fermentum orci, non semp er metus. Nulla nulla tellus, tincidunt vel eros gravida, cursus cursus nisl. Nullam ac magna nisi. Integer dictum sagittis vulpu
                  </p>
                </div>
              </article> -->

            </div>
            <!-- <div class="col-md-4 col-sm-12 col-xs-12">
              <h2>
                nghề 
                <small>
                  nghiệp
                </small>
              </h2>

              <p class="lead offs2">
                Folor sit amet conse ctetur adipisicing elit
              </p>

              <p>
                Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tempus est. Mauris eu augue lorem. Suspendisse sit amet vehi cula nisl, nec faucibus nisl. Proin ac
              </p>

              <ul class="marked-list">                
                <li>
                  <a href="#">
                    Curabitur eu lorem ac lacus laoreet auctor
                  </a>
                </li>
                <li>
                  <a href="#">
                    Fusce itae orci nec velit ornare rhon
                  </a>
                </li>
                <li>
                  <a href="#">
                    Ecus ut tempus estauris eu augue lorem.
                  </a>
                </li>
                <li>
                  <a href="#">
                    Suspendisse sit amet vehicula
                  </a>
                </li>
                <li>
                  <a href="#">
                    Anisl, nec faucibus nislroin ac fermentum 
                  </a>
                </li>
                <li>
                  <a href="#">
                    Horci, non semper metusulla nulla
                  </a>
                </li>
              </ul>

              <p>
                Erci nec velit ornare rhoncus ut tempus est. Mauris eu augue lorem. Suspendisse sit amet vehi cula nisl, nec faucibus nisl. Proin ac fermentum orci, non semper metus. Nulla nulla tellus, tincidunt vel eros gravida, cursus cursus nisl. Nullam ac
              </p>

            </div> -->
          </div>
        </div>
      </section>

      <section class="well well4 bg1 wow fadeIn" data-wow-duration='3s'>
        <div class="container">
        <!-- <h2>
          meet our
          <small>
            team
          </small>
        </h2> -->
          <div class="row offs3 center767">
              <div class="slogan1">
                <p>"
                  Giá trị của Mai Phương luôn được xây dựng trên nền tảng của chất lượng và uy tín. Giá trị đó luôn là yếu tố không thay đổi, luôn đồng hành cùng sự phát triển và thành công của công ty.
                  "</p>
              </div>
            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <img class="" src="images/page-2_img2.jpg" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Inga North
                    </a>
                  </h4>
                  <p>
                    Quisque in metus nibh. In hac habit asse platea dictumst. Curabitur eu lor em ac lacus laoreet auctor. 
                  </p>
                </div>  
             </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <img class="" src="images/page-2_img3.jpg" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Tom Nelson
                    </a>
                  </h4>
                  <p>
                    Curabitur eu lor em ac lacus laoreet auctor. Fusce vitae orci nec velit orna re rhoncus ut tempus est
                  </p>
                </div>  
             </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <img class="" src="images/page-2_img4.jpg" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Ivana Wong
                    </a>
                  </h4>
                  <p>
                    Eu lor em ac lacus laoreet auctor. 
                    Fusce vitae orci nec velit ornare rho
                    ncus ut tempus est. Mauris 
                  </p>
                </div>  
             </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <img src="images/page-2_img5.jpg" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Richard Cox
                    </a>
                  </h4>
                  <p>
                    Fusce vitae orci nec velit ornare rho
                    ncus ut tempus est. Mauris eu augue lorem. Suspendisse sit ame
                  </p>
                </div>  
             </div>
            </div> -->
          </div>
        </div>
      </section>    

      <section class="well well5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <h2>
                SWOT  
              </h2>
              <ul class="swot-list">
                <li class="li-s">
                  Quisque in metus nibh. In hac habit asse platea dictumst. Curabitur eu lor em ac lacus laoreet 
                </li>
                <li class="li-w">
                  Fusce vitae orci nec velit ornare rh
                  oncus ut tempus est. Mauris eu augue lorem. Suspendisse sit am
                </li>
                <li class="li-o">
                  Curabitur eu lor em ac lacus lao
                  reet auctor. Fusce vitae orci nec velit ornare rhoncus ut temp
                </li>
                <li class="li-t">
                  Saoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut temus est. Mau ris eu augue lorem. Suspendi
                </li>
              </ul>  
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <h2>
                purposes
              </h2>
              <p class="lead">
                Folor sit amet conse ctetur adipisicing elit
              </p>

              <p>
                Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tempus est. Mauris eu augue lorem. Suspendisse sit amet vehi cula nisl, nec faucibus nisl. Proin ac fermentum orci, non semper metus. Nulla nulla tellus
              </p>
                <ul class="marked-list offs3">
                  <li>
                    <a href="#">
                      Fusce itae orci nec velit ornare rhon
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Ecus ut tempus estauris eu augue lorem.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Suspendisse sit amet vehicula
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Anisl, nec faucibus nislroin ac fermentum 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Horci, non semper metusulla nulla
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Dellus, tincidunt vel eros gravida, cursu
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Nullam ac magna nisi. Integer 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Dictum sagittis vulputate ulla a purus 
                    </a>
                  </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <h2>
               testimonial
              </h2>
              <blockquote class="media offs3">   
                <div class="media-left media_ins1">
                  <img src="images/page-2_img6.jpg" alt="">
                </div>             
                <div class="media-body">              
                  <p>
                    <q>
                    "Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tem pus est. Mauris eu aug ue lorem. Suspendisse sit amet vehi cul"
                    </q>
                  </p>
                  <cite>
                    Edna Barton,<br />
                    client
                  </cite>
                </div>
              </blockquote>
                           
            </div>
          </div>
        </div>
      </section>

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


    <!-- <script src="js/bootstrap.min.js"></script>
     <script src="js/tm-scripts.js"></script>   -->  
  <!-- </script> -->


  </body>
</html>
