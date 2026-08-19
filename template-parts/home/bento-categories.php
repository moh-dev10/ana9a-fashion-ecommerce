<?php
/**
 * Homepage — Shop by Category
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$product_categories = get_terms(
    [
        'taxonomy'   => 'product_cat',
        'parent'     => 0,
        'orderby'    => 'menu_order',
        'order'      => 'ASC',
        'number'     => 6,
        'hide_empty' => true,
        'exclude'    => [
            get_option( 'default_product_cat' ),
        ],
    ]
);

if ( empty( $product_categories ) || is_wp_error( $product_categories ) ) {
    return;
}
?>

<section
    class="container-lux mx-auto  py-20 md:py-24"
    dir="ltr"
    aria-labelledby="categories-title"
>

    <!-- Section Header -->

    <header
        class="flex flex-col md:flex-row
               md:items-end md:justify-between
               gap-6 mb-10 md:mb-12"
    >

        <div>

            <span
                class="block mb-3
                       text-[10px] md:text-[11px]
                       font-bold uppercase
                       tracking-[0.25em]
                       text-brand-text-muted"
            >
                <?php _e( 'Explorez', 'ana9a' ); ?>
            </span>

            <h2
                id="categories-title"
                class="text-3xl md:text-4xl
                       font-black uppercase
                       tracking-[-0.04em]
                       leading-none
                       text-brand-primary"
            >
                <?php _e( 'Achetez par catégorie', 'ana9a' ); ?>
            </h2>

        </div>


        <!-- Desktop CTA -->

        <a
            href="<?php echo esc_url( home_url( '/collections/' ) ); ?>"
            class="hidden md:inline-flex
                   items-center gap-3
                   text-[10px]
                   font-bold uppercase
                   tracking-[0.18em]
                   text-brand-primary
                   group"
        >

            <?php _e( 'Voir toutes les collections', 'ana9a' ); ?>

            <span
                class="text-base
                       transition-transform duration-300
                       group-hover:translate-x-1"
            >
                →
            </span>

        </a>

    </header>


    <!-- Category Grid -->

    <div
        class="grid grid-cols-2
               md:grid-cols-4
               gap-3 md:gap-5
               md:auto-rows-[260px]"
    >

        <?php foreach ( $product_categories as $index => $category ) :

            $category_link = get_term_link( $category );

            if ( is_wp_error( $category_link ) ) {
                continue;
            }

            $thumbnail_id = get_term_meta(
                $category->term_id,
                'thumbnail_id',
                true
            );

            $image_url = $thumbnail_id
                ? wp_get_attachment_image_url(
                    $thumbnail_id,
                    'large'
                )
                : get_template_directory_uri()
                    . '/assets/img/placeholder.webp';

            /*
             * Make first category larger on desktop.
             */
            $featured_class = ( 0 === $index )
                ? 'md:col-span-2 md:row-span-2'
                : '';

        ?>

            <?php
            get_template_part(
                'template-parts/woocommerce/category-card',
                null,
                [
                    'category' => $category,
                ]
            );
            ?>

        <?php endforeach; ?>

    </div>


    <!-- Mobile CTA -->

 <a
    href="<?php echo esc_url( home_url( '/collections/' ) ); ?>"
    class="
        mt-6
        flex md:hidden
        items-center justify-center gap-3
        border border-brand-primary
        bg-brand-white rounded-brand
        px-6 py-4
        text-[10px] font-bold uppercase
        tracking-[0.18em]
        text-brand-primary
        transition-all duration-300

        hover:bg-brand-primary
        hover:text-brand-white
    "
>
    <?php _e( 'Voir toutes les collections', 'ana9a' ); ?>

    <span>→</span>
</a>

</section>