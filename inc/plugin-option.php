<?php
function aliexpress_affiliate_plugin_option_init(){

  $aliexpress_settings = array(
    'page_title'  => __('Aliexpress Affiliate Settings','aliexpress-affiliate'),
    'menu_title'  => __('Aliexpress','aliexpress-affiliate'),
    'capability'  => 'administrator',
    'menu_slug'   => 'aliexpress-affiliate-settings-page',
    'option_slug' => 'aliexpress_affiliate_option',

    // tab start
    'tabs' => array(

      'api' => array(
        'id'    => 'api',
        'title' => __('AliExpress API','aliexpress-affiliate'),
        'sub_heading' => __('Enter API Informations','aliexpress-affiliate'),
        'fields' => array(
          'api_key' => array(
            'id'          => 'api_key',
            'title'       => __('API Key','aliexpress-affiliate'),
            'type'        => 'text',
            'description' => __('Example','aliexpress-affiliate').': '.'66334',
            ),
          'tracking_id' => array(
            'id'          => 'tracking_id',
            'title'       => __('Tracking ID','aliexpress-affiliate'),
            'type'        => 'text',
            'description' => __('Enter Tracking ID','aliexpress-affiliate'),
            ),
          'digital_signature' => array(
            'id'          => 'digital_signature',
            'title'       => __('Digital Signature','aliexpress-affiliate'),
            'type'        => 'text',
            'description' => __('Enter Digital Signature.','aliexpress-affiliate').' '.__('Example','aliexpress-affiliate').': '.'aCMWZiIpBdB',
            ),

          ),

        ),

      'general' => array(
        'id'    => 'general',
        'title' => __('General','aliexpress-affiliate'),
        'fields' => array(
          'default_category_id' => array(
            'id'          => 'default_category_id',
            'title'       => 'Default Category ID',
            'type'        => 'text',
            'default'     => 44,
            'description' => __('Enter Default Category ID','aliexpress-affiliate'),
            ),
          'caching_duration_hours' => array(
            'id'          => 'caching_duration_hours',
            'title'       => 'Caching Hours',
            'type'        => 'number',
            'default'     => 2,
            'description' => __('Enter Caching Hours. Example: Enter 2 for 2 hours of caching','aliexpress-affiliate'),
            ),
          ),
        ),

      ),
    // tab end

    );

  $aliexpress_affiliate_object = new NPF_Options($aliexpress_settings);

  global $aliexpress_affiliate_options;
  $aliexpress_affiliate_options = $aliexpress_affiliate_object->get_options();
}//end function

add_action('init', 'aliexpress_affiliate_plugin_option_init');
