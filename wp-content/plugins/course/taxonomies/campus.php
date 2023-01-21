<?php

/**
 * Registers the `campus` taxonomy,
 * for use with 'course'.
 */

class CampusTaxonomy
{

	public function __construct()
	{
		add_action( 'init', [$this,'campus_init']);
		add_filter( 'term_updated_messages', [$this,'campus_updated_messages']);
	}

	public function campus_init()
	{
		register_taxonomy( 'campus', [ 'course' ], [
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
				'name'                       => __( 'Campuses', 'YOUR-TEXTDOMAIN' ),
				'singular_name'              => _x( 'Campus', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
				'search_items'               => __( 'Search Campuses', 'YOUR-TEXTDOMAIN' ),
				'popular_items'              => __( 'Popular Campuses', 'YOUR-TEXTDOMAIN' ),
				'all_items'                  => __( 'All Campuses', 'YOUR-TEXTDOMAIN' ),
				'parent_item'                => __( 'Parent Campus', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'          => __( 'Parent Campus:', 'YOUR-TEXTDOMAIN' ),
				'edit_item'                  => __( 'Edit Campus', 'YOUR-TEXTDOMAIN' ),
				'update_item'                => __( 'Update Campus', 'YOUR-TEXTDOMAIN' ),
				'view_item'                  => __( 'View Campus', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'               => __( 'Add New Campus', 'YOUR-TEXTDOMAIN' ),
				'new_item_name'              => __( 'New Campus', 'YOUR-TEXTDOMAIN' ),
				'separate_items_with_commas' => __( 'Separate campuses with commas', 'YOUR-TEXTDOMAIN' ),
				'add_or_remove_items'        => __( 'Add or remove campuses', 'YOUR-TEXTDOMAIN' ),
				'choose_from_most_used'      => __( 'Choose from the most used campuses', 'YOUR-TEXTDOMAIN' ),
				'not_found'                  => __( 'No campuses found.', 'YOUR-TEXTDOMAIN' ),
				'no_terms'                   => __( 'No campuses', 'YOUR-TEXTDOMAIN' ),
				'menu_name'                  => __( 'Campuses', 'YOUR-TEXTDOMAIN' ),
				'items_list_navigation'      => __( 'Campuses list navigation', 'YOUR-TEXTDOMAIN' ),
				'items_list'                 => __( 'Campuses list', 'YOUR-TEXTDOMAIN' ),
				'most_used'                  => _x( 'Most Used', 'campus', 'YOUR-TEXTDOMAIN' ),
				'back_to_items'              => __( '&larr; Back to Campuses', 'YOUR-TEXTDOMAIN' ),
			],
			'show_in_rest'          => true,
			'rest_base'             => 'campus',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		] );

	}


	/**
	 * Sets the post updated messages for the `campus` taxonomy.
	 *
	 * @param array $messages Post updated messages.
	 * @return array Messages for the `campus` taxonomy.
	 */
	public function campus_updated_messages(array $messages ): array
	{
		$messages['campus'] = [
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Campus added.', 'YOUR-TEXTDOMAIN' ),
			2 => __( 'Campus deleted.', 'YOUR-TEXTDOMAIN' ),
			3 => __( 'Campus updated.', 'YOUR-TEXTDOMAIN' ),
			4 => __( 'Campus not added.', 'YOUR-TEXTDOMAIN' ),
			5 => __( 'Campus not updated.', 'YOUR-TEXTDOMAIN' ),
			6 => __( 'Campuses deleted.', 'YOUR-TEXTDOMAIN' ),
		];

		return $messages;
	}

}
