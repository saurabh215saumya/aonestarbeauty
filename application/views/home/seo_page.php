<?php //echo "<pre>"; print_r($seoKeywordData); die; ?>
<!-- Slider start here -->
    <div class="owl-carousel box_shodow single-slider banner_slider">
      <?php if(!empty($allBanners)){
          $i=1;
          foreach($allBanners as $banner){ 
          if(file_exists(UPLOAD_BANNER_PATH.$banner['image'])) {
              $bannerImg = SHOW_BANNER_PATH.$banner['image'];
          } else {
              $bannerImg = SHOW_PROFILE_PATH.'noimage.png';
          }

          // $imageAlt = substr($seoKeywordData['image_alt_1'], 0, -1).$i;


      ?>  
        <div class="item">
          <div class="container">
              <div class="slider_caption">
                  <?php //echo $banner['description']; ?>
              </div>
          </div>
          <img src="<?php echo $bannerImg; ?>" alt="<?php echo $seoKeywordData["image_alt_$i"]; ?>">
        </div>
      <?php $i++; } } ?>
    </div> 
<!-- Slider end heer -->

    <div class="container">
        <!-- Our services start here -->
        <section>
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-10">
                    <h2><?php echo $seoKeywordData['h1_tag']; ?></h2>
                    <p><?php echo $seoKeywordData['h1_tag_answer']; ?></p>
                    <span class="partition_lines"></span>
                </div>
            </div>
            <div class="row mt-5">
                <?php if(!empty($allPackages)){
                    $i=1;
                    foreach($allPackages as $packages){
                ?>
                  <div class="col-12 col-md-6 service_block service_<?php echo $i; ?>">
                    <span><i class="icons <?php echo $packages['package_slug']; ?>_icon"></i></span>
                    <h3><?php echo $packages['package_name']; ?></h3>
                    <strong><?php echo $packages['page_title']; ?></strong>
                    <p><?php echo $packages['description']; ?></p>
                    <a href="<?php echo base_url().$packages['package_slug']; ?>">Read More</a>
                  </div>
                <?php $i++; if($i==5){ break; } } } ?>
            </div>
        </section> <!-- Our services end -->
    </div>

    <div class="row justify-content-center text-center">
      <div class="col-12 col-md-10">
          <h2><?php echo $seoKeywordData['h2_tag']; ?></h2>
          <p><?php echo $seoKeywordData['h2_tag_answer']; ?></p>
          <span class="partition_lines"></span>
      </div>
    </div>

    <section class="get_quote_bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <?php 
                      if(!empty($footerContent)){
                          echo $footerContent['content'];
                      }
                    ?>
                </div>
                <div class="col-12 col-md-4 text-right">
                    <a href="<?php echo base_url().'contact-us'; ?>"><button class="btn btn-primary">Contact Us</button></a>
                </div>
            </div>
        </div>
    </section>


    <div class="row justify-content-center text-center">
      <div class="col-12 col-md-10">
          <h2><?php echo $seoKeywordData['h3_tag']; ?></h2>
          <p><?php echo $seoKeywordData['h3_tag_answer']; ?></p>
          <span class="partition_lines"></span>
      </div>
    </div>