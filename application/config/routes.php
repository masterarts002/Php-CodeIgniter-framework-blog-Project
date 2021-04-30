<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Front End Route
$route['default_controller']   = 'layout';
$route['404_override']         = 'layout/error';
$route['translate_uri_dashes'] = false;

//layout Route

$route['blog']                  = 'layout/blog';
$route['blog/(:num)']           = 'layout/blog/$1';
$route['post/(:any)']           = 'layout/post/$1';
$route['reply/(:num)']           = 'layout/addrep/$1';
$route['contact-us']               = 'layout/contact';
$route['category/(:any)']       = 'layout/category/$1';
$route['category/(:any)/(:num)']= 'layout/category/$1/$1';

$route['search']                = 'layout/search';
$route['register']              = 'layout/customer_register';
$route['login']                 = 'layout/customer_login';
$route['forgot-password']       = 'layout/forgot_password';
$route['set-new-password']      = 'layout/set_new_password';
$route['customer/set-new-pw']   = 'layout/set_new_pw';
$route['change-password']       = 'layout/change_password';
$route['customer/send-otp']     = 'layout/send_otp';
$route['customer/change-pw']    = 'layout/change_pw';
$route['customer/logout']       = 'layout/logout';
$route['customer/logincheck']   = 'layout/customer_logincheck';
$route['customer/save']         = 'layout/customer_save';
$route['verify-email']          = 'layout/register_success';



// my account Route
$route['my-account']                    = 'layout/myaccount';
$route['my-orders']                     = 'layout/myorders';
$route['address-update']                = 'layout/addressupdate';
$route['update-new-address']            = 'layout/update_new_address';

//Admin Panel Route
$route['dashboard']            = 'dashboard/index';
$route['manage/order']         = 'manageorder/manage_order';
$route['customers']            = 'dashboard/customers';
$route['manage-comments']       = 'dashboard/manage_comments';
$route['email-config']          = 'dashboard/email_config';
$route['update/email-config']         = 'dashboard/update_config';
$route['published/cmt/(:num)']   = 'dashboard/published_cmt/$1';
$route['unpublished/cmt/(:num)'] = 'dashboard/unpublished_cmt/$1';
$route['delete/cmt/(:num)']      = 'dashboard/delete_cmt/$1';
$route['contact-mail']         = 'dashboard/contact_enquiry';
$route['order/details/(:num)'] = 'manageorder/order_details/$1';
$route['order/update/(:num)/(:any)'] = 'dashboard/order_update/$1/$1';

//Category  Route List
$route['add/category']                = 'category/add_category';
$route['manage/category']             = 'category/manage_category';
$route['save/category']               = 'category/save_category';
$route['delete/category/(:num)']      = 'category/delete_category/$1';
$route['edit/category/(:num)']        = 'category/edit_category/$1';
$route['update/category/(:num)']      = 'category/update_category/$1';
$route['published/category/(:num)']   = 'category/published_category/$1';
$route['unpublished/category/(:num)'] = 'category/unpublished_category/$1';

//menu  Route List


//_footer menu  Route List
$route['add-footer-menu']                 = 'dashboard/add_footer_menu';
$route['manage-footer-menu']             = 'dashboard/manage_footer_menu';
$route['save-footer-menu']               = 'dashboard/save_footer_menu';
$route['delete-footer-menu/(:num)']      = 'dashboard/delete_footer_menu/$1';
$route['edit-footer-menu/(:num)']        = 'dashboard/edit_footer_menu/$1';
$route['update-footer-menu/(:num)']      = 'dashboard/update_footer_menu/$1';

//Post Route List
$route['add/post']                = 'post/add_post';
$route['manage/post']             = 'post/manage_post';
$route['save/post']               = 'post/save_post';
$route['delete/post/(:num)']      = 'post/delete_post/$1';
$route['edit/post/(:num)']        = 'post/edit_post/$1';
$route['update/post/(:num)']      = 'post/update_post/$1';
$route['published/post/(:num)']   = 'post/published_post/$1';
$route['unpublished/post/(:num)'] = 'post/unpublished_post/$1';


//Admin login
$route['dashboard-login']             = 'dashboard/dashboard_login';
$route['dashboard_login_check']       = 'dashboard/dashboard_login_check';
$route['dashboard-change-password']   = 'dashboard/dashboard_change_pw';
$route['save-new-password']           = 'dashboard/save_new_password';
$route['dashboard-logout']            = 'dashboard/logout';
$route['dashboard/forgot-password']   = 'dashboard/forgot_password';
$route['dashboard/set-new-password']  = 'dashboard/set_new_password';
$route['user/send-otp']               = 'dashboard/send_otp';

//Slider  Route List
$route['add/slider']                = 'slider/add_slider';
$route['manage/slider']             = 'slider/manage_slider';
$route['save/slider']               = 'slider/save_slider';
$route['delete/slider/(:num)']      = 'slider/delete_slider/$1';
$route['edit/slider/(:num)']        = 'slider/edit_slider/$1';
$route['update/slider/(:num)']      = 'slider/update_slider/$1';
$route['published/slider/(:num)']   = 'slider/published_slider/$1';
$route['unpublished/slider/(:num)'] = 'slider/unpublished_slider/$1';

//Theme client  Route List
$route['client'] = 'client';
$route['save/client']  = 'client/save_client';
$route['manage/client']  = 'client/manage_client';
$route['delete/client/(:num)']      = 'client/delete_client/$1';
$route['edit/client/(:num)']        = 'client/edit_client/$1';
$route['update/client/(:num)']      = 'client/update_client/$1';


// manage pages route
$route['manage-pages'] = 'dashboard/manage_pages';
$route['edit/page/(:num)'] = 'dashboard/edit_page/$1';
$route['update/page/(:num)'] = 'dashboard/update_page/$1';

//policy route
$route['terms'] = 'layout/terms';
$route['privacy'] = 'layout/privacy';
$route['about'] = 'layout/about';

//Site Isentity route

$route['site-identity'] = 'identity/index';
$route['save/site-identity'] = 'identity/save_details';
