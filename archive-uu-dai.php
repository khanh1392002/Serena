<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();

$archive_promotion_title = get_field('archive_promotion_title', 'option');
$archive_promotion_description = get_field('archive_promotion_description', 'option');

$archive_promotion_title_en = get_field('archive_promotion_title_en', 'option');
$archive_promotion_description_en = get_field('archive_promotion_description_en', 'option');
?>

	<?php if (get_locale() == 'en_US') { ?>
		<?php if( have_rows('archive_promotion_slide_setting_en', 'option') ): ?>
			<div class="banner">
				<div class="slider-banner child">
					<?php 
					while( have_rows('archive_promotion_slide_setting_en', 'option') ): the_row(); 
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
	<?php }else{ ?>
		<?php if( have_rows('archive_promotion_slide_setting', 'option') ): ?>
			<div class="banner">
				<div class="slider-banner child">
					<?php 
					while( have_rows('archive_promotion_slide_setting', 'option') ): the_row(); 
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
	<?php } ?>
	
	<div class="container">
		<div class="endow">
			<?php if ( have_posts() ) : ?>
				<?php if (get_locale() == 'en_US') { ?>
					<?php if ( $archive_promotion_title_en ) { ?><h3><?php echo $archive_promotion_title_en; ?></h3><?php } ?>
					<?php if ( $archive_promotion_description_en ) { echo $archive_promotion_description_en; } ?>
				<?php }else{ ?>
					<?php if ( $archive_promotion_title ) { ?><h3><?php echo $archive_promotion_title; ?></h3><?php } ?>
					<?php if ( $archive_promotion_description ) { echo $archive_promotion_description; } ?>
				<?php } ?>

				<div class="endow-slider">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'archive-promotion' );

					endwhile;
					?>
				</div>

			<?php 
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
	</div>

<?php
get_footer();
