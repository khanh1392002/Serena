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
			<?php if ( $gia ) { ?><h5><?php echo $gia; ?></h5><?php } ?>
			<a target="_blank" href="<?php echo $header_button_link; ?>">Đặt NGAY</a>
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
				<h4>Thông tin chung</h4>
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
		<?php if ( $bang_gia || $bang_gia_mobile ) { ?>
			<h4>Bảng giá</h4>
			<p>(Giá đã bao gồm VAT và phí dịch vụ)</p>
			<?php if ( wp_is_mobile() ) { ?>
				<?php echo $bang_gia_mobile; ?>
			<?php }else{ ?>
				<div class="table-price">
					<?php echo $bang_gia; ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	<?php if( $hinh_anh ): ?>
		<div class="slider-image">
			<h4>Xem thêm hình ảnh</h4>
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
</article><!-- #post-<?php the_ID(); ?> -->
