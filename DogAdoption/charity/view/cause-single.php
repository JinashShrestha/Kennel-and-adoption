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
                <h1 class="probootstrap-heading probootstrap-animate">Help Children To Get Food <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter60">

            <div class="col-md-4 col-sm-4 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                <figure>
                  <img src="../public/img/img_sm_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="progress-bar progress-bar-s2" data-percent="99"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">$49,112</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">$50,000</span></div>
                  </div>
                  
                  <h2><a href="#">Help Children To Get Food</a></h2>
                  <div class="probootstrap-date"><i class="icon-calendar"></i> 2 hours remaining</div>  
                  
                  <p><a href="#" class="btn btn-primary btn-black">Donate Now!</a></p>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8 probootstrap-animate">
              <h2>Help Children To Get Food</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus illo praesentium tempora, laboriosam. Ipsum nisi, atque quos quaerat veritatis fugit esse maiores id minus, rem similique dolorum culpa aliquid odit quasi obcaecati vero quod soluta magnam tempore, eligendi eveniet ex numquam dicta. Autem maiores soluta, beatae eius est, consectetur eveniet ipsum architecto, eligendi eos quod qui. Voluptatem, ad modi facilis.</p>
              <p>Veniam reiciendis vel in consequatur fugiat eum culpa fuga, ratione consequuntur vitae blanditiis! Consequuntur iste amet ipsa, totam et velit sapiente culpa fugiat. Ex iste dignissimos voluptatibus, consectetur. Placeat nobis, exercitationem incidunt quidem aut aperiam earum eos! Laborum consequatur debitis aspernatur illo minus minima veritatis obcaecati sed maiores quasi eaque libero hic maxime, in, quibusdam corrupti quas facilis neque dignissimos.</p>
              <div class="row">
                <div class="col-md-6">
                  <p><a href="../public/img/img_sq_6.jpg" class="image-popup"><img src="../public/img/img_sq_6.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
                </div>
                <div class="col-md-6">
                  <p><a href="../public/img/img_sq_6.jpg" class="image-popup"><img src="../public/img/img_sq_5.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
                </div>
              </div>
              <p>Odio soluta illo repudiandae aut aperiam dolor ipsam laboriosam, vero sit possimus minus quis, ducimus dolorum veritatis nulla facilis earum ex ab repellat quibusdam assumenda! Iusto saepe repellat doloribus in quisquam asperiores ea minus, ipsam aliquam at quam, deserunt velit eum pariatur animi suscipit quos necessitatibus molestias eaque. Voluptatibus natus accusantium at, minus quasi non, nesciunt ea illo atque necessitatibus?</p>
              <p>In pariatur mollitia, perspiciatis eum sequi minima vitae laborum aut praesentium obcaecati veritatis cum amet voluptas voluptates dolorem numquam, ex quibusdam neque esse. Ex asperiores delectus molestias illum nihil suscipit eaque placeat saepe dignissimos fuga dolore, consequuntur nisi totam id illo necessitatibus! Ducimus libero dolores soluta consequuntur maiores sapiente modi excepturi aliquid voluptate, corrupti, porro, possimus quas quod consequatur repellat.</p>
              <div class="row">
                <div class="col-md-6">
                  <p><a href="../public/img/img_sq_6.jpg" class="image-popup"><img src="../public/img/img_sq_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
                </div>
                <div class="col-md-6">
                  <p><a href="../public/img/img_sq_6.jpg" class="image-popup"><img src="../public/img/img_sq_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
                </div>
              </div>
              <p>Odio soluta illo repudiandae aut aperiam dolor ipsam laboriosam, vero sit possimus minus quis, ducimus dolorum veritatis nulla facilis earum ex ab repellat quibusdam assumenda! Iusto saepe repellat doloribus in quisquam asperiores ea minus, ipsam aliquam at quam, deserunt velit eum pariatur animi suscipit quos necessitatibus molestias eaque. Voluptatibus natus accusantium at, minus quasi non, nesciunt ea illo atque necessitatibus?</p>
              <p>In pariatur mollitia, perspiciatis eum sequi minima vitae laborum aut praesentium obcaecati veritatis cum amet voluptas voluptates dolorem numquam, ex quibusdam neque esse. Ex asperiores delectus molestias illum nihil suscipit eaque placeat saepe dignissimos fuga dolore, consequuntur nisi totam id illo necessitatibus! Ducimus libero dolores soluta consequuntur maiores sapiente modi excepturi aliquid voluptate, corrupti, porro, possimus quas quod consequatur repellat.</p>
              <p><a href="#" class="btn btn-black btn-lg">Donate Now</a></p>

            </div>

          </div>
        </div>
      </section>

      <section class="probootstrap-section probootstrap-bg probootstrap-section-dark">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>People Who Donates For This Cause</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="../public/img/person_6.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Linda Reyez</h3>
                  <p class="donated">Donated <span class="money">$500.00</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="../public/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Chris Worth</h3>
                  <p class="donated">Donated <span class="money">$1,500.00</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="../public/img/person_5.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Janet Morris</h3>
                  <p class="donated">Donated <span class="money">$250.00</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">

              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="../public/img/person_7.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Jessa Sy</h3>
                  <p class="donated">Donated <span class="money">$400.00</span></p>
                </div>
              </div>  

            </div>
          </div>
        </div>
      </section>



      <?php
      require_once(ROOT . 'layouts/footer.php');

      ?>
