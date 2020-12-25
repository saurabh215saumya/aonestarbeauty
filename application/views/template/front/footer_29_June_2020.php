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
                    <a href="<?php echo base_url().'faqs'; ?>">FAQ</a>
                    <a href="<?php echo base_url().'contact-us'; ?>">Contact Us</a>
                    <a target="_blank" href="<?php echo base_url().'sitemap.xml'; ?>">Site Map</a>
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
                    <h4>Important Links</h4>
                    <a href="<?php echo base_url().'terms-conditions'; ?>">Terms &amp; Conditions</a>
                    <a href="<?php echo base_url().'privacy-policy'; ?>">Privacy Policy</a>
                    <a href="<?php echo base_url().'affiliates'; ?>">Affiliates</a>
                    <a href="<?php echo base_url().'faq'; ?>">FAQ</a>
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

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ed7e0ba4a7c62581799dac7/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    
</body>

</html>