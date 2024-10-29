<?php

// Enable Shortcode in Text Widget
add_filter('widget_text', 'do_shortcode');

if (!function_exists('aliexpress_affiliate_settings_notice')) {
  function aliexpress_affiliate_settings_notice() {

      if (aliexpress_affiliate_check_settings_complete()) {
        return;
      }

      ?>
      <div class="error">
          <?php
          $settings_page_url = add_query_arg(array('page'=>'aliexpress-affiliate-settings-page'),admin_url('options-general.php'));
           ?>
          <p><?php echo ALIEXPRESS_AFFILIATE_NAME . ': '.__( 'Please complete plugin configuration !', 'aliexpress-affiliate' ); ?>&nbsp;<?php
            echo sprintf('%s%s%s',
              '<a href="'.esc_url($settings_page_url).'">',
              __('Click Here','aliexpress-affiliate'),
              '</a>'
              );
          ?></p>
      </div>
      <?php
  }
}
add_action( 'admin_notices', 'aliexpress_affiliate_settings_notice' );


if (!function_exists('aliexpress_affiliate_curl_check_notice')) {
  function aliexpress_affiliate_curl_check_notice() {

      if (function_exists('curl_init')) {
        return;
      }

      ?>
      <div class="error">
          <p><?php echo ALIEXPRESS_AFFILIATE_NAME . ': '.__( 'CURL module not available in your hosting. Without it, plugin can not work!', 'aliexpress-affiliate' ); ?></p>
      </div>
      <?php
  }
}
add_action( 'admin_notices', 'aliexpress_affiliate_curl_check_notice' );
