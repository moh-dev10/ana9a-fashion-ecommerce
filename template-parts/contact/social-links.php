<?php
/**
 * Social Links Component
 * Theme: Ana9a
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="py-4 ">

    <h2 class="text-[11px] font-black uppercase tracking-widest text-brand-black mb-3">
        <?php _e( 'Suivez-nous', 'ana9a' ); ?>
    </h2>

    <div class="flex items-center gap-2">

        <!-- Instagram -->
        <a
            href="#"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e( 'Instagram', 'ana9a' ); ?>"
            class="w-10 h-10 flex items-center justify-center rounded-full border border-brand-gray-200 bg-brand-white text-brand-black hover:bg-brand-black hover:text-brand-white hover:border-brand-black transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-black focus-visible:ring-offset-2"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-4 h-4"
                aria-hidden="true"
            >
                <rect width="17" height="17" x="3.5" y="3.5" rx="4"/>
                <circle cx="12" cy="12" r="4"/>
                <circle cx="17.5" cy="6.5" r=".75" fill="currentColor" stroke="none"/>
            </svg>
        </a>


        <!-- Facebook -->
        <a
            href="#"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e( 'Facebook', 'ana9a' ); ?>"
            class="w-10 h-10 flex items-center justify-center rounded-full border border-brand-gray-200 bg-brand-white text-brand-black hover:bg-brand-black hover:text-brand-white hover:border-brand-black transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-black focus-visible:ring-offset-2"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-4 h-4"
                aria-hidden="true"
            >
                <path d="M14 8h3V4.5h-3c-3.04 0-5 1.96-5 5V12H6v3.5h3V21h3.5v-5.5H16L16.5 12h-4v-2.5c0-.97.53-1.5 1.5-1.5Z"/>
            </svg>
        </a>


        <!-- TikTok -->
        <a
            href="#"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e( 'TikTok', 'ana9a' ); ?>"
            class="w-10 h-10 flex items-center justify-center rounded-full border border-brand-gray-200 bg-brand-white text-brand-black hover:bg-brand-black hover:text-brand-white hover:border-brand-black transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-black focus-visible:ring-offset-2"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-4 h-4"
                aria-hidden="true"
            >
                <path d="M15.5 3c.3 1.7 1.3 3 3 3.6v3.1c-1.1-.1-2.1-.5-3-1.1v6.1c0 3.5-2.2 5.5-5.2 5.5-2.7 0-4.8-1.9-4.8-4.5 0-2.8 2.3-4.7 5.4-4.7.3 0 .6 0 .9.1v3.1c-.3-.1-.6-.2-.9-.2-1.1 0-2 .7-2 1.7 0 .9.7 1.5 1.6 1.5 1.1 0 1.8-.8 1.8-2.4V3h3.2Z"/>
            </svg>
        </a>

    </div>

</div>