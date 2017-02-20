<?php

	//--------------ENQUE SCRIPTS-------------
	function RJP_scripts_styles() {

		/*   CALL ALL CSS AND SCRIPTS FOR SITE */
		wp_enqueue_style('style', get_stylesheet_uri());

	}
	add_action( 'wp_enqueue_scripts', 'RJP_scripts_styles' );
//----------------------------------------------------------------//
//THEME SETUP
//----------------------------------------------------------------//
function RJP_Redux_setup() {
	//Add Featured Image support
	add_theme_support('post-thumbnails');
	add_image_size('medium-thumbnail', 180, 180, true);
	add_image_size('banner-image', 920, 210, true);
}
add_action('after_setup_theme', 'RJP_Redux_setup');


//Customize excerpt word count length
function RJP_Redux_excerpt_length(){
	return 50;
}
add_filter('excerpt_length', 'RJP_Redux_excerpt_length');

//----------------------------------------------------------------//
//CONTACT
//----------------------------------------------------------------//

//----------------------------------------------------------------//
//Navigation Menues
//----------------------------------------------------------------//

register_nav_menus(array(
	'primary' => __( 'Primary Nav Menue')
));


//----------------------------------------------------------------//
//CUSTOM FUNCTIONS
//----------------------------------------------------------------//
function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>');
		$excerpt_length = 25;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '..');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');
//----------------------------------------------------------------//
//CMS CUSTOMIZE 
//----------------------------------------------------------------//

