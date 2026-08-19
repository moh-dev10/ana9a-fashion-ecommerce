<?php
/**
 * Editorial Campaign Banner
 * Theme: Ana9a - Fashion Blueprint
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$image_url = get_theme_file_uri( '/assets/img/editorial-banner.webp' );
?>

<section
    class="py-16 md:py-20 bg-brand-white"
    dir="ltr"
>

        <div class="relative min-h-[520px] md:min-h-[620px] overflow-hidden">

            <!-- Background Image -->
            <img
                src="<?php echo esc_url( $image_url ); ?>"
                alt="<?php esc_attr_e( 'Nouvelle collection Ana9a', 'ana9a' ); ?>"
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 hover:scale-102"
                loading="lazy"
            >

            <!-- Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"
                aria-hidden="true"
            ></div>


            <!-- Content -->
            <div
                class="relative z-10 flex min-h-[520px] md:min-h-[620px] items-end"
            >

                <div class="max-w-2xl px-6 pb-10 md:px-12 md:pb-14 lg:px-16 lg:pb-16 text-brand-white">

                    <p class="mb-4 text-[10px] uppercase tracking-[0.35rem] text-white/75">
                        <?php _e( 'Nouvelle collection', 'ana9a' ); ?>
                    </p>

                    <h2 class="max-w-xl text-4xl md:text-6xl lg:text-7xl font-black uppercase tracking-tighter leading-[0.9]">
                        <?php _e( 'L’élégance autrement', 'ana9a' ); ?>
                    </h2>

                    <p class="mt-5 max-w-md text-sm md:text-base leading-7 text-white/80">
                        <?php _e(
                            'Des pièces pensées pour accompagner votre style avec simplicité, caractère et élégance.',
                            'ana9a'
                        ); ?>
                    </p>

                    <a
                        href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                        class="mt-7 inline-flex items-center gap-3 border border-white px-6 py-3 text-[10px] font-bold uppercase tracking-[0.2rem] text-white transition-all duration-300 hover:bg-white hover:text-black"
                    >
                        <?php _e( 'Découvrir la collection', 'ana9a' ); ?>

                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>
                    </a>

                </div>

            </div>

        </div>


</section>