<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_59860314bd9aa',
		'title' => __('Offices', MGWPOFF_DOMAIN),
		'fields' => array (
			array (
				'key' => 'field_59860592120fe',
				'label' => __('Teléfono', MGWPOFF_DOMAIN),
				'name' => 'mgwpoff_telephone',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598605a2120ff',
				'label' => __('Fax', MGWPOFF_DOMAIN),
				'name' => 'mgwpoff_fax',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598605db12101',
				'label' => __('Dirección', MGWPOFF_DOMAIN),
				'name' => 'mgwpoff_address',
				'type' => 'google_map',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'center_lat' => '40.407017',
				'center_lng' => '-3.6915096',
				'zoom' => 15,
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'office',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array (
			0 => 'permalink',
			1 => 'excerpt',
			2 => 'custom_fields',
			3 => 'discussion',
			4 => 'comments',
			5 => 'revisions',
			6 => 'slug',
			7 => 'author',
			8 => 'format',
			9 => 'page_attributes',
			10 => 'categories',
			11 => 'tags',
			12 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));

endif;