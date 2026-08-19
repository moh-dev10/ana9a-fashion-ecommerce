<?php
/**
 * Desktop WooCommerce Mega Menu
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$shop_url = function_exists( 'wc_get_page_permalink' )
    ? wc_get_page_permalink( 'shop' )
    : home_url( '/' );

$main_categories = get_terms([
    'taxonomy'   => 'product_cat',
    'parent'     => 0,
    'hide_empty' => false,
]);

$priority_categories = [
    'Femme',
    'Homme',
    'Enfants',
    'Chaussures',
    'Accessoires',
];

$sorted_categories = [];

if ( ! is_wp_error( $main_categories ) ) {

    foreach ( $priority_categories as $priority_name ) {

        foreach ( $main_categories as $category ) {

            if ( $category->name === $priority_name ) {
                $sorted_categories[] = $category;
                break;
            }
        }
    }
}
?>

<nav
    class="hidden lg:flex items-center justify-center"
    aria-label="<?php esc_attr_e( 'Navigation principale', 'ana9a' ); ?>"
>

    <ul class="flex items-center gap-8 text-[11px] uppercase font-bold tracking-[0.18em] list-none m-0 p-0">

        <!-- Accueil -->
        <li>
            <a
                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="hover:opacity-50 transition-opacity duration-300"
            >
                <?php esc_html_e( 'Accueil', 'ana9a' ); ?>
            </a>
        </li>


        <?php foreach ( $sorted_categories as $category ) : ?>

            <?php
            $children = get_terms([
                'taxonomy'   => 'product_cat',
                'parent'     => $category->term_id,
                'hide_empty' => false,
            ]);

            $category_link = get_term_link( $category );
            ?>

            <li
                x-data="{ open: false }"
                @mouseenter="open = true"
                @mouseleave="open = false"
                class="relative h-full"
            >

                <!-- Category trigger -->

                <a
                    href="<?php echo esc_url( $category_link ); ?>"
                    @focus="open = true"
                    class="flex items-center gap-1.5 py-4 hover:opacity-50 transition-opacity duration-300"
                >

                    <?php echo esc_html( $category->name ); ?>

                    <?php if ( ! empty( $children ) && ! is_wp_error( $children ) ) : ?>

                        <svg
                            class="w-3 h-3 transition-transform duration-300"
                            :class="{ 'rotate-180': open }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 9l6 6 6-6"
                            />
                        </svg>

                    <?php endif; ?>

                </a>


                <?php if ( ! empty( $children ) && ! is_wp_error( $children ) ) : ?>

                    <!-- Mega Menu -->

                    <div
                        x-show="open"
                        x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-1/2 -translate-x-1/2 w-[820px] bg-white border border-brand-gray-100 shadow-xl"
                    >
                    <div class="grid grid-cols-[1fr_190px] gap-10 px-10 py-9">
                
                        <!-- Subcategories -->
                        <div>
                
                            <p class="text-[10px] font-bold tracking-[0.22em] text-brand-gray-500 mb-6">
                                <?php echo esc_html( $category->name ); ?>
                            </p>
                
                            <div class="grid grid-cols-2 gap-x-12 gap-y-3">
                
                                <?php foreach ( $children as $child ) : ?>
                
                                    <a
                                        href="<?php echo esc_url( get_term_link( $child ) ); ?>"
                                        class="block text-[13px] leading-5 font-medium tracking-normal whitespace-nowrap hover:opacity-50 transition-opacity duration-200"
                                    >
                                        <?php echo esc_html( $child->name ); ?>
                                    </a>
                
                                <?php endforeach; ?>
                
                            </div>
                
                        </div>
                
                
                        <!-- Featured -->
                        <div class="border-l border-brand-gray-100 pl-8">
                
                            <p class="text-[10px] font-bold tracking-[0.22em] text-brand-gray-500 mb-6">
                                <?php esc_html_e( 'À découvrir', 'ana9a' ); ?>
                            </p>
                
                            <div class="flex flex-col gap-3.5">
                
                                <a
                                    href="<?php echo esc_url( $shop_url ); ?>"
                                    class="text-[13px] leading-5 font-medium tracking-normal whitespace-nowrap hover:opacity-50 transition-opacity duration-200"
                                >
                                    <?php esc_html_e( 'Nouveautés', 'ana9a' ); ?>
                                </a>
                
                                <a
                                    href="<?php echo esc_url( $shop_url ); ?>"
                                    class="text-[13px] leading-5 font-medium tracking-normal whitespace-nowrap hover:opacity-50 transition-opacity duration-200"
                                >
                                 <?php esc_html_e( 'Meilleures ventes', 'ana9a' ); ?>
                                </a>
                
                                <a
                                    href="<?php echo esc_url( home_url( '/collections/' ) ); ?>"
                                    class="text-[13px] leading-5 font-medium tracking-normal whitespace-nowrap hover:opacity-50 transition-opacity duration-200"
                                >
                                     <?php esc_html_e( 'Collections', 'ana9a' ); ?>
                                </a>
                
                                <a
                                    href="<?php echo esc_url( $shop_url ); ?>"
                                    class="text-[13px] leading-5 font-medium tracking-normal whitespace-nowrap hover:opacity-50 transition-opacity duration-200"
                                >
                                    <?php esc_html_e( 'Promotions', 'ana9a' ); ?>
                                </a>
                
                            </div>
                
                        </div>
                
                    </div>
               </div>

                <?php endif; ?>

            </li>

        <?php endforeach; ?>


        <!-- Collections -->

        <li>
            <a
                href="<?php echo esc_url( home_url( '/collections/' ) ); ?>"
                class="hover:opacity-50 transition-opacity duration-300"
            >
                <?php esc_html_e( 'Collections', 'ana9a' ); ?>
            </a>
        </li>

    </ul>

               </nav>