function RobertJPorter_customize_register($wp_customize){
	
	/* 1. SETTINGS ---------------------------------------------------	
	____ ____ ___ ___ _ _  _ ____ ____ 
	[__  |___  |   |  | |\ | | __ [__  
	___] |___  |   |  | | \| |__] ___] 
	
	----------------------------------------------------------------*/
	//Register new settings to the WP database...
		//----------------------------------------------------------------//
		//SITE STYLE SETTINGS
		//----------------------------------------------------------------//
		//Logo image 
		$wp_customize->add_setting( 'RJP_logo' ); 
		
		//connection image 
		$wp_customize->add_setting( 'RJP_connector' ); 
		
		//seperator image 
		$wp_customize->add_setting( 'RJP_seperator' ); 
		
		$wp_customize->add_setting( 'RJP_primaryBG', array(
		'default' => '#30302f'));
		
		$wp_customize->add_setting( 'RJP_secondaryBG', array(
		'default' => '#212121'));
		
		$wp_customize->add_setting( 'RJP_boost_col', array(
		'default' => '#ffa500'));
		
		$wp_customize->add_setting( 'RJP_boost_text_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_header_col', array(
		'default' => '#ffa500'));
		
		$wp_customize->add_setting( 'RJP_text_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_bar_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_menu_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_title_col', array(
		'default' => '#ffffff'));
		
		//----------------------------------------------------------------//
		//SLIDER SETTINGS
		//----------------------------------------------------------------//
		//Show COntrols?
		$wp_customize->add_setting( 'RJP_slider_controls' , array(
			'default'    => '1'
		));
		
	
		//Banner Overlay 
		$wp_customize->add_setting( 'RJP_banner_overlay_head' ); 
		$wp_customize->add_setting( 'RJP_banner_overlay_text' ); 
		$wp_customize->add_setting( 'RJP_banner_overlay_img' ); 
		
		//Banner Slide images 
		$wp_customize->add_setting( 'RJP_banner_img_00' ); 
		$wp_customize->add_setting( 'RJP_banner_img_01' ); 
		$wp_customize->add_setting( 'RJP_banner_img_02' ); 
		$wp_customize->add_setting( 'RJP_banner_img_03' ); 
		$wp_customize->add_setting( 'RJP_banner_img_04' ); 
		
		//Banner Slide links 
		$wp_customize->add_setting( 'RJP_banner_link_00' ); 
		$wp_customize->add_setting( 'RJP_banner_link_01' ); 
		$wp_customize->add_setting( 'RJP_banner_link_02' ); 
		$wp_customize->add_setting( 'RJP_banner_link_03' ); 
		$wp_customize->add_setting( 'RJP_banner_link_04' ); 
		
		//----------------------------------------------------------------//
		//INTRODUCTION SETTINGS
		//----------------------------------------------------------------//
		//Activate?
		$wp_customize->add_setting( 'RJP_intro_active' , array(
			'default'    => '1'
		));
		//Title
		$wp_customize->add_setting( 'RJP_intro_title' );
		//Body
		$wp_customize->add_setting( 'RJP_intro_body' );
		//contact
		$wp_customize->add_setting( 'RJP_intro_contact');
		
		
		//----------------------------------------------------------------//
		//CONTACT SETTINGS
		//----------------------------------------------------------------//
		//Link Tag?
		$wp_customize->add_setting( 'RJP_contact_tag' , array(
			'default'    => '1'
		));
		//Form Title
		$wp_customize->add_setting( 'RJP_contact_title' , array(
			'default'    => 'Ready when you are!'
		));
		//Subject list
		$wp_customize->add_setting( 'RJP_contact_subjectDefult' , array(
			'default'    => 'Subject Defult'
		));
		$wp_customize->add_setting( 'RJP_contact_subjectA' , array(
			'default'    => 'Subject A'
		));
		$wp_customize->add_setting( 'RJP_contact_subjectB' , array(
			'default'    => ''
		));
		$wp_customize->add_setting( 'RJP_contact_subjectC' , array(
			'default'    => ''
		));
		$wp_customize->add_setting( 'RJP_contact_subjectD' , array(
			'default'    => ''
		));
		//Name
		$wp_customize->add_setting( 'RJP_contact_name' , array(
			'default'    => 'Your Name'
		));
		//Email
		$wp_customize->add_setting( 'RJP_contact_email' , array(
			'default'    => 'Your Email'
		));
		//Body
		$wp_customize->add_setting( 'RJP_contact_body' , array(
			'default'    => 'Tell me a bit about your project'
		));
		
	/*2. SECTIONS ----------------------------------------------------
	____ ____ ____ ___ _ ____ _  _ ____ 
	[__  |___ |     |  | |  | |\ | [__  
	___] |___ |___  |  | |__| | \| ___]
	
	----------------------------------------------------------------*/
	//Define a new section (if desired) to the Theme Customizer
		
		//SLIDER SECTIONS--------------------------------------------------------------------
		//Navigation Menu
		$wp_customize->add_section('RJP_site_style', array(
			'title' => __('Site Style', 'RJP'),
			'priority' => 0,
		));
		
		$wp_customize->add_section('RJP_slider', array(
			'title' => __('Slider', 'RJP'),
			'priority' => 1,
		));
		
		//Introduction
		$wp_customize->add_section('RJP_intro', array(
			'title' => __('Introduction', 'RJP'),
			'priority' => 2,
		));
		
		
		
		//Contact
		$wp_customize->add_section('RJP_contact', array(
			'title' => __('Contact Information', 'RJP'),
			'priority' => 19,
		));
		
		
	/* 3. CONTROLS---------------------------------------------------
	____ ____ _  _ ___ ____ ____ _    ____ 
	|    |  | |\ |  |  |__/ |  | |    [__  
	|___ |__| | \|  |  |  \ |__| |___ ___] 

	----------------------------------------------------------------*/
	//Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		
		//----------------------------------------------------------------//
		//SITE STYLE CONTROLS
		//----------------------------------------------------------------//
		
		//Logo image control (defines image upload option in cms)
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_logo', array(
		'label'    => __( 'Site Logo', 'RJP' ),
		'section'  => 'RJP_site_style',
		'settings' => 'RJP_logo',
		) ) );
		
		//Connector image control.
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_connector', array(
		'label'    => __( 'Connector Image', 'RJP' ),
		'section'  => 'RJP_site_style',
		'settings' => 'RJP_connector',
		) ) );
		
		//Seperator image control.
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_seperator', array(
		'label'    => __( 'Seperator Image', 'RJP' ),
		'section'  => 'RJP_site_style',
		'settings' => 'RJP_seperator',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_primaryBG_control', array(
		'label'      => __( 'Main Background Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_primaryBG',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_secondaryBG_control', array(
		'label'      => __( 'Secondary Background Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_secondaryBG',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_boost_col_control', array(
		'label'      => __( 'Highlight Colour for buttons, etc', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_boost_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_boost_text_col_control', array(
		'label'      => __( 'Text Colour for buttons, etc', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_boost_text_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_header_col_control', array(
		'label'      => __( 'Headers Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_header_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_text_col_control', array(
		'label'      => __( 'Text Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_text_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_nav_bar_col_control', array(
		'label'      => __( 'Navigation Bar Background Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_nav_bar_col',
		) ) );
		
		
		// unprepped-------------------------------
		$wp_customize->add_setting( 'RJP_nav_bar_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_menu_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_title_col', array(
		'default' => '#ffffff'));
		
		
		//----------------------------------------------------------------//
		//SLIDER CONTROLS
		//----------------------------------------------------------------//
		
		
		//Adds Overlayed Image------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_banner_overlay_img_control', array(
		'label'    => __( 'Overlay Image (overwites text)', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_overlay_img',
		) ) );
		
		//Adds Overlayed Text------------
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_banner_overlay_head_control', array(
		'label'    => __( 'Overlay Header', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_overlay_head',
		) ) );
		
		//Adds Overlayed Text------------
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_banner_overlay_text_control', array(
		'label'    => __( 'Overlay Text', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_overlay_text',
		) ) );
		
		
		//Show controls?------------
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_slider_controls_control', array(
		'label'    => __( 'Display the slider controls?', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_slider_controls',
		'type'      => 'checkbox',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_0_control', array(
		'label'    => __( 'Header Image 0', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_00',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_0_link_control', array(
		'label'    => __( 'Header Image 0 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_00',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_1_control', array(
		'label'    => __( 'Header Image 1', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_01',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_1_link_control', array(
		'label'    => __( 'Header Image 1 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_01',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_2_control', array(
		'label'    => __( 'Header Image 2', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_02',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_2_link_control', array(
		'label'    => __( 'Header Image 2 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_02',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_3_control', array(
		'label'    => __( 'Header Image 3', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_03',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_3_link_control', array(
		'label'    => __( 'Header Image 3 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_03',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_4_control', array(
		'label'    => __( 'Header Image 4', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_04',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_4_link_control', array(
		'label'    => __( 'Header Image 4 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_04',
		) ) );
		
		//----------------------------------------------------------------//
		//INTRODUCTION SECTION
		//----------------------------------------------------------------//
		//Activate?
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_active_control', array(
		'label'    => __( 'Display the introduction?', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_active',
		'type'      => 'checkbox',
		) ) );
		
		//Title
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_title_control', array(
		'label'    => __( 'Introduction Title', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_title',
		) ) );
		
		//Body
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_body_control', array(
		'label'    => __( 'Introduction Body', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_body',
		) ) );
		
		//Contact link?
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_contact_control', array(
		'label'    => __( 'Add link to contact info', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_contact',
		'type'      => 'checkbox',
		) ) );
		
		
		//----------------------------------------------------------------//
		//BLOG CONTROLS
		//----------------------------------------------------------------//
		//Blog Parent Catagory Background Images
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_parent_catagory_BGI_01_control', array(
		'label'    => __( 'Background Image for preview window', 'RJP' ),
		'section'  => 'RJP_blog',
		'settings' => 'RJP_blog_parent_catagory_BGI_01',
		) ) );
		
		
		//----------------------------------------------------------------//
		//CONTACT CONTROLS
		//----------------------------------------------------------------//
		//Tag for Links to Contact 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_tag_control', array(
		'label'    => __( 'Text on contact link buttons', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_tag',
		) ) );
		//Form Title
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_title_control', array(
		'label'    => __( 'Tag for your contact form', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_title',
		) ) );
		
		//Subject list
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_subjectDefulte_control', array(
		'label'    => __( 'Subject Defult', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_subjectDefult',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_subjectA_control', array(
		'label'    => __( 'Subject A (optional)', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_subjectA',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_subjectB_control', array(
		'label'    => __( 'Subject B (optional)', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_subjectB',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_subjectC_control', array(
		'label'    => __( 'Subject C (optional)', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_subjectC',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_subjectD_control', array(
		'label'    => __( 'Subject D (optional)', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_subjectD',
		) ) );
		
		//Name
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_name_control', array(
		'label'    => __( 'Clients Name Box', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_name',
		) ) );
		
		//Email
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_email_control', array(
		'label'    => __( 'Clients Email Box', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_email',
		) ) );
		
		//Body
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_contact_body_control', array(
		'label'    => __( 'Clients Message', 'RJP' ),
		'section'  => 'RJP_contact',
		'settings' => 'RJP_contact_body',
		) ) );
}

