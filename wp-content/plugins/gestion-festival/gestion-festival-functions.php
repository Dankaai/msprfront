<?php
public function install_db(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS
   artiste (id_artiste bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), type varchar(256), information varchar(256));
   CREATE TABLE IF NOT EXISTS
   boutique (id_boutique bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), type_merchandising varchar(256), is_accessible tinyint(1), latitude varchar(256));
   ");
}