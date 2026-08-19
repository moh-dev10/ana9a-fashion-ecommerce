<?php
/**
 * Shop Archive Template
 * Theme: Ana9a - French Fashion Store
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<?php if (is_shop() ) : ?>
<main class="max-w-[1440px] mx-auto px-4 py-12 md:py-16">

    <!-- Shop Header -->
    <header class="mb-14 md:mb-20">

        <div class="max-w-3xl">


            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black uppercase tracking-[-0.04em] leading-[0.9] text-brand-black animate-reveal">
                <?php
                if ( is_shop() ) {
                    esc_html_e( 'La Boutique', 'ana9a' );
                } else {
                    woocommerce_page_title();
                }
                ?>
            </h1>

            <p class="mt-6 max-w-xl text-sm md:text-base leading-relaxed text-brand-gray-500">
                Découvrez notre sélection de vêtements, chaussures et accessoires pensés pour votre style.
            </p>

        </div>

    </header>


    <?php
    /*
     * Main Product Categories
     */
    $main_categories = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'parent'     => 0,
            'hide_empty' => false,
            'exclude'    => array( get_option( 'default_product_cat' ) ),
        )
    );
    ?>

    <?php if ( ! empty( $main_categories ) && ! is_wp_error( $main_categories ) ) : ?>

        <!-- Category Showcase -->
        <section class="mb-20 md:mb-28">

            <div class="flex items-end justify-between mb-8 md:mb-10">

                <div>
                    <span class="block mb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-brand-gray-500">
                        Explorez
                    </span>

                    <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight text-brand-black">
                        Nos collections
                    </h2>
                </div>

            </div>


            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-5">

                <?php foreach ( $main_categories as $category ) : ?>

                    <?php
                    $thumbnail_id = get_term_meta(
                        $category->term_id,
                        'thumbnail_id',
                        true
                    );

                    $image_url = $thumbnail_id
                        ? wp_get_attachment_image_url( $thumbnail_id, 'large' )
                        : wc_placeholder_img_src( 'large' );
                    ?>

                    <a
                        href="<?php echo esc_url( get_term_link( $category ) ); ?>"
                        class="group relative overflow-hidden aspect-[3/4] bg-brand-gray-100"
                    >

                        <!-- Category Image -->
                        <img
                            src="<?php echo esc_url( $image_url ); ?>"
                            alt="<?php echo esc_attr( $category->name ); ?>"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        >

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/25 transition-colors duration-500"></div>


                        <!-- Content -->
                        <div class="absolute inset-x-0 bottom-0 p-5 md:p-7">

                            <div class="flex items-end justify-between gap-4 text-white">

                                <div>

                                    <h3 class="text-lg md:text-2xl font-black uppercase tracking-tight">
                                        <?php echo esc_html( $category->name ); ?>
                                    </h3>

                                    <span class="block mt-1 text-[10px] md:text-[11px] font-medium uppercase tracking-[0.15em] opacity-80">
                                        <?php
                                        printf(
                                            _n(
                                                '%s produit',
                                                '%s produits',
                                                $category->count,
                                                'ana9a'
                                            ),
                                            number_format_i18n( $category->count )
                                        );
                                        ?>
                                    </span>

                                </div>


                                <span class="flex-shrink-0 w-9 h-9 md:w-11 md:h-11 rounded-full bg-white text-black flex items-center justify-center transform group-hover:translate-x-1 transition-transform duration-300">

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

        </section>

    <?php endif; ?>


    <?php
/**
 * Nouveautés
 * Latest products
 */

$new_products = new WP_Query(
    array(
        'post_type'      => 'product',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'no_found_rows'  => true,
    )
);
?>

<?php if ( $new_products->have_posts() ) : ?>

<section class="mb-20 md:mb-28">

    <div class="flex items-end justify-between gap-6 mb-8 md:mb-10">

        <div>
            <span class="block mb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-brand-gray-500">
                Dernières arrivées
            </span>

            <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight text-brand-black">
                Nouveautés
            </h2>
        </div>

        <a
            href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
            class="hidden md:inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.15em] text-brand-black group"
        >
            Voir tout
            <span class="transition-transform duration-300 group-hover:translate-x-1">
                →
            </span>
        </a>

    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-10 md:gap-x-6">

        <?php
        $displayed_products = array();

        while ( $new_products->have_posts() ) :
            $new_products->the_post();

            $product_id = get_the_ID();

            // حماية إضافية ضد التكرار
            if ( in_array( $product_id, $displayed_products, true ) ) {
                continue;
            }

            $displayed_products[] = $product_id;
            ?>

            <div class="reveal-on-scroll">

                <?php
                wc_get_template_part( 'content', 'product' );
                ?>

            </div>

        <?php endwhile; ?>

    </div>

