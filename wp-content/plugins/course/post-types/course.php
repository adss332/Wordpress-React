<?php

/**
 * Registers the `course` post type.
 */

class CoursePostType{

	public function __construct()
	{
		add_action( 'init',[$this,'course_init']);
		add_filter( 'post_updated_messages',[$this,'course_updated_messages']);
		add_filter( 'bulk_post_updated_messages', [$this,'course_bulk_updated_messages'], 10, 2 );
	}

	public function course_init()
	{
		register_post_type(
			'course',
			[
				'labels'                => [
					'name'                  => __( 'Courses', 'course' ),
					'singular_name'         => __( 'Course', 'course' ),
					'all_items'             => __( 'All Courses', 'course' ),
					'archives'              => __( 'Course Archives', 'course' ),
					'attributes'            => __( 'Course Attributes', 'course' ),
					'insert_into_item'      => __( 'Insert into Course', 'course' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Course', 'course' ),
					'featured_image'        => _x( 'Featured Image', 'course', 'course' ),
					'set_featured_image'    => _x( 'Set featured image', 'course', 'course' ),
					'remove_featured_image' => _x( 'Remove featured image', 'course', 'course' ),
					'use_featured_image'    => _x( 'Use as featured image', 'course', 'course' ),
					'filter_items_list'     => __( 'Filter Courses list', 'course' ),
					'items_list_navigation' => __( 'Courses list navigation', 'course' ),
					'items_list'            => __( 'Courses list', 'course' ),
					'new_item'              => __( 'New Course', 'course' ),
					'add_new'               => __( 'Add New', 'course' ),
					'add_new_item'          => __( 'Add New Course', 'course' ),
					'edit_item'             => __( 'Edit Course', 'course' ),
					'view_item'             => __( 'View Course', 'course' ),
					'view_items'            => __( 'View Courses', 'course' ),
					'search_items'          => __( 'Search Courses', 'course' ),
					'not_found'             => __( 'No Courses found', 'course' ),
					'not_found_in_trash'    => __( 'No Courses found in trash', 'course' ),
					'parent_item_colon'     => __( 'Parent Course:', 'course' ),
					'menu_name'             => __( 'Courses', 'course' ),
				],
				'public'                => true,
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'supports'              => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ],
				'rewrite'               => true,
				'query_var'             => true,
				'taxonomies'			=>['campus','type'],
				'menu_position'         => null,
				'menu_icon'             => 'dashicons-admin-post',
				'show_in_rest'          => true,
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			]
		);

	}


	/**
	 * Sets the post updated messages for the `course` post type.
	 *
	 * @param array $messages Post updated messages.
	 * @return array Messages for the `course` post type.
	 */
	public function course_updated_messages(array $messages ): array
	{
		global $post;

		$permalink = get_permalink( $post );

		$messages['course'] = [
			0  => '', // Unused. Messages start at index 1.
			/* translators: %s: post permalink */
			1  => sprintf( __( 'Course updated. <a target="_blank" href="%s">View Course</a>', 'course' ), esc_url( $permalink ) ),
			2  => __( 'Custom field updated.', 'course' ),
			3  => __( 'Custom field deleted.', 'course' ),
			4  => __( 'Course updated.', 'course' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Course restored to revision from %s', 'course' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			/* translators: %s: post permalink */
			6  => sprintf( __( 'Course published. <a href="%s">View Course</a>', 'course' ), esc_url( $permalink ) ),
			7  => __( 'Course saved.', 'course' ),
			/* translators: %s: post permalink */
			8  => sprintf( __( 'Course submitted. <a target="_blank" href="%s">Preview Course</a>', 'course' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
			9  => sprintf( __( 'Course scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Course</a>', 'course' ), date_i18n( __( 'M j, Y @ G:i', 'course' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
			/* translators: %s: post permalink */
			10 => sprintf( __( 'Course draft updated. <a target="_blank" href="%s">Preview Course</a>', 'course' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		];

		return $messages;
	}



	/**
	 * Sets the bulk post updated messages for the `course` post type.
	 *
	 * @param array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
	 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
	 * @param int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
	 * @return array Bulk messages for the `course` post type.
	 */
	public function course_bulk_updated_messages(array $bulk_messages, array $bulk_counts ): array
	{
		global $post;

		$bulk_messages['course'] = [
			/* translators: %s: Number of Courses. */
			'updated'   => _n( '%s Course updated.', '%s Courses updated.', $bulk_counts['updated'], 'course' ),
			'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Course not updated, somebody is editing it.', 'course' ) :
				/* translators: %s: Number of Courses. */
				_n( '%s Course not updated, somebody is editing it.', '%s Courses not updated, somebody is editing them.', $bulk_counts['locked'], 'course' ),
			/* translators: %s: Number of Courses. */
			'deleted'   => _n( '%s Course permanently deleted.', '%s Courses permanently deleted.', $bulk_counts['deleted'], 'course' ),
			/* translators: %s: Number of Courses. */
			'trashed'   => _n( '%s Course moved to the Trash.', '%s Courses moved to the Trash.', $bulk_counts['trashed'], 'course' ),
			/* translators: %s: Number of Courses. */
			'untrashed' => _n( '%s Course restored from the Trash.', '%s Courses restored from the Trash.', $bulk_counts['untrashed'], 'course' ),
		];

		return $bulk_messages;
	}

}
