<?php
/**
 * Plugin Name:     Custom Course
 * Plugin URI:      none
 * Description:     Custom course
 * Author:          Nik Nyn
 * Author URI:      none
 * Text Domain:     course
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Course
 */
include plugin_dir_path(__FILE__) . 'post-types/course.php';
include plugin_dir_path(__FILE__) . 'taxonomies/course_type.php';
include plugin_dir_path(__FILE__) . 'taxonomies/campus.php';
include plugin_dir_path(__FILE__) . 'routes/router.php';
include plugin_dir_path(__FILE__) . 'vendor/autoload.php';
use StoutLogic\AcfBuilder\FieldsBuilder;

if(!defined('ABSPATH')){
	die;
}

class MyCourses
{
	private CoursePostType $coursePostType;
	private CampusTaxonomy $campusTaxonomy;
	private CourseTypeTaxonomy $courseTypeTaxonomy;
	private Router $router;

	public function __construct(CoursePostType $coursePostType,CampusTaxonomy $campusTaxonomy,CourseTypeTaxonomy $courseTypeTaxonomy,Router $router)
	{
		$this->coursePostType = $coursePostType;
		$this->campusTaxonomy = $campusTaxonomy;
		$this->courseTypeTaxonomy = $courseTypeTaxonomy;
		$this->router = $router;
	}

	static function activation(){
		flush_rewrite_rules();
	}

	static function deactivation(){
		flush_rewrite_rules();
	}
}

if(class_exists("MyCourses")){
	$myCourses = new MyCourses(new CoursePostType(),new CampusTaxonomy(),new CourseTypeTaxonomy(),new Router());
	register_activation_hook(__FILE__,[$myCourses,'activation']);
	register_deactivation_hook(__FILE__,[$myCourses,'deactivation']);
}

/**
 * Register ACF fields
 */
$banner = new FieldsBuilder('Additional info');
$banner
	->addText('Duration')
	->addText('Course code')
	->setLocation('post_type', '==', 'course');

add_action('acf/init', function() use ($banner) {
	acf_add_local_field_group($banner->build());
});


