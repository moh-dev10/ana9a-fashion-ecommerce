<?php
/**
 * Reusable Category Card
 * Theme: Ana9a
 *
 * Expected args:
 * - category : WP_Term
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$category = $args['category'] ?? null;
$featured_class = $args['featured_class'] ?? '';


if ( ! $category instanceof WP_Term ) {
    return;
}

$category_link = get_term_link( $category );

if ( is_wp_error( $category_link ) ) {
    return;
}

$thumbnail_id = get_term_meta(
    $category->term_id,
    'thumbnail_id',
    true
);

$image_url = $thumbnail_id
    ? wp_get_attachment_image_url( $thumbnail_id, 'large' )
    : get_template_directory_uri() . '/assets/img/placeholder.webp';

?>

<a
    href="<?php echo esc_url( $category_link ); ?>"
    class="
        group
        relative
        block
        min-w-0
        w-full
        overflow-hidden
        bg-brand-gray-100
        aspect-[4/5]
        md:aspect-auto
        md:h-full
        <?php echo esc_attr( $featured_class ); ?>

    "
>

    <!-- Image -->

    <img
        src="<?php echo esc_url( $image_url ); ?>"
        alt="<?php echo esc_attr( $category->name ); ?>"
        loading="lazy"
        decoding="async"
        class="
            absolute inset-0
            w-full h-full
            object-cover
            transition-transform
            duration-700
            ease-out
            group-hover:scale-105
        "
    >


    <!-- Overlay -->

    <div
        class="
            absolute inset-0
            bg-gradient-to-t
            from-black/70
            via-black/10
            to-transparent
            opacity-90
            transition-opacity
            duration-500
            group-hover:opacity-100
        "
        aria-hidden="true"
    ></div>


    <!-- Content -->

    <div
        class="
            absolute inset-x-0 bottom-0
            p-4 md:p-7
            text-white
        "
    >

        <div
            class="
                flex
                items-end
                justify-between
                gap-3
            "
        >

            <!-- Text -->

            <div class="min-w-0 flex-1">

                <span
                    class="
                        block
                        mb-1.5 md:mb-2
                        text-[8px] md:text-[9px]
                        font-medium
                        uppercase
                        tracking-[0.15em] md:tracking-[0.2em]
                        text-white/70
                    "
                >
                    <?php
                    printf(
                        _n(
                            '%s article',
                            '%s articles',
                            $category->count,
                            'ana9a'
                        ),
                        number_format_i18n( $category->count )
                    );
                    ?>
                </span>


                <h3
                    class="
                        text-sm md:text-2xl
                        font-black
                        uppercase
                        tracking-[-0.02em]
                        leading-none
                        truncate
                    "
                >
                    <?php echo esc_html( $category->name ); ?>
                </h3>

            </div>


            <!-- Arrow -->

            <span
                class="
                    flex-shrink-0
                    w-8 h-8
                    md:w-10 md:h-10
                    rounded-full
                    bg-white
                    text-brand-primary
                    flex items-center
                    justify-center
                    transition-all
                    duration-300
                    group-hover:translate-x-1
                    group-hover:bg-brand-primary
                    group-hover:text-white
                "
                aria-hidden="true"
            >

                <svg
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </span>

        </div>

    </div>

</a>