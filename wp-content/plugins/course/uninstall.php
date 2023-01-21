<?php

if(!defined('WP_UNINSTALL_PLUGIN')){
	die;
}

$courses = get_posts(array('post_type'=>'course','numberposts'=>-1));

foreach ($courses as $course){
	  wp_delete_post($course->ID,true);
}

$campuses = get_terms( 'campus' );

foreach ($campuses as $campus){
	wp_delete_term($campus->ID,'campus');
}

$ctypes = get_terms( 'course_type' );

foreach ($ctypes as $ctype){
	wp_delete_term($ctype->ID,'course_type');
}
