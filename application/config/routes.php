<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about']='home/about';
$route['shop-loan-gurgaon']='home/shop_loan_gurgaon';
$route['how-it-works']='home/work';
$route['loan-in-48-hours']='home/loan_hours';
$route['why-loan-sahara']='home/sahara';
$route['contact']='home/contact';
$route['hotel-loan-gurgaon']='home/hotel_loan';
$route['factory-loan-gurgaon']='home/factory_loan';
$route['others-loan']='home/other_loan';
$route['business-loan']='home/business';
$route['apply-loan']='home/applyloan';
$route['privacy']='home/privacy';
$route['loan-apply-customer']='front/applyloan';

$route['invoice']='home/invoice';
$route['print']='home/print';
$route['success']='home/success';
$route['forget-password']='home/forget';




/*home close start user*/

$route['register']='front/login/save';
$route['customer-login']='front/login';
$route['customer-profile']='front/customer';
$route['customer-logout']='front/login/logout';
$route['profile-update']='front/customer/update';
$route['customer-change-pass']="front/customer/change";
$route['profile-upload-pan-adhar-photo']='front/customer/image_upload';
$route['contact-send-query']='home/applycontact';
$route['customer-payment-detail/(:any)']='front/Customer/loanPayment/$1';

$route['customer-about']='front/customer/aboutus';
$route['customer-contact-information']='front/customer/contactInformation';
$route['customer-employee']='front/customer/employmentInformation';
$route['customer-digitalKYC']='front/customer/digitalKYC';
$route['customer-loan-apply']='front/customer/applyLoan';
$route['customer-message']='front/customer/message';
$route['customer-response/(:any)/(:any)']='front/response/listing/$1/$2';







/*profile close*/





/*------BASIC SETUP---------*/
$route['admin'] = 'users/dashboard';
$route['dashboard'] = 'users/dashboard';
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';
$route['reset'] = 'users/reset';
$route['profile'] = 'users/profile';
$route['permission'] = 'users/permission';
$route['admin-menu'] = 'users/menu';

$route['customer-care-users']='Customercare';


$route['white-label-users'] = 'whitelabels';
$route['white-label-users/setup'] = 'whitelabels/setup';
$route['white-label-users/add'] = 'whitelabels/add';
$route['white-label-users/fund'] = 'whitelabels/fund';
$route['white-label-users/edit/(:num)'] = 'whitelabels/edit/$1';
$route['white-label-users/delete/(:num)'] = 'whitelabels/delete/$1';

$route['template'] = 'templates';
$route['template/add'] = 'templates/add';
$route['template/edit/(:num)'] = 'templates/edit/$1';

$route['api-users'] = 'apiusers';
$route['api-users/add'] = 'apiusers/add';
$route['api-users/fund'] = 'apiusers/fund';
$route['api-users/edit/(:num)'] = 'apiusers/edit/$1';
$route['api-users/delete/(:num)'] = 'apiusers/delete/$1';

$route['master-distributors-users'] = 'masterdistributors';
$route['master-distributors-users/add'] = 'masterdistributors/add';
$route['master-distributors-users/fund'] = 'masterdistributors/fund';
$route['master-distributors-users/edit/(:num)'] = 'masterdistributors/edit/$1';
$route['master-distributors-users/delete/(:num)'] = 'masterdistributors/delete/$1';


$route['area-distributors-users'] = 'areadistributors';
$route['area-distributors-users/add'] = 'areadistributors/add';
$route['area-distributors-users/fund'] = 'areadistributors/fund';
$route['area-distributors-users/edit/(:num)'] = 'areadistributors/edit/$1';
$route['area-distributors-users/delete/(:num)'] = 'areadistributors/delete/$1';





$route['admin-commission'] = 'admincommission';
$route['commission-slab'] = 'setcommissionslab';

/*------Services Pages---------*/

$route['money-transfer'] = 'moneytransfers';
$route['fund-request'] = 'fundrequests';


$route['themeCategory']='themecategory/category';
$route['themeSubCategory']='themecategory/subcategory';
$route['themeCategory/cat_add']='themecategory/cat_add';
$route['themeCategory/subcat_add']='themecategory/subcat_add';



/*  User Fron Pages*/
