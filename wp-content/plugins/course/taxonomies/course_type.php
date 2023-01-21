<?php

/**
 * Registers the `course_type` taxonomy,
 * for use with 'course'.
 */

class CourseTypeTaxonomy
{

	public function __construct()
	{
		add_action( 'init', [$this,'course_type_init'] );
		add_filter( 'term_updated_messages', [$this,'course_type_updated_messages']);
	}

	public function course_type_init()
	{
		register_taxonomy( 'course_type', [ 'course' ], [
			'hierarchical'          => false,
			'public'                => true,
			'show_in_nav_menus'     => true,
			'show_ui'               => true,
			'show_admin_column'     => false,
			'query_var'             => true,
			'rewrite'               => true,
			'capabilities'          => [
				'manage_terms' => 'edit_posts',
				'edit_terms'   => 'edit_posts',
				'delete_terms' => 'edit_posts',
				'assign_terms' => 'edit_posts',
			],
			'labels'                => [
				'name'                       => __( 'Course types', 'YOUR-TEXTDOMAIN' ),
				'singular_name'              => _x( 'Course type', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
				'search_items'               => __( 'Search Course types', 'YOUR-TEXTDOMAIN' ),
				'popular_items'              => __( 'Popular Course types', 'YOUR-TEXTDOMAIN' ),
				'all_items'                  => __( 'All Course types', 'YOUR-TEXTDOMAIN' ),
				'parent_item'                => __( 'Parent Course type', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'          => __( 'Parent Course type:', 'YOUR-TEXTDOMAIN' ),
				'edit_item'                  => __( 'Edit Course type', 'YOUR-TEXTDOMAIN' ),
				'update_item'                => __( 'Update Course type', 'YOUR-TEXTDOMAIN' ),
				'view_item'                  => __( 'View Course type', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'               => __( 'Add New Course type', 'YOUR-TEXTDOMAIN' ),
				'new_item_name'              => __( 'New Course type', 'YOUR-TEXTDOMAIN' ),
				'separate_items_with_commas' => __( 'Separate course types with commas', 'YOUR-TEXTDOMAIN' ),
				'add_or_remove_items'        => __( 'Add or remove course types', 'YOUR-TEXTDOMAIN' ),
				'choose_from_most_used'      => __( 'Choose from the most used course types', 'YOUR-TEXTDOMAIN' ),
				'not_found'                  => __( 'No course types found.', 'YOUR-TEXTDOMAIN' ),
				'no_terms'                   => __( 'No course types', 'YOUR-TEXTDOMAIN' ),
				'menu_name'                  => __( 'Course types', 'YOUR-TEXTDOMAIN' ),
				'items_list_navigation'      => __( 'Course types list navigation', 'YOUR-TEXTDOMAIN' ),
				'items_list'                 => __( 'Course types list', 'YOUR-TEXTDOMAIN' ),
				'most_used'                  => _x( 'Most Used', 'course_type', 'YOUR-TEXTDOMAIN' ),
				'back_to_items'              => __( '&larr; Back to Course types', 'YOUR-TEXTDOMAIN' ),
			],
			'show_in_rest'          => true,
			'rest_base'             => 'course_type',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		] );

	}


	/**
	 * Sets the post updated messages for the `course_type` taxonomy.
	 *
	 * @param array $messages Post updated messages.
	 * @return array Messages for the `course_type` taxonomy.
	 */
	function course_type_updated_messages(array $messages ): array
	{

		$messages['course_type'] = [
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Course type added.', 'YOUR-TEXTDOMAIN' ),
			2 => __( 'Course type deleted.', 'YOUR-TEXTDOMAIN' ),
			3 => __( 'Course type updated.', 'YOUR-TEXTDOMAIN' ),
			4 => __( 'Course type not added.', 'YOUR-TEXTDOMAIN' ),
			5 => __( 'Course type not updated.', 'YOUR-TEXTDOMAIN' ),
			6 => __( 'Course types deleted.', 'YOUR-TEXTDOMAIN' ),
		];

		return $messages;
	}

}


