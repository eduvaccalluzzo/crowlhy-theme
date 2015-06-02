<?php get_header(); ?>



<!-- Columna Izquierda -->

<div class="wrapper clearfix archi">

	<div class="">
		<h1><?php wp_title(); ?></h1>
	</div>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->








<article class="main">




<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>

<section class="principal clearfix">
		<a href="<?php the_permalink(); ?>">
			<div class="clearfix principal-container">
	

				<?php  $thumbfincas = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>
			
				<div class="column full ilustracion-area" style="background-image: url(<?php echo $thumbfincas[0];?>);"> 
				</div>
			
				
				<div class="texto-area">
					<div class="texto-center">
						<h3><?php the_title(); ?></h3>
					</div>
				</div>
	
			</div>

			
			<div class="content-archive">
				<div>
					<p class="content-date"><?php echo get_the_date(); ?></p>
					<hr>
					<?php the_excerpt(18); ?>
				</div>
			</div>
		</a>

</section>

	


	

</article>


<?php endwhile; ?>

<?php byadr_pagination(); ?>

<?php else: ?>
<!-- no posts found -->
<?php _e( 'No se han encontrado entradas', 'byadr' ); ?>


<?php endif; ?>







		

</div>







<?php get_footer(); ?>
