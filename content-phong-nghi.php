<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

$header_button_link = get_field('header_button_link', 'option') ?: '#';

$single_villa_description = get_field('single_villa_description');
$single_villa_gallery = get_field('single_villa_gallery');
$thong_tin_chung = get_field('thong_tin_chung');
$bang_gia = get_field('bang_gia');
$bang_gia_mobile = get_field('bang_gia_mobile');
$hinh_anh = get_field('hinh_anh');
$gia = get_field('gia');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="room-detail">
		<div class="room-content">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title archive-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title archive-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php the_content(); ?>
			<div class="price-btn">
				<?php if ( $gia ) { ?><h5><?php echo $gia; ?></h5><?php } ?>
				<a target="_blank" href="<?php echo $header_button_link; ?>"><?php if (get_locale() == 'en_US') { ?>BOOK NOW<?php }else{ ?>ĐẶT NGAY<?php } ?></a>
			</div>	
		</div>
		<?php if( $single_villa_gallery ): ?>
			<div class="room-imgs">
				<div class="slider-room child">
					<?php foreach( $single_villa_gallery as $image ): ?>
						<div class="slider-room-wrapper">
							<picture>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
							</picture>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="room-info">
		<?php if ( $thong_tin_chung ) { ?>
			<div class="information-all">
				<h4><?php if (get_locale() == 'en_US') { ?>General information<?php }else{ ?>Thông tin chung<?php } ?></h4>
				<?php  echo $thong_tin_chung; ?>
			</div>
		<?php } ?>
		<?php if( have_rows('tien_ich') ): ?>
			<div class="room-ulti">
				<?php 
				while( have_rows('tien_ich') ): the_row(); 
				$tieu_de_tien_ich = get_sub_field('tieu_de_tien_ich');
				$noi_dung_tien_ich = get_sub_field('noi_dung_tien_ich');
				?>
					<div class="room-ulti-card">
						<?php if ( $tieu_de_tien_ich ) { ?><h5><?php echo $tieu_de_tien_ich; ?></h5><?php } ?>
						<?php if ( $noi_dung_tien_ich ) { echo $noi_dung_tien_ich; } ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="room-price price-list heading-4">
		<?php if ( wp_is_mobile() ) { ?>
			<?php if ( $bang_gia_mobile ) { ?>
				<h4><?php if (get_locale() == 'en_US') { ?>Price list<?php }else{ ?>Bảng giá<?php } ?></h4>
				<p><?php if (get_locale() == 'en_US') { ?>(Price includes VAT and service charge)<?php }else{ ?>(Giá đã bao gồm VAT và phí dịch vụ)<?php } ?></p>
				<?php echo $bang_gia_mobile; ?>
			<?php } ?>
		<?php }else{ ?>
			<?php if ( $bang_gia ) { ?>
				<h4><?php if (get_locale() == 'en_US') { ?>Price list<?php }else{ ?>Bảng giá<?php } ?></h4>
				<p><?php if (get_locale() == 'en_US') { ?>(Price includes VAT and service charge)<?php }else{ ?>(Giá đã bao gồm VAT và phí dịch vụ)<?php } ?></p>
				<div class="table-price">
					<?php echo $bang_gia; ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	<?php if( $hinh_anh ): ?>
		<div class="slider-image">
			<h4><?php if (get_locale() == 'en_US') { ?>See more pictures<?php }else{ ?>Xem thêm hình ảnh<?php } ?></h4>
			<div class="slider-image-wrapper">
				<?php foreach( $hinh_anh as $image ): ?>
					<div class="slider-image-child">
						<picture>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
						</picture>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
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
		<h4 class="related-villa-title"><?php if (get_locale() == 'en_US') { ?>Other rest rooms<?php }else{ ?>Các phòng nghỉ khác<?php } ?></h4>
		<div class="senrena-resroom-list">
			<?php while( $related_cats_post->have_posts() ) : $related_cats_post->the_post(); ?>
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
						<div class="serena-resroom-info-wrapper">
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
			<?php 
			endwhile;
			
			?>
		</div>
	<?php 
	wp_reset_postdata();
	endif; 
	?>
</article><!-- #post-<?php the_ID(); ?> -->
