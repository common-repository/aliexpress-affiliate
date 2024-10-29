<?php

if (!function_exists('aliexpress_affiliate_shortcode_bartag_ae_affiliate')) {
  function aliexpress_affiliate_shortcode_bartag_ae_affiliate( $atts ) {

      // Return if CURL does not exists
      if (!function_exists('curl_init')) {
        return;
      }

      // Bail early if settings is not complete
      if ( ! aliexpress_affiliate_check_settings_complete()) {
        return;
      }

      $apply_default = false;
      if ( ! isset($atts['category']) && ! isset($atts['keyword']) ) {
        $apply_default = true;
      }

      global $aliexpress_affiliate_options;

      $category = '';
      $keyword = '';
      if (isset($atts['category'])) {
        $category = esc_attr($atts['category']);
      }
      if (isset($atts['keyword'])) {
        $keyword = esc_attr($atts['keyword']);
      }

      // check if both not available
      if ( empty($category) && empty($keyword) ) {
        $default_category_id = '';
        if (isset($aliexpress_affiliate_options['default_category_id'])) {
          $default_category_id = $aliexpress_affiliate_options['default_category_id'];
        }
        if (!empty($default_category_id)) {
          $category = $default_category_id;
        }
      }

      // Even it is empty then return
      if ( empty($category) && empty($keyword) ) {
        return;
      }

      $args = shortcode_atts( array(
          'category' => '',
          'keyword'  => '',
          'width'  => 250,
      ), $atts, 'ae_affiliate' );

      ob_start();
      ?>
      <?php
        $tr_args = array(
          'category' => $category
          );
        if (!empty($keyword)) {
          $tr_args['keyword'] = $keyword;
        }
        $transient_key = aliexpress_affiliate_generate_transient_key($tr_args);
        $caching_duration_hours = 1;
        if (isset($aliexpress_affiliate_options['caching_duration_hours'])
            && intval($aliexpress_affiliate_options['caching_duration_hours']) > 0
            ) {
          $caching_duration_hours = intval($aliexpress_affiliate_options['caching_duration_hours']);
        }
        $transient_period = $caching_duration_hours * HOUR_IN_SECONDS;
        $ad_arr = get_transient($transient_key);
        if ( false === $ad_arr || 1 == 2 ){

          $ad_arr = aliexpress_affiliate_get_ali_products($tr_args);
          set_transient( $transient_key, $ad_arr, $transient_period );

        }
        $ad_cnt = count($ad_arr);
        $random_item = rand( 0, $ad_cnt - 1 );
        $current_ad = '';
        if (isset($ad_arr[$random_item])) {
          $current_ad = $ad_arr[$random_item];
        }
        if (!empty($current_ad)) {
          echo '<a href="'.esc_url($current_ad->detailUrl).'" title="'.esc_attr($current_ad->subject).'">';
          echo '<img src="'.esc_url($current_ad->imageUrl).'" alt="'.esc_attr($current_ad->subject).'" width="'.esc_attr($args['width']).'" />';
          echo '</a>';
        }

      $output = ob_get_contents();
      ob_end_clean();
      return $output;
  }
}

add_shortcode( 'ae_affiliate', 'aliexpress_affiliate_shortcode_bartag_ae_affiliate' );

