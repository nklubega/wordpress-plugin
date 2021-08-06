<?php
/*
    Plugin Name: Enhanced Carers Plugin
    Plugin URI : 
    Description: A registration form
    Author: Nabil
    Author URI: https:http://localhost/demo-wamp/
    Version :1.0
*/
//MAIN plugin file
if( ! defined( 'ABSPATH' )) {
  die;
}

require_once 'db.php';
//require_once 'insert.php';
register_activation_hook( __FILE__, 'add_tables' );
/*require_once 'C:\wampserver\www\demo-wamp\wp-includes\plugin.php';
require_once 'C:\wampserver\www\demo-wamp\wp-includes\pluggable.php';
require_once 'functions.php';
*/

//add_action('admin_enqueue_scripts', 'enqueue');
add_action('wp_enqueue_scripts', 'enqueue_jquery_form');

add_action('admin_menu', 'addMenu');

function addMenu() { 
    //menus
    add_menu_page('Admin', 'Admin', 4, 'example_options', 'page_content');
    add_submenu_page( 'example_options', 'Categories', 'Categories', 4, 'example_option_1', 'category_details');
    add_submenu_page( 'example_options', 'Languages', 'Languages', 4, 'example_option_2', 'language_details');
    add_submenu_page( 'example_options', 'Shifts', 'Shifts', 4, 'example_option_3', 'manage_shifts');
    add_submenu_page( 'example_options', 'Health', 'Health', 4, 'example_option_4', 'manage_health');
    add_submenu_page( 'example_options', 'Services', 'Services', 4, 'example_option_5', 'manage_services');
    add_submenu_page( 'example_options', 'Dashboard', 'Dashboard', 4, 'example_option_6', 'view_dashboard');
    add_submenu_page( 'example_options', 'Reports', 'Reports', 4, 'example_option_7', 'view_reports');


    

    

  }

  function page_content() {

  } 

  function category_details() {
    global $wpdb; 
    $table_name = $wpdb->prefix."categories"; 

    if (isset($_POST["add"])) {
        $wpdb->insert($table_name, array('Category'=>$_POST["name"]),
        array('%s'));
    }

    $categories = $wpdb->get_results("SELECT * FROM $table_name");
      include_once 'categories.php';

  }

  function language_details() {
    global $wpdb; 
    $table_name = $wpdb->prefix."languages"; 

    if (isset($_POST["add"])) {
        $wpdb->insert($table_name, array('Language'=>$_POST["name"]),
        array('%s'));
    }

    $languages = $wpdb->get_results("SELECT * FROM $table_name");
      include_once 'languages.php';

  }

 function manage_health() {

    global $wpdb; 
    $table_name = $wpdb->prefix."health"; 

    if (isset($_POST["add"])) {
        $wpdb->insert($table_name, array('Condtn'=>$_POST["name"], 'Description'=> $_POST["desc"]),
        array('%s'));
      }

      $conditions = $wpdb->get_results("SELECT * FROM $table_name");  
     include 'health.php';
   
 }

  function manage_shifts() {
    global $wpdb; 
    $table_name = $wpdb->prefix."shifts"; 

    if (isset($_POST["add"])) {
        $wpdb->insert($table_name, array('Shift'=>$_POST["name"], 'Description'=> $_POST["desc"]),
        array('%s', '%s'));
    }

    $shifts = $wpdb->get_results("SELECT * FROM $table_name");
    include 'shifts.html';
  }

  function manage_services() {
    global $wpdb; 
    $table_name4 = $wpdb->prefix."services"; 

    if (isset($_POST["add"])) {
        $wpdb->insert($table_name4, array('servicename'=>$_POST["service_name"], 'Description'=> $_POST["Descrition"]),
        array('%s', '%s'));
    }

    $services = $wpdb->get_results("SELECT * FROM $table_name4");
      include 'service.php';

  }

  function view_dashboard() {
    include_once 'dashboard.php';
  }

  function view_reports() {
    include_once 'report_agency.php';

  }



 //add css and javascript files.
  function files()
 {
     wp_enqueue_style(
         'bootstrap_css',
         plugin_dir_url( __FILE__ ) . '/css/bootstrap.min.css'
     );

     wp_enqueue_style(
         'styles',
         plugin_dir_url( __FILE__ ) . '/css/styles.css'
     );

     wp_enqueue_script(
      'bootstrap_js',
      plugin_dir_url( __FILE__ ) . '/js/bootstrap.min.js'
  );

     wp_enqueue_script(
         'javascript',
         plugin_dir_url( __FILE__ ) . '/js/register.js'
     );


 }        







