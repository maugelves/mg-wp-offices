<?php

namespace MGWPOFF\cpts;

class Offices
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_office' ), 10 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

		register_activation_hook( MGWPOFF_FILE, array( $this, 'assign_roles' ) );

	}

	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		if  ( 'office' == $screen->post_type )
			$title = __('Introduzca el nombre', MGWPOFF_DOMAIN );


		return $title;
	}



	/**
	 * This function creates the CPT Office
	 */
	public function create_cpt_office() {

		$labels = array(
		    'name'                  => _x( 'Oficinas', 'Post Type General Name', MGWPOFF_DOMAIN ),
		    'singular_name'         => _x( 'Oficina', 'Post Type Singular Name', MGWPOFF_DOMAIN ),
		    'menu_name'             => __( 'Oficinas', MGWPOFF_DOMAIN ),
		    'name_admin_bar'        => __( 'Oficinas', MGWPOFF_DOMAIN ),
		    'archives'              => __( 'Oficinas', MGWPOFF_DOMAIN ),
		    'all_items'             => __( 'Todas las oficinas', MGWPOFF_DOMAIN ),
		    'add_new_item'          => __( 'Agregar nueva oficina', MGWPOFF_DOMAIN ),
		    'add_new'               => __( 'Agregar nueva', MGWPOFF_DOMAIN ),
		    'new_item'              => __( 'Nueva oficina', MGWPOFF_DOMAIN ),
		    'edit_item'             => __( 'Editar oficina', MGWPOFF_DOMAIN ),
		    'update_item'           => __( 'Actualizar oficina', MGWPOFF_DOMAIN ),
		    'view_item'             => __( 'Ver oficina', MGWPOFF_DOMAIN ),
		    'view_items'            => __( 'Ver oficinas', MGWPOFF_DOMAIN ),
		    'search_items'          => __( 'Buscar oficina', MGWPOFF_DOMAIN ),
		    'not_found'             => __( 'No encontrado', MGWPOFF_DOMAIN )
		);
		$rewrite = array(
		    'slug'                  => 'oficinas',
		    'with_front'            => true,
		    'pages'                 => true,
		    'feeds'                 => true,
		);
		$capabilities = array(
		    'edit_post'             => 'edit_office',
		  	'edit_posts'            => 'edit_offices',
		    'edit_others_posts'     => 'edit_others_offices',
		    'read_post'             => 'read_office',
		    'delete_post'           => 'delete_offices',
		    'delete_posts'          => 'delete_offices',
		    'publish_posts'         => 'publish_offices',
		    'read_private_posts'    => 'read_private_offices',
		);
		$args = array(
		    'label'                 => __( 'Oficinas', MGWPOFF_DOMAIN ),
		    'labels'                => $labels,
		    'supports'              => array( 'title', 'editor', 'thumbnail' ),
		    'hierarchical'          => false,
		    'public'                => true,
		    'show_ui'               => true,
		    'show_in_menu'          => true,
		    'menu_position'         => 10,
		    'menu_icon'             => 'dashicons-location-alt',
		    'show_in_admin_bar'     => true,
		    'show_in_nav_menus'     => true,
		    'can_export'            => true,
		    'has_archive'           => true,
		    'exclude_from_search'   => false,
		    'publicly_queryable'    => true,
		    'rewrite'               => $rewrite,
		    'capabilities'          => $capabilities,
		);
		register_post_type( 'office', $args );


	}


	/**
	 * Assign the new CPT roles to the administrator
	 */
	public function assign_roles() {

		$role = get_role('administrator');
		$role->add_cap('edit_office');
		$role->add_cap('edit_offices');
		$role->add_cap('edit_others_offices');
		$role->add_cap('read_office');
		$role->add_cap('delete_offices');
		$role->add_cap('publish_offices');
		$role->add_cap('read_private_offices');

	}




	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['office'] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( 'Oficina actualizado.', MGWPOFF_DOMAIN ),
			4 => __( 'Oficina actualizado.', MGWPOFF_DOMAIN ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( 'Oficina recuperado de la revisión %s.', MGWPOFF_DOMAIN ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Oficina publicado.', MGWPOFF_DOMAIN ),
			7 => __( 'Oficina guardado.', MGWPOFF_DOMAIN ),
			9 => __('Oficina programador', MGWPOFF_DOMAIN ),
			10 => __( 'Borrador de ofcina actualizado.', MGWPOFF_DOMAIN ),
		);

		return $messages;
	}

}
$oficina = new Offices();