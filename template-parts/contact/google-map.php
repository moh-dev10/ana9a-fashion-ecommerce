<?php
/**
 * Google Map Component
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="mt-16 md:mt-20">

    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-6">

        <div>

            <span class="text-[10px] font-black tracking-widest uppercase text-brand-gray-400">
                <?php _e( 'NOTRE EMPLACEMENT', 'ana9a' ); ?>
            </span>

            <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-brand-black mt-2">
                <?php _e( 'Retrouvez-nous', 'ana9a' ); ?>
            </h2>

        </div>

        <p class="text-xs text-brand-gray-500 leading-relaxed max-w-sm">
            <?php _e(
                'Retrouvez facilement notre boutique grâce à Google Maps.',
                'ana9a'
            ); ?>
        </p>

    </div>


    <!-- Map -->
    <div class="relative overflow-hidden rounded-brand border border-brand-gray-100 bg-brand-white-soft aspect-[16/8] min-h-[280px]">

        <iframe
            src="https://www.google.com/maps/embed?pb=YOUR_MAP_EMBED_URL"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="<?php esc_attr_e( 'Localisation de notre boutique sur Google Maps', 'ana9a' ); ?>"
            class="absolute inset-0 w-full h-full"
        ></iframe>

    </div>

</section>