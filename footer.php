<?php
/**
 * The template for displaying the footer
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Détection RTL dynamique
$text_dir = is_rtl() ? 'rtl' : 'ltr';
?>

<footer class="bg-brand-black text-brand-white border-t border-brand-gray-800 pt-14 md:pt-16 pb-6" dir="<?php echo esc_attr( $text_dir ); ?>">

    <div class="max-w-[1440px] mx-auto px-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-10 gap-x-8 pb-10 border-b border-brand-gray-800">

            <!-- Brand -->
            <div class="space-y-5">

                <a
                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    class="text-xl font-black tracking-widest uppercase block text-white"
                >
                    <?php bloginfo( 'name' ); ?>.
                </a>

                <p class="text-xs text-brand-gray-400 font-medium leading-relaxed max-w-[270px]">
                    <?php
                    _e(
                        'Une sélection de pièces tendance, pensée pour celles et ceux qui aiment un style moderne, simple et affirmé.',
                        'ana9a'
                    );
                    ?>
                </p>

                <!-- Socials -->
                <div class="flex items-center gap-4 pt-1">

                    <a
                        href="#"
                        class="text-brand-gray-300 hover:text-white transition-colors duration-300"
                        aria-label="Instagram"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>

                    <a
                        href="#"
                        class="text-brand-gray-300 hover:text-white transition-colors duration-300"
                        aria-label="TikTok"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31.01 2.58.42 3.65 1.19.14.1.2.22.18.39a8.21 8.21 0 0 1-.18 2.21c-.06.21-.19.3-.41.22A5.4 5.4 0 0 1 13.5 3c-.15-.05-.22-.15-.22-.31V14.5a3.5 3.5 0 1 1-4.244-3.443.73.73 0 0 1 .844.62c.04.28.01.56-.09.82a2 2 0 1 0 2.24 1.983V.77c0-.26.15-.41.41-.41a8.4 8.4 0 0 0 1.1-.34H12.525z"/>
                        </svg>
                    </a>

                    <a
                        href="#"
                        class="text-brand-gray-300 hover:text-white transition-colors duration-300"
                        aria-label="Facebook"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>

                </div>

            </div>


            <!-- Shop -->
            <div class="space-y-4">

                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold">
                    <?php _e( 'Boutique', 'ana9a' ); ?>
                </h4>

                <ul class="space-y-2.5 text-xs font-semibold">

                    <?php if ( function_exists( 'wc_get_page_id' ) ) : 
                        $shop_page_id = wc_get_page_id( 'shop' );
                        if ( $shop_page_id > 0 ) :
                    ?>
                    <li>
                        <a
                            href="<?php echo esc_url( get_permalink( $shop_page_id ) ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Tous les produits', 'ana9a' ); ?>
                        </a>
                    </li>
                    <?php endif; endif; ?>

                    <?php 
                    $basket_link = get_term_link( 'basket', 'product_cat' );
                    if ( ! is_wp_error( $basket_link ) ) :
                    ?>
                    <li>
                        <a
                            href="<?php echo esc_url( $basket_link ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Nouveautés', 'ana9a' ); ?>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php 
                    $sandals_link = get_term_link( 'sandals', 'product_cat' );
                    if ( ! is_wp_error( $sandals_link ) ) :
                    ?>
                    <li>
                        <a
                            href="<?php echo esc_url( $sandals_link ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Collections', 'ana9a' ); ?>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php 
                    $blayegh_link = get_term_link( 'blayegh', 'product_cat' );
                    if ( ! is_wp_error( $blayegh_link ) ) :
                    ?>
                    <li>
                        <a
                            href="<?php echo esc_url( $blayegh_link ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Meilleures ventes', 'ana9a' ); ?>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>

            </div>


            <!-- Help -->
            <div class="space-y-4">

                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold">
                    <?php _e( 'Aide & Informations', 'ana9a' ); ?>
                </h4>

                <ul class="space-y-2.5 text-xs font-semibold">

                    <li>
                        <a
                            href="<?php echo esc_url( home_url( '/return-policy/' ) ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Échanges & Retours', 'ana9a' ); ?>
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url( home_url( '/delivery-info/' ) ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Livraison', 'ana9a' ); ?>
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Notre histoire', 'ana9a' ); ?>
                        </a>
                    </li>

                    <li>
                        <a
                            href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"
                            class="text-brand-gray-500 hover:text-white transition-colors duration-200"
                        >
                            <?php _e( 'Nous contacter', 'ana9a' ); ?>
                        </a>
                    </li>

                </ul>

            </div>


            <!-- Contact -->
            <div class="space-y-4">

                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold">
                    <?php _e( 'Besoin d\'aide ?', 'ana9a' ); ?>
                </h4>

                <ul class="space-y-3 text-xs font-semibold">

                    <li class="flex flex-col gap-1">

                        <span class="text-brand-gray-500">
                            <?php _e( 'Une question ?', 'ana9a' ); ?>
                        </span>

                        <span class="text-white">
                            <?php _e( 'Notre équipe est là pour vous aider.', 'ana9a' ); ?>
                        </span>

                    </li>

                    <li class="flex flex-col gap-1">

                        <span class="text-brand-gray-500">
                            <?php _e( 'Disponibilité', 'ana9a' ); ?>
                        </span>

                        <span class="text-white">
                            <?php _e( 'Samedi → Jeudi', 'ana9a' ); ?>
                        </span>

                    </li>

                    <li class="flex flex-col gap-1">

                        <span class="text-brand-gray-500">
                            <?php _e( 'Horaires', 'ana9a' ); ?>
                        </span>

                        <span class="text-white">
                            <?php _e( '09h00 – 21h00', 'ana9a' ); ?>
                        </span>

                    </li>

                </ul>

            </div>

        </div>


        <!-- Bottom -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] font-medium text-brand-gray-500 text-center">

            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                <span>
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                    <?php bloginfo( 'name' ); ?>.
                    <?php _e( 'Tous droits réservés.', 'ana9a' ); ?>
                </span>

                <span class="hidden sm:inline text-brand-gray-800">
                    |
                </span>

                <a
                    href="https://github.com/moh-dev10"
                    target="_blank"
                    rel="noopener"
                    class="text-brand-white font-mono tracking-wider hover:text-brand-gray-300 transition-colors"
                >
                    powered by moh-dev10
                </a>

            </div>

        </div>

    </div>

</footer>


<?php wp_footer(); ?>


<script>
document.addEventListener('DOMContentLoaded', () => {

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const scrollObserver = new IntersectionObserver(
        (entries, observer) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);

                }

            });

        },
        observerOptions
    );

    document
        .querySelectorAll('.reveal-on-scroll')
        .forEach(element => {
            scrollObserver.observe(element);
        });

});
</script>

</body>
</html>