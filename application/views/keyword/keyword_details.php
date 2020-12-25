<?php //echo "<pre>"; print_r($keywordDetails); ?>
<!-- Inner banner start here -->
<div class="inner_banner">
    <?php if(!empty($keywordDetails['banner_image'])){
        $bannerImg = SHOW_KEYWORD_PATH.$keywordDetails['banner_image']; ?>
        <img src="<?php echo $bannerImg; ?>" class="img-fluid" alt="<?php echo $keywordDetails['image_alt_1']; ?>" />
    <?php } else { ?>
        <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="<?php echo $keywordDetails['image_alt_1']; ?>" />
    <?php } ?>
    <!-- <img src="assets/images/inner-banner-2.jpg" class="img-fluid" alt="" /> -->
</div><!-- Inner banner end heer -->
<div class="breadcrumb_wrapper">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href=""><i class="fas fa-home"></i></a></li>
            <li>/</li>
            <li><?php echo $keywordDetails['keyword_name']; ?></li>
        </ul>
    </div>
</div>

<div class="container">
    <!-- Our services start here -->
    <section>
        <div class="row mt-5 align-items-center">
            <div class="col-12 col-md-4">
                <?php if(!empty($keywordDetails['image'])){
                    $bannerImg = SHOW_KEYWORD_PATH.$keywordDetails['image']; ?>
                    <img src="<?php echo $bannerImg; ?>" class="img-fluid" alt="<?php echo $keywordDetails['image_alt_2']; ?>" />
                <?php } ?>
            </div>
            <div class="col-12 col-md-8">
                <h3 class="mb-4"><?php echo $keywordDetails['page_title']; ?></h3>
                <p><?php echo $keywordDetails['description']; ?></p>
            </div>
        </div>

        <!-- <div class="row mt-5 align-items-center">
            <div class="col-12 col-md-8">
                <h3 class="mb-4">Welcome to Our Shop</h3>
                <p>Was certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed
                    greater joy adapted too shy. Now properly surprise expenses interest nor replying she she. Bore
                    tall nay many many time yet less. Doubtful for answered one fat indulged margaret sir shutters
                    together. Ladies so in wholly around whence in at. Warmth he up giving oppose if. Impossible is
                    dissimilar entreaties oh on terminated. Earnest studied article country ten respect showing had.
                    But required offering him elegance son improved informed. </p>
            </div>
            <div class="col-12 col-md-4">
                <img src="assets/images/upper-lip-threading.jpg" class="img-fluid" alt="" />
            </div>
        </div>

        <div class="row mt-5 align-items-center">
            <div class="col-12 col-md-4">
                <img src="assets/images/upper-lip-threading.jpg" class="img-fluid" alt="" />
            </div>
            <div class="col-12 col-md-8">
                <h3 class="mb-4">Welcome to Our Shop</h3>
                <p>Was certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed
                    greater joy adapted too shy. Now properly surprise expenses interest nor replying she she. Bore
                    tall nay many many time yet less. Doubtful for answered one fat indulged margaret sir shutters
                    together. Ladies so in wholly around whence in at. Warmth he up giving oppose if. Impossible is
                    dissimilar entreaties oh on terminated. Earnest studied article country ten respect showing had.
                    But required offering him elegance son improved informed. </p>
            </div>
        </div> -->
    </section> <!-- Our services end -->
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
    </section>      
    <!-- COntact us bar end here -->


<!-- We serve in location start here -->
<section class="we_serve_location">
    <div class="container">
        <h2>We serve in different keywords</h2>
        <div class="row">
            <div class="col-12">
                <ul class="location_list">
                    <?php $activeKeywords = getAllActiveKeywords(); 
                    if(!empty($activeKeywords)){
                        foreach($activeKeywords as $keywords){ ?>
                        <li><a href="<?php echo base_url('beauty-keywords/'.$keywords['keyword_slug']); ?>"><?php echo $keywords['keyword_name']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- We serve in location start here -->