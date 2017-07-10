<?php

/**
 * Customize Background Image Control Class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
class ElevenOnline_Image_Control extends WP_Customize_Image_Control {

	/**
	 * Constructor.
	 *
	 * If $args['settings'] is not defined, use the $id as the setting ID.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Upload_Control::__construct()
	 *
	 * @param WP_Customize_Manager $manager
	 * @param string $id
	 * @param array $args
	 */
	public function __construct( $manager, $id, $args ) {
		$this->statuses = array( '' => __( 'No Image', '' ) );

		parent::__construct( $manager, $id, $args );

		$this->add_tab( 'upload-new', __( 'Upload New', CHILD_THEME_NAME ), array( $this, 'tab_upload_new' ) );
		$this->add_tab( 'uploaded',   __( 'Uploaded', CHILD_THEME_NAME ),   array( $this, 'tab_uploaded' ) );

		// Early priority to occur before $this->manager->prepare_controls();
		add_action( 'customize_controls_init', array( $this, 'prepare_control' ), 5 );
	}

}


	global $wp_customize;

	$wp_customize->add_section( 'eleven-online-settings', array(
		'title'    => __( 'Custom Images', CHILD_THEME_NAME ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'home-widget-1-image', array(
			'default'  => sprintf( '', get_stylesheet_directory_uri(), "" ),
			'type'     => 'option',
	) );

	$wp_customize->add_control( new ElevenOnline_Image_Control( $wp_customize, 'home-widget-1-image', array(
			'label'    => sprintf( __( 'Home Widget 1 Section Image:', CHILD_THEME_NAME ), "" ),
			'section'  => 'eleven-online-settings',
			'settings' => 'home-widget-1-image',
			'priority' => 1,
	) ) );

	$wp_customize->add_setting( 'home-widget-4-image', array(
			'default'  => sprintf( '', get_stylesheet_directory_uri(), "" ),
			'type'     => 'option',
	) );

	$wp_customize->add_control( new ElevenOnline_Image_Control( $wp_customize, 'home-widget-4-image', array(
			'label'    => sprintf( __( 'Home Widget 4 Section Image:', CHILD_THEME_NAME ), "" ),
			'section'  => 'eleven-online-settings',
			'settings' => 'home-widget-4-image',
			'priority' => 1,
	) ) );

	$wp_customize->add_setting( 'blog-hero-image', array(
			'default'  => sprintf( '', get_stylesheet_directory_uri(), "" ),
			'type'     => 'option',
	) );

	$wp_customize->add_control( new ElevenOnline_Image_Control( $wp_customize, 'blog-hero-image', array(
			'label'    => sprintf( __( 'Blog Hero Image:', CHILD_THEME_NAME ), "" ),
			'section'  => 'eleven-online-settings',
			'settings' => 'blog-hero-image',
			'priority' => 1,
	) ) );
