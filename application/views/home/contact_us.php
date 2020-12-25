<!-- Inner banner start here -->
    <div class="inner_banner">
        <img src="<?php echo base_url('assets/front/images/inner-banner.jpg'); ?>" class="img-fluid" alt="" />
        <h1>Contact Us</h1>
    </div><!-- Inner banner end heer -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                <li>/</li>
                <li>Contact</li>
            </ul>
        </div>
    </div>

    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1UxeQRpU7f4ccsl27AakqS_-CgDmIkTCZ" width="1350" height="480"></iframe>
    
    <!-- Our services start here -->
    <section class="contact_wrapper">
        <div class="container">
            <div class="row justify-content-center exchange_rate">
                <div class="col-12 col-md-4 mb-5 mb-md-0 contact_block">
                    <span><i class="fas fa-phone"></i></span>
                    <h5> 074 5424 1774 </h5>
                </div>
                <div class="ccol-12 col-md-4 mb-5 mb-md-0 contact_block">
                    <span><i class="fas fa-map-marker-alt"></i></span>
                    <h5> 4, Campden Hill Road, High Street Kensigton, London, W8 7DU</h5>
                </div>
                <div class="col-12 col-md-4 mb-5 mb-md-0 contact_block">
                    <span><i class="fas fa-envelope"></i></span>
                    <h5> beautystar2484@gmail.com </h5>
                </div>
            </div>
        </div>
    </section> <!-- Our services end -->

    <div class="container pt-5">
        <h3 class="text-center mb-5">Get in touch form</h3>
        <div class="row justify-content-center">
            <p id="resMsg" style="text-align: center"></p>
            <div class="col-12 col-md-10 contact_form">
                <!-- <form method="POST" actioin="<?php echo base_url('home/add_enquiry'); ?>"> -->
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="" required>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last Name" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="" required>
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" id="email" class="form-control" name="" placeholder="Enter Email" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="interest" id="interest" placeholder="Interest of Service" value="" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" placeholder="Write a message" rows="4" cols="" required></textarea>
                    </div>
                    <div class="form-group text-center mt-5">
                        <!-- <a href="" class="btn btn-primary">Submit</a> -->
                        <button class="btn btn-primary" type="submit" onclick="return userEnquiry();">Submit</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
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




    <script type="text/javascript">
        function userEnquiry(){
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var interest = $('#interest').val();
            var message = $('#message').val();
            var valid = 1;
            if(first_name == ""){
                $("#first_name").css({'border':'1px dotted red'});
                $("#first_name").focus();
                var valid = 0;
            }
            if(last_name == ""){
                $("#last_name").css({'border':'1px dotted red'});
                $("#last_name").focus();
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
            if(interest == ""){
                $("#interest").css({'border':'1px dotted red'});
                $("#interest").focus();
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
                url: "<?php echo base_url('home/user_enquiry'); ?>",
                data:"first_name="+first_name+"&last_name="+last_name+"&phone="+phone+"&email="+email+"&interest="+interest+"&message="+message,
                dataType: "text",
                    success: function(resultData){ //alert(resultData); return false;
                        if(resultData == "success"){
                            $('#first_name').val('');
                            $('#last_name').val('');
                            $('#phone').val('');
                            $('#email').val('');
                            $('#interest').val('');
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