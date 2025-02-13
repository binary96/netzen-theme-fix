<?php

/**
 * Global templates hooks
 */

if ( ! function_exists( 'netzen_add_main_woo_page_template_holder' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function netzen_add_main_woo_page_template_holder() {
		echo '<main id="qodef-page-content" class="qodef-grid qodef-layout--template qodef--no-bottom-space ' . esc_attr( netzen_get_grid_gutter_classes() ) . '" role="main"><div class="qodef-grid-inner clear">';
	}
}

if ( ! function_exists( 'netzen_add_main_woo_page_template_holder_end' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function netzen_add_main_woo_page_template_holder_end() {
		echo '</div></main>';
	}
}

if ( ! function_exists( 'netzen_add_main_woo_page_holder' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function netzen_add_main_woo_page_holder() {
		$classes = array();

		// add class to pages with sidebar and on single page
		if ( netzen_is_woo_page( 'archive' ) || netzen_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef-grid-item';
		}

		// add class to pages with sidebar
		if ( netzen_is_woo_page( 'archive' ) ) {
			$classes[] = netzen_get_page_content_sidebar_classes();
		}

		$classes[] = netzen_get_woo_main_page_classes();

		echo '<div id="qodef-woo-page" class="' . esc_attr( implode( ' ', $classes ) ) . '">';
	}
}

if ( ! function_exists( 'netzen_add_main_woo_page_holder_end' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function netzen_add_main_woo_page_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_main_woo_page_sidebar_holder' ) ) {
	/**
	 * Function that render sidebar layout for main shop page
	 */
	function netzen_add_main_woo_page_sidebar_holder() {

		if ( ! netzen_is_woo_page( 'single' ) ) {
			// Include page content sidebar
			netzen_template_part( 'sidebar', 'templates/sidebar' );
		}
	}
}

if ( ! function_exists( 'netzen_woo_render_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 */
	function netzen_woo_render_product_categories( $before = '', $after = '' ) {
		echo netzen_woo_get_product_categories( $before, $after ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'netzen_woo_get_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 *
	 * @return string
	 */
	function netzen_woo_get_product_categories( $before = '', $after = '' ) {
		$product = netzen_woo_get_global_product();

		return ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), '<span class="qodef-info-separator-single"></span>', $before, $after ) : '';
	}
}

/**
 * Shop page templates hooks
 */

if ( ! function_exists( 'netzen_add_results_and_ordering_holder' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function netzen_add_results_and_ordering_holder() {
		echo '<div class="qodef-woo-results">';
	}
}

if ( ! function_exists( 'netzen_add_results_and_ordering_holder_end' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function netzen_add_results_and_ordering_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_holder' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function netzen_add_product_list_item_holder() {
		echo '<div class="qodef-e-inner">';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_holder_end' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function netzen_add_product_list_item_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_image_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function netzen_add_product_list_item_image_holder() {
		echo '<div class="qodef-woo-product-image">';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function netzen_add_product_list_item_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_additional_image_holder' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function netzen_add_product_list_item_additional_image_holder() {
		echo '<div class="qodef-woo-product-image-inner">';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_additional_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function netzen_add_product_list_item_additional_image_holder_end() {
		// Hook to include additional content inside product list item image
		do_action( 'netzen_action_product_list_item_additional_image_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_content_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function netzen_add_product_list_item_content_holder() {
		echo '<div class="qodef-woo-product-content">';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_content_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function netzen_add_product_list_item_content_holder_end() {
		// Hook to include additional content inside product list item content
		do_action( 'netzen_action_product_list_item_additional_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_product_list_item_categories' ) ) {
	/**
	 * Function that render product categories
	 */
	function netzen_add_product_list_item_categories() {
		netzen_woo_render_product_categories( '<div class="qodef-woo-product-categories qodef-e-info">', '<div class="qodef-info-separator-end"></div></div>' );
	}
}

if ( ! function_exists( 'netzen_convert_price_to_ethereum' ) ) {

    function netzen_convert_price_to_ethereum() {

        $apiCoinCapRates = 'https://api.coincap.io/v2/rates';

        $httpResponse = wp_remote_get( $apiCoinCapRates );

        //parse returned JSON response to assoc array
        $httpBody = is_array( $httpResponse ) ? json_decode( $httpResponse['body'], true ) : array();

        //is response an error or if response code is something different than ok?
        if ( is_wp_error( $httpResponse ) || ( isset( $httpBody['meta']['code'] ) && $httpBody['meta']['code'] !== 200 ) ) {
            return false;
        }

        $data = $httpBody['data'];

        $currency = get_woocommerce_currency();
        $currency_id = '';
        $rates = array();

        foreach ( $data as $d ) {
            if ( $d['symbol'] === $currency ) {
                $currency_id = $d['id'];
            }

            if ( $d['id'] === 'ethereum' ) {
                $rates['ethereum_rate_usd'] = $d['rateUsd'];
            }

            if ( $d['id'] === $currency_id ) {
                $rates['currency_rate_usd'] = $d['rateUsd'];
            }
        }

        $rates['currency'] = $currency;

        return $rates;
    }
}

if ( ! function_exists( 'netzen_get_currency_data' ) ) {

    function netzen_get_currency_data() {

        $transient_time = netzen_get_post_value_through_levels( 'qodef_woo_transient_time' );
        if ( empty( $transient_time ) ) {
            $transient_time = 7200;
        }

        $data = array();

        if ( get_transient( 'netzen_currency_data' ) ) {

            $transient_data = get_transient( 'netzen_currency_data' );

            if ( $transient_data['currency'] !== get_woocommerce_currency() ) {
                $data =  netzen_convert_price_to_ethereum();
                set_transient( 'netzen_currency_data', $data, $transient_time );
            } else {
                $data = get_transient( 'netzen_currency_data' );
            }
        } else {

            while( ! array_key_exists( 'ethereum_rate_usd', $data ) || ! array_key_exists( 'currency_rate_usd', $data ) || !isset( $data['ethereum_rate_usd'] ) || !isset( $data['currency_rate_usd'] ) ) {
                $data =  netzen_convert_price_to_ethereum();
            }

            set_transient( 'netzen_currency_data', $data, $transient_time );
        }

        return $data;
    }
}

/* price holder begin */

if ( ! function_exists( 'netzen_add_product_list_price_holder' ) ) {
    /**
     * Function that render additional content around product info on main shop page
     */
    function netzen_add_product_list_price_holder() {

        $product = netzen_woo_get_global_product();
        $price = $product->get_price();

        $currency_data = netzen_get_currency_data();

        if ( !empty( $price ) && !empty( $currency_data ) ) {
            $price_in_dollar = $price * $currency_data['currency_rate_usd'];
            $eth_price = round( $price_in_dollar / $currency_data['ethereum_rate_usd'], 5 );

            echo '<div class="qodef-woo-price-holder"><span class="qodef-price-label">' . esc_html__('Price', 'netzen') . '</span><div class="qodef-woo-price-holder-inner"><span class="qodef-ethereum-price">' . netzen_get_svg_icon( 'ethereum' ) . esc_html( $eth_price ) . '</span>';
        }
    }
}

if ( ! function_exists( 'netzen_add_product_list_price_holder_end' ) ) {
    /**
     * Function that render additional content around product info on main shop page
     */
    function netzen_add_product_list_price_holder_end() {
        // Hook to include additional content inside product list item content

        $product = netzen_woo_get_global_product();
        $price = $product->get_price();

        $currency_data = netzen_get_currency_data();

        if ( !empty( $price ) && !empty( $currency_data ) ) {
            echo '</div></div>';
        }
    }
}

/* price holder end */

/**
 * Product single page templates hooks
 */

if ( ! function_exists( 'netzen_add_product_single_content_holder' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function netzen_add_product_single_content_holder() {
		echo '<div class="qodef-woo-single-inner">';
	}
}

if ( ! function_exists( 'netzen_add_product_single_content_holder_end' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function netzen_add_product_single_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_add_product_single_image_holder' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function netzen_add_product_single_image_holder() {
		echo '<div class="qodef-woo-single-image">';
	}
}

if ( ! function_exists( 'netzen_add_product_single_image_holder_end' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function netzen_add_product_single_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_woo_product_render_social_share_html' ) ) {
	/**
	 * Function that render social share html
	 */
	function netzen_woo_product_render_social_share_html() {

		if ( class_exists( 'NetzenCore_Social_Share_Shortcode' ) ) {
			$params                      = array();
			$params['layout']            = 'dropdown';
			$params['dropdown_behavior'] = 'bottom';
			$params['icon_font']         = 'elegant-icons';
			$params['title']             = esc_html__( '', 'netzen' );

			echo NetzenCore_Social_Share_Shortcode::call_shortcode( $params ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Override default WooCommerce templates
 */

if ( ! function_exists( 'netzen_woo_disable_page_heading' ) ) {
	/**
	 * Function that disable heading template on main shop page
	 *
	 * @return bool
	 */
	function netzen_woo_disable_page_heading() {
		return false;
	}
}

if ( ! function_exists( 'netzen_add_product_list_holder' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function netzen_add_product_list_holder( $html ) {
		$classes = array();
		$layout  = netzen_get_post_value_through_levels( 'qodef_product_list_item_layout' );
		$option  = netzen_get_post_value_through_levels( 'qodef_woo_product_list_columns_space' );

		if ( ! empty( $layout ) ) {
			$classes[] = 'qodef-item-layout--' . $layout;
		}

		if ( ! empty( $option ) ) {
			$classes[] = 'qodef-gutter--' . $option;
		}

        if ( ! netzen_is_installed( 'core' ) ) {
            $classes[] = 'qodef-item-layout--info-below';
        }

		return '<div class="qodef-woo-product-list ' . esc_attr( implode( ' ', $classes ) ) . '">' . $html;
	}
}

if ( ! function_exists( 'netzen_add_product_list_holder_end' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function netzen_add_product_list_holder_end( $html ) {
		return $html . '</div>';
	}
}

if ( ! function_exists( 'netzen_woo_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for main shop page
	 *
	 * @return int
	 */
	function netzen_woo_product_list_columns() {
		$option = netzen_get_post_value_through_levels( 'qodef_woo_product_list_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 3;
		}

		if ( netzen_is_installed( 'framework' ) && netzen_is_installed( 'core' ) ) {

            if ( qode_framework_is_installed( 'wc_multivendor_marketplace' ) ) {

                if ( wcfm_is_store_page() ) {
                    $columns = 4;
                }
            }
        }

		return $columns;
	}
}

if ( ! function_exists( 'netzen_woo_products_per_page' ) ) {
	/**
	 * Function that set number of items for main shop page
	 *
	 * @param int $products_per_page
	 *
	 * @return int
	 */
	function netzen_woo_products_per_page( $products_per_page ) {
		$option = netzen_get_post_value_through_levels( 'qodef_woo_product_list_products_per_page' );

		if ( ! empty( $option ) ) {
			$products_per_page = intval( $option );
		}

		return $products_per_page;
	}
}

if ( ! function_exists( 'netzen_woo_pagination_args' ) ) {
	/**
	 * Function that override pagination args on main shop page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function netzen_woo_pagination_args( $args ) {
		$args['prev_text']          = netzen_get_svg_icon( 'pagination-arrow-left' );
		$args['next_text']          = netzen_get_svg_icon( 'pagination-arrow-right' );
		$args['type']               = 'plain';
		$args['before_page_number'] = '';

		return $args;
	}
}

if ( ! function_exists( 'netzen_add_single_product_classes' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 *
	 * @param array $classes Default argument array
	 * @param string $class
	 * @param int $post_id
	 *
	 * @return array
	 */
	function netzen_add_single_product_classes( $classes, $class = '', $post_id = 0 ) {
		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}

		$product = wc_get_product( $post_id );

		if ( $product ) {
			$new = get_post_meta( $post_id, 'qodef_show_new_sign', true );

			if ( 'yes' === $new ) {
				$classes[] = 'new';
			}
		}

		return $classes;
	}
}

if ( ! function_exists( 'netzen_add_sale_flash_on_product' ) ) {
	/**
	 * Function for adding on sale template for product
	 */
	function netzen_add_sale_flash_on_product() {
		echo netzen_woo_set_sale_flash(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'netzen_woo_set_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function netzen_woo_set_sale_flash() {
		$product = netzen_woo_get_global_product();

		if ( ! empty( $product ) && $product->is_on_sale() && $product->is_in_stock() ) {
			return netzen_woo_get_woocommerce_sale( $product );
		}

		return '';
	}
}

if ( ! function_exists( 'netzen_woo_get_woocommerce_sale' ) ) {
	/**
	 * Function that return sale mark label
	 *
	 * @param object $product
	 *
	 * @return string
	 */
	function netzen_woo_get_woocommerce_sale( $product ) {
		$enable_percent_mark = netzen_get_post_value_through_levels( 'qodef_woo_enable_percent_sign_value' );
		$price               = floatval( $product->get_regular_price() );
		$sale_price          = floatval( $product->get_sale_price() );

		if ( $price > 0 && 'yes' === $enable_percent_mark ) {
			$sale_label = '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			$sale_label = esc_html__( 'Sale', 'netzen' );
		}

		return '<span class="qodef-woo-product-mark qodef-woo-onsale">' . $sale_label . '</span>';
	}
}

if ( ! function_exists( 'netzen_add_out_of_stock_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function netzen_add_out_of_stock_mark_on_product() {
		$product = netzen_woo_get_global_product();

		if ( ! empty( $product ) && ! $product->is_in_stock() ) {
			echo netzen_get_out_of_stock_mark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'netzen_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string
	 */
	function netzen_get_out_of_stock_mark() {
		return '<span class="qodef-woo-product-mark qodef-out-of-stock">' . esc_html__( 'Sold', 'netzen' ) . '</span>';
	}
}

if ( ! function_exists( 'netzen_add_new_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function netzen_add_new_mark_on_product() {
		$product = netzen_woo_get_global_product();

		if ( ! empty( $product ) && $product->get_id() !== '' ) {
			echo netzen_get_new_mark( $product->get_id() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'netzen_get_new_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @param int $product_id
	 *
	 * @return string
	 */
	function netzen_get_new_mark( $product_id ) {
		$option = get_post_meta( $product_id, 'qodef_show_new_sign', true );

		if ( 'yes' === $option ) {
			return '<span class="qodef-woo-product-mark qodef-new">' . esc_html__( 'New', 'netzen' ) . '</span>';
		}

		return false;
	}
}

if ( ! function_exists( 'netzen_woo_shop_loop_item_title' ) ) {
	/**
	 * Function that override product list item title template
	 */
	function netzen_woo_shop_loop_item_title() {
		$option    = netzen_get_post_value_through_levels( 'qodef_woo_product_list_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h5';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title woocommerce-loop-product__title">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
		echo wp_kses_post( get_the_title() );
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'netzen_woo_template_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function netzen_woo_template_single_title() {
		$option    = netzen_get_post_value_through_levels( 'qodef_woo_single_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h3';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title product_title entry-title">' . wp_kses_post( get_the_title() ) . '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'netzen_woo_single_thumbnail_images_columns' ) ) {
	/**
	 * Function that set number of columns for thumbnail images on single product page
	 *
	 * @param int $columns
	 *
	 * @return int
	 */
	function netzen_woo_single_thumbnail_images_columns( $columns ) {
		$option = netzen_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		}

		return $columns;
	}
}

if ( ! function_exists( 'netzen_woo_single_thumbnail_images_size' ) ) {
	/**
	 * Function that set thumbnail images size on single product page
	 *
	 * @return string
	 */
	function netzen_woo_single_thumbnail_images_size() {
		return apply_filters( 'netzen_filter_woo_single_thumbnail_size', 'woocommerce_thumbnail' );
	}
}

if ( ! function_exists( 'netzen_woo_single_thumbnail_images_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function netzen_woo_single_thumbnail_images_wrapper() {
		echo '<div class="qodef-woo-thumbnails-wrapper">';
	}
}

if ( ! function_exists( 'netzen_woo_single_thumbnail_images_wrapper_end' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function netzen_woo_single_thumbnail_images_wrapper_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'netzen_woo_single_related_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for related product list on single product page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function netzen_woo_single_related_product_list_columns( $args ) {
		$option = netzen_get_post_value_through_levels( 'qodef_woo_single_related_product_list_columns' );

		if ( ! empty( $option ) ) {
			$args['posts_per_page'] = intval( $option );
			$args['columns']        = intval( $option );
		}

		return $args;
	}
}

if ( ! function_exists( 'netzen_woo_product_get_rating_html' ) ) {
	/**
	 * Function that override ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float $rating
	 *
	 * @return string
	 */
	function netzen_woo_product_get_rating_html( $html, $rating ) {
		if ( ! empty( $rating ) ) {
			$html  = '<div class="qodef-woo-ratings qodef-m"><div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= netzen_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= netzen_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '</div></div>';
		}

		return $html;
	}
}

if ( ! function_exists( 'netzen_woo_get_product_search_form' ) ) {
	/**
	 * Function that override product search widget form
	 *
	 * @return string which contains html content
	 */
	function netzen_woo_get_product_search_form() {
		return netzen_get_template_part( 'woocommerce', 'templates/product-searchform' );
	}
}

if ( ! function_exists( 'netzen_woo_get_content_widget_product' ) ) {
	/**
	 * Function that override product content widget
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function netzen_woo_get_content_widget_product( $located, $template_name ) {

		if ( 'content-widget-product.php' === $template_name && file_exists( NETZEN_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php' ) ) {
			$located = NETZEN_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'netzen_woo_get_quantity_input' ) ) {
	/**
	 * Function that override quantity input
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function netzen_woo_get_quantity_input( $located, $template_name ) {

		if ( 'global/quantity-input.php' === $template_name && file_exists( NETZEN_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php' ) ) {
			$located = NETZEN_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'netzen_woo_get_single_product_meta' ) ) {
	/**
	 * Function that override single product meta
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function netzen_woo_get_single_product_meta( $located, $template_name ) {

		if ( 'single-product/meta.php' === $template_name && file_exists( NETZEN_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php' ) ) {
			$located = NETZEN_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'netzen_woo_add_search_widget_icon' ) ) {
	/**
	 * Function that add search icon into global js object
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	function netzen_woo_add_search_widget_icon( $array ) {
		$array['iconSearch'] = netzen_get_svg_icon( 'search' );

		return $array;
	}

	add_filter( 'netzen_filter_localize_main_js', 'netzen_woo_add_search_widget_icon' );
}

if ( ! function_exists( 'netzen_woo_add_product_single_price_holder' ) ) {
    /**
     * Function that render additional content around price on product single page
     */
    function netzen_woo_add_product_single_price_holder() {

        $product = netzen_woo_get_global_product();
        $price = $product->get_price();

        $currency_data = netzen_get_currency_data();

        if ( !empty( $price ) && !empty( $currency_data ) ) {

            $price_in_dollar = $price * $currency_data['currency_rate_usd'];
            $eth_price = round( $price_in_dollar / $currency_data['ethereum_rate_usd'], 5 );

            echo '<div class="qodef-woo-price-holder"><span class="qodef-price-label">' . esc_html__('Current price:', 'netzen') . '</span><span class="qodef-ethereum-price">' . netzen_get_svg_icon( 'ethereum' ) . esc_html( $eth_price ) . '</span>';
        }
    }
}

if ( ! function_exists( 'netzen_woo_add_product_single_price_holder_end' ) ) {
    /**
     * Function that render additional content around price on product single page
     */
    function netzen_woo_add_product_single_price_holder_end() {

        $product = netzen_woo_get_global_product();
        $price = $product->get_price();

        $currency_data = netzen_get_currency_data();

        if ( !empty( $price ) && !empty( $currency_data ) ) {
            echo '</div>';
        }
    }
}

if ( ! function_exists( 'netzen_woo_add_product_single_categories' ) ) {
    /**
     * Function that render categories on product single page
     */
    function netzen_woo_add_product_single_categories() {

        $product = netzen_woo_get_global_product();

        $id = $product->get_id();
        $categories = get_the_terms( $id, 'product_cat' );

        if( !empty( $categories ) ) : ?>
            <div class="qodef-e-catrogories-holder">
                <?php foreach ( $categories as $category ) {

                    $category_id = $category->term_id;

                    $taxonomy_image_meta = get_term_meta( $category_id, 'thumbnail_id', true );
                    $taxonomy_image      = ! empty( $taxonomy_image_meta ) ? $taxonomy_image_meta : get_option( 'woocommerce_placeholder_image', 0 );

                    $category_link = get_term_link( $category_id, 'product_cat' );

                    if ( ! empty( $taxonomy_image ) ) { ?>
                        <div class="qodef-e-category">
                            <a href="<?php echo esc_url( $category_link ); ?>">
                                <?php echo wp_get_attachment_image( $taxonomy_image, 'thumbnail' ); ?>
                            </a>
                            <a href="<?php echo esc_url( $category_link ); ?>">
                                <span class="qodef-e-category-name"><?php echo esc_html( $category->name ); ?></span>
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        <?php endif;
    }
}

if ( ! function_exists( 'netzen_woo_change_default_product_tabs' ) ) {
    /**
     * Function that removes description tab and adds 'Details' tob on product single page
     */
    function netzen_woo_change_default_product_tabs( $tabs ) {

        unset( $tabs['description'] );

        $tabs['details'] = array(
            "title"     => esc_html__("Details", 'netzen'),
            "priority"  => 10,
            "callback"  => "woocommerce_template_single_excerpt"
        );

        return $tabs;
    }
}

if ( ! function_exists( 'netzen_add_product_single_description' ) ) {
    /**
     * Function that render description (content) on single product page
     */
    function netzen_add_product_single_description() {

        echo '<div class="qodef-woo-single-content-holder">';
        the_content();
        echo '</div>';
    }
}
