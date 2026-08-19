<?php
/**
 * Latest Products Carousel
 * Theme: Ana9a - Fashion Blueprint
 */

$args = [
    'post_type'      => 'product',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
];

$query = new WP_Query( $args );
?>

<section
    class="py-16 md:py-20 bg-brand-white"
    dir="ltr"
>
    <div class="container-lux px-2 mx-auto ">

        <!-- Section Header -->
        <div class="flex justify-between items-end mb-10">

            <div class="space-y-1">

                <p class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500">
                    <?php _e( 'Nouveautés', 'ana9a' ); ?>
                </p>

                <h2 class="text-3xl font-black tracking-tighter uppercase text-brand-black">
                    <?php _e( 'Dernières pièces', 'ana9a' ); ?>
                </h2>

            </div>


            <!-- Navigation -->
            <div class="flex gap-2">

                <button
                    class="swiper-button-prev-products p-2 border border-brand-gray-200 rounded-full hover:bg-brand-black hover:text-brand-white hover:border-brand-black transition-colors cursor-pointer"
                    aria-label="<?php esc_attr_e( 'Précédent', 'ana9a' ); ?>"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             d="M15 19l-7-7 7-7"
                         />
                    </svg>
                </button>


                <button
                    class="swiper-button-next-products p-2 border border-brand-gray-200 rounded-full hover:bg-brand-black hover:text-brand-white hover:border-brand-black transition-colors cursor-pointer"
                    aria-label="<?php esc_attr_e( 'Suivant', 'ana9a' ); ?>"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                       <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </button>

            </div>

        </div>


        <!-- Products Slider -->
        <div class="swiper products-swiper overflow-hidden w-full in-carousel-styles">

            <div class="swiper-wrapper pb-4">

                <?php if ( $query->have_posts() ) : ?>

                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="swiper-slide h-auto">

                            <div class="in-carousel h-full w-full">

                                <?php
                                get_template_part(
                                    'template-parts/woocommerce/product-card'
                                );
                                ?>

                            </div>

                        </div>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>

                    <div class="p-4 text-center text-brand-gray-500 text-sm uppercase tracking-widest w-full">
                        <?php _e( 'Aucun produit disponible pour le moment.', 'ana9a' ); ?>
                    </div>

                <?php endif; ?>

            </div>


            <!-- Pagination -->
            <div class="swiper-pagination-products flex justify-center gap-2 mt-8"></div>

        </div>

    </div>
</section>