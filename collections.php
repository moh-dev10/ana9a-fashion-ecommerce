<?php
/**
 * Template Name: Collections Template
 * Theme: Ana9a (Tailwind v4 Blueprint)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<main dir="ltr" class="max-w-[1440px] mx-auto px-6 py-12 md:py-20">

    <!-- Page Header -->
    <header class="mb-10 md:mb-14 animate-reveal">

        <span class="text-[11px] font-black tracking-[0.2em] uppercase bg-brand-black text-brand-white px-3 py-1 rounded-full">
            <?php _e('DÉCOUVREZ NOS COLLECTIONS', 'ana9a'); ?>
        </span>

        <h1 class="text-3xl md:text-5xl font-black uppercase tracking-tighter text-brand-black mt-6">
            <?php _e('ACHETEZ PAR CATÉGORIE', 'ana9a'); ?>
        </h1>

        <p class="mt-4 text-sm md:text-base text-brand-gray-500 max-w-xl leading-relaxed">
            <?php _e('Découvrez notre sélection de vêtements, accessoires et pièces incontournables pensées pour accompagner votre style au quotidien.', 'ana9a'); ?>
        </p>

    </header>


<!-- Categories -->
<section>

    <?php

    $terms = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
            'orderby'    => 'count',
            'order'      => 'DESC',
            'exclude'    => array(
                get_option( 'default_product_cat' )
            ),
        )
    );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :

    ?>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-5">

            <?php foreach ( $terms as $term ) : ?>

                <?php

                if ( $term->slug === 'uncategorized' ) {
                    continue;
                }

                $thumbnail_id = get_term_meta(
                    $term->term_id,
                    'thumbnail_id',
                    true
                );

                $image = $thumbnail_id
                    ? wp_get_attachment_image_url( $thumbnail_id, 'large' )
                    : get_template_directory_uri() . '/assets/img/placeholder.webp';

                $link = get_term_link( $term );

                ?>

<?php
    get_template_part(
        'template-parts/woocommerce/category-card',
        null,
        [
            'category' => $term,
        ]
    );
    ?>

            <?php endforeach; ?>

        </div>

    <?php else : ?>

        <p class="text-brand-gray-400">
            <?php _e(
                'Aucune catégorie disponible pour le moment.',
                'ana9a'
            ); ?>
        </p>

    <?php endif; ?>

</section>

</main>

<?php get_footer(); ?>