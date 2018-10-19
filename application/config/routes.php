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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/login';
$route['admin/logout.php'] = 'admin/login/logout';
// CRUD user
$route['admin/user'] = 'admin/taikhoan';
$route['admin/user/add'] = 'admin/taikhoan/them';
$route['admin/user/delete/(:num)'] = 'admin/taikhoan/xoa/$1';
$route['admin/user/edit/(:num)'] = 'admin/taikhoan/sua/$1';

// CRUD slider
$route['admin/slider'] = 'admin/slidercontroller';
$route['admin/slider/add'] = 'admin/slidercontroller/them';
$route['admin/slider/delete/(:num)'] = 'admin/slidercontroller/xoa/$1';
$route['admin/slider/edit/(:num)'] = 'admin/slidercontroller/sua/$1';


// CRUD categories
$route['admin/categories'] = 'admin/categoriescontroller';
$route['admin/categories/add'] = 'admin/categoriescontroller/them';
$route['admin/categories/delete/(:num)'] = 'admin/categoriescontroller/xoa/$1';
$route['admin/categories/edit/(:num)'] = 'admin/categoriescontroller/sua/$1';


// CRUD config
$route['admin/config'] = 'admin/configcontroller';
$route['admin/config/add'] = 'admin/configcontroller/them';
$route['admin/config/delete/(:num)'] = 'admin/configcontroller/xoa/$1';
$route['admin/config/edit/(:num)'] = 'admin/configcontroller/sua/$1';

// CRUD post
$route['admin/post'] = 'admin/postcontroller';
$route['admin/post/add'] = 'admin/postcontroller/them';
$route['admin/post/delete/(:num)'] = 'admin/postcontroller/xoa/$1';
$route['admin/post/edit/(:num)'] = 'admin/postcontroller/sua/$1';



//Show
$route['(:any)'] = 'main';