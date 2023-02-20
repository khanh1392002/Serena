<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();

$archive_culinary_description = get_field('archive_culinary_description', 'option');
?>

	<?php if( have_rows('archive_culinary_slide_setting', 'option') ): ?>
		<div class="banner">
			<div class="slider-banner child">
				<?php 
				while( have_rows('archive_culinary_slide_setting', 'option') ): the_row(); 
				$archive_slide_image = get_sub_field('archive_slide_image');
				$archive_slide_image_title = get_sub_field('archive_slide_image_title');
				?>
					<?php if ( $archive_slide_image ) { ?>
						<div class="slider-banner-wrapper">
							<picture>
								<img src="<?php echo $archive_slide_image; ?>" alt="<?php if ( $archive_slide_image_title ) { echo $archive_slide_image_title; }else{ ?>banner title<?php } ?>">
							</picture>
						</div>
					<?php } ?>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="container">
		<div class="senrena-resroom">
			<?php if ( have_posts() ) : ?>
				<?php 
				the_archive_title( '<h3>', '</h3>' ); 
				if ( $archive_culinary_description ) { echo $archive_culinary_description; }
				?>

				<div class="senrena-resroom-list">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'archive-villa' );

					endwhile;
					?>
				</div>

				<?php bootstrap_pagination(); ?>
			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
	</div>

	<?php 
	$args = array(  
        'post_type' => 'phong-nghi',
        'post_status' => 'publish',
        'posts_per_page' => 9, 
        'orderby' => 'title', 
        'order' => 'ASC', 
    );

    $loop = new WP_Query( $args ); 

	if ( $loop->have_posts()) :
	?>
	<div class="slider-resroom">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="slider-resroom-child">
				<div>
					<?php if( has_post_thumbnail()){ ?>
						<picture>
							<img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/>
						</picture>
					<?php }else{?>
						<picture>
							<img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/>
						</picture>
					<?php } ?>
					<h5><?php the_title(); ?></h5>
				</div>
			</div>
		<?php 
		endwhile; 
		wp_reset_postdata();
		?>
	</div>
	<?php endif; ?>

<?php
get_footer();
