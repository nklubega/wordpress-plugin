<?php

function create_tables()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table_name1 = $wpdb->prefix . "shifts"; 
     $sql1 = "CREATE TABLE IF NOT EXISTS $table_name1 (
      Id int NOT NULL AUTO_INCREMENT,
      Shift TEXT NOT NULL,
      Description TEXT NOT NULL,
      startdate VARCHAR NOT NULL,
      enddate VARCHAR NOT NULL,
      PRIMARY KEY  (Id)
    ) $charset_collate";
    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
    dbDelta( $sql1 );

    $table_name5 = $wpdb->prefix . "languages"; 
     $sql5 = "CREATE TABLE IF NOT EXISTS $table_name5 (
      Id int NOT NULL AUTO_INCREMENT,
      Language LONGTEXT NOT NULL,
      PRIMARY KEY  (Id)
    ) $charset_collate";
    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
    dbDelta( $sql5 );

    $table_name2 = $wpdb->prefix . "categories"; 
     $sql2 = "CREATE TABLE IF NOT EXISTS $table_name2 (
      Id int NOT NULL AUTO_INCREMENT,
      Category LONGTEXT NOT NULL,
      PRIMARY KEY  (Id)
    ) $charset_collate";
    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
    dbDelta( $sql2 );

    $table_name4 = $wpdb->prefix . "services"; 
     $sql4 = "CREATE TABLE IF NOT EXISTS $table_name4 (
      Id int NOT NULL AUTO_INCREMENT,
      servicename LONGTEXT NOT NULL,
      Description LONGTEXT NOT NULL,
      PRIMARY KEY  (Id)
    ) $charset_collate";
    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
    dbDelta( $sql4 );
     

    

    $table_name3 = $wpdb->prefix . "health"; 
     $sql3 = "CREATE TABLE IF NOT EXISTS $table_name3 (
      Id int NOT NULL AUTO_INCREMENT,
      Condtn LONGTEXT NOT NULL,
      Description LONGTEXT NOT NULL,
      PRIMARY KEY  (Id)
    ) $charset_collate";
    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
    dbDelta( $sql3 );

    

    
}

