<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */

$footer_form_title = get_field('footer_form_title', 'option');
$footer_form_shortcode = get_field('footer_form_shortcode', 'option');

$footer_content_1_title = get_field('footer_content_1_title', 'option');
$footer_content_1 = get_field('footer_content_1', 'option');
$footer_logo = get_field('footer_logo', 'option');
$footer_content_2 = get_field('footer_content_2', 'option');
$footer_content_3_title = get_field('footer_content_3_title', 'option');
$footer_content_3 = get_field('footer_content_3', 'option');
?>
    <div class="backtotop"></div>
    <div class="mess">
        <picture>
            <a target="_blank" href="http://m.me/serenaresortkimboi"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mess.svg" alt="messenger"></a>
        </picture>
    </div>
    <div class="container">
        <div class="subscribe-information">
            <?php if ( $footer_form_title ) { ?><h4><?php echo $footer_form_title; ?></h4><?php } ?>
            <div class="form-subscribe-information">
                <?php if ( $footer_form_shortcode ) { echo apply_shortcodes( $footer_form_shortcode ); } ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-wrapper">
                <div class="footer-left col-lg-4 col-xs-6">
                    <?php if ( $footer_content_1_title ) { ?><h4><?php echo $footer_content_1_title; ?></h4><?php } ?>
                    <?php if ( $footer_content_1 ) { echo $footer_content_1; } ?>
                </div>
                <div class="footer-mid col-lg-4 ">
                    <?php if ( $footer_logo ) { ?>
                        <a class="logo-footer" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <picture>
                                <img src="<?php echo $footer_logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
                            </picture>
                        </a>
                    <?php } ?>
                    <div class="location">
                        <?php if ( $footer_content_2 ) { echo $footer_content_2; } ?>
                    </div>
                    <?php if( have_rows('footer_socials_setting', 'option') ): ?>
                        <div class="network">
                            <?php 
                            while( have_rows('footer_socials_setting', 'option') ): the_row(); 
                            $footer_social_icon = get_sub_field('footer_social_icon');
                            $footer_social_title = get_sub_field('footer_social_title') ?: 'social icon';
                            $footer_social_link = get_sub_field('footer_social_link') ?: '#';
                            ?>
                                <?php if ( $footer_social_icon ) { ?>
                                    <a target="_blank" href="<?php echo $footer_social_link; ?>">
                                        <picture>
                                            <img src="<?php echo $footer_social_icon; ?>" alt="<?php echo $footer_social_title; ?>" />
                                        </picture>
                                    </a>
                                <?php } ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="footer-right col-lg-4 col-xs-6">
                    <?php if ( $footer_content_3_title ) { ?><h4><?php echo $footer_content_3_title; ?></h4><?php } ?>
                    <div class="office">
                        <?php if ( $footer_content_3 ) { echo $footer_content_3; } ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/jquery-3.6.0.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/jquery-ui.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/jquery.fancybox.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/main.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/slick.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/lightgallery/js/lightgallery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/lightgallery/js/lg-fullscreen.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/lightgallery/js/lg-thumbnail.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/animate/wow.js"></script>

</body>
</html>
