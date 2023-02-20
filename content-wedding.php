<?php
/**
 * Template name: Hội nghị tiệc cưới
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();

$wedding_page_description = get_field('wedding_page_description');
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
    <div class="endow-detali">
        <?php the_title( '<h1>', '</h1>' ); ?>
        <?php if ( $wedding_page_description ) { echo $wedding_page_description; } ?>
        <?php if( have_rows('wedding_page_content_setting') ): ?>
            <div class="endow-confer">
                <?php 
                while( have_rows('wedding_page_content_setting') ): the_row(); 
                $wedding_page_content_image = get_sub_field('wedding_page_content_image');
                $wedding_page_content_title = get_sub_field('wedding_page_content_title');
                $wedding_page_content_link = get_sub_field('wedding_page_content_link') ?: '#';
                ?>
                    <div class="endow-confer-child">
                        <?php if ( $wedding_page_content_image ) { ?>
                            <a href="<?php echo $wedding_page_content_link; ?>">
                            <picture>

                                <img src="<?php echo $wedding_page_content_image; ?>" alt="<?php if ( $wedding_page_content_title ) { echo $wedding_page_content_title; }else{ ?>ảnh hội nghị tiệc cưới<?php } ?>">
                            </picture>
                        </a>
                        <?php } ?>
                        <?php if ( $wedding_page_content_title ) { ?>
                            <div class="endow-confer-title">
                                <h5><a href="<?php echo $wedding_page_content_link; ?>"><?php echo $wedding_page_content_title; ?></a></h5>
                            </div>
                        <?php } ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
