<?php
require_once("../configuration/configuration.php");
$urlPage = isset($_GET['url']) ? $_GET['url'] : 'index';
$title=ucfirst($urlPage);
$urlPage = $urlPage . '.php';
require_once(ROOT . 'layouts/header.php');

?>
      
      <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(../public/img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">News &amp; Events <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row mb40">
            <div class="col-md-6 col-md-push-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-pull-6 news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Consectetur Adipisicing Elit</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <div class="row mb40">
            <div class="col-md-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-push-1  news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Aliquam Consectetur Debitis Illum</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <div class="row mb40">
            <div class="col-md-6 col-md-push-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-pull-6 news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Consectetur Adipisicing Elit</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <div class="row mb40">
            <div class="col-md-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_4.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-push-1  news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Aliquam Consectetur Debitis Illum</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <div class="row mb40">
            <div class="col-md-6 col-md-push-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_5.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-pull-6 news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Consectetur Adipisicing Elit</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <div class="row mb40">
            <div class="col-md-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_6.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-push-1  news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Aliquam Consectetur Debitis Illum</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <div class="row mb40">
            <div class="col-md-6 col-md-push-6 probootstrap-animate">
              <p><img src="../public/img/img_sq_7.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-pull-6 news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">Consectetur Adipisicing Elit</a></h2>
              <p class="probootstrap-news-date">July 20, 2017 by Admin</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="#" class="btn btn-black">Read More...</a></p>
            </div>
          </div>


        </div>
      </section>

<?php
require_once(ROOT . 'layouts/footer.php');
?>