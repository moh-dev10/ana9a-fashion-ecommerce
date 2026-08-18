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

                <a
                    href="<?php echo esc_url( $link ); ?>"
                    class="
                        group relative block overflow-hidden
                        aspect-[4/5]
                        bg-brand-gray-100
                        rounded-brand
                        reveal-on-scroll
                    "
                >

                    <!-- Image -->
                    <img
                        src="<?php echo esc_url( $image ); ?>"
                        alt="<?php echo esc_attr( $term->name ); ?>"
                        loading="lazy"
                        class="
                            absolute inset-0
                            w-full h-full
                            object-cover
                            transition-transform
                            duration-700
                            ease-out
                            group-hover:scale-105
                        "
                    >

                    <!-- Overlay -->
                    <div
                        class="
                            absolute inset-0
                            bg-gradient-to-t
                            from-black/70
                            via-black/10
                            to-transparent
                            transition-all
                            duration-500
                            group-hover:from-black/80
                        "
                    ></div>


                    <!-- Content -->
                    <div class="absolute inset-x-0 bottom-0 p-4 md:p-5">

                        <div class="flex items-end justify-between gap-3">

                            <div>

                                <!-- Count -->
                                <span
                                    class="
                                        block
                                        mb-1.5
                                        text-[8px]
                                        md:text-[10px]
                                        font-medium
                                        uppercase
                                        tracking-[0.14em]
                                        text-white/70
                                    "
                                >
                                    <?php
                                    printf(
                                        _n(
                                            '%s article',
                                            '%s articles',
                                            $term->count,
                                            'ana9a'
                                        ),
                                        number_format_i18n( $term->count )
                                    );
                                    ?>
                                </span>


                                <!-- Category Name -->
                                <h2
                                    class="
                                        text-base
                                        md:text-xl
                                        
                                        font-black
                                        uppercase
                                        tracking-tighter
                                        text-white
                                        leading-tight
                                        line-clamp-2
                                    "
                                >
                                    <?php echo esc_html( $term->name ); ?>
                                </h2>

                            </div>


                            <!-- Arrow -->
                            <span
                                class="
                                    w-9 h-9
                                    md:w-10 md:h-10
                                    rounded-full
                                    bg-white
                                    text-black
                                    flex items-center justify-center
                                    flex-shrink-0
                                    transition-all
                                    duration-300
                                    group-hover:translate-x-1
                                    group-hover:bg-brand-black
                                    group-hover:text-white
                                "
                            >

                                <svg
                                    class="w-4 h-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>

                            </span>

                        </div>

                    </div>

                </a>

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