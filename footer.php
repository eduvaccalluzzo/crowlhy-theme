<?php wp_footer(); ?>

<footer>
	<div class="wrapper clearfix">

		<nav class="footerNav">
			<div class="column three-fourth">
				<?php // Menu footer ?>
		
				
					<?php wp_nav_menu( 
						array( 
							'theme_location' => 'footer-menu',
							'container' => false
						) 
					); ?>
			
			</div>

			<div class="column fourth">
				
					<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widget' ); ?>
					<?php endif; ?>
				
			</div>
		</nav>
	</div>
			
</footer>



	
</body>

</html>
