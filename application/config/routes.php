<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'index';
// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
$route['404_override'] = 'index/notfound';
$route['block'] = 'index/block';
$route['translate_uri_dashes'] = FALSE;
//$route['admin'] = 'admin/overview';

/**
 * ==================================================================
 *  Routes Peserta
 * ==================================================================
 */
$route['home'] = 'index';
$route['auth'] = 'peserta/auth/login';
$route['facebook'] = 'peserta/auth/facebook_auth';
$route['google'] = 'peserta/auth/google_auth';
$route['register'] = 'peserta/auth/register';
$route['forgot'] = 'peserta/auth/lupapsw';
$route['repass'] = 'peserta/auth/ubahpassword';
$route['verify'] = 'peserta/auth/verify';
$route['class'] = 'index/kelas';
$route['webinar'] = 'index/webinar';
$route['blog'] = 'index/post';
$route['about'] = 'index/about';
$route['search'] = 'index/search/';
$route['community'] = 'index/comm';
$route['peserta/faq'] = 'peserta/bantuan/faq';
$route['peserta/ketentuan'] = 'peserta/bantuan/ketentuan';
$route['class-detail/(:any)']  =  'index/dt_kls/$1';
$route['legal/p/(:any)']  =  'legal/index/$1';
$route['webinar-detail/(:any)']  =  'index/dt_webinar/$1';
$route['blog/kategori/(:any)']  =  'index/kategori/$1';
$route['blog/tag/(:any)']  =  'index/tag/$1';
$route['blog/detail/(:any)']  =  'index/lihat_post/$1';
$route['mywebinar']  =  'peserta/webinar/mywebinar';

/**
 * ==================================================================
 *  Routes admin
 * ==================================================================
 */
$route['dashboardadm'] = 'admin/dashboard';
$route['profileadm'] = 'admin/profile';
$route['authadm'] = 'admin/auth';
$route['forgotadm'] = 'admin/auth/forgotpsw';
$route['peserta'] = 'admin/peserta';
$route['kelas'] = 'admin/kelas';
$route['ktgkelas'] = 'admin/ktgkelas';
$route['diskon'] = 'admin/diskon';