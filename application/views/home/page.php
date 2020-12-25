    <div class="inner_banner">
        <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="" />
        <h1><?php echo ucwords($details['page_name']); ?></h1>
    </div><!-- Inner banner end heer -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                <li>/</li>
                <li><?php echo ucwords($details['page_name']); ?></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <!-- Our services start here -->
        <?php echo $details['content']; ?>
        <!-- Our services end -->
    </div>

    <!-- Our pricinf start here -->
    <!-- <section class="pricing_bg">
        <div class="container">
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
        </div>
    </section> --> <!-- Our pricing end here -->

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