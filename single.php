<?php get_header(); ?>



<!-- Columna Izquierda -->


<div class="wrapper clearfix singles">

	<div class="contenido clearfix column three-fourth">

			
			<h1> <?php the_title(  ); ?> </h1>	
				


	<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>

	<section class="hero clearfix s_single" style="background-image: url(<?php if(has_post_thumbnail() ) { echo $thumb[0]; } else{header_image();}?> );">
		
		

	</section>

			
				
			<!-- Seccion Posts -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
	<article class="main">

			<p class="content-date"><?php echo get_the_date(); ?></p>
				<hr>

		
			
		
			<?php the_content(); ?>


			<!-- Author -->
			<div class="autor">
				<div class="avatar">
					<?php echo get_avatar( get_the_author_meta('ID') ); ?> 
				</div>
				
				
					<h5><?php the_author_posts_link(); ?></h5>
				
				
				
					<p><?php the_author_meta( 'user_email'); ?></p>
			
				
			</div>

			

			<!-- Comentarios -->

			<?php comments_template( '', 'all', 'comment', 'trackback', 'pingback' ); ?>

			
			
			<!-- Post Relacionados -->
			<?php 
				$cat = get_the_category();
				$postid = get_the_ID();



				$arg = array (
					'cat' => $cat[0]->term_id,
					'posts_per_page' => 2,
					'post__not_in' => array($postid),
					'order' => 'DESC',
					
				);


				$related = new WP_Query( $arg );
			?>

			<?php  if ($related->have_posts() ) : ?>
				
		<div class="clearfix relacionados ">
				
				<h6>A lo mejor te interesa esto...</h6>
			
			<?php while ($related->have_posts() ) : $related->the_post(); ?>
					

				<a href="<?php the_permalink(); ?>">
					
					<div class="column half">
						
						<div class="imgzone">
							<div class="image-area"> 
								<?php the_post_thumbnail( 'mini' ); ?> 
							</div>
						</div>

						<h5><?php the_title(); ?></h5>
					</div>
				</a>
				

					<?php endwhile; ?>
		</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>



	</article>

			<?php endwhile; else: ?>
	<!-- no posts found -->
	<?php _e( 'No se han encontrado entradas', 'byadr' ); ?>


	<?php endif; ?>

</div>



	


	<!-- Columna Derecha -->

<div class=" clearfix column fourth flow-opposite">
	

	<!-- Seccion Destacado -->

	<?php 

		$arg = array (
			'post_type' => 'destacado',
			'posts_per_page' => 1,
			
		);


		$querythumb = new WP_Query( $arg );

	?>

	<?php  if ($querythumb->have_posts() ) : ?>

	<section class="destacado clearfix">	
	

		<?php while ($querythumb->have_posts() ) : $querythumb->the_post(); ?>

			<div class="clearfix destacado-container">
				
				<div class="wrapper">
					<div class="text-center">
						<a href="<?php the_permalink(); ?>">
					
							<h2>El Destacado</h2>
					
					
							<div class="imgzone">
								<div class="image-area"> 
									<?php the_post_thumbnail( 'full' ); ?> 
								</div>
							</div>
					
					
							<h3><?php the_title(); ?></h3>
					
							
						<div class="yellow">
							<?php $cat = get_the_category();
										echo $cat[0]->name;
									 ?>
						</div>	
							
						
							<?php the_excerpt(18); ?>
						</a>
					</div>
				
			</div>
			


		<?php endwhile; ?>
		</div>
	</section>

		<?php endif; ?>
		<?php wp_reset_query(); ?>



		<!-- Seccion Lo Ultimo -->
		
	<section class="noticias clearfix">
		<div class="wrapper clearfix">
				
					<h2>Lo Último</h2>
				
					<?php  
					
					$arga = array (
						'post_type' => 'noticias',
						'posts_per_page' => 3,
						'order' => 'ASC',
					);


						$querynoti = new WP_Query( $arga );

					?>

						<?php  if ($querynoti->have_posts() ) : ?>			
							
								
						<?php while ($querynoti->have_posts() ) : $querynoti->the_post();?>
						
				

						<div class="text-noti">
							
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_excerpt(18); ?>
								
								<div class="imgzone">

									<div class="image-area"> 
										<?php the_post_thumbnail( 'mini' ); ?> 
									</div>
								</div>
							</a>
						</div>
					

					<?php endwhile; ?>	
							
			</div>
	</section>

		<?php endif; ?>
		<?php wp_reset_query(); ?>






	<!-- Seccion Planes -->
	
	<section class="planes clearfix">
		<div class="wrapper clearfix">
				
					<h4 class="acordeon">Agenda</h4>
					

					
						<?php  
						
						$argi = array (
							'post_type' => 'planes',
							'posts_per_page' => 3,
						);


							$queryplan = new WP_Query( $argi );

						?>

							<?php  if ($queryplan->have_posts() ) : ?>			
								
									
							<?php while ($queryplan->have_posts() ) : $queryplan->the_post();?>
							
							<div class="column full">
							<a href="<?php the_permalink(); ?>">
								<div class="text-planes">
									
										<h3><?php the_title(); ?></h3>
										<?php the_post_thumbnail( 'mini' ); ?> 
										<?php the_excerpt(18); ?>
									
								</div>
								</a>
							</div>

						<?php endwhile; ?>	
						</dd>		
					</dl>			
			</div>			

	</section>

		<?php endif; ?>
		<?php wp_reset_query(); ?>
		

</div>

</div>



<?php get_footer(); ?>








