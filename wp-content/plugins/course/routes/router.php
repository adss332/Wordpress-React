<?php

/**
 * Register Rest Routes for API,
 */

class Router
{
	public function __construct()
	{
		add_action( 'rest_api_init', [$this,'register'] );
	}

	public function register()
	{
		register_rest_route( 'courses/v1', '/getcourses', array(
			'methods'  => WP_REST_Server::READABLE,
			'callback' => [$this,'getCourses'],
		) );
		register_rest_route( 'courses/v1', '/getctypes', array(
			'methods'  => WP_REST_Server::READABLE,
			'callback' => [$this,'getCourseTypes'],
		) );
		register_rest_route( 'courses/v1', '/getcampuses', array(
			'methods'  => WP_REST_Server::READABLE,
			'callback' => [$this,'getCampuses'],
		) );
	}

	public function getCourses(): array
	{
		$myPosts = new WP_Query;

		$myCourses = $myPosts->query( [
			'post_type' => 'course'
		] );

		$coursesArray = [];

		foreach( $myCourses as $pst ){

			$campuses = wp_get_post_terms( $pst->ID, 'campus');
			$course_type = wp_get_post_terms( $pst->ID, 'course_type');

			$course = [
				'title' => get_the_title($pst),
				'img' => wp_get_attachment_image_url(get_post_thumbnail_id($pst),'medium'),
				'campuses' => $campuses,
				'ctype' => $course_type,
				'duration'=>get_field('Duration', $pst->ID)
			];

			$coursesArray[] = $course;
		}

		return $coursesArray;
	}

	public function getCourseTypes(): array
	{
		$terms = get_terms( 'course_type', [
			'hide_empty' => false,
		] );
		$ctypes = [];
		if( $terms && ! is_wp_error( $terms ) ){
			foreach($terms as $term){
		$ctypes[] = array(
			"name"=>$term->name,
		);}
		}
		return $ctypes;
	}

	public function getCampuses(): array
	{
		$terms = get_terms( 'campus' , [
			'hide_empty' => false,
		]);
		$campus = [];
		if( $terms && ! is_wp_error( $terms ) ){
			foreach($terms as $term){
				$campus[] = array(
					"name"=>$term->name,
				);}
		}
		return $campus;
	}
}
