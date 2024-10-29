<?php

function aliexpress_affiliate_plugin_init() {
  load_plugin_textdomain(
    'aliexpress-affiliate',
    false,
    dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
  );
}
add_action('init', 'aliexpress_affiliate_plugin_init');

// Add settings link on plugin page
function aliexpress_affiliateplugin_settings_link($links) {
  $settings_page_url = add_query_arg(array('page'=>'aliexpress-affiliate-settings-page'),admin_url('options-general.php'));
  $settings_link = '<a href="'.$settings_page_url.'">'.__('Settings','aliexpress-affiliate').'</a>';
  array_unshift($links, $settings_link);
  return $links;
}

add_filter("plugin_action_links_".ALIEXPRESS_AFFILIATE_PLUGIN_BASENAME, 'aliexpress_affiliateplugin_settings_link' );
