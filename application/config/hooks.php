<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
// Enable hooks
$hook['pre_system'] = array(
    'class'    => '',
    'function' => 'load_hooks',
    'filename' => 'hooks.php',
    'filepath' => 'hooks'
);

// Add authentication filter
$hook['post_controller_constructor'][] = array(
    'class'    => 'Route_filters',
    'function' => 'auth_check',
    'filename' => 'Route_filters.php',
    'filepath' => 'hooks'
);
