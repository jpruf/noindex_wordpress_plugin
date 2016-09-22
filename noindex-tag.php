<?php

/**
 *
 * @link              http://www.jenniferprufer.com
 * @since             1.0.0
 * @package           Noindex_Tag
 *
 * @wordpress-plugin
 * Plugin Name:       Add Noindex Tag
 * Plugin URI:        https://github.com/jpruf/noindex_wordpress_plugin
 * Description:       Add Noindex Tag to the head section of a page
 * Version:           1.0.0
 * Author:            Jennifer Prufer
 * Author URI:        http://www.jenniferprufer.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       noindex-tag
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-noindex-tag-activator.php
 */
function activate_noindex_tag() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-noindex-tag-activator.php';
	Noindex_Tag_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-noindex-tag-deactivator.php
 */
function deactivate_noindex_tag() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-noindex-tag-deactivator.php';
	Noindex_Tag_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_noindex_tag' );
register_deactivation_hook( __FILE__, 'deactivate_noindex_tag' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-noindex-tag.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_noindex_tag() {

	$plugin = new Noindex_Tag();
	$plugin->run();

}
run_noindex_tag();

function add_check_box()
{
    $screens = ['post', 'page'];
    foreach ($screens as $screen) {
        add_meta_box(
            'box_id',           // Unique ID
            'Add Noindex',  // Box title
            'checkbox',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
