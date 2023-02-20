<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

$dich_vu_bao_gom = get_field('dich_vu_bao_gom');
$dieu_kien_ap_dung = get_field('dieu_kien_ap_dung');
$single_promotion_button_text = get_field('single_promotion_button_text', 'option');
$single_promotion_button_link = get_field('single_promotion_button_link', 'option') ?: '#';
$single_promotion_button_text_en = get_field('single_promotion_button_text_en', 'option');
$single_promotion_button_link_en = get_field('single_promotion_button_link_en', 'option') ?: '#';
?>

<?php
if ( is_singular() ) :
	the_title( '<h4>', '</h4>' );
else :
	the_title( '<h4 class="entry-title archive-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
endif;
?>

<?php
the_content(
	sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscores' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		wp_kses_post( get_the_title() )
	)
);

wp_link_pages(
	array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
		'after'  => '</div>',
	)
);
?>

<?php if ( $dich_vu_bao_gom || $dieu_kien_ap_dung ) { ?>
	<div class="endow-detali-wrapper">
		<?php if ( $dich_vu_bao_gom ) { ?>
			<div class="endow-detali-services">
				<h5><?php if (get_locale() == 'en_US') { ?>SERVICE INCLUDES<?php }else{ ?>DỊCH VỤ BAO GỒM<?php } ?></h5>
				<?php echo $dich_vu_bao_gom; ?>
			</div>
		<?php } ?>
		<?php if ( $dieu_kien_ap_dung ) { ?>
			<div class="endow-detali-accept">
				<h5><?php if (get_locale() == 'en_US') { ?>CONDITIONS OF APPLICATION<?php }else{ ?>ĐIỀU KIỆN ÁP DỤNG<?php } ?></h5>
				<?php echo $dieu_kien_ap_dung; ?>
			</div>
		<?php } ?>
	</div>

	<?php if (get_locale() == 'en_US') { ?>
		<?php if ( $single_promotion_button_text_en ) { ?>
			<a href="<?php echo $single_promotion_button_link_en; ?>">
				<button><?php echo $single_promotion_button_text_en; ?></button>
			</a>
		<?php } ?>
	<?php }else{ ?>
		<?php if ( $single_promotion_button_text ) { ?>
			<a href="<?php echo $single_promotion_button_link; ?>">
				<button><?php echo $single_promotion_button_text; ?></button>
			</a>
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php
$post_id = get_the_ID();
$current_post_type = get_post_type($post_id);

$query_args = array(
	'posts_per_page'  => 3,
	'post_type'       => $current_post_type,
	'post__not_in'    => array($post_id),
);

$related_cats_post = new WP_Query( $query_args );

if( $related_cats_post->have_posts() ):
?>
	<h4 class="related-villa-title"><?php if (get_locale() == 'en_US') { ?>Other promotions<?php }else{ ?>Các ưu đãi khác<?php } ?></h4>
	<div class="senrena-resroom-list-orther">
		<?php 
		while( $related_cats_post->have_posts() ) : $related_cats_post->the_post(); 
		$single_promotion_id = get_the_ID();
		$single_promotion_description = get_field('single_promotion_description', $single_promotion_id);
		?>
			<div class="endow-child">
				<?php if( has_post_thumbnail()){ ?>
					<picture>
						<a href="<?php the_permalink(); ?>"><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/></a>
					</picture>
				<?php }else{?>
					<picture>
						<a href="<?php the_permalink(); ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
					</picture>
				<?php } ?>
				<div class="endow-child-text">
					<div class="endow-info">
						<h4><?php the_title(); ?></h4>
						<div class="endow-info-child">
							<?php if( have_rows('single_promotion_description') ): ?>
								<ul>
									<?php 
									while( have_rows('single_promotion_description') ): the_row(); 
									$single_promotion_description_content = get_sub_field('single_promotion_description_content');
									?>
										<?php if ( $single_promotion_description_content ) { ?>
											<li><?php echo $single_promotion_description_content; ?></li>
										<?php } ?>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
					<a href="<?php the_permalink(); ?>"><?php if (get_locale() == 'en_US') { ?>View more<?php }else{ ?>Xem thêm<?php } ?></a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php 
wp_reset_postdata();
endif; 
?>
