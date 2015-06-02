<?php

/* Encolamos estilos y scrips
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_set_styles_js() {
		
		// Hoja estilo principal
	    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	    // Comments
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );


	    if ( !is_admin() ){
	    	// LLamamos a jQuery
    		wp_deregister_script('jquery');
			wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), false, '1.11.1', true);
			wp_enqueue_script('jquery');

	    	// Insertamos script Principal
			wp_register_script( 'main-script',  get_bloginfo('template_directory') . '/js/main.js', false, null, true);
			wp_enqueue_script('main-script');
	    }

	}

	add_action( 'wp_enqueue_scripts', 'byadr_set_styles_js' );




/* Setup inicial
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_theme_setup(){
		// Compatibilidad HTML5 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		
		// Post Thumbnails
		add_theme_support( 'post-thumbnails' ); 

		add_image_size( 'blog', 300, 260, true );
		
		add_image_size( 'mini', 540, 300, true );

		// Custom Header
		$defaults = array(
			'default-image'          => get_template_directory_uri() . '/images/bghome.jpg',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => true,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $defaults );

		// Content Width
		if ( ! isset( $content_width ) ) {
			$content_width = 960;
		}


		// Excerpt
		add_post_type_support( 'page', 'excerpt' );

	}

	add_action( 'after_setup_theme', 'byadr_theme_setup' );




/* Menus
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_register_menus() {

	    register_nav_menus(
		    array(
		      'main-menu'	=>	__( 'Menu Principal', 'byadr' ),
		      'footer-menu'	=>	__( 'Footer Menu', 'byadr' ),
		      'social-menu'	=>	__( 'Social Menu', 'byadr' ),
		      'mobile-menu'	=>	__( 'Mobile Menu', 'byadr' )
		    )
		);

	}

	add_action( 'init', 'byadr_register_menus' );






/* Widget Area
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_widgets_areas(){
		
		register_sidebar( 
			array(
				'id'            => 'footer-widget',
				'name'          => __('Widget Footer','byadr'),
				'description'   => __('Esta es la descripción del Widget','byadr'),
		        'class'         => '',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>' 
			) 
		);

	}

	add_action( 'widgets_init', 'byadr_widgets_areas' );



/* limitar cantidad de palabras en el excerpt
–––––––––––––––––––––––––––––––––––––––––––––––––– */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}






 /* Paginación
–––––––––––––––––––––––––––––––––––––––––––––––––– */
	function byadr_pagination( ) {
		$args = array(
			
			'prev_text' => __('Anterior', 'byadr'),
			'next_text' => __('Siguiente', 'byadr'),
			'type'		=> 'list',
			);
	?>

	<nav class="pageNav">
		<?php echo paginate_links( $args ); ?>
	</nav>

	<?php
	}









