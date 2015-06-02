
<?php get_header(); ?>



<!-- Columna Izquierda -->

<div class="wrapper clearfix">

	
	
		






<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->





<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>

<section class="hero clearfix s_pages" style="background-image: url(<?php if(has_post_thumbnail() ) { echo $thumb[0]; } else{header_image();}?> );">
	
	<div class="texto-area">
		
			<h1 class="pag-gral" ><?php the_title(); ?></h1>
		
	</div>

</section>


<article class="main">





	
	<?php the_content(); ?>


	


<?php endwhile; else: ?>
<!-- no posts found -->
<?php _e( 'No se han encontrado entradas', 'byadr' ); ?>


<?php endif; ?>







		

</div>







<?php get_footer(); ?>
