<?php

/**
 * Set the Google Map Api Key
 *
 * @param $api
 *
 * @return mixed
 */
function mgwpoff_register_googlemap_api() {

	acf_update_setting('google_api_key', 'AIzaSyBRSSFQzl1Rp676GDg1VeOAgkMYHajuj7M');
}

add_action('acf/init', 'mgwpoff_register_googlemap_api');