</section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<!-- Editorial Collection Banner -->
<section class="mb-20 md:mb-28">

    <div class="relative overflow-hidden min-h-[500px] md:min-h-[620px] bg-brand-gray-100 group">

        <!-- Background Image -->
        <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/shop-editorial.jpg' ); ?>"
            alt="Collection du moment"
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-105"
        >

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/25"></div>


        <!-- Content -->
        <div class="absolute inset-0 flex items-end">

            <div class="w-full p-7 md:p-12 lg:p-16 text-white">

                <span class="block mb-3 text-[10px] md:text-[11px] font-bold uppercase tracking-[0.25em]">
                    Collection du moment
                </span>

                <h2 class="max-w-xl text-4xl md:text-6xl lg:text-7xl font-black uppercase tracking-[-0.04em] leading-[0.9]">
                    L'élégance<br>
                    au quotidien
                </h2>

                <a
                    href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                    class="inline-flex items-center gap-3 mt-7 bg-white text-black px-6 py-3.5 text-[11px] font-bold uppercase tracking-[0.15em] hover:bg-black hover:text-white transition-colors duration-300"
                >
                    Découvrir la collection

                    <span class="text-base">
                        →
                    </span>
                </a>

            </div>

        </div>

    </div>

</section>


<?php wp_reset_postdata(); ?>

<?php endif; ?>
<section class="max-w-[1440px] mx-auto px-4 py-12 md:py-16">
    
    <!-- Products Archive Header -->
    <header class=" mb-10 md:mb-14">
    
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
    
            <!-- Title -->
            <div>
    
                <span class="block mb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-brand-gray-500">
                    Notre sélection
                </span>
    
                <h2 class="text-3xl md:text-5xl font-black uppercase tracking-[-0.03em] text-brand-black">
                    <?php
                    if ( is_shop() ) {
                        esc_html_e( 'Tous les produits', 'ana9a' );
                    } else {
                        woocommerce_page_title();
                    }
                    ?>
                </h2>
    
            </div>
    
    
            <!-- Result count + Sorting -->
            <div class="flex items-center justify-between md:justify-end gap-6">
    
                <?php
                global $wp_query;
    
                $product_count = isset( $wp_query->found_posts )
                    ? $wp_query->found_posts
                    : 0;
                ?>
    
                <span class="text-[11px] uppercase tracking-wider text-brand-gray-500">
                    <?php echo esc_html( $product_count ); ?> produits
                </span>
    
                <div class="shop-sorting">
    
                    <?php woocommerce_catalog_ordering(); ?>
    
                </div>
    
            </div>
    
        </div>
    
    </header>
    
<?php
$current_category = null;

if ( is_product_category() ) {
    $current_category = get_queried_object();
}
?>

<?php if ( $current_category ) : ?>

    <?php
    $subcategories = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'parent'     => $current_category->term_id,
            'hide_empty' => true,
            'orderby'    => 'count',
            'order'      => 'DESC',
        )
    );
    ?>

    <?php if ( ! empty( $subcategories ) && ! is_wp_error( $subcategories ) ) : ?>

        <!-- Subcategory Navigation -->
        <nav class="mb-10 md:mb-12 overflow-x-auto scrollbar-hide">

            <div class="flex items-center gap-6 md:gap-8 min-w-max border-b border-brand-gray-100">

                <?php foreach ( $subcategories as $subcategory ) : ?>

                    <a
                        href="<?php echo esc_url( get_term_link( $subcategory ) ); ?>"
                        class="
                            pb-4
                            text-[11px]
                            uppercase
                            tracking-[0.12em]
                            font-medium
                            whitespace-nowrap
                            text-brand-gray-500
                            hover:text-brand-black
                            transition-colors
                            duration-200
                        "
                    >
                        <?php echo esc_html( $subcategory->name ); ?>
                    </a>

                <?php endforeach; ?>

            </div>

        </nav>

    <?php endif; ?>

<?php endif; ?>
        <?php if ( have_posts() ) : ?>
    
    
    
            <!-- Products Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-10 md:gap-x-6 md:gap-y-14">
    
                <?php
                while ( have_posts() ) :
                    the_post();
    
                    echo '<div class="reveal-on-scroll">';
    
                    wc_get_template_part( 'content', 'product' );
    
                    echo '</div>';
    
                endwhile;
                ?>
    
            </div>
    
    
            <!-- Pagination -->
            <div class="mt-16 md:mt-24 pt-8 border-t border-brand-gray-100 flex justify-center">
    
                <div class="reveal-on-scroll">
    
                    <?php
                    do_action( 'woocommerce_after_shop_loop' );
                    ?>
    
                </div>
    
            </div>
    
    
        <?php else : ?>
    
            <!-- Empty Shop -->
            <div class="text-center py-20 bg-brand-gray-50 rounded-2xl animate-reveal reveal-on-scroll">
    
                <p class="text-brand-gray-500 font-medium">
                    <?php
                    esc_html_e(
                        'Aucun produit disponible pour le moment.',
                        'ana9a'
                    );
                    ?>
                </p>
    
            </div>
    
        <?php endif; ?>
    
</section>
</main>


<?php get_footer(); ?>