<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

$single_promotion_id = get_the_ID();
$single_promotion_description = get_field('single_promotion_description', $single_promotion_id);
?>

<div class="endow-child">
	<?php if( has_post_thumbnail()){ ?>
		<picture>
			<img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/>
		</picture>
	<?php }else{?>
		<picture>
			<img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/>
		</picture>
	<?php } ?>
	<div class="endow-child-text">
		<div class="endow-info">
			<h4><?php the_title(); ?></h4>
			<div class="endow-info-child">
				<?php if ( $single_promotion_description ) { echo $single_promotion_description; } ?>
			</div>
		</div>
		<a href="<?php the_permalink(); ?>">Xem thêm</a>
	</div>
</div>
