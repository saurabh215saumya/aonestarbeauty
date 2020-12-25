<?php // echo '<pre>'; print_r($packageDetails); die; ?>
<!-- Inner banner start here -->
    <div class="inner_banner">
        <?php if(!empty($packageDetails['image'])){
            $bannerImg = SHOW_PACKAGE_PATH.$packageDetails['image']; ?>
            <img src="<?php echo $bannerImg; ?>" class="img-fluid" alt="" />
        <?php } else { ?>
            <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="" />
        <?php } ?>
        <h1><?php echo ucwords($packageDetails['package_name']); ?></h1>
    </div><!-- Inner banner end heer -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                <li>/</li>
                <li><?php echo ucwords($packageDetails['package_name']); ?></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <!-- Our services start here -->
        <section>
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h2><?php echo ucwords($packageDetails['package_name']); ?> design</h2>
                    <!-- <p>In as name to here them deny wise this. As rapid woody my he me which. Men but they fail shew just wish next put. Led all visitor musical calling nor her.</p> -->
                    <span class="partition_lines"></span>
                </div>
            </div>
            <div class="row mt-5 align-items-center">
                <div class="col-12 col-md-5">
                    <img src="<?php echo base_url('assets/front/images/about.jpg'); ?>" class="img-fluid" alt="" />
                </div>
                <div class="col-12 col-md-7">
                    <?php echo $packageDetails['description']; ?>
                    <!-- <a href="" class="btn btn-outline-primary mt-5">Learn More</a> -->
                </div>
            </div>
        </section> <!-- Our services end -->
    </div>

    <!-- Our pricinf start here -->
    <section class="pricing_bg">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h2>Our <?php echo ucwords($packageDetails['package_name']); ?> Services</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s,</p>
                    <span class="partition_lines"></span>
                </div>
            </div>


            <?php //echo '<pre>'; print_r($allPackageServices); ?>
            <div class="row mt-5 inner_pricing">
                <div class="col-12 col-md-4 sub_services_list">
                    <?php if(!empty($allPackageServices)){
                        $i=1;
                        foreach($allPackageServices as $packageServices){ 
                            if($i===1){
                                $activeClass = "active";
                            } else {
                                $activeClass = "";
                            }
                    ?>
                            <h5 class="<?php echo $activeClass; ?>" onclick="subServices(this,'<?php echo $i; ?>');"><?php echo ucwords($packageServices['service_name']); ?></h5>
                    <?php $i++; } } ?>

                    <!-- <h5 class="active" onclick="showDiv('lowerLip');">Lower Lip</h5>
                    <h5 onclick="showDiv('upperlip', this);">Upper Lip</h5>
                    <h5 onclick="showDiv('chin');">Chin</h5> -->
                </div>
                <div class="col-12 col-md-8">
                    <?php if(!empty($allPackageServices)){ //echo '<pre>'; print_r($allPackageServices);
                        $i=1;
                        foreach($allPackageServices as $packageServices){ ?>
                            <?php if($i==1){ ?>
                            <div id="show-<?php echo $i; ?>" class="sub_services_cntent">
                            <?php } else { ?>
                                <div id="show-<?php echo $i; ?>" class="sub_services_cntent" style="display: none;">
                            <?php } ?>
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(!empty($packageServices['image'])){
                                            $serviceImg = SHOW_SERVICE_PATH.$packageServices['image']; ?>
                                            <img src="<?php echo $serviceImg; ?>" class="img-fluid" alt="" />
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/front/images/lower-lip-threading.jpg'); ?>" class="img-fluid" alt="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo ucwords($packageServices['service_name']); ?></h3>
                                        <h1>&pound;<?php echo $packageServices['price']; ?> - &pound;<?php echo $packageServices['offer_price']; ?></h1>
                                        <p><?php echo $packageServices['description']; ?></p>
                                        <a href="<?php echo base_url().'services'.'/'.$packageServices['sub_menu_slug']; ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                    <?php $i++; } } ?>
                </div>
            </div>
        </div>
    </section> <!-- Our pricing end here -->


    <div class="container">
        <!-- Our services start here -->
        <section>
            <div class="row justify-content-center text-center">
                <div class="col-7">
                    <h2>Book an Appointment</h2>
                    <p>In as name to here them deny wise this. As rapid woody my he me which. Men but they fail shew
                        just wish next put. Led all visitor musical calling nor her.</p>
                    <span class="partition_lines"></span>
                </div>
            </div>
            
            <p id="resMsg" style="text-align: center"></p>
            <div class="row mt-5 justify-content-center text-center">
                <div class="col-9">
                    <?php // echo form_open_multipart($controller.'/bookAppointment'); ?>
                        <div class="form-group row">
                            <input type="hidden" name="packageId" id="packageId" value="<?php echo $packageId; ?>">
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-6">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="date" name="appointment_date" id="appointment_date" class="form-control" placeholder="Date" />
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control" id="" cols="30" rows="5" placeholder="Write here"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" onclick="return bookAppointment();">Appointment</button>
                        </div>
                    <?php // echo form_close(); ?>
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