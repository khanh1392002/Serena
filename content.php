<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

$post_thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );

$category = get_the_category();
?>
<div class="title">
	<h3 class="wow fadeInLeft">TIN TỨC </h3> <span class="wow fadeInRight"><?php echo $category[0]->cat_name; ?></span>
</div>
<div class="new-wrapper">
	<div class="new-left wow fadeInLeft" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
		<div class="new-main">
			<picture>
				<img src="<?php echo $post_thumb_url; ?>" alt="<?php the_title(); ?>" />
			</picture>

			<?php
			if ( is_singular() ) :
				the_title( '<h1>', '</h1>' );
			else :
				the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
			?>

			<div class="date-new-detail">
				<p><?php echo get_the_date(); ?></p>
			</div>

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
		</div>
	</div>
	<div class="new-right wow fadeInRight" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
		<?php
		$categories = get_categories( array(
			'orderby' 		=> 'name',
			'order'   		=> 'ASC',
			'exclude' 		=> 1
		) );
		if ( $categories ) :
		?>
			<div class="tabs">
				<h5>Danh mục</h5>
				<ul>
					<?php foreach($categories as $category) {?>
						<li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		<?php endif; ?>
		
		<?php
		$post_id = get_the_ID();
		$single_cat_ids = array();
		$categories = get_the_category( $post_id );
	
		if(!empty($categories) && !is_wp_error($categories)):
			foreach ($categories as $category):
				array_push($single_cat_ids, $category->term_id);
			endforeach;
		endif;

		$hot_args = array(
			"posts_per_page" => 5,
			"orderby"        => "date",
			"order"          => "DESC",
			"cat" 			 => $single_cat_ids,
			"meta_query"     => array(
				array(
					'key'       => 'hot_news',
					'value'     => '1',
					'compare'   => '=',
				),
			),
		);      
		
		$hot_args = new WP_Query( $hot_args );
		if ( $hot_args -> have_posts() ) :
		?>
			<div class="new-hot">
				<h4>Tin nổi bật</h4>

				<?php while ( $hot_args -> have_posts() ) : $hot_args -> the_post(); ?>
					<div class="new-hot-child">
						<?php if( has_post_thumbnail()){ ?>
							<picture>
								<img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/>
							</picture>
						<?php }else{?>
							<picture>
								<img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/>
							</picture>
						<?php } ?>
						<div class="new-hot-date">
							<p><?php echo get_the_date('d/m/Y'); ?></p>
							<a href="<?php the_permalink(); ?>">
								<h5><?php echo the_title(); ?></h5>
							</a>
						</div>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php endif; ?>
	</div>
</div>
