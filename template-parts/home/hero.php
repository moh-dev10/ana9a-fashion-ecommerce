<?php
/**
 * Fashion Hero Section
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$shop_url        = wc_get_page_permalink( 'shop' );
$collections_url = home_url( '/collections/' );
?>

<section
    class="relative isolate w-full min-h-[78vh] md:min-h-[88vh] overflow-hidden bg-brand-white"
    aria-labelledby="hero-title"
>

    <!-- =====================================================
         HERO MEDIA
         ====================================================== -->

    <div class="absolute inset-0 z-0">

        <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero1.webp' ); ?>"
            alt="<?php echo esc_attr__( 'Nouvelle collection Ana9a', 'ana9a' ); ?>"
            fetchpriority="high"
            loading="eager"
            decoding="async"
            width="1920"
            height="1080"
            class="w-full h-full object-cover object-center"
        >

        <!--
            Readability layer.
            Stronger on the content side, transparent towards the image.
        -->
        <div
            class="absolute inset-0
                   bg-gradient-to-r
                   from-brand-white/95
                   via-brand-white/65
                   to-transparent
                   md:from-brand-white/90
                   md:via-brand-white/35
                   md:to-transparent"
            aria-hidden="true"
        ></div>

    </div>


    <!-- =====================================================
         HERO CONTENT
         ====================================================== -->

    <div
        class="container-lux relative z-10 min-h-[78vh] md:min-h-[88vh]
               flex items-center"
    >

        <div class="max-w-2xl py-12 md:py-16">


            <!-- Eyebrow -->

            <div
                class="flex items-center gap-4 mb-7
                       animate-reveal"
            >

                <span class="w-10 h-px bg-brand-primary"></span>

                <span
                    class="text-[10px] md:text-[11px]
                           uppercase
                           tracking-widest
                           font-bold
                           text-brand-text-muted"
                >
                    <?php _e( 'Nouvelle collection', 'ana9a' ); ?>
                </span>

            </div>


            <!-- Main Heading -->

            <h1
                id="hero-title"
                class="hero-title
                       font-black
                       tracking-[-0.06em]
                       max-w-3xl
                       text-brand-primary
                       animate-reveal"
            >

                <?php _e( 'Votre style.', 'ana9a' ); ?>

                <br>

                <span class="text-brand-text-muted/80">
                    <?php _e( 'Votre signature.', 'ana9a' ); ?>
                </span>

            </h1>


            <!-- Description -->

            <p
                class="max-w-lg
                       mt-8
                       text-sm md:text-base
                       leading-relaxed
                       text-brand-text-muted
                       animate-reveal"
            >
                <?php
                 _e(
                     'Des pièces soigneusement sélectionnées pour affirmer votre style au quotidien.',
                     'ana9a'
                 );
                ?>
            </p>


            <!-- CTA -->

            <div
                class="flex flex-col sm:flex-row
                       items-stretch sm:items-center
                       gap-3
                       mt-9
                       animate-reveal"
            >

                <!-- Primary CTA -->

                <a
                    href="<?php echo esc_url( $shop_url ); ?>"
                    class="btn-primary group w-full sm:w-auto"
                >

                    <span>
                        <?php _e( 'Découvrir la boutique', 'ana9a' ); ?>
                    </span>

                    <svg
                        class="w-4 h-4 ml-3
                               transition-transform duration-500
                               group-hover:translate-x-1.5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M5 12h14m-6-6 6 6-6 6"
                        />
                    </svg>

                </a>


                <!-- Secondary CTA -->

                <a
                    href="<?php echo esc_url( $collections_url ); ?>"
                    class="btn-secondary w-full sm:w-auto"
                >
                    <?php _e( 'Voir les collections', 'ana9a' ); ?>
                </a>

            </div>


            <!-- =================================================
                 TRUST SIGNALS
                 ================================================== -->

            <div
                class="flex flex-wrap items-center
                       gap-x-6 gap-y-4
                       mt-10 pt-6
                       border-t border-brand-primary/10
                       animate-reveal"
            >

                <!-- Item -->

                <div>

                    <p class="text-sm font-bold text-brand-primary">
                        58
                    </p>

                    <p
                        class="mt-1
                               text-[9px]
                               uppercase
                               tracking-widest
                               text-brand-text-muted"
                    >
                        <?php _e( 'Wilayas livrées', 'ana9a' ); ?>
                    </p>

                </div>


                <span
                    class="w-px h-7 bg-brand-primary/10"
                    aria-hidden="true"
                ></span>


                <!-- Item -->

                <div>

                    <p class="text-sm font-bold text-brand-primary">
                        <?php _e( 'Paiement à la livraison
', 'ana9a' ); ?>
                    </p>

                    <p
                        class="mt-1
                               text-[9px]
                               uppercase
                               tracking-widest
                               text-brand-text-muted"
                    >
                        <?php _e( 'Simple & sécurisé', 'ana9a' ); ?>
                    </p>

                </div>


                <span
                    class="w-px h-7 bg-brand-primary/10"
                    aria-hidden="true"
                ></span>


                <!-- Item -->

                <div>

                    <p class="text-sm font-bold text-brand-primary">
                        7/7
                    </p>

                    <p
                        class="mt-1
                               text-[9px]
                               uppercase
                               tracking-widest
                               text-brand-text-muted"
                    >
                        <?php _e( 'Service client', 'ana9a' ); ?>
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>