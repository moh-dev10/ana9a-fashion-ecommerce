<?php
/**
 * Fashion Categories - Circular Horizontal Scroll
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$product_categories = get_terms( [
    'taxonomy'   => 'product_cat',
    'orderby'    => 'term_id',
    'order'      => 'ASC',
    'number'     => 8,
    'hide_empty' => false,
    'exclude'    => [ get_option( 'default_product_cat' ) ],
] );

if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
?>

<section
    class="section-lux container-lux mx-auto px-6 py-16 md:py-20"
    dir="ltr"
>

    <!-- Section Header -->
    <div class="mb-10 text-center">

        <p class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500 mb-2">
            <?php _e( 'Explorez nos collections', 'ana9a' ); ?>
        </p>

        <h2 class="text-3xl md:text-4xl font-black tracking-tighter text-brand-black">
            <?php _e( 'Achetez par catégorie', 'ana9a' ); ?>
        </h2>

    </div>


    <!-- Categories -->
    <div
        class="flex gap-6 md:gap-10 overflow-x-auto
               snap-x snap-mandatory
               scrollbar-hide
               pb-4
               justify-start md:justify-center"
    >

        <?php foreach ( $product_categories as $category ) :

            $category_link = get_term_link( $category );

            $thumbnail_id = get_term_meta(
                $category->term_id,
                'thumbnail_id',
                true
            );

            $image_url = $thumbnail_id
                ? wp_get_attachment_image_url( $thumbnail_id, 'medium' )
                : get_template_directory_uri() . '/assets/img/placeholder.webp';
        ?>

            <a
                href="<?php echo esc_url( $category_link ); ?>"
                class="group shrink-0 snap-start text-center"
            >

                <!-- Circle Image -->
                <div
                    class="
                        relative
                        w-24 h-24
                        md:w-32 md:h-32
                        rounded-full
                        overflow-hidden
                        bg-brand-gray-100
                        border border-brand-gray-100
                        transition-all duration-500
                        group-hover:scale-105
                        group-hover:border-brand-black
                    "
                >

                    <img
                        src="<?php echo esc_url( $image_url ); ?>"
                        alt="<?php echo esc_attr( $category->name ); ?>"
                        loading="lazy"
                        class="
                            w-full h-full
                            object-cover
                            transition-transform
                            duration-700
                            group-hover:scale-110
                        "
                    >

                </div>


                <!-- Category Name -->
                <h3
                    class="
                        mt-4
                        text-xs md:text-sm
                        font-bold
                        tracking-wide
                        text-brand-black
                        transition-colors
                        group-hover:text-brand-gray-500
                    "
                >
                    <?php echo esc_html( $category->name ); ?>
                </h3>

            </a>

        <?php endforeach; ?>

    </div>

</section>

<?php endif; ?>