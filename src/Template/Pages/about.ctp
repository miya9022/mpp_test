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
        <div class="navbar-header header_bg_p">
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
                <li class="active">
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
                        <?= $this->Html->link(__(h($type->name)), ['controller' => 'productTypes', 'action' => 'view', h($type->id)]) ?>
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
                  <time datetime='2015'>Nay   -</time>
                </div>
                <div class="media-body">                  
                  <p>
                    Hiện tại, công ty Mai Phương đã sản xuất được nhiều chủng loại bao bì như: PE, PP, HDPE, màng chit, màng Pallet và thanh cửa nhựa uPVC... Với sản lượng trung bình hơn 1000 tấn trong một tháng và mở rộng mạng lưới bán hàng ra khắp các tỉnh biền Bắc như: Bắc Ninh, Hải Phòng, Lạng Sơn…
                  </p>
                </div>
              </article>
            </div>
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
          </div>
        </div>
      </section>    

      <section class="well well5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <h2>
                SWOT  
              </h2>
              <ul class="swot-list">
                <li class="li-s">
                  <ul class="marked-list offs3">
                    <li>
                      <a href="#">
                         Có nhà máy sản xuất độc lập
                      </a>
                    </li>
                     <li>
                      <a href="#">
                         Giá cả cạnh tranh.
                      </a>
                    </li>
                     <li>
                      <a href="#">
                         Vốn
                      </a>
                    </li>
                     <li>
                      <a href="#">
                         Mối quan hệ với các khách hàng cũ.
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="li-w">
                   <ul class="marked-list offs3">
                    <li>
                      <a href="#">
                        Marketing, xây dựng hình ảnh công ty 
                      </a>
                    </li>
                     <li>
                      <a href="#">
                         Chưa có đội ngũ tiếp thị tốt, khách hàng chủ yếu là đơn vị thương mại.
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="li-o">
                  <ul class="marked-list offs3">
                    <li>
                      <a href="#">
                        Các thị trường còn bỏ ngỏ phía Bắc: thị trường lớn Hải Phòng và Quảng Ninh (thanh nhựa), các khu công nghiệp (túi nilon)
                      </a>
                    </li>
                     <li>
                      <a href="#">
                         Tiềm năng xuất khẩu
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="li-t">
                  <ul class="marked-list offs3">
                    <li>
                      <a href="#">
                        Cạnh tranh từ phía đối thủ 
                      </a>
                    </li>
                    <li>
                      <a href="#">
                         Thời gian giao hàng
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>  
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
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
          </div>
        </div>
      </section>

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
