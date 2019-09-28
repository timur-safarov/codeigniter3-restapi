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

//$route['user/([a-zA-Z0-9_-]+)'] = 'user/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

//user
$route['api/restUsers/(:num)'] = 'api/restUsers/rest/id/$1/'; // Example 4
$route['api/restUsers/(:num)/format/([a-zA-Z0-9_-]+)'] = 'api/restUsers/rest/id/$1/format/$3$4';

$route['user/index'] = "user/index";
$route['user/(:num)'] = "user/show/$1";
$route['userCreate']['post'] = "user/store";
$route['userEdit/(:any)'] = "user/edit/$1";
$route['userUpdate/(:any)']['put'] = "user/update/$1";
$route['userDelete/(:any)']['delete'] = "user/delete/$1";


//libraries
$route['api/restLibraries/(:num)'] = 'api/restLibraries/rest/id/$1/'; // Example 4
$route['api/restLibraries/(:num)/format/([a-zA-Z0-9_-]+)'] = 'api/restLibraries/rest/id/$1/format/$3$4';

$route['library/index'] = "library/index";
$route['library/(:num)'] = "library/show/$1";
$route['libraryCreate']['post'] = "library/store";
$route['libraryEdit/(:any)'] = "library/edit/$1";
$route['libraryUpdate/(:any)']['put'] = "library/update/$1";
$route['libraryDelete/(:any)']['delete'] = "library/delete/$1";


//books
$route['api/restBooks/(:num)'] = 'api/restBooks/rest/id/$1/'; // Example 4
$route['api/restBooks/(:num)/format/([a-zA-Z0-9_-]+)'] = 'api/restBooks/rest/id/$1/format/$3$4';

$route['book/index'] = "book/index";
$route['book/(:num)'] = "book/show/$1";
$route['bookCreate']['post'] = "book/store";
$route['bookEdit/(:any)'] = "book/edit/$1";
$route['bookUpdate/(:any)']['put'] = "book/update/$1";
$route['bookDelete/(:any)']['delete'] = "book/delete/$1";

