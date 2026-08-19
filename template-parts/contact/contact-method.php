<?php
/**
 * Contact Method Component
 * Theme: Ana9a
 *
 * Expected variables:
 * $icon
 * $title
 * $description
 * $value
 * $url
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$args = wp_parse_args(
    $args ?? [],
    [
        'icon'        => '',
        'title'       => '',
        'description' => '',
        'value'       => '',
        'url'         => '',
    ]
);

$icon        = $args['icon'];
$title       = $args['title'];
$description = $args['description'];
$value       = $args['value'];
$url         = $args['url'];
?>

<div class="group p-5 sm:p-6 bg-brand-white-soft border border-brand-gray-100 rounded-2xl flex items-start gap-4 hover:border-brand-gray-300 transition-colors duration-300">

    <!-- Icon -->
    <div class="shrink-0 p-3 bg-brand-white rounded-xl shadow-2xs text-brand-black">

        <?php if ( $icon === 'phone' ) : ?>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.387a12.035 12.035 0 0 1-7.108-7.108c-.145-.44.02-.927.396-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                />
            </svg>

        <?php elseif ( $icon === 'email' ) : ?>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0l-7.5-4.615a2.25 2.25 0 0 1-1.07-1.916V6.75"
                />
            </svg>

        <?php elseif ( $icon === 'whatsapp' ) : ?>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5"
                aria-hidden="true"
            >
                <path d="M12.04 2C6.55 2 2.09 6.45 2.09 11.93c0 1.75.46 3.46 1.33 4.97L2 22l5.24-1.38a9.93 9.93 0 0 0 4.79 1.22h.01c5.48 0 9.94-4.45 9.94-9.93C21.98 6.45 17.52 2 12.04 2Zm5.79 14.1c-.24.67-1.39 1.28-1.91 1.35-.49.07-1.11.1-1.79-.11-.41-.13-.94-.3-1.62-.59-2.85-1.23-4.71-4.1-4.85-4.29-.14-.19-1.16-1.54-1.16-2.94 0-1.4.73-2.09.99-2.37.25-.28.55-.35.74-.35.18 0 .37 0 .53.01.17.01.4-.06.62.47.24.58.81 1.99.88 2.13.07.14.12.3.02.49-.09.19-.14.3-.28.46-.14.16-.29.36-.42.48-.14.14-.29.29-.12.56.17.28.75 1.24 1.61 2.01 1.11.99 2.05 1.3 2.34 1.44.29.14.46.12.63-.07.17-.19.72-.84.91-1.13.19-.29.38-.24.64-.14.26.09 1.65.78 1.93.92.28.14.46.21.53.33.07.12.07.68-.17 1.35Z"/>
            </svg>

        <?php elseif ( $icon === 'clock' ) : ?>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                />
            </svg>

        <?php endif; ?>

    </div>


    <!-- Content -->
    <div class="min-w-0">

        <h2 class="text-sm font-bold text-brand-black uppercase tracking-tight">
            <?php echo esc_html( $title ); ?>
        </h2>

        <?php if ( $description ) : ?>

            <p class="text-xs text-brand-gray-400 mt-1">
                <?php echo esc_html( $description ); ?>
            </p>

        <?php endif; ?>


        <?php if ( $url && $value ) : ?>

            <a
                href="<?php echo esc_url( $url ); ?>"
                class="inline-block text-sm sm:text-base font-black text-brand-black mt-2 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-black focus-visible:ring-offset-2 rounded break-all"
                <?php echo strpos( $url, 'tel:' ) === 0 || strpos( $url, 'mailto:' ) === 0 ? 'dir="ltr"' : ''; ?>
            >
                <?php echo esc_html( $value ); ?>
            </a>

        <?php elseif ( $value ) : ?>

            <p class="text-sm text-brand-gray-500 mt-2">
                <?php echo esc_html( $value ); ?>
            </p>

        <?php endif; ?>

    </div>

</div>

