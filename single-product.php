<?php get_header(); ?>

<main class="bg-white min-h-screen py-8 mx-auto max-w-[1200px] px-4 sm:px-6 lg:px-8 md:py-16">

    <div class=" mx-auto ">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            global $product;

            if ( ! $product || ! $product->exists() ) {
                continue;
            }

            $product_id    = $product->get_id();
            $product_title = $product->get_name();
            ?>

            <!-- Breadcrumb -->
            <nav
                class="flex mb-4 text-[10px] uppercase tracking-[0.2em] text-brand-gray-500 animate-reveal"
                aria-label="مسار الصفحة"
            >
                <a
                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    class="hover:text-brand-black transition-colors"
                >
                    Accueil
                </a>

                <span class="mx-2" aria-hidden="true">/</span>

                <span aria-current="page">
                    <?php echo esc_html( $product_title ); ?>
                </span>
            </nav>

            <!-- Mobile Product Info -->
            <?php if ( wp_is_mobile() ) : ?>

            <div class="mb-2 animate-reveal">
        
                <h1 class="text-3xl font-bold text-brand-black uppercase">
                    <?php echo esc_html( $product_title ); ?>
                </h1>
        
                <div
                    class="product-description text-sm text-brand-gray-500 leading-relaxed my-4"
                    dir="rtl"
                >
                    <?php echo apply_filters( 'the_content', get_the_content() ); ?>
                </div>
                
                <div class="product-price-wrapper text-2xl font-black">
                    <?php echo $product->get_price_html(); ?>
                </div>


            <?php endif; ?>

                 </div>     

            <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_0.85fr]  gap-8 xl:gap-12 ">

                <!-- =========================
                          PRODUCT MEDIA
                     ========================== -->

                     <div class="space-y-4 animate-reveal">

                      <?php
                      $main_id     = get_post_thumbnail_id( $product->get_id() );
                      $gallery_ids = $product->get_gallery_image_ids();
                      $all_images  = array_merge( [ $main_id ], $gallery_ids );
                      ?>

                      <!-- MAIN IMAGE -->

    <div
        id="main-image-wrapper"
        class="relative w-full aspect-4/5  overflow-hidden rounded-lg bg-gray-50"
    >
        <?php
        echo wp_get_attachment_image(
            $all_images[0],
            'full',
            false,
            [
                'id'    => 'main-image',
                'class' => 'absolute inset-0 w-full h-full object-cover block',
            ]
        );
        ?>
    </div>

    <div
        id="thumbnails-row"
        class="grid grid-cols-4 gap-2 mt-4"
    >
        <?php
        $index = 0;

        foreach ( $all_images as $ids ) :
        ?>

            <div class="thumb-wrapper aspect-square overflow-hidden rounded-lg">

                <?php
                echo wp_get_attachment_image(
                    $ids,
                    'thumbnail',
                    false,
                    [
                        'class'      => 'thumb-img w-full h-full object-cover rounded-lg border-4 border-transparent transition-all duration-300 ease-in-out cursor-pointer hover:opacity-80',
                        'data-full'  => wp_get_attachment_image_url( $ids, 'full' ),
                        'data-index' => $index,
                    ]
                );
                ?>

            </div>

            <?php $index++; ?>

        <?php endforeach; ?>
    </div>

</div>

<!-- =========================
         PRODUCT INFORMATION
    ========================== -->
    <div class="lg:sticky lg:top-24 self-start">

<?php if ( ! wp_is_mobile() ) : ?>

    <div class="mb-6 space-y-4 animate-reveal">
                    <!-- Category -->
            <?php
            $categories = get_the_terms(
                $product->get_id(),
                'product_cat'
            );

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :

                $main_category = reset( $categories );
            ?>
                            <a
                    href="<?php echo esc_url(
                        get_term_link( $main_category )
                    ); ?>"
                    class="inline-block mb-4
                           text-[10px] font-semibold
                           uppercase tracking-[0.2em]
                           text-brand-gray-500
                           hover:text-brand-black
                           transition-colors"
                >
                    <?php echo esc_html( $main_category->name ); ?>
                </a>

                          <?php endif; ?>
                          <!-- Product Title -->
                            <h1
                                class="text-3xl sm:text-4xl lg:text-5xl
                                       font-medium tracking-tight
                                       text-brand-black
                                       leading-[0.95]"
                            >
                                <?php echo esc_html( $product->get_name() ); ?>
                            </h1>

                             <!-- Price -->
                            <div
                                class="mt-6
                                       text-xl sm:text-2xl
                                       font-semibold text-brand-black"
                            >
                                <?php echo $product->get_price_html(); ?>
                            </div>

        <!-- Short Description -->
            <?php if ( $product->get_short_description() ) : ?>

                <div
                    class="mt-6
                           text-sm leading-7
                           text-brand-gray-500
                           max-w-lg"
                >
                    <?php
                    echo wp_kses_post(
                        $product->get_short_description()
                    );
                    ?>
                </div>

            <?php endif; ?>

        

    </div>

