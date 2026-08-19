<?php
/**
 * Featured Products
 * Theme: Ana9a - Fashion Blueprint
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$args = [
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'tax_query'      => [
        [
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => [ 'featured' ],
        ],
    ],
];

$products_query = new WP_Query( $args );
?>

<section
    class="section-lux container-lux mx-auto px-6 py:20 md:py-28"
    dir="ltr"
>

    <!-- Header -->
    <div class="flex justify-between items-end mb-12">

        <div class="space-y-1">

            <p class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500">
                <?php _e( 'Sélection', 'ana9a' ); ?>
            </p>

            <h2 class="text-3xl md:text-4xl font-black tracking-tighter uppercase text-brand-black">
                <?php _e( 'Pièces sélectionnées', 'ana9a' ); ?>
            </h2>

        </div>

        <a
            href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
            class="text-[10px] font-bold uppercase tracking-widest border-b border-brand-black pb-1 hover:text-brand-gray-500 hover:border-brand-gray-500 transition-all duration-300"
        >
            <?php _e( 'Voir tout', 'ana9a' ); ?>
        </a>

    </div>


    <!-- Products -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-12">

        <?php if ( $products_query->have_posts() ) : ?>

            <?php while ( $products_query->have_posts() ) : $products_query->the_post(); ?>

                <div class="reveal-on-scroll">

                    <?php
                    get_template_part(
                        'template-parts/woocommerce/product-card'
                    );
                    ?>

                </div>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <p class="text-sm text-brand-gray-500 uppercase tracking-widest col-span-full py-4 text-center">
                <?php _e( 'Aucun produit disponible pour le moment.', 'ana9a' ); ?>
            </p>

        <?php endif; ?>

    </div>

</section>