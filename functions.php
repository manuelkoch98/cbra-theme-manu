<?php

// =========================================================================
// GRUNDFUNKTIONEN
// =========================================================================
function cbra_setup() {

	add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo');
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cbra-theme' ),
			'footer-1' => esc_html__( 'Footer 1', 'cbra-theme' ),
			'footer-2' => esc_html__( 'Footer 2', 'cbra-theme' )
		)
	);

}

add_action( 'after_setup_theme', 'cbra_setup' );

// =========================================================================
// CSS EINBINDEN
// =========================================================================
function cbra_theme_scripts() {
	wp_enqueue_style( 'cbra-theme-style', get_stylesheet_uri(), array(), false );

	wp_enqueue_script( 'cbra-theme-navigation', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'cbra_theme_scripts' );


// =========================================================================
// FARBEN CUSTOMIZER
// =========================================================================
function theme_customize_register( $wp_customize ) {
    // Text color
    $wp_customize->add_setting( 'text_color', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Primäre Farbe', 'cbra-theme' ),
    ) ) );

    // Link color
    $wp_customize->add_setting( 'link_color', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Link color', 'cbra-theme' ),
    ) ) );

    // Accent color
    $wp_customize->add_setting( 'accent_color', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Accent color', 'cbra-theme' ),
    ) ) );

    // Border color
    $wp_customize->add_setting( 'border_color', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Border color', 'cbra-theme' ),
    ) ) );

    // Sidebar background
    $wp_customize->add_setting( 'sidebar_background', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_background', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Sidebar Background', 'cbra-theme' ),
    ) ) );
}

add_action( 'customize_register', 'theme_customize_register' );


// =========================================================================
// IMPRESSUM und andere Angaben
// =========================================================================
function theme_name_register_theme_customizer( $wp_customize ) {
    $wp_customize->add_panel( 'text_blocks', array(
        'priority'       => 10,
        'theme_supports' => '',
        'title'          => __( 'Eingaben', 'cbra-theme' ),
        'description'    => __( 'Hier können Sie verschiedene Text Stellen auf ihrer Webseite ändern ', 'theme_name' ),
    ) );

	//HEADER BLOCK
    // Add section.
    $wp_customize->add_section( 'custom_title_text' , array(
        'title'    => __('Impressum','header-button'),
        'panel'    => 'text_blocks',
        'priority' => 10
    ) );

        // Add setting
        $wp_customize->add_setting( 'title_text_block', array(
            'default'           => __( '', 'header-button' ),
            'sanitize_callback' => 'sanitize_text'
        ) );
        
        // Add control
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'number',
                array(
                    'label'    => __( 'Telefonnummer', 'header-button' ),
                    'section'  => 'custom_title_text',
                    'settings' => 'title_text_block',
                    'type'     => 'number'
                )
            )
        );

        // Add setting
        $wp_customize->add_setting( 'email_text_block', array(
            'default'           => __( '', 'header-button' ),
            'sanitize_callback' => 'sanitize_text'
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'email_adress',
                array(
                    'label'    => __( 'E-Mail Adresse', 'email' ),
                    'section'  => 'custom_title_text',
                    'settings' => 'email_text_block',
                    'type'     => 'email'
                )
            )
        );
    // Sanitize text
    function sanitize_text( $text ) {
        return sanitize_text_field( $text );
    }
}
add_action( 'customize_register', 'theme_name_register_theme_customizer' );
