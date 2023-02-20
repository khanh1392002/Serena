<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

get_header();
?>

	<?php if( have_rows('archive_slide_setting', 'option') ): ?>
		<div class="banner">
			<div class="slider-banner child">
				<?php 
				while( have_rows('archive_slide_setting', 'option') ): the_row(); 
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
		<div class="new new-detail">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>
			<?php
			$post_id = get_the_ID();
			$cat_ids = array();
			$categories = get_the_category( $post_id );
		
			if(!empty($categories) && !is_wp_error($categories)):
				foreach ($categories as $category):
					array_push($cat_ids, $category->term_id);
				endforeach;
			endif;
		
			$current_post_type = get_post_type($post_id);
		
			$query_args = array( 
				'category__in'    => $cat_ids,
				'post_type'       => $current_post_type,
				'post__not_in'    => array($post_id),
				'posts_per_page'  => '6',
			);
		
			$related_cats_post = new WP_Query( $query_args );
		
			if( $related_cats_post->have_posts() ):
			?>
				<div class="slider-new">
					<h4 class="wow fadeInDown">TIN LIÊN QUAN</h4>
					<div class="slider-new-wrapper wow fadeInDown" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
						<?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
							<div class="slider-new-child">
								<?php if( has_post_thumbnail()){ ?>
									<picture>
										<img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/>
									</picture>
								<?php }else{?>
									<picture>
										<img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/>
									</picture>
								<?php } ?>
								<p><?php echo get_the_date(); ?></p>
								<a href="<?php the_permalink(); ?>">
									<h5><?php the_title(); ?></h5>
								</a>
							</div>
						<?php 
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php
get_footer();