<?php endif; ?>





<!-- Checkout Form -->
<div class="space-y-4 animate-reveal">

    <div class="ana9a-checkout-form">

        <?php
        include get_stylesheet_directory()
            . '/inc/intergrations/algeria-delivery/templates/single-product-checkout.php';
        ?>

    </div>

    <!-- Product Trust -->
            <div
                class="mt-8 pt-6
                       border-t border-brand-gray-100
                       space-y-3"
            >

                <div class="flex items-center gap-3 text-xs text-brand-gray-500">
                    <span class="text-brand-black">✓</span>
                    Livraison disponible en Algérie
                </div>

                <div class="flex items-center gap-3 text-xs text-brand-gray-500">
                    <span class="text-brand-black">✓</span>
                    Paiement à la livraison
                </div>

                <div class="flex items-center gap-3 text-xs text-brand-gray-500">
                    <span class="text-brand-black">✓</span>
                    Commande simple et sécurisée
                </div>

            </div>

</div>


</div>
</div>


<?php
$category_ids = wc_get_product_term_ids(
    $product->get_id(),
    'product_cat'
);

$related_args = [
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'post__not_in'   => [ get_the_ID() ],
    'tax_query'      => [
        [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $category_ids,
        ],
    ],
];

$related_query = new WP_Query( $related_args );
?>

<?php if ( $related_query->have_posts() ) : ?>

    <section class="space-y-6 mt-16 animate-reveal">

        <h2 class="reveal-on-scroll text-center text-3xl font-sans font-black mb-8">
            Vous aimerez aussi
        </h2>
        


        <div class="grid md:grid-cols-4 gap-6">

            <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>

                <?php global $product; ?>

                <div class="reveal-on-scroll">
                    <?php
                    get_template_part(
                        'template-parts/woocommerce/product-card'
                    );
                    ?>
                </div>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </section>

<?php endif; ?>

<?php endwhile; ?>




<!-- Mobile Sticky CTA -->



</main>





<script>
document.addEventListener('DOMContentLoaded', () => {

    const thumbnailsRow = document.getElementById('thumbnails-row');
    const mainImage     = document.getElementById('main-image');

    if (!thumbnailsRow || !mainImage) {
        return;
    }

    const thumbs = thumbnailsRow.querySelectorAll('.thumb-img');

    const activeClasses = [
        'border-brand-black',
        'ring-2',
        'ring-brand-black/20'
    ];


    function setActiveThumbnail(activeThumb) {

        thumbs.forEach((img) => {
            img.classList.remove(...activeClasses);
            img.classList.add('border-transparent');
        });

        activeThumb.classList.remove('border-transparent');
        activeThumb.classList.add(...activeClasses);
    }


    if (thumbs.length > 0) {
        setActiveThumbnail(thumbs[0]);
    }


    thumbnailsRow.addEventListener('click', (e) => {

        const target = e.target.closest('.thumb-img');

        if (!target) {
            return;
        }

        const newSrc = target.getAttribute('data-full');

        if (!newSrc) {
            return;
        }

        mainImage.removeAttribute('srcset');
        mainImage.src = newSrc;

        setActiveThumbnail(target);

        mainImage.classList.add('opacity-70');

        setTimeout(() => {
            mainImage.classList.remove('opacity-70');
        }, 150);
    });


    const observer = new MutationObserver((mutations) => {

        mutations.forEach((mutation) => {

            if (mutation.attributeName !== 'src') {
                return;
            }

            const currentMainSrc = mainImage.getAttribute('src');

            thumbs.forEach((thumb) => {

                if (thumb.getAttribute('data-full') === currentMainSrc) {
                    setActiveThumbnail(thumb);
                }

            });

        });

    });


    observer.observe(mainImage, {
        attributes: true
    });

});
</script>

<?php get_footer(); ?>
