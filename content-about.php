<?php
/**
 * Template name: Về chúng tôi
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();

$header_button_link = get_field('header_button_link', 'option') ?: '#';

$about_form_shortcode = get_field('about_form_shortcode');

$about_us_background_image = get_field('about_us_background_image');
$about_us_image = get_field('about_us_image');
$about_us_title = get_field('about_us_title');
$about_us_description = get_field('about_us_description');
$about_us_link = get_field('about_us_link') ?: '#';

$gallery_title = get_field('gallery_title');
$gallery_video_image = get_field('gallery_video_image');
$gallery_video_youtube_link = get_field('gallery_video_youtube_link') ?: '#';
$gallery_image = get_field('gallery_image');
$gallery_image_title = get_field('gallery_image_title');
?>

<div class="banner  <?php if ( !wp_is_mobile() ) { ?>wow fadeInLeft<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;"<?php } ?>>
    <?php if( have_rows('about_banner_setting') ): ?>
        <div class="slider-banner">
            <?php 
            while( have_rows('about_banner_setting') ): the_row(); 
            $about_banner_image = get_sub_field('about_banner_image');
            $about_banner_title = get_sub_field('about_banner_title');
            $about_banner_description = get_sub_field('about_banner_description');
            ?>
                <?php if ( $about_banner_image ) { ?>
                    <div class="slider-banner-wrapper">
                        <picture class="banner-text">
                            <img src="<?php echo $about_banner_image; ?>" alt="<?php if ( $about_banner_title ) { echo $about_banner_title; }else{ ?>banner image<?php } ?>">
                        </picture>
                        <div class="text-slide-banner">
                            <?php if ( $about_banner_title ) { ?><h4 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>><?php echo $about_banner_title; ?></h4><?php } ?>
                            <?php if ( $about_banner_description ) { echo $about_banner_description; } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    
</div>

<div class="banner-about" <?php if ( $about_us_background_image ) { ?>style="background:url('<?php echo $about_us_background_image ?>'); background-position: center; background-size: cover"<?php } ?>>
    <div class="container">
        <div class="about <?php if ( !wp_is_mobile() ) { ?>wow fadeInLeft<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;"<?php } ?>>
            <?php if ( $about_us_image ) { ?>
            <picture>
                <img src="<?php echo $about_us_image; ?>" alt="about image">
            </picture>
            <?php } ?>
            <?php if ( $about_us_title ) { ?><h4><?php echo $about_us_title; ?></h4><?php } ?>
            <?php if ( $about_us_description ) { ?> <div class="desc"><?php echo $about_us_description;?></div><?php } ?>
            <!-- <p class="read-more"></p> -->
        </div>
    </div>
</div>

<div class="container">
    <?php 
    $args = array(  
        'post_type' => 'phong-nghi',
        'post_status' => 'publish',
        'posts_per_page' => 6, 
        'orderby' => 'date', 
        'order' => 'DESC',
        'meta_query'    => array(
            array(
                'key'       => 'single_villa_sticky_post',
                'value'     => '1',
                'compare'   => '=',
            ),
        ),
    );
    $loop = new WP_Query( $args ); 
    
    if ( $loop->have_posts() ) :
    ?>
        <div class="restroom">
            <h3 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>><?php if (get_locale() == 'en_GB') { ?>REST ROOM<?php }else{ ?>PHÒNG NGHỈ<?php } ?></h3>
            <div class="list-restroom <?php if ( !wp_is_mobile() ) { ?>wow fadeInUp<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;"<?php } ?>>
                <?php 
                while ( $loop->have_posts() ) : $loop->the_post(); 
                $restroom_onsen_id = get_the_ID();
                $single_villa_slide_thumb = get_field('single_villa_slide_thumb', $single_onsen_id);
                $single_villa_description = get_field('single_villa_description', $single_onsen_id);
                ?>
                    <div class="list-restroom-child">
                        <?php if ( $single_villa_slide_thumb ){ ?>
                            <picture>
                                <a href="<?php the_permalink(); ?>"><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php echo $single_villa_slide_thumb; ?>"/></a>
                            </picture>
                        <?php }else{?>
                            <picture>
                                <a href="<?php the_permalink(); ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
                            </picture>
                        <?php } ?>
                        <div class="list-restroom-child-text">
                            <h4><?php the_title(); ?></h4>
                            <div class="restroom-child-info">
                                <?php if ( $single_villa_description ) { echo $single_villa_description; } ?>
                            </div>
                            <a href="<?php the_permalink(); ?>"><?php if (get_locale() == 'en_GB') { ?>View more<?php }else{ ?>Xem thêm<?php } ?></a>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata(); 
                ?>
            </div>
        </div>
    <?php endif; ?>
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
    <div class="utilities">
        <?php 
        while ( $loop->have_posts() ) : $loop->the_post(); 
        $single_onsen_id = get_the_ID();
        $single_onsen_description = get_field('single_onsen_description', $single_onsen_id);
        $villa_content_counter = $villa_content_counter + 1;
        ?>
            <div class="utilities-wrapper <?php if ( !wp_is_mobile() ) { ?>wow fadeInLeft<?php } ?>">
                <div class="utilities-wrapper-text ">
                    <div class="utilities-wrapper-text-child ">
                        <h4><?php the_title(); ?></h4>
                        <?php if ( $single_onsen_description ) { echo $single_onsen_description; } ?>
                        <a href="<?php the_permalink(); ?>"><?php if (get_locale() == 'en_GB') { ?>View more<?php }else{ ?>Xem thêm<?php } ?></a>
                    </div>
                </div>
                <?php if( has_post_thumbnail()){ ?>
                    <picture >
                        <a href="<?php the_permalink(); ?>"><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url(); ?>"/></a>
                    </picture>
                <?php }else{?>
                    <picture >
                        <a href="<?php the_permalink(); ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/featured.jpg"/></a>
                    </picture>
                <?php } ?>
            </div>
        <?php
        endwhile;
        wp_reset_postdata(); 
        ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="library">
        <?php if ( $gallery_title ) { ?><h3 <?php if ( !wp_is_mobile() ) { ?>class="wow fadeInDown"<?php } ?>><?php echo $gallery_title; ?></h3><?php } ?>
        <div class="library-wrapper">
            <?php if ( $gallery_video_image ) { ?>
                <div class="image-main <?php if ( !wp_is_mobile() ) { ?>wow fadeInLeft<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>>
                    <picture>
                        <img src="<?php echo $gallery_video_image; ?>" alt="video image">
                        <a href="<?php echo $gallery_video_youtube_link; ?>"  data-fancybox="video">
                            <img class="play" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/video-circle.svg" alt="play">
                        </a>
                    </picture>
                </div>
            <?php } ?>
            <div class="library-image <?php if ( !wp_is_mobile() ) { ?>wow fadeInRight<?php } ?>" <?php if ( !wp_is_mobile() ) { ?>data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"<?php } ?>>
                <?php if( $gallery_image ): ?>
                    <div class="library-image-child" id="library-image-child">
                        <?php foreach( $gallery_image as $image ): ?>
                            <div class="item" data-src="<?php echo esc_url($image['url']); ?>">
                                <picture>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
                                </picture>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ( $gallery_image_title ) { ?><h4><?php echo $gallery_image_title; ?></h4><?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
