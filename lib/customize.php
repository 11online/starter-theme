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

		$this->add_tab( 'upload-new', __( 'Upload New', 'Theme Name' ), array( $this, 'tab_upload_new' ) );
		$this->add_tab( 'uploaded',   __( 'Uploaded', 'Theme Name' ),   array( $this, 'tab_uploaded' ) );

		// Early priority to occur before $this->manager->prepare_controls();
		add_action( 'customize_controls_init', array( $this, 'prepare_control' ), 5 );
	}

}

	global $wp_customize;

	$wp_customize->add_section( 'eleven-online-settings', array(
		'title'    => __( 'Custom Images', 'Theme Name' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'home-widget-1-image', array(
			'default'  => sprintf( '', get_stylesheet_directory_uri(), $home_widget_1_image ),
			'type'     => 'option',
	) );

	$wp_customize->add_control( new ElevenOnline_Image_Control( $wp_customize, 'home-widget-1-image', array(
			'label'    => sprintf( __( 'Home Widget 1 Section Image:', 'Theme Name' ), $home_widget_1_image ),
			'section'  => 'eleven-online-settings',
			'settings' => 'home-widget-1-image',
			'priority' => 1,
	) ) );
