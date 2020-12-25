<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/index';
$route['admin/(:any)'] = 'admin/$1';
$route['banner'] = 'banner/index';
$route['location'] = 'location/index';
$route['faq'] = 'faq/index';
$route['staticpage'] = 'staticpage/index';
$route['appointment'] = 'appointment/index';
$route['keyword'] = 'keyword/index';

$route['site-map'] = 'home/site_map';
$route['about-us'] = 'home/getPageData/about_us';
$route['terms-conditions'] = 'home/getPageData/terms_and_condition';
$route['privacy-policy'] = 'home/getPageData/privacy_policy';
$route['affiliates'] = 'home/getPageData/affiliates';
$route['contact-us'] = 'home/contact_us';
$route['faqs'] = 'faq/getAllFaqs';

$route['gallery'] = 'gallery/getAllgallery';



// $route['package/package-detail/(:any)'] = 'package/packageDetail/$1';



$route['threading'] = 'package/packageDetail';
$route['eyelashes-extension'] = 'package/packageDetail';
$route['heena'] = 'package/packageDetail';
$route['tints'] = 'package/packageDetail';
$route['waxing'] = 'package/packageDetail';

$route['services/(:any)'] = 'service/serviceDetail/$1';

// $route['sitemap\.xml'] = "Sitemap/index";

$route['beauty-keywords'] = 'keyword/keywordList';
$route['beauty-keywords/(:any)'] = 'keyword/keywordDetails/$1';


// $route['service/service-detail/(:any)/(:any)'] = 'service/serviceDetail/$1';
$route['(:any)'] = 'home/getSeoKeywordDetails/$1';
