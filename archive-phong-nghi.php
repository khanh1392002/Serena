<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();

$book_room_shortcode = get_field('book_room_shortcode', 'option');
$book_room_shortcode_en = get_field('book_room_shortcode_en', 'option');
$header_button_link = get_field('header_button_link', 'option') ?: '#';
$header_button_link_en = get_field('header_button_link_en', 'option') ?: '#';

$archive_villa_title = get_field('archive_villa_title', 'option');
$archive_villa_description = get_field('archive_villa_description', 'option');

$archive_villa_title_en = get_field('archive_villa_title_en', 'option');
$archive_villa_description_en = get_field('archive_villa_description_en', 'option');
?>
	<?php if (get_locale() == 'en_US') { ?>
		<?php if( have_rows('archive_villa_slide_setting_en', 'option') ): ?>
			<div class="banner">
				<div class="slider-banner child">
					<?php 
					while( have_rows('archive_villa_slide_setting_en', 'option') ): the_row(); 
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
				<?php if (get_locale() == 'en_US') { ?>
					<a href="<?php echo $header_button_link_en; ?>">
						<div class="check-room <?php if ( !wp_is_mobile() ) { ?>wow fadeIn<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>>
							<?php if ( $book_room_shortcode_en ) { echo apply_shortcodes( $book_room_shortcode_en ); } ?>
						</div>
					</a>
				<?php }else{ ?>
					<a href="<?php echo $header_button_link; ?>">
						<div class="check-room <?php if ( !wp_is_mobile() ) { ?>wow fadeIn<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>>
							<?php if ( $book_room_shortcode ) { echo apply_shortcodes( $book_room_shortcode ); } ?>
						</div>
					</a>
				<?php } ?>
			</div>
		<?php endif; ?>
	<?php }else{ ?>
		<?php if( have_rows('archive_villa_slide_setting', 'option') ): ?>
			<div class="banner">
				<div class="slider-banner child">
					<?php 
					while( have_rows('archive_villa_slide_setting', 'option') ): the_row(); 
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
		<div class="senrena-resroom">
			<?php if ( have_posts() ) : ?>
				<?php if (get_locale() == 'en_US') { ?>
					<?php if ( $archive_villa_title_en ) { ?><h3><?php echo $archive_villa_title_en; ?></h3><?php } ?>
					<?php if ( $archive_villa_description_en ) { echo $archive_villa_description_en; } ?>
				<?php }else{ ?>
					<?php if ( $archive_villa_title ) { ?><h3><?php echo $archive_villa_title; ?></h3><?php } ?>
					<?php if ( $archive_villa_description ) { echo $archive_villa_description; } ?>
				<?php } ?>

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

	<?php if (get_locale() == 'en_US') { ?>
		<?php if( have_rows('archive_villa_gallery_en', 'option') ): ?>
			<div class="slider-resroom">
				<?php 
				while( have_rows('archive_villa_gallery_en', 'option') ): the_row(); 
				$archive_villa_gallery_image = get_sub_field('archive_villa_gallery_image');
				$archive_villa_gallery_image_title = get_sub_field('archive_villa_gallery_image_title');
				$archive_villa_gallery_image_link = get_sub_field('archive_villa_gallery_image_link') ?: '#';
				?>
					<div class="slider-resroom-child">
						<div>
							<?php if( $archive_villa_gallery_image ){ ?>
								<picture>
									<a href="<?php echo $archive_villa_gallery_image_link; ?>"><img alt="<?php if ( $archive_villa_gallery_image_title ) { echo $archive_villa_gallery_image_title; }else{ ?>villa image<?php } ?>" src="<?php echo $archive_villa_gallery_image; ?>"/></a>
								</picture>
							<?php }else{?>
								<picture>
									<a href="<?php echo $archive_villa_gallery_image_link; ?>"><img alt="<?php if ( $archive_villa_gallery_image_title ) { echo $archive_villa_gallery_image_title; }else{ ?>villa image<?php } ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
								</picture>
							<?php } ?>
							<?php if ( $archive_villa_gallery_image_title ) { ?><h5><a href="<?php echo $archive_villa_gallery_image_link; ?>"><?php echo $archive_villa_gallery_image_title; ?></a></h5><?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php }else{ ?>
		<?php if( have_rows('archive_villa_gallery', 'option') ): ?>
			<div class="slider-resroom">
				<?php 
				while( have_rows('archive_villa_gallery', 'option') ): the_row(); 
				$archive_villa_gallery_image = get_sub_field('archive_villa_gallery_image');
				$archive_villa_gallery_image_title = get_sub_field('archive_villa_gallery_image_title');
				$archive_villa_gallery_image_link = get_sub_field('archive_villa_gallery_image_link') ?: '#';
				?>
					<div class="slider-resroom-child">
						<div>
							<?php if( $archive_villa_gallery_image ){ ?>
								<picture>
									<a href="<?php echo $archive_villa_gallery_image_link; ?>"><img alt="<?php if ( $archive_villa_gallery_image_title ) { echo $archive_villa_gallery_image_title; }else{ ?>villa image<?php } ?>" src="<?php echo $archive_villa_gallery_image; ?>"/></a>
								</picture>
							<?php }else{?>
								<picture>
									<a href="<?php echo $archive_villa_gallery_image_link; ?>"><img alt="<?php if ( $archive_villa_gallery_image_title ) { echo $archive_villa_gallery_image_title; }else{ ?>villa image<?php } ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
								</picture>
							<?php } ?>
							<?php if ( $archive_villa_gallery_image_title ) { ?><h5><a href="<?php echo $archive_villa_gallery_image_link; ?>"><?php echo $archive_villa_gallery_image_title; ?></a></h5><?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php } ?>
<?php
get_footer();
