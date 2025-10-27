<?php
/**
 * Plugin Name: Movies Custom Post Type
 * Description: A custom post type plugin for Movies with custom taxonomy and fields.
 * Version: 1.0
 * Author: Abirovi
 * Text Domain: movies-cpt
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Include required files
require_once plugin_dir_path( __FILE__ ) . 'includes/register-posttype.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/register-taxonomy.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/register-metabox.php';
