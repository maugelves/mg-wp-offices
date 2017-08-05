<?php
/*
Plugin Name: MG WP Offices
Plugin URI:  https://github.com/maugelves/mg-wp-offices
Description: WordPress plugin to include offices information on your websites
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mgwpoff
Domain Path: /languages
*/

// CONSTANTS
define( 'MGWPOFF_DOMAIN', 'mgwpoff');
define( 'MGWPOFF_FILE', __FILE__ );
define( 'MGWPOFF_PATH', dirname( __FILE__ ) );
define( 'MGWPOFF_FOLDER', basename( MGWPOFF_PATH ) );
define( 'MGWPOFF_URL', plugins_url() . '/' . MGWPOFF_FOLDER );


/*
*   =================================================================================================
*   PLUGIN DEPENDENCIES
*   =================================================================================================
*/
include ( MGWPOFF_PATH . "/inc/libs/class-tgm-plugin-activation.php" );



/*
*   =================================================================================================
*   CONFIG FUNCTIONS
*   =================================================================================================
*/
include ( MGWPOFF_PATH . "/inc/config.php" );





/*
*   =================================================================================================
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGWPOFF_PATH . "/inc/cpts/*.php") as $filename)
	include $filename;




/*
*   =================================================================================================
*   ADVANCED CUSTOM FIELDS
*   Include all the Advanced Custom Fields you need in the 'includes/acfs/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGWPOFF_PATH . "/inc/acfs/*.php") as $filename)
	include $filename;