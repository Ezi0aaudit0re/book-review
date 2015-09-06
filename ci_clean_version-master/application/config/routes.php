<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "books";
$route['404_override'] = '';
$route['add']="users/add";
$route['signin']='users/signin';
$route['addreview']='users/addreview';
$route['reviewadd/(:any)']='users/review/$1';
$route['bookpage/(:any)/(:any)/(:any)']= 'books/bookpage/$1/$2/$3';
//end of routes.php