<?php

/**
 * Global templates hooks
 */

if ( ! function_exists( 'netzen_add_product_list_price_holder' ) ) {
    /**
     * Function that renders ETH price only (removes USD conversion)
     */
    function netzen_add_product_list_price_holder() {
        $product = netzen_woo_get_global_product();
        $price = $product->get_price();

        $currency_data = netzen_get_currency_data();

        if ( !empty( $price ) && !empty( $currency_data ) ) {
            // Directly convert price to Ethereum without USD conversion
            $eth_price = round( $price / $currency_data['ethereum_rate_usd'], 5 );

            echo '<div class="qodef-woo-price-holder">
                    <span class="qodef-price-label">' . esc_html__('Price', 'netzen') . '</span>
                    <div class="qodef-woo-price-holder-inner">
                        <span class="qodef-ethereum-price">' . netzen_get_svg_icon( 'ethereum' ) . esc_html( $eth_price ) . '</span>
                    </div>
                </div>';
        }
    }
}

if ( ! function_exists( 'netzen_add_product_list_price_holder_end' ) ) {
    /**
     * Function that closes the price holder div
     */
    function netzen_add_product_list_price_holder_end() {
        echo '</div>';
    }
}

if ( ! function_exists( 'netzen_get_currency_data' ) ) {
    /**
     * Fetch Ethereum exchange rate data
     */
    function netzen_get_currency_data() {
        $transient_time = netzen_get_post_value_through_levels( 'qodef_woo_transient_time' );
        if ( empty( $transient_time ) ) {
            $transient_time = 7200;
        }

        $data = array();

        if ( get_transient( 'netzen_currency_data' ) ) {
            $transient_data = get_transient( 'netzen_currency_data' );

            if ( $transient_data['currency'] !== get_woocommerce_currency() ) {
                $data =  netzen_fetch_eth_price();
                set_transient( 'netzen_currency_data', $data, $transient_time );
            } else {
                $data = get_transient( 'netzen_currency_data' );
            }
        } else {
            while( !isset( $data['ethereum_rate_usd'] ) ) {
                $data =  netzen_fetch_eth_price();
            }

            set_transient( 'netzen_currency_data', $data, $transient_time );
        }

        return $data;
    }
}

if ( ! function_exists( 'netzen_fetch_eth_price' ) ) {
    /**
     * Fetch Ethereum price from API
     */
    function netzen_fetch_eth_price() {
        $api_url = 'https://api.coincap.io/v2/rates';
        $response = wp_remote_get( $api_url );

        $body = is_array( $response ) ? json_decode( $response['body'], true ) : array();

        if ( is_wp_error( $response ) || ( isset( $body['meta']['code'] ) && $body['meta']['code'] !== 200 ) ) {
            return false;
        }

        $data = $body['data'];

        $rates = array();
        foreach ( $data as $d ) {
            if ( $d['id'] === 'ethereum' ) {
                $rates['ethereum_rate_usd'] = $d['rateUsd'];
            }
        }

        return $rates;
    }
}
