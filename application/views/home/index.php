<?php // echo '<pre>'; print_r($allBanners); die; ?>
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

          if($i==1){
            $altTag = "Top 10 Near me Salon in kensington for eyelash";
          } else if($i==2){
            $altTag = "10 Best salon in kensington for eyelash";
          } else {
            $altTag = "highly recommended salon for eyelash in Kensington";
          }
      ?>  
        <div class="item">
          <div class="container">
              <div class="slider_caption">
                  <?php //echo $banner['description']; ?>
              </div>
          </div>
          <img src="<?php echo $bannerImg; ?>" alt="<?php echo $altTag; ?>">
        </div>
      <?php $i++; } } ?>
    </div> 
<!-- Slider end heer -->

    <div class="container">
        <!-- Our services start here -->
        <section>
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-7">
                    <h2>Amazing Services</h2>
                    <p><?php 
                        if(!empty($amazingServices)){
                            echo $amazingServices['content'];
                        }
                    ?></p>
                    <span class="partition_lines"></span>
                </div>
            </div>
            <div class="row mt-5">
                <?php if(!empty($allPackages)){
                    $i=1;
                    foreach($allPackages as $packages){
                        $icon_class = str_replace("-", "_", $packages['package_slug']);
                ?>
                  <div class="col-12 col-md-6 service_block service_<?php echo $i; ?>">
                    <span><i class="icons <?php echo $icon_class; ?>_icon"></i></span>
                    <h3><?php echo $packages['package_name']; ?></h3>
                    <strong><?php echo $packages['page_title']; ?></strong>
                    <p><?php echo $packages['description']; ?></p>
                    <a href="<?php echo base_url().$packages['package_slug']; ?>">Read More</a>
                  </div>
                <?php $i++; if($i==5){ break; } } } ?>
            </div>
        </section> <!-- Our services end -->

        <!-- Our pricinf start here -->
        <!-- <section>
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h2>Our Pricing</h2>
                    <p><?php 
                        if(!empty($ourPricing)){
                            echo $ourPricing['content'];
                        }
                    ?></p>
                    <span class="partition_lines"></span>
                </div>
            </div>

            <div class="row mt-5">

              <?php if(!empty($allPackages)){
                  $i=1;
                  foreach($allPackages as $packages){
                    if($i == 1){
                      $class = "active";
                    } else {
                      $class = "";
                    }
                ?>
                    <div class="col-12 col-md-3">
                        <div class="pricing_services_tab <?php echo $class; ?>" onclick="priceServices(this,'<?php echo $packages['package_slug']; ?>');">
                            <i class="icons <?php echo $packages['package_slug']; ?>_small_icon"></i>
                            <h4><?php echo $packages['package_name']; ?></h4>
                        </div>
                    </div>

                <?php $i++; } } ?>
            </div>


            <div class="row mt-5">
                <div class="col-12">
                    <?php if(!empty($allPackages)){
                        $i=1;
                        foreach($allPackages as $packages){
                        if($i == 1){
                          $styleClass = '';
                        } else {
                          $styleClass = 'style="display: none"';
                        }
                    ?>
                    <div id="show-<?php echo $packages['package_slug']; ?>" <?php echo $styleClass; ?> class="price_services_cntent">
                        <div class="row">
                            <div class="col-12 col-md-4 sub_services_list">
                                <?php 
                                $serviceDataArr = getPackageServices($packages['id']); 
                                if(!empty($serviceDataArr)){
                                    $j=1;
                                    foreach($serviceDataArr as $serviceData){ 
                                        if($j == 1){
                                            $class = "active";
                                        } else {
                                            $class = "";
                                        }
                                ?>
                                    <h5 class="<?php echo $class; ?>" onclick="subServices(this,'<?php echo $j; ?>');"><?php echo $serviceData['service_name']; ?></h5>
                                <?php $j++; } } ?>
                            </div>

                            <div class="col-12 col-md-8">
                                <?php 
                                $serviceDataArr = getPackageServices($packages['id']); 
                                if(!empty($serviceDataArr)){
                                    $k=1;
                                    foreach($serviceDataArr as $serviceData){ 
                                        if($k == 1){
                                            $style1Class = "";
                                        } else {
                                            $style1Class = 'style="display: none"';
                                        }
                                ?>
                                <div id="show-<?php echo $k; ?>" class="sub_services_cntent" <?php echo $style1Class; ?>>
                                    <div class="row">
                                        <div class="col-12">
                                            <?php if(!empty($serviceData['image'])){
                                                $serviceImg = SHOW_SERVICE_PATH.$serviceData['image']; ?>
                                                <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="" />
                                            <?php } else { ?>
                                                <img src="<?php echo base_url('assets/front/images/lower-lip-threading.jpg'); ?>" class="img-fluid" alt="">
                                            <?php } ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h3><?php echo ucwords($serviceData['service_name']); ?></h3>
                                                <h1>&pound;<?php echo $serviceData['price']; ?> - &pound;<?php echo $serviceData['offer_price']; ?></h1>
                                                <p><?php echo $serviceData['description']; ?></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $k++; } } ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; } } ?>
                </div>
            </div>


        </section> --> <!-- Our pricing end here -->

        <!-- Our pacjages start here -->
        <!-- <section>
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h2>Our Packages</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s,</p>
                    <span class="partition_lines"></span>
                </div>
            </div>
            <?php 
                if(!empty($ourPackagesPricing)){
                    echo $ourPackagesPricing['content'];
                }
            ?>
        </section> --> <!-- Our pacjages end here -->
    </div>

    <!-- COntact us bar start here -->
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
    </section>      <!-- COntact us bar end here -->