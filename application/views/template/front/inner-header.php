<?php 
$pageSlug = $this->uri->segment('1');
$packageSlug = $this->uri->segment('1');
$serviceSlug = $this->uri->segment('2');


if($pageSlug == "services"){
    $metaDataArr = getServiceMetaData($serviceSlug);
} else if($pageSlug == "beauty-keywords"){
    $metaDataArr = getKeywordMetaData($serviceSlug);
} else {
    $metaDataArr = getPackageMetaData($packageSlug);
}



// if($pageSlug == "package"){
//     $metaDataArr = getPackageMetaData($packageSlug);
// } else 
// if($pageSlug == "service"){
//     $metaDataArr = getServiceMetaData($serviceSlug);
// } else {
//     $metaDataArr = getPackageMetaData($pageSlug);
// }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if(!empty($metaDataArr)){ ?>
    <title><?php echo $metaDataArr['meta_title']; ?></title>
    <Meta name="description" content="<?php echo $metaDataArr['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $metaDataArr['meta_keywords']; ?>">
    <meta name="robots" content="<?php echo $metaDataArr['robots']; ?>" />
    <meta name="revisit-after" content="<?php echo $metaDataArr['revisit_after']; ?>" />
    <link rel="canonical" href="<?php echo $metaDataArr['canonical']; ?>"/>
    <meta property="og:locale" content="<?php echo $metaDataArr['og_local']; ?>" />
    <meta property="og:type" content="<?php echo $metaDataArr['og_type']; ?>"/>
    <meta property="og:image" content="<?php echo $metaDataArr['og_image']; ?>" />
    <meta property="og:tag" content="<?php echo $metaDataArr['og_tag']; ?>"  />
    <meta property="og:title" content="<?php echo $metaDataArr['og_title']; ?>"  />
    <meta property="og:url" content="<?php echo $metaDataArr['og_url']; ?>"  />
    <meta property="og:description" content="<?php echo $metaDataArr['og_description']; ?>"/>
    <meta property="og:site_name" content="<?php echo $metaDataArr['og_site_name']; ?>" />
<?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/main-style.css'); ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148406030-5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-148406030-5');
    </script>
    
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<div class="top_header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center text-md-left">
                    Call us: 074 5424 1774
                </div>
                <div class="col-12 col-md-6 social_links text-right justify-content-center justify-content-md-end">
                    Follow us:
                    <a target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="https://accounts.google.com/"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex">
                    <a href="<?php echo base_url(); ?>" class="logo mx-auto">
                        <img src="<?php echo base_url('assets/front/images/logo.png'); ?>" class="img-fluid" alt="Aonestar beauty" />
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="sticky-anchor"></div>
    <nav class="navbar navbar-expand-lg navbar-light sticky">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item <?php if($pageSlug == ''){ echo 'active';} ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home </a>
                </li>
                <li class="nav-item <?php if($pageSlug == 'about-us'){ echo 'active';} ?>">
                    <a class="nav-link" href="<?php echo base_url().'about-us'; ?>">About us </a>
                </li>
                <?php
                if(!empty($allPackages)){
                    foreach($allPackages as $packages){ ?>
                        <li class="nav-item <?php if($packageSlug == $packages['package_slug']){ echo 'active';} ?>">
                            <a class="nav-link" href="<?php echo base_url().$packages['package_slug']; ?>"><?php echo $packages['package_name']; ?></a>
                        </li>
                <?php } } ?>
                <li class="nav-item <?php if($pageSlug == 'contact-us'){ echo 'active';} ?>">
                    <a class="nav-link" href="<?php echo base_url().'contact-us'; ?>">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>