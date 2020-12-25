<?php // echo '<pre>'; print_r($serviceDetails); die; ?>
<!-- Inner banner start here -->
    <div class="inner_banner">
        <?php if(!empty($serviceDetails['service_banner_image'])){
            $bannerImg = SHOW_SERVICE_PATH.$serviceDetails['service_banner_image']; ?>
            <img src="<?php echo $bannerImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_1']; ?>" />
        <?php } else { ?>
            <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_1']; ?>" />
        <?php } ?>
    </div><!-- Inner banner end heer -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                <li>/</li>
                <li><?php echo ucwords($serviceDetails['page_title']); ?></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <!-- Our services start here -->
        <section>
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h1><?php echo ucwords($serviceDetails['h1_tag']); ?></h1>
                    <!-- <h2><?php //echo ucwords($serviceDetails['h2_tag']); ?></h2> -->       <!-- Edited by MOhit -->
                    <!-- <p>In as name to here them deny wise this. As rapid woody my he me which. Men but they fail shew
                        just wish next put. Led all visitor musical calling nor her.</p> -->
                    <span class="partition_lines"></span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-md-3">
                    <div class="inner_service_left">
                        <h3>Our Services</h3>
                        <?php if(!empty($allPackageServices)){
                            foreach($allPackageServices as $serviceData){
                                if($serviceData['sub_menu_slug'] == $serviceId){
                                    $class = "active";
                                } else {
                                    $class = "";
                                }
                            ?>
                                <a href="<?php echo base_url().'services/'.$serviceData['sub_menu_slug']; ?>" class="<?php echo $class; ?>"><?php echo $serviceData['service_name']; ?></a>
                        <?php } } ?>
                        <!-- <a href="eyebrow-tidy.pgp" class="active">Eyebrow Tidy</a>
                        <a href="">Eyebrow Tint</a>
                        <a href="">Eyebrow Tidy & Tint</a>
                        <a href="">Eyelashes Extension</a> -->
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <h3><?php echo ucwords($serviceDetails['h3_tag']); ?></h3>
                    <?php echo $serviceDetails['description']; ?>
                </div>
                <div class="col-12 col-md-4">
                    <div class="owl-carousel box_shodow single-slider banner_slider">
                        <?php if(!empty($serviceDetails['image'])){
                            $serviceImg = SHOW_SERVICE_PATH.$serviceDetails['image']; ?>
                            <div class="item">
                                <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_1']; ?>" />
                            </div>
                        <?php } ?>

                        <?php if(!empty($serviceDetails['image_2'])){
                            $serviceImg = SHOW_SERVICE_PATH.$serviceDetails['image_2']; ?>
                            <div class="item">
                                <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_2']; ?>" />
                            </div>
                        <?php } ?>

                        <?php if(!empty($serviceDetails['image_3'])){
                            $serviceImg = SHOW_SERVICE_PATH.$serviceDetails['image_3']; ?>
                            <div class="item">
                                <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_3']; ?>" />
                            </div>
                        <?php } ?>

                        <?php if(!empty($serviceDetails['image_4'])){
                            $serviceImg = SHOW_SERVICE_PATH.$serviceDetails['image_4']; ?>
                            <div class="item">
                                <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_4']; ?>" />
                            </div>
                        <?php } ?>

                        <?php if(!empty($serviceDetails['image_5'])){
                            $serviceImg = SHOW_SERVICE_PATH.$serviceDetails['image_5']; ?>
                            <div class="item">
                                <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_5']; ?>" />
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>


                <!-- <div class="col-12 col-md-4">
                    <?php if(!empty($serviceDetails['image'])){
                        $serviceImg = SHOW_SERVICE_PATH.$serviceDetails['image']; ?>
                        <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_2']; ?>" />
                    <?php } else { ?>
                        <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="<?php echo $serviceDetails['image_alt_2']; ?>" />
                    <?php } ?>
                </div> -->
            </div>
            <!-- <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center pb-4 position-relative">Why we best <span class="partition_lines"></span></h2>
                    <?php 
                      if(!empty($whyWeBest)){
                          echo $whyWeBest['content'];
                      }
                    ?>
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

    <script type="text/javascript">
        function bookAppointment(){
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var appointment_date = $('#appointment_date').val();
            var message = $('#message').val();
            var valid = 1;
            if(name == ""){
                $("#name").css({'border':'1px dotted red'});
                $("#name").focus();
                var valid = 0;
            } 
            if(phone == ""){
                $("#phone").css({'border':'1px dotted red'});
                $("#phone").focus();
                var valid = 0;
            }
            if(email == ""){
                $("#email").css({'border':'1px dotted red'});
                $("#email").focus();
                var valid = 0;
            }
            if(appointment_date == ""){
                $("#appointment_date").css({'border':'1px dotted red'});
                $("#appointment_date").focus();
                var valid = 0;
            }
            if(message == ""){
                $("#message").css({'border':'1px dotted red'});
                $("#message").focus();
                var valid = 0;
            }
            if(valid==0){
                return false;
            }else{
                var saveData = $.ajax({
                type: "POST",
                url: "<?php echo base_url('package/book_appointment'); ?>",
                data:"name="+name+"&phone="+phone+"&email="+email+"&appointment_date="+appointment_date+"&message="+message,
                dataType: "text",
                    success: function(resultData){ //alert(resultData); return false;
                        if(resultData == "success"){
                            $('#name').val('');
                            $('#phone').val('');
                            $('#email').val('');
                            $('#appointment_date').val('');
                            $('#message').val('');
                          document.getElementById("resMsg").innerHTML = '<div class="alert alert-success"><strong>Appointment submitted successfully!!!</strong></div>';
                        }
                        if(resultData == "error"){
                          document.getElementById("resMsg").innerHTML = '<div class="alert alert-danger"><strong>Failed to book appointment!!!</strong></div>';
                        }
                    }       
                });
            }
        }
    </script>