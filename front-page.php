<?php
/**
 * Ana9a - Homepage
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">

    <?php get_template_part( 'template-parts/home/hero' ); ?>
    
    <?php get_template_part( 'template-parts/home/scrolling-ticker' ); ?>
    
    <?php get_template_part( 'template-parts/home/store-features' ); ?>

    <?php get_template_part( 'template-parts/home/bento-categories' ); ?>

    <?php get_template_part( 'template-parts/home/carousel-product' ); ?>

    <?php get_template_part( 'template-parts/home/editorial-banner' ); ?>

    <?php get_template_part( 'template-parts/home/featured-products' ); ?>

    <?php get_template_part( 'template-parts/home/final-cta' ); ?>

</main>

<?php get_footer(); ?>