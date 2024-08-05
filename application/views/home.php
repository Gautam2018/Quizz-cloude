<div class="container home_page">
  <!-- Carousel Start -->
  <div class="container-fluid p-0 pb-5 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#header-carousel" data-slide-to="1"></li>
        <li data-target="#header-carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" style="min-height: 300px;">
          <img class="position-relative w-100" src="assets/images/img/carousel-1.jpg"
            style="min-height: 300px; object-fit: cover;">
          <div class="carousel-caption d-flex align-items-center justify-content-center">
            <div class="p-5" style="width: 100%; max-width: 900px;">
              <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
              <h1 class="display-3 text-white mb-md-4">Best Education From Your Home</h1>
              <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
            </div>
          </div>
        </div>
        <div class="carousel-item" style="min-height: 300px;">
          <img class="position-relative w-100" src="assets/images/img/carousel-2.jpg"
            style="min-height: 300px; object-fit: cover;">
          <div class="carousel-caption d-flex align-items-center justify-content-center">
            <div class="p-5" style="width: 100%; max-width: 900px;">
              <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
              <h1 class="display-3 text-white mb-md-4">Best Online Learning Platform</h1>
              <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
            </div>
          </div>
        </div>
        <div class="carousel-item" style="min-height: 300px;">
          <img class="position-relative w-100" src="assets/images/img/carousel-3.jpg"
            style="min-height: 300px; object-fit: cover;">
          <div class="carousel-caption d-flex align-items-center justify-content-center">
            <div class="p-5" style="width: 100%; max-width: 900px;">
              <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
              <h1 class="display-3 text-white mb-md-4">New Way To Learn From Home</h1>
              <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- About Start -->
  <div class="container-fluid py-5">
    <div class="container-new py-5">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <img class="img-fluid rounded mb-4 mb-lg-0" src="assets/images/img/about.jpg" alt="">
        </div>
        <div class="col-lg-7">
          <div class="text-left mb-4">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
            <h1>Innovative Way To Learn</h1>
          </div>
          <p>Aliquyam accusam clita nonumy ipsum sit sea clita ipsum clita, ipsum dolores amet voluptua duo dolores et
            sit ipsum rebum, sadipscing et erat eirmod diam kasd labore clita est. Diam sanctus gubergren sit rebum
            clita amet, sea est sea vero sed et. Sadipscing labore tempor at sit dolor clita consetetur diam. Diam ut
            diam tempor no et, lorem dolore invidunt no nonumy stet ea labore, dolor justo et sit gubergren diam sed sed
            no ipsum. Sit tempor ut nonumy elitr dolores justo aliquyam ipsum stet</p>
          <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->





  <div class="row">
    <!-- Category Start -->
    <div class="container-fluid py-5">
      <div class="container-new pt-5 pb-3">
        <div class="text-center mb-5">
          <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
          <h1>Explore Top Subjects</h1>
        </div>
        <div class="row">

          <?php
          $category_img_dir = base_url("assets/images/category_image/");
          foreach ($category_data as $category_array) {
            $category_image = $category_array->category_image ? $category_array->category_image : "default.jpg";
            $category_image = $category_img_dir . $category_image;
            ?>

            <div class="col-lg-3 col-md-6 mb-4">
              <div class="cat-item position-relative overflow-hidden rounded mb-2">
                <img class="img-fluid" src="<?php echo xss_clean($category_image); ?>" alt="img09">
                <a class="cat-overlay text-white text-decoration-none"
                  href="<?php echo base_url('category/') . $category_array->category_slug ?>">
                  <h4 class="text-white font-weight-medium"><?php echo xss_clean($category_array->category_title); ?></h4>
                </a>
              </div>
            </div>

            <?php
          } ?>
        </div>
      </div>
    </div>
    <!-- Category Start -->

    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container-new py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
                <h1>Our Popular Courses</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="rounded overflow-hidden mb-2">
                        <img class="img-fluid" src="assets/images/img/course-1.jpg" alt="">
                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25 Students</small>
                                <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                            </div>
                            <a class="h5" href="">Web design & development courses for beginner</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    
    <!-- Courses End -->

    <!-- Latest Quiz Work Start -->
    <div class="col-12">
      <div class="row">
        <div class="col-12 text-center">
          <h2 class="heading">
            <?php echo lang('latest_quizes') ?>
          </h2>
          <!-- <hr> -->
        </div>
        <?php
        $data['quiz_list_data'] = $latest_quiz_data;
        $this->load->view('quiz_data_list', $data);
        ?>
      </div>
    </div>
    <!-- Latest Quiz Work End -->

    <!-- Popular Quiz Work Start -->
    <div class="col-12">
      <div class="row">
        <div class="col-12 text-center">
          <h2 class="heading">
            <?php echo lang('popular_quizes'); ?>
          </h2>
          <!-- <hr> -->
        </div>
        <?php
        $data['quiz_list_data'] = $popular_quiz_data;
        $this->load->view('quiz_data_list', $data);
        ?>

      </div>
    </div>
    <!-- Popular Quiz Work End -->
  </div>
</div>


<?php
if ($testimonial_data) { ?>
  <div class="container-fluid p-0">
    <!-- Testimonials Work Start -->
    <div class="col-12 text-center">
      <h2 class="text-center heading"><?php echo lang('front_testimonial'); ?></h2>
      <hr />
    </div>

    <section class="testimonial-section"> -->
      <div class="testimonials testimonial-reel">
        <?php
        $testimonial_path = base_url('/assets/images/testimonial/');
        foreach ($testimonial_data as $testimonial_array) {
          $testimonial_profile = $testimonial_array->profile ? $testimonial_array->profile : 'default.png';
          ?>
          <div class="testimonial">
            <p>“<?php echo strip_tags($testimonial_array->content); ?>”</p>
            <img src="<?php echo xss_clean($testimonial_path) . xss_clean($testimonial_profile); ?>">
            <div class="details">
              <span><?php echo xss_clean($testimonial_array->name); ?></span>
            </div>
          </div>
          <!-- / Testimonial -->
          <?php
        } ?>
      </div>
    </section>
    <!-- Testimonials Work End -->
  </div>
  <?php
}
?>



<?php
if ($sponser_data) { ?>
  <div class="container home_page">
    <div class="row">
      <!-- Sponsers Work Start -->
      <div class="col-12">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="heading"><?php echo lang('our_partners'); ?> </h2>
            <hr>
          </div>
        </div>
        <div class="sponsers text-center" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
          <?php

          foreach ($sponser_data as $sponser_array) {
            $sponser_logo = $sponser_array->logo ? $sponser_array->logo : 'default.png'; ?>

            <div class="col-6 sponser">
              <a href="<?php echo xss_clean($sponser_array->link); ?>"
                title="<?php echo xss_clean($sponser_array->name); ?>">
                <img src="<?php echo base_url('assets/images/sponsors/') . $sponser_logo; ?>">
              </a>
            </div>

            <?php
          } ?>

        </div>
      </div>
      <!-- Sponsers Work End -->
    </div>
  </div> <?php
} ?>