<?php
/**
 * Template name: Trang chủ
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

$banner_image = get_field('banner_image');
$banner_image_title = get_field('banner_image_title');
$banner_image_description = get_field('banner_image_description');

$section_2_title = get_field('section_2_title');
$section_2_subtitle = get_field('section_2_subtitle');
$section_2_content = get_field('section_2_content');
$section_2_button_text = get_field('section_2_button_text');
$section_2_button_link = get_field('section_2_button_link') ?: '#';

$section_3_title = get_field('section_3_title');
$section_3_subtitle = get_field('section_3_subtitle');
$section_3_onsen_post_select = get_field('section_3_onsen_post_select');

$section_4_image = get_field('section_4_image');
$section_4_title = get_field('section_4_title');
$section_4_subtitle = get_field('section_4_subtitle');
?>

<div class="banner ">
	<?php if ( $banner_image ) { ?>
        <picture class="banner-text " <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;"<?php } ?>>
            <img src="<?php echo $banner_image; ?>" alt="banner" />
        </picture>
	<?php } ?>
    <div class="text">
        <?php if ( $banner_image_title ) { ?><h4 class="text-banner"><?php echo $banner_image_title; ?></h4><?php } ?>
        <?php if ( $banner_image_description ) { ?><p><?php echo $banner_image_description; ?></p><?php } ?>
        <button class="btn-check-phong"><?php if (get_locale() == 'en_US') { ?>Check room<?php }else{ ?>Check phòng<?php } ?></button>
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
<div class="container">
    <div class="our-story "> 
        <div class="our-story-text <?php if ( !wp_is_mobile() ) { ?>wow fadeInLeft<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>>
            <?php if ( $section_2_title ) { ?><h5><?php echo $section_2_title; ?></h5><?php } ?>
            <?php if ( $section_2_subtitle ) { ?><h4><?php echo $section_2_subtitle; ?></h4><?php } ?>
            <?php if ( $section_2_content ) { ?><div class="our-story-info"> <?php  echo $section_2_content;?></div> <?php } ?>
            <?php if ( $section_2_button_text ) { ?><a href="<?php echo $section_2_button_link; ?>"><?php echo $section_2_button_text; ?></a><?php } ?>
        </div>
		<?php if( have_rows('section_2_image_setting') ): ?>
			<div class="our-story-img <?php if ( !wp_is_mobile() ) { ?>wow fadeInRight<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>>
				<?php 
				while( have_rows('section_2_image_setting') ): the_row(); 
				$section_2_image = get_sub_field('section_2_image');
				?>
					<?php if ( $section_2_image ) { ?>
						<picture>
							<img src="<?php echo $section_2_image; ?>" alt="our story image" />
						</picture>
					<?php } ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
    </div>
</div>
<div class="room-package">
    <div class="container">
        <?php if ( $section_3_title ) { ?><h5 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown"<?php } ?>><?php echo $section_3_title; ?></h5><?php } ?>
        <?php if ( $section_3_subtitle ) { ?><h3 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>><?php echo $section_3_subtitle; ?></h3><?php } ?>
        <div class="list-room <?php if ( !wp_is_mobile() ) { ?>wow fadeInUp<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;"<?php } ?>>
            <?php 
            if( have_rows('section_3_content_1') ): while( have_rows('section_3_content_1') ): the_row(); 
            $section_3_content_1_image = get_sub_field('section_3_content_1_image');
            $section_3_content_1_promotion = get_sub_field('section_3_content_1_promotion');
            $section_3_content_1_title = get_sub_field('section_3_content_1_title');
            $section_3_content_1_link = get_sub_field('section_3_content_1_link');
            ?>
                    <a href="<?php if ( $section_3_content_1_link ) { echo get_post_permalink( $section_3_content_1_link ); }else{ ?>#<?php } ?>">
                        <div class="list-room-child">
                            <picture>
                                <?php if ( $section_3_content_1_image ) { ?><img src="<?php echo $section_3_content_1_image; ?>" alt="" /><?php } ?>
                            </picture>
                            <div class="list-room-child-text">
                                <?php if ( $section_3_content_1_promotion ) { ?><p><?php echo $section_3_content_1_promotion; ?></p><?php } ?>
                                <?php if ( $section_3_content_1_title ) { ?><h6><?php echo $section_3_content_1_title; ?></h6><?php } ?>
                            </div>
                        </div>
                    </a>
            <?php 
            endwhile;
            endif;
            ?>
            <?php 
            if( have_rows('section_3_content_2') ): while( have_rows('section_3_content_2') ): the_row(); 
            $section_3_content_2_logo = get_sub_field('section_3_content_2_logo');
            $section_3_content_2_subtitle = get_sub_field('section_3_content_2_subtitle');
            $section_3_content_2_title = get_sub_field('section_3_content_2_title');
            $section_3_content_2_description = get_sub_field('section_3_content_2_description');
            $section_3_content_2_link = get_sub_field('section_3_content_2_link');
            ?>
            <div class="list-room-child-detail">
                <div class="list-room-child-detail-text">
                    <?php if ( $section_3_content_2_logo ) { ?>
                        <picture>
                            <img src="<?php echo $section_3_content_2_logo; ?>" alt="logo" />
                        </picture>
                    <?php } ?>
                    <?php if ( $section_3_content_2_subtitle ) { ?><span><?php echo $section_3_content_2_subtitle; ?></span><?php } ?>
                    <?php if ( $section_3_content_2_title ) { ?><h4><?php echo $section_3_content_2_title; ?></h4><?php } ?>
                    <?php if ( $section_3_content_2_description ) { ?><div class="list-room-info"><?php echo $section_3_content_2_description; ?></div><?php } ?>
                    <a href="<?php if ( $section_3_content_2_link ) { echo get_post_permalink( $section_3_content_2_link ); }else{ ?>#<?php } ?>"><?php if (get_locale() == 'en_US') { ?>VIEW MORE<?php }else{ ?>XEM THÊM<?php } ?></a>
                </div>
            </div>
            <?php 
            endwhile;
            endif;
            ?>
            <?php 
            if( have_rows('section_3_content_3') ): while( have_rows('section_3_content_3') ): the_row(); 
            $section_3_content_3_image = get_sub_field('section_3_content_3_image');
            $section_3_content_3_promotion = get_sub_field('section_3_content_3_promotion');
            $section_3_content_3_title = get_sub_field('section_3_content_3_title');
            $section_3_content_3_link = get_sub_field('section_3_content_3_link');
            ?>
                <a href="<?php if ( $section_3_content_3_link ) { echo get_post_permalink( $section_3_content_3_link ); }else{ ?>#<?php } ?>">
                    <div class="list-room-child">
                        <picture>
                            <?php if ( $section_3_content_3_image ) { ?><img src="<?php echo $section_3_content_3_image; ?>" alt="" /><?php } ?>
                        </picture>
                        <div class="list-room-child-text">
                            <?php if ( $section_3_content_3_promotion ) { ?><p><?php echo $section_3_content_3_promotion; ?></p><?php } ?>
                            <?php if ( $section_3_content_3_title ) { ?><h6><?php echo $section_3_content_3_title; ?></h6><?php } ?>
                        </div>
                    </div>
                </a>
            <?php 
            endwhile;
            endif;
            ?>
        </div>
        <?php 
        $args = array(  
            'post_type' => 'onsen',
            'post_status' => 'publish',
            'posts_per_page' => 2, 
            'orderby' => 'date', 
            'order' => 'DESC',
            'meta_query'    => array(
                array(
                    'key'       => 'single_onsen_sticky_post',
                    'value'     => '1',
                    'compare'   => '=',
                ),
            ),
        );
    
        $villa_content_counter = 0;
        $loop = new WP_Query( $args ); 
        
        if ( $loop->have_posts() ) :
        ?>
            <div class="villa <?php if ( !wp_is_mobile() ) { ?>wow fadeInLeft<?php } ?>">
                <?php 
                while ( $loop->have_posts() ) : $loop->the_post(); 
                $single_onsen_id = get_the_ID();
                $single_onsen_description = get_field('single_onsen_description', $single_onsen_id);
                $villa_content_counter = $villa_content_counter + 1;
                ?>
                    <?php if ( $villa_content_counter % 2 == 0 ) : ?>
                        <div class="villa-child " <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;"<?php } ?>>
                            <div class="villa-child-wrapper">
                                <div class="villa-child-text">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if ( $single_onsen_description ) { echo $single_onsen_description; } ?>
                                    <a href="<?php the_permalink(); ?>"><?php if (get_locale() == 'en_US') { ?>View more<?php }else{ ?>Xem thêm<?php } ?></a>
                                </div>
                            </div>
                            <?php if( has_post_thumbnail()){ ?>
                                <picture >
                                    <a href="<?php the_permalink(); ?>"><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/></a>
                                </picture>
                            <?php }else{?>
                                <picture>
                                    <a href="<?php the_permalink(); ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
                                </picture>
                            <?php } ?>
                        </div>
                    <?php else: ?>
                        <div class="villa-child">
                            <?php if( has_post_thumbnail()){ ?>
                                <picture>
                                    <a href="<?php the_permalink(); ?>"><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/></a>
                                </picture>
                            <?php }else{?>
                                <picture>
                                    <a href="<?php the_permalink(); ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
                                </picture>
                            <?php } ?>
                            <div class="villa-child-wrapper">
                                <div class="villa-child-text">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if ( $single_onsen_description ) { echo $single_onsen_description; } ?>
                                    <a href="<?php the_permalink(); ?>"><?php if (get_locale() == 'en_US') { ?>View more<?php }else{ ?>Xem thêm<?php } ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php
                endwhile;
                wp_reset_postdata(); 
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="overview <?php if ( !wp_is_mobile() ) { ?>wow fadeInUp<?php } ?>">
    <?php if ( $section_4_image ) { ?>
        <picture>
            <img src="<?php echo $section_4_image; ?>" alt="map">
        </picture>
    <?php } ?>
    <div class="overview-text">
        <?php if ( $section_4_title ) { ?><h5 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>><?php echo $section_4_title; ?></h5><?php } ?>
        <?php if ( $section_4_subtitle ) { ?><h3 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;"<?php } ?>><?php echo $section_4_subtitle; ?></h3><?php } ?>
    </div>
</div>

<?php
get_footer();
