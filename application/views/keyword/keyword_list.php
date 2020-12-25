<!-- Inner banner start here -->
    <div class="inner_banner">
        <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="" />
    </div><!-- Inner banner end heer -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href=""><i class="fas fa-home"></i></a></li>
                <li>/</li>
                <li>Beauty Keywords</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <!-- Our services start here -->
        <!-- <section>
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h2>Our services in Chiswick</h2>
                    <p>In as name to here them deny wise this. As rapid woody my he me which. Men but they fail shew
                        just wish next put. Led all visitor musical calling nor her.</p>
                    <span class="partition_lines"></span>
                </div>
            </div>
            <div class="row mt-5 align-items-center">
                <div class="col-12 col-md-4">
                    <img src="<?php echo base_url('assets/front/images/about.jpg'); ?>" class="img-fluid" alt="" />
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
            </div>
        </section> --> <!-- Our services end -->
    </div>

    <!-- COntact us bar start here -->
    <!-- <section class="get_quote_bar">
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
    </section>  -->     
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