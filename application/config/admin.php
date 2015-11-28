<?php
/**
 * liteCMS
 *
 * @author		Jacek Bednarek
 * @copyright          Copyright (c) 2015
 */
$config['admin_folder'] = 'admin';                                              // Admin folder and prefix name
$config['admin_theme'] = 'admin';                                               // Admin view theme name
$config['admin_url'] = base_url() . $config['admin_folder'] . '/';              // Admin url
$config['modules_path'] = APPPATH . 'modules/';                                 // Path to modules folder
$config['selected_lang'] = 'polish';                                            // Selected lang (can be change on begin in Backend_Controller)
$config['images_url'] = base_url() . 'assets/themes/' . $config['admin_theme'] . '/img/';
$config['default_admin_per_page'] = 20;                                         // Default number of elements

/**
 * Metatags
 */
$config['metatags'] = [
    'title'   => 'fitCMS',
    'version' => 'v.0.1 alfa',
];

/**
 * Users
 */
$config['users_types'] = [
    0 => lang('admin')
];

/**
 * Pages
 */
$config['pages_route_controller'] = 'pages/show/';