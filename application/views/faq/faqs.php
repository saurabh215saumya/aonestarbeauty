<!-- Inner banner start here -->
    <div class="inner_banner">
        <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="" />
        <h1>FAQ's</h1>
    </div><!-- Inner banner end heer -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href=""><i class="fas fa-home"></i></a></li>
                <li>/</li>
                <li>FAQ's</li>
            </ul>
        </div>
    </div>

    <!-- Our services start here -->
    <div class="container">
        <!-- Our services start here -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <?php if(!empty($allFaqs)){
                            $i=1;
                            foreach($allFaqs as $faqs){ ?>
                                <div class="mb-3">
                                <h5 data-toggle="collapse" class="accordian_heading" href="#<?php echo $i; ?>PriceList" role="button" aria-expanded="false" aria-controls="<?php echo $i; ?>PriceList"><?php echo $faqs['question']; ?> <span><i class="fas fa-angle-down"></i></span></h5>
                                <div class="collapse multi-collapse show" id="<?php echo $i; ?>PriceList">
                                    <div class="accordian_body">
                                        <div class="d-flex accordian_items">
                                            <div class="col-12"><?php echo $faqs['answer']; ?></div>
                                            <!-- <div class="col-6 text-right">&pound;6</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $i++; } } ?>
                    </div>
                </div>
            </div>
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
    </section>      <!-- COntact us bar end here -->