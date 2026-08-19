<?php
/**
 * Infinite Scrolling Ticker
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ticker_items = [
    __( 'Livraison dans les 58 wilayas', 'ana9a' ),
    __( 'Paiement à la livraison', 'ana9a' ),
    __( 'Nouvelle collection chaque semaine', 'ana9a' ),
    __( 'Qualité et finitions soignées', 'ana9a' ),
    __( 'Les dernières tendances mode', 'ana9a' ),
    __( 'Plusieurs tailles disponibles', 'ana9a' ),
];
?>

<section
    class="relative w-full overflow-hidden
           bg-brand-primary text-brand-white
           border-y border-brand-gray-800
           py-3.5 md:py-4
           select-none"
    aria-label="<?php esc_attr_e( 'Informations du magasin', 'ana9a' ); ?>"
    dir="ltr"
>

    <div class="flex w-max whitespace-nowrap animate-ticker">

        <?php for ( $i = 0; $i < 2; $i++ ) : ?>

            <div
                class="flex shrink-0 items-center
                       gap-8 md:gap-12
                       pr-8 md:pr-12"
            >

                <?php foreach ( $ticker_items as $item ) : ?>

                    <span
                        class="text-[10px] md:text-[11px]
                               font-bold
                               uppercase
                               tracking-[0.18em]
                               whitespace-nowrap"
                    >
                        <?php echo esc_html( $item ); ?>
                    </span>

                    <span
                        class="w-1 h-1
                               shrink-0
                               rounded-full
                               bg-brand-gray-200/70"
                        aria-hidden="true"
                    ></span>

                <?php endforeach; ?>

            </div>

        <?php endfor; ?>

    </div>

</section>