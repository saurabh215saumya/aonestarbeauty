<section class="get_quote_bar" id="show_button">
    <div class="col-12 col-md-7 text-right">
        <a href="#login" data-toggle="modal"><button class="btn btn-primary">Show Keywords</button></a>
    </div>
</section>

<section class="get_quote_bar" id="hide_button" style="display: none;">
    <div class="col-12 col-md-7 text-right">
        <button class="btn btn-primary" onclick="return hide_button();">Hide Keywords</button>
    </div>
</section>


<!-- Login Pop-up Start -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginLabel">Enter your password to show keywords</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <p id="resLoginMsg" style="text-align: center; color: red;"></p>
      <div class="modal-body">
        
        <div class="form-group">
          <input type="password" class="form-control" name="meta_password" id="meta_password" placeholder="Password" value="" required>
        </div>
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0);" onclick="return showMetatag();" class="btn btn-primary">Submit</a>
        
      </div>
    </div>
  </div>
</div>
<!-- Login Pop-up End -->



<!-- We serve in location start here -->
<?php 
$getSeoKeywords = getAllSeoKeywords();
?>
<section class="we_serve_location" id="seo_keywords" style="display:none;">
    <div class="container">
        <h2>SEO Keywords</h2>
        <div class="row">
            <div class="col-12">
                <ul class="location_list">
                    <?php if(!empty($getSeoKeywords)){
                        foreach($getSeoKeywords as $seoKeywords){ 
                            // $slug = str_replace(" ", "-", $seoKeywords['keyword_name'])
                        ?>
                            <li><a href="<?php echo base_url().$seoKeywords['page_slug']; ?>"><?php echo $seoKeywords['keyword_name']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- We serve in location start here -->


<footer>
        <span class="scroll_to_top_action"><i class="fas fa-chevron-up"></i></span>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <h4>About Company</h4>
                    <p>
                        <?php 
                            if(!empty($aboutCompany)){
                                echo $aboutCompany['content'];
                            }
                        ?>
                    </p>
                </div>
                <div class="col-12 col-md-3 usefull_links mt-4 mt-md-0">
                    <h4>Usefull Links</h4>
                    <a href="<?php echo base_url().'about-us'; ?>">About</a>
                    <a href="<?php echo base_url().'site-map'; ?>">Site Map</a>
                    <!-- <a href="<?php echo base_url().'faqs'; ?>">FAQ</a> -->
                    <!-- <a href="<?php echo base_url().'services'; ?>">Services</a> -->
                    <a href="<?php echo base_url().'contact-us'; ?>">Contact Us</a>
                    <a href="<?php echo base_url().'terms-conditions'; ?>">Terms &amp; Conditions</a>
                    <a href="<?php echo base_url().'privacy-policy'; ?>">Privacy Policy</a>
                    <a href="<?php echo base_url().'affiliates'; ?>">Affiliates</a>
                    <a href="<?php echo base_url().'faq'; ?>">FAQ</a>
                </div>

                <div class="col-12 col-md-3 usefull_links mt-4 mt-md-0">
                    <h4>Our Services</h4>
                    <?php
                    if(!empty($allPackages)){
                        foreach($allPackages as $packages){ ?>
                            <a href="<?php echo base_url().$packages['package_slug']; ?>"><?php echo $packages['package_name']; ?></a>
                    <?php } } ?>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0 usefull_links mt-4 mt-md-0">
                    <h4>Our Keywords</h4>
                    <?php $activeKeywords = getAllActiveKeywords(); 
                    if(!empty($activeKeywords)){
                        $i=0;
                        foreach($activeKeywords as $keywords){ ?>
                            <?php if($i==5){ ?> <a href="<?php echo base_url('beauty-keywords'); ?>">See More</a> <?php } ?>
                            <?php if($i==5){ break; } ?>
                        <a href="<?php echo base_url('beauty-keywords/'.$keywords['keyword_slug']); ?>"><?php echo $keywords['keyword_name']; ?></a>
                    <?php $i++; } } ?>
                </div>
            </div>
        </div>
        <div class="footer_end">
            Copyright © <?php echo date('Y'); ?> Aonestar. All Right Reserved.
        </div>
    </footer>


    
    <script src="<?php echo base_url('assets/front/js/jquery-1.9.1.min.js'); ?>"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/front/js/owl.carousel.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $(".single-slider").owlCarousel({
                loop: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 1,
                        navigation: true
                    },
                    600: {
                        items: 1,
                        nav: true,
                        navigation: false
                    }
                }
            });
            $('.multiple_product').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                pagination: false,
                navigation: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: true,
                        margin: 20
                    }
                }
            });
        });
    </script>


    <script src="<?php echo base_url('assets/front/js/main-script.js'); ?>"></script>

    <script type="text/javascript">
        function hide_button(){
            document.getElementById("seo_keywords").style.display = "none";
            document.getElementById("show_button").style.display = "block";
            document.getElementById("hide_button").style.display = "none";
        }

        function showMetatag(){
            var meta_password = $('#meta_password').val();
            if(meta_password == "aonestarbeauty!@#$%"){
                $('#login').modal('hide');
                document.getElementById("seo_keywords").style.display = "block";
                document.getElementById("show_button").style.display = "none";
                document.getElementById("hide_button").style.display = "block";
                $('#meta_password').val('');
                document.getElementById("resLoginMsg").innerHTML = "";
                
            } else {
                document.getElementById("resLoginMsg").innerHTML = "Invalid Password";
            }
        }
    </script>

</body>

</html>