/* 4. ADD ACTION */
add_action('customize_register', 'RobertJPorter_customize_register');

//Output Customize CSS
function RJP_customize_css() {
	?>
		<style type="text/css">
			p{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			h1{
				color: <?php echo get_theme_mod('RJP_header_col');?>;
			}

			h2{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			h3{
				color: <?php echo get_theme_mod('RJP_header_col');?>;
			}

			h4{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			li{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			body{
				background: <?php echo get_theme_mod('RJP_primaryBG');?>;
			}

			.primaryBG{
				background-color: <?php echo get_theme_mod('RJP_primaryBG');?>;
			}

			.secondaryBG{
				background-color: <?php echo get_theme_mod('RJP_secondaryBG');?>;
			}
			
			.buff{
				background-color: <?php echo get_theme_mod('RJP_secondaryBG');?>;
				color: <?php echo get_theme_mod('RJP_header_col');?>;
				border-color: <?php echo get_theme_mod('RJP_header_col');?>;
			}
			
			.boost{
				background-color: <?php echo get_theme_mod('RJP_boost_col');?>;
				color: <?php echo get_theme_mod('RJP_boost_text_col');?>;
				border-color: <?php echo get_theme_mod('RJP_boost_col');?>;
			}
			
			.product_button_active{
				box-shadow: 0px 0px 30px <?php echo get_theme_mod('RJP_boost_col');?>;
			}
			.product_title{
				color: <?php echo get_theme_mod('RJP_header_col');?>;
			}
			
			.contact_button{
				background-color: <?php echo get_theme_mod('RJP_boost_col');?>;
				color: <?php echo get_theme_mod('RJP_boost_text_col');?>;
				border-color: <?php echo get_theme_mod('RJP_boost_col');?>;
			}
		</style>
	<?php
}
add_action('wp_head', 'RJP_customize_css');
?>























































