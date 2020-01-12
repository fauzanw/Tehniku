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
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**s
 * custom route
 * */ 

$route["auth/perusahaan/register"]                = "auth/perusahaan_register";
$route["auth/customer/register"]                  = "auth/customer_register";
$route["perusahaan/pegawai/tambah"]               = "perusahaan/tambah_pegawai";
$route["perusahaan/pegawai/blocked/edit"]         = "perusahaan/edit_blocked_pegawai";
$route["perusahaan/pegawai/(:any)/hapus"]         = "perusahaan/hapus_pegawai/$1";
$route["perusahaan/pegawai/(:any)/edit"]          = "perusahaan/edit_pegawai/$1";
$route["admin/perusahaan/verif/edit"]             = "admin/edit_verif_perusahaan";
$route["admin/perusahaan/blocked/edit"]           = "admin/edit_blocked_perusahaan";
$route["admin/customer/blocked/edit"]             = "admin/edit_blocked_customer";
$route["admin/user/verifikasi/edit"]              = "admin/edit_verif_user";
$route["admin/perusahaan/(:any)/detail"]          = "admin/detail_perusahaan/$1";
$route["perusahaan/pegawai/blocked/edit"]         = "perusahaan/edit_blocked_pegawai";
$route["perusahaan/jasa/tambah"]                  = "perusahaan/tambah_jasa";
$route["admin/material/tambah"]                   = "admin/tambah_material";
$route["admin/material/(:any)/hapus"]             = "admin/hapus_material/$1";
$route["admin/material/impor_excel"]              = "admin/impor_excel_material";
$route["admin/material/(:any)/edit"]              = "admin/edit_material/$1";
$route["admin/merek/(:any)/hapus"]                = "admin/hapus_merek/$1";
$route["admin/merek/(:any)/edit"]                 = "admin/edit_merek/$1";
$route["customer/pakejasa/(:any)/type"]           = "customer/pakejasa_type/$1";
$route["customer/jasa/search"]                    = "customer/cari_jasa";
$route["customer/pakejasa/process/(:any)"]        = "customer/process_pakejasa/$1";
$route["customer/pakejasa/pesanan"]               = "customer/pesanan_pakejasa";
$route["customer/pakejasa/pesanan/(:any)/detail"] = "customer/pesanan_detail_pakejasa/$1";
$route["perusahaan/pesanan/(:any)/detail"]        = "perusahaan/pesanan_detail/$1";
$route["pegawai/tugas/(:any)/detail"] = "pegawai/tugas_detail/$1";