<?php
/*
Plugin Name:  Custom Page
Plugin URI:   https://www.google.com
Description:  For custom Page
Version:      1.0
Author:       Dharmil
Author URI:   https://www.google.com
*/

register_activation_hook(__FILE__, 'custompage_activate');
register_deactivation_hook(__FILE__, 'custompage_deactivate');

function custompage_activate()
{
    global $wpdb;
    global $table_prefix;
    $table  = $table_prefix . 'custompage';
    $sql = "CREATE TABLE $table (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name1` VARCHAR(250) NOT NULL,
      `name2` VARCHAR(250) NOT NULL,
      `name3` VARCHAR(250) NOT NULL,
      `name4` VARCHAR(250) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    $wpdb->query($sql);
}
function custompage_deactivate()
{
    global $wpdb;
    global $table_prefix;
    $table  = $table_prefix . 'custompage';
    $sql = "DROP TABLE $table";
    $wpdb->query("$sql");
}


add_action('admin_menu', 'form_data_menu');

function form_data_menu()
{
    add_menu_page('Page', 'Page', 4, __FILE__, 'form_data_list');
}
function form_data_list()
{
    include 'form.php';
}
