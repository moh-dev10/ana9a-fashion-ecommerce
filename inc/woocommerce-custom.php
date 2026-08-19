<?php
/**
 * Ana9a Theme WooCommerce Customizations
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. دالة معالجة وعرض الأسعار المطورة لتدعم جميع أنواع المنتجات (Simple & Variable)
add_filter( 'woocommerce_get_price_html', 'custom_sale_price_with_badge', 10, 2 );
function custom_sale_price_with_badge( $price, $product ) {

    $badge = '';

    // Simple product / product not on sale
    if ( ! $product->is_on_sale() ) {

        if ( $product->is_type( 'variable' ) ) {

            $prices = $product->get_variation_prices( true );

            if ( ! empty( $prices['price'] ) ) {

                $max_price = max( $prices['price'] );

                return '<ins class="no-underline" style="text-decoration:none;">' .
                    wc_price( $max_price ) .
                    '</ins>';
            }
        }

        return '<ins class="no-underline" style="text-decoration:none;">' .
            $price .
            '</ins>';
    }

    $discount_percentage = 0;

    /*
     * VARIABLE PRODUCT
     */
    if ( $product->is_type( 'variable' ) ) {

        $variations = $product->get_available_variations();

        $max_regular_price = 0;
        $max_sale_price    = 0;
        $percentages       = array();

        foreach ( $variations as $variation ) {

            $regular = (float) $variation['display_regular_price'];
            $sale    = (float) $variation['display_price'];

            if ( $regular <= 0 ) {
                continue;
            }

            // MAX regular
            $max_regular_price = max(
                $max_regular_price,
                $regular
            );

            // Sale price
            if ( $sale > 0 && $sale < $regular ) {

                $max_sale_price = max(
                    $max_sale_price,
                    $sale
                );

                $percentages[] = round(
                    ( ( $regular - $sale ) / $regular ) * 100
                );

            } else {

                // If this variation isn't on sale,
                // its regular price is its current price.
                $max_sale_price = max(
                    $max_sale_price,
                    $sale
                );
            }
        }

        if ( $max_regular_price <= 0 ) {
            return $price;
        }

        /*
         * Keep your existing logic:
         * badge = highest discount percentage
         */
        if ( ! empty( $percentages ) ) {
            $discount_percentage = max( $percentages );
        }

        /*
         * MAX sale + MAX regular
         */
        $sale_html = '<ins>' .
            wc_price( $max_sale_price ) .
            '</ins>';

        $regular_html = '<del>' .
            wc_price( $max_regular_price ) .
            '</del>';

    }

    /*
     * SIMPLE PRODUCT
     */
    else {

        $regular = (float) $product->get_regular_price();
        $sale    = (float) $product->get_sale_price();

        if ( $regular <= 0 ) {
            return $price;
        }

        $discount_percentage = round(
            ( ( $regular - $sale ) / $regular ) * 100
        );

        $sale_html = '<ins>' .
            wc_price( $sale ) .
            '</ins>';

        $regular_html = '<del>' .
            wc_price( $regular ) .
            '</del>';
    }

    /*
     * Sale badge only on product page
     */
    if ( is_product() ) {

        $badge = '<span dir="rtl" class="custom-sale-badge">' .
              $discount_percentage . '%-' .
            '</span>';
    }

    return '<span class="custom-price-container">' .
        $sale_html .
        ' ' .
        $regular_html .
        ' ' .
        $badge .
        '</span>';
}

// 2. إيقاف ملفات الـ CSS الافتراضية لووكومرس تماماً للسماح لـ Tailwind بالسيطرة الكاملة
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_filter( 'woocommerce_currency_symbol', 'ana9a_currency_symbol', 10, 2 );

function ana9a_currency_symbol( $currency_symbol, $currency ) {

    if ( $currency === 'DZD' ) {
        $currency_symbol = 'DA';
    }

    return $currency_symbol;
}

// 3. تنظيف الهياكل والأوسمة التلقائية (الأغلفة القديمة) لضمان عمل الـ Grid المخصص
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
add_filter( 'woocommerce_product_loop_start', function() { return ''; }, 999 );
add_filter( 'woocommerce_product_loop_end', function() { return ''; }, 999 );