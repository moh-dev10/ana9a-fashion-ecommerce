<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta
        name="description"
        content="Découvrez notre sélection de vêtements, chaussures et accessoires pensés pour votre style au quotidien."
    >

    <link
        rel="preload"
        as="image"
        href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/heroImg.webp'); ?>"
        fetchpriority="high"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <?php wp_head(); ?>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script
        defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>

</head>

<?php
$hide_header = function_exists('get_field')
    ? get_field('hide_header', get_the_ID())
    : false;

$custom_body_classes = $hide_header ? 'no-header-active' : '';

$final_body_classes = trim(
    $custom_body_classes . ' animate-page'
);
?>

<body <?php body_class($final_body_classes); ?>>

<?php wp_body_open(); ?>

<?php if ( ! $hide_header ) : ?>

<header
    x-data="{ mobileMenuOpen: false }"
    x-cloak
    class="sticky top-0 left-0 w-full z-50 bg-white/95 border-b border-brand-gray-100"
>

    <div class="container-lux mx-auto px-6 py-5">

        <div class="grid grid-cols-3 items-center">

            <!-- Mobile menu -->
            <div class="flex lg:hidden justify-start">

                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="p-2 text-brand-black hover:opacity-60 transition-opacity"
                    aria-label="<?php esc_attr_e('Ouvrir le menu', 'ana9a'); ?>"
                >

                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                    >

                        <path
                            x-show="!mobileMenuOpen"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                        />

                        <path
                            x-show="mobileMenuOpen"
                            x-cloak
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>


            <!-- Logo -->
            <div class="flex justify-start">

                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="text-xl md:text-2xl lg:text-3xl font-black tracking-tighter leading-none hover:opacity-80 transition-opacity"
                >

                    <?php
                    if ( has_custom_logo() ) {

                        the_custom_logo();

                    } else {

                        echo esc_html(get_bloginfo('name'));

                        echo '<span class="text-brand-gray-500">.</span>';
                    }
                    ?>

                </a>

            </div>


            <!-- Desktop navigation -->
            <?php get_template_part('template-parts/header/nav-desktop'); ?>




            <!-- Actions -->
            <div class="flex justify-end items-center gap-5">

                <!-- Search -->
                <button
                    class="hover:opacity-50 transition-opacity"
                    aria-label="<?php esc_attr_e('Rechercher', 'ana9a'); ?>"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />

                    </svg>

                </button>


                <!-- Cart -->
                <a
                    href="<?php echo esc_url(wc_get_cart_url()); ?>"
                    class="relative hover:opacity-50 transition-opacity"
                    aria-label="<?php esc_attr_e('Panier', 'ana9a'); ?>"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        />

                    </svg>

                    <span
                        class="absolute -top-2 -right-2 bg-brand-black text-brand-white text-[8px] w-4 h-4 rounded-full flex items-center justify-center font-bold"
                    >
                        <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
                    </span>

                </a>

            </div>

        </div>

    </div>


    <!-- Mobile navigation -->
    <?php get_template_part('template-parts/header/nav-mobile'); ?>

</header>

<?php endif; ?>