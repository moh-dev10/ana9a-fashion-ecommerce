<?php
/**
 * Final CTA
 * Theme: Ana9a - Fashion Blueprint
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    class="py-16 md:py-24 bg-brand-black"
    dir="ltr"
>
    <div class="container-lux mx-auto">

        <div class="max-w-3xl mx-auto text-center text-brand-white">

            <!-- Eyebrow -->
            <p class="text-[10px] uppercase tracking-[0.35rem] text-white/50 mb-5">
                <?php _e( 'Votre style commence ici', 'ana9a' ); ?>
            </p>


            <!-- Heading -->
            <h2
                class="text-4xl md:text-6xl lg:text-7xl font-black uppercase tracking-tighter leading-[0.9]"
            >
                <?php _e( 'Trouvez votre style.', 'ana9a' ); ?>
            </h2>


            <!-- Description -->
            <p
                class="max-w-lg mx-auto mt-6 text-sm md:text-base leading-7 text-white/60"
            >
                <?php _e(
                    'Découvrez notre sélection de pièces pensées pour accompagner votre style au quotidien.',
                    'ana9a'
                ); ?>
            </p>


            <!-- CTA -->
            <div class="mt-9 flex justify-center">

                <a
                    href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                    class="btn-light group"
                >
                    <?php _e( 'Voir la boutique', 'ana9a' ); ?>

                    <svg
                        class="w-4 h-4 group-hover:translate-x-1  transition-transform duration-300 ml-3"
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