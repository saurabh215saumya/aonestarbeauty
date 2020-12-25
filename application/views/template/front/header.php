<?php 
$pageSlug = $this->uri->segment('1');
$metaDataArr = getSeoPageMetaData($pageSlug);
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>/favicon.ico" type="image/x-icon" />
    <?php if(!empty($metaDataArr)){ ?>
        <title><?php echo $metaDataArr['meta_title']; ?></title>
        <meta name="author" content="<?php echo $metaDataArr['author']; ?>" />
        <meta name="subject" content="<?php echo $metaDataArr['subject']; ?>" />
        <meta name="owner" content="<?php echo $metaDataArr['owner']; ?>" />
        <meta name="coverage" content="<?php echo $metaDataArr['coverage']; ?>" />
        <meta name="Geography" content="<?php echo $metaDataArr['geography']; ?>" />
        <meta name="Language" content="<?php echo $metaDataArr['language']; ?>" />
        <meta http-equiv="CACHE-CONTROL" content="<?php echo $metaDataArr['cache_control']; ?>" />
        <meta name="distribution" content="<?php echo $metaDataArr['distribution']; ?>" />
        <meta name="audience" content="All" />
        <meta name="revisit-after" content="<?php echo $metaDataArr['revisit_after']; ?>" />
        <meta name="Robots" content="<?php echo $metaDataArr['robots']; ?>" />
        <meta name="country" content="<?php echo $metaDataArr['country']; ?>" />
        <meta name="description" content="<?php echo $metaDataArr['meta_description']; ?>" />
        <meta name="keywords" content="<?php echo $metaDataArr['meta_keywords']; ?>">
        <meta property="og:title" content="<?php echo $metaDataArr['og_title']; ?>">
        <meta property="og:description" content="<?php echo $metaDataArr['og_description']; ?>">
        <meta property="og:type" content="<?php echo $metaDataArr['og_type']; ?>">
        <meta property="og:url" content="<?php echo $metaDataArr['og_url']; ?>">
        <meta property="og:image" content="<?php echo $metaDataArr['og_image']; ?>" />
        <meta property="og:site_name" content="<?php echo $metaDataArr['og_site_name']; ?>" />
        <meta name="twitter:card" content="<?php echo $metaDataArr['twitter_description']; ?>" />
        <meta name="twitter:description" content="<?php echo $metaDataArr['twitter_description']; ?>" />
        <meta name="twitter:title" content="<?php echo $metaDataArr['twitter_description']; ?>" />
        <meta name="twitter:site" content="<?php echo $metaDataArr['twitter_site']; ?>" />
        <meta name="twitter:image" content="<?php echo $metaDataArr['twitter_description']; ?>" />
        <meta name="facebook:site" content="<?php echo $metaDataArr['facebook']; ?>" />
        <meta name="instagram:site" content="<?php echo $metaDataArr['instagram']; ?>" />
        <meta name="youtube:site" content="<?php echo $metaDataArr['youtube']; ?>" />
        <link rel="canonical" href="<?php echo $metaDataArr['canonical']; ?>" />
    <?php } else { ?>

        <title>eyelash in Kensington |aonestarbeauty.co.uk</title>
        <meta name="author" content="aonestarbeaauty" />
        <meta name="subject" content="Eyelash extension salon" />
        <meta name="owner" content="A one beauty " />
        <meta name="coverage" content="Kensington" />
        <meta name="Geography" content="4, Campden hill road, high street kensingto,kensington,London,W8 7DU,07454241775" />
        <meta name="Language" content="English" />
        <meta http-equiv="CACHE-CONTROL" content="Public" />
        <meta name="distribution" content="London" />
        <meta name="audience" content="All" />
        <meta name="revisit-after" content="2 DAYS" />
        <meta name="Robots" content="follow index" />
        <meta name="country" content="United Kingdom" />
        <meta name="description" content="Every 1 deserves to be treated well,we do above and beyond for sensitive skin and eyes, Kensington for eyelash" />
        <meta name="keywords" content="Top 10 eyelash Kensington|10 best salon eyelash">
        <meta property="og:title" content="eyelash in Kensington |aonestarbeauty.co.uk">
        <meta property="og:description" content="Every 1 deserves to be treated well,we do above and beyond for sensitive skin and eyes, Kensington for eyelash">
        <meta property="og:type" content="https://www.aonestarbeauty.co.uk">
        <meta property="og:url" content="www.aonestarbeauty.co.uk/services-eyelash-kensington">
        <meta property="og:image" content="eyelash" />
        <meta property="og:site_name" content="https://aonestarbeauty.co.uk" />
        <meta name="twitter:card" content="Every 1 treated above and beyond for sensitive skin and eyes, Kensington for eyelash" />
        <meta name="twitter:description" content="Every 1 treated above and beyond for sensitive skin and eyes, Kensington for eyelash" />
        <meta name="twitter:title" content="Every 1 treated above and beyond for sensitive skin and eyes, Kensington for eyelash" />
        <meta name="twitter:site" content="https://twitter.com/aonestarbeauty" />
        <meta name="twitter:image" content="Every 1 treated above and beyond for sensitive skin and eyes, Kensington for eyelash" />
        <meta name="facebook:site" content="https://www.facebook.com/profile.php?id=100057484205847" />
        <meta name="instagram:site" content="https://www.instagram.com/beautystar124/" />
        <meta name="youtube:site" content="https://www.youtube.com/channel/UCf1gl4Dk1CfmwEduEE7m80g/" />
        <link rel="canonical" href="www.aonestarbeauty.co.uk/services/lash-lift-kensington" />


        
        <!-- <title>eyelash extension high street kensington | http://aonestarbeauty.co.uk/</title>
        <Meta name="description" content="Eyelashes extension in high street  Kensington - we are highly professional in eyelash extension and our client recommendation get high volume for get new and existing client. http://aonestarbeauty.co.uk">
        <meta name="keywords" content="threading high street Kensington,Eyelash extension high street kensington,best eyelash extension high street kensington,3d Eyelashes extension in high street kensington">

        <meta name="robots" content="follow index" />
        <meta name="revisit-after" content="" />
        <link rel="canonical" href="https://www.aonestarbeauty.co.uk/"/>
        <meta property="og:locale" content="" />
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="" />
        <meta property="og:tag" content="" />
        <meta property="og:title" content=""  />
        <meta property="og:description" content=""/>
        <meta property="og:url" content="http://www.aonestarbeauty.co.uk/"/>
        <meta property="og:site_name" content="Aonestarbeauty" /> -->
    <?php } ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
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
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'about-us'; ?>">About us </a>
                </li>
                <?php
                if(!empty($allPackages)){
                    foreach($allPackages as $packages){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().$packages['package_slug']; ?>"><?php echo $packages['package_name']; ?></a>
                        </li>
                <?php } } ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'contact-us'; ?>">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>