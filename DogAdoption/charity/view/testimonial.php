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
                <h1 class="probootstrap-heading probootstrap-animate">People Loves Us <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author">&mdash; Ferdinand A. Porsche <br> <span>Design Lead at AirBNB</span></cite></blockquote>

              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_2.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite class="author">&mdash; Steve Jobs <br> <span>Co-Founder Square</span></cite></blockquote>
              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_3.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo; <cite class="author">&mdash; Frank Chimero <br> <span>Creative Director at Twitter</span></cite></blockquote>
              </div>
            </div>
            
            <div class="clearfix visible-lg-block visible-md-block"></div>

            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author">&mdash; Ferdinand A. Porsche <br> <span>Design Lead at AirBNB</span></cite></blockquote>

              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_2.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite class="author">&mdash; Steve Jobs <br> <span>Co-Founder Square</span></cite></blockquote>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_3.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo; <cite class="author">&mdash; Frank Chimero <br> <span>Creative Director at Twitter</span></cite></blockquote>
              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="clearfix visible-lg-block visible-md-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author">&mdash; Ferdinand A. Porsche <br> <span>Design Lead at AirBNB</span></cite></blockquote>

              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_2.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite class="author">&mdash; Steve Jobs <br> <span>Co-Founder Square</span></cite></blockquote>
              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-testimony-wrap text-center">
                <figure>
                  <img src="../public/img/person_3.jpg" alt="Free Bootstrap Template by uicookies.com">
                </figure>
                <blockquote class="quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo; <cite class="author">&mdash; Frank Chimero <br> <span>Creative Director at Twitter</span></cite></blockquote>
              </div>
            </div>
            <div class="clearfix visible-lg-block visible-md-block"></div>
          </div>
        </div>
      </section>

      <section class="probootstrap-half">
        <div class="image">
          <div class="image-bg">
            <img src="../public/img/img_sq_5_big.jpg" alt="Free Bootstrap Template by uicookies.com">
          </div>
        </div>
        <div class="text">
          <div class="probootstrap-animate">
            <h3>Sucess Stories</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
            <p><a href="#" class="btn btn-primary btn-lg">Read More</a></p>
          </div>
        </div>
      </section>

<?php
require_once(ROOT . 'layouts/footer.php');

?>
