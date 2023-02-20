<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

$single_villa_id = get_the_ID();
$single_villa_description = get_field('single_villa_description', $single_villa_id);
?>

<div class="senrena-resroom-child">
	<?php if( has_post_thumbnail()){ ?>
		<picture>
			<a href="<?php the_permalink(); ?>"><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/></a>
		</picture>
	<?php }else{?>
		<picture>
			<a href="<?php the_permalink(); ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
		</picture>
	<?php } ?>
	<div class="senrena-resroom-child-text">
		<h5><?php the_title(); ?></h5>
		<div class="serena-resroom-info">
			<?php if ( $single_villa_description ) { echo $single_villa_description; } ?>
		</div>
		<div class="serena-resroom-info-wrapper culinary">
			<?php if( have_rows('serena_resroom_info') ): ?>
				
				<?php 
				while( have_rows('serena_resroom_info') ): the_row(); 
				$serena_resroom_icon = get_sub_field('serena_resroom_icon');
				$serena_resroom_title = get_sub_field('serena_resroom_title');
				?>
					<div class="senrena-resroom-info ">
						<?php if ( $serena_resroom_icon ) { ?>
							<picture>
								<img src="<?php echo $serena_resroom_icon; ?>" alt="icon resroom">
							</picture>
						<?php } ?>
						<?php if ( $serena_resroom_title ) { ?><p><?php echo $serena_resroom_title; ?></p><?php } ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<a href="<?php the_permalink(); ?>">
			<button><?php if (get_locale() == 'en_US') { ?>Detail<?php }else{ ?>Chi tiết<?php } ?></button>
		</a>        
	</div>
</div>
