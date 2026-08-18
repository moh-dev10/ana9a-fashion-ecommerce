<?php
/**
 * Template part for displaying Store Features
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$features = [

    [
        'icon'  => 'M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14',
        'title' => __( 'Livraison 58 Wilayas', 'ana9a' ),
        'desc'  => __( 'Livraison rapide et sécurisée partout en Algérie.', 'ana9a' ),
    ],

    [
        'icon'  => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
        'title' => __( 'Paiement à la livraison', 'ana9a' ),
        'desc'  => __( 'Payez simplement à la réception de votre commande.', 'ana9a' ),
    ],

    [
        'icon'  => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
        'title' => __( 'Qualité premium', 'ana9a' ),
        'desc'  => __( 'Des produits sélectionnés avec soin.', 'ana9a' ),
    ],

    [
        'icon'  => 'M3 18v-6a9 9 0 0118 0v6M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z',
        'title' => __( 'Service client 7j/7', 'ana9a' ),
        'desc'  => __( 'Notre équipe est disponible pour vous accompagner.', 'ana9a' ),
    ],

];
?>

<section
    class="border-y border-brand-gray-100 bg-brand-white"
    dir="ltr"
    aria-label="<?php esc_attr_e( 'Avantages du service', 'ana9a' ); ?>"
>

    <div class="container-lux">

        <div class="grid grid-cols-2 lg:grid-cols-4">

            <?php foreach ( $features as $index => $feature ) : ?>

                <div
                    class="
                        group
                        relative
                        flex flex-col
                        items-center
                        text-center
                        px-5 py-9
                        md:px-8 md:py-10

                        <?php
                        echo $index > 0
                            ? 'border-l border-brand-gray-100'
                            : '';
                        ?>

                        transition-colors duration-300
                        hover:bg-brand-white-soft
                    "
                >

                    <!-- Icon -->

                    <div
                        class="
                            flex items-center justify-center
                            w-9 h-9
                            mb-4
                            text-brand-primary
                            transition-transform duration-300
                            group-hover:-translate-y-0.5
                        "
                    >

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="<?php echo esc_attr( $feature['icon'] ); ?>"
                            />
                        </svg>

                    </div>


                    <!-- Content -->

                    <h3
                        class="
                            text-[11px] md:text-xs
                            font-black
                            uppercase
                            tracking-[0.08em]
                            text-brand-primary
                        "
                    >
                        <?php echo esc_html( $feature['title'] ); ?>
                    </h3>

                    <p
                        class="
                            mt-2
                            max-w-[210px]
                            text-[10px] md:text-[11px]
                            leading-relaxed
                            text-brand-text-muted
                        "
                    >
                        <?php echo esc_html( $feature['desc'] ); ?>
                    </p>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>