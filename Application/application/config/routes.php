<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['logout'] = 'login_management/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$arr = array(
    "groups_management" => "groups-management",
    "users_management" => "create",
    "login_management" => "login",
     "student/student_view/student_profile"=>"profile",
     "admin/student/student_lists"=>"studentDetails",
     "admin/student/student_admission"=>"studentAdmission",
     "admin/student/insert"=>"studentInsert",
     "admin/student/student_attendence"=>"studentAttendence"    
);

foreach ($arr as $key => $value) {
    $route["{$value}"] = "{$key}";
    $route["{$value}/insert"] = "{$key}/insert";
    $route["{$value}/view"] = "{$key}/view";
    $route["{$value}/delete/(:num)"] = "{$key}/delete/$1";
    $route["{$value}/edit/(:num)"] = "{$key}/edit/$1";
    $route["{$value}/update"] = "{$key}/update";
}