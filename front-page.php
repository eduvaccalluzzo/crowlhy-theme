
<?php get_header(); ?>



<!-- Columna Izquierda -->


<div class="wrapper clearfix front">

	<div class="contenido clearfix column three-fourth">

		<!-- Sección Principal -->
			
			<?php 

				$args = array (
					'post_type' => 'principal',
					'posts_per_page' => 1,

				);


				$myquery = new WP_Query( $args );
			?>
			

			<?php  if ($myquery->have_posts() ) : ?>

		<section class="principal clearfix">	

			<?php while ($myquery->have_posts() ) : $myquery->the_post(); ?>

				<div class="clearfix principal-container">
					<a href="<?php the_permalink(); ?>">

						<?php  $thumbfincas = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>
					
						<div class="column full ilustracion-area" style="background-image: url(<?php echo $thumbfincas[0];?>);"> 
						</div>
					
						
						<div class="texto-area">
							<div class="texto-center">
								<h3><?php the_title(); ?></h3>
							</div>
						</div>
					</a>
				</div>


			<?php endwhile; ?>

		</section>

			<?php endif; ?>
			<?php wp_reset_query(); ?>
			
			



		<!-- Seccion Posts -->

		<?php 

			$arg = array (
				'post_type' => 'post',
				'post_per_page' => 6,
				
			);


			$querythumb = new WP_Query( $arg );

		?>

		<?php  if ($querythumb->have_posts() ) : ?>

		<section class="fincas clearfix">	

			<?php while ($querythumb->have_posts() ) : $querythumb->the_post(); ?>

				
				
				<div class="clearfix fincas-container">
					<a href="<?php the_permalink(); ?>">

						<?php  $thumbfincas = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>
						
						<div class="column half imgzone">
							<div class="img-area" style="background-image: url(<?php echo $thumbfincas[0];?>);"> 
							</div>
						</div>
						
						<div class="column half txt-area">
							<div class="text-center">
								<h3><?php the_title(); ?></h3>
								
								<div class="yellow">
									<?php $cat = get_the_category();
										echo $cat[0]->name;
									 ?>
								</div>	
								
								<p><?php echo excerpt(18); ?></p>
							</div>
						</div>
					</a>
				</div>
				

			<?php endwhile; ?>

		</section>

			<?php endif; ?>
			<?php wp_reset_query(); ?>

	</div>





<!-- Columna Derecha -->

<div class="clearfix column fourth flow-opposite">

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
			</div>


		<?php endwhile; ?>

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
								
			</div>			

	</section>

		<?php endif; ?>
		<?php wp_reset_query(); ?>
		

</div>


</div>

<?php get_footer(); ?>
