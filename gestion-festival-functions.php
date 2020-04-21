<?php
public function install_db(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS
   artiste (id_artiste bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), type varchar(256), information varchar(256));
   
   CREATE TABLE IF NOT EXISTS
   boutique (id_boutique bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), type_merchandising varchar(256), is_accessible tinyint(1), latitude varchar(256), longitude varchar(256), heure_debut datetime, heure_fin datetime, informations varchar(256));
   
   CREATE TABLE IF NOT EXISTS
   buvette (id_buvette bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), genre_restauration varchar(256), type_nourriture varchar(256), is_accessible tinyint(1), latitude varchar(256), longitude varchar(256), heure_debut datetime, heure_fin datetime, informations varchar(256));
  
   CREATE TABLE IF NOT EXISTS
   concert (id_concert bigint(20) AUTO_INCREMENT PRIMARY
   KEY, date date, heure_debut datetime, heure_fin datetime, informations varchar(256), FOREIGN KEY (id_artiste) REFERENCES artiste (id_artiste), FOREIGN KEY (id_scene) REFERENCES scene (id_scene));
  
   CREATE TABLE IF NOT EXISTS
   faq (id_faq bigint(20) AUTO_INCREMENT PRIMARY    
   KEY, titre varchar(256), texte varchar(256), information varchar(256));
   
   CREATE TABLE IF NOT EXISTS
   information (id_information bigint(20) AUTO_INCREMENT PRIMARY    
   KEY, texte varchar(256), date date, niveau int(11), type varchar(256));
   
   CREATE TABLE IF NOT EXISTS
   parking (id_parking bigint(20) AUTO_INCREMENT PRIMARY    
   KEY, is_accessible tinyint(1),  heure_debut datetime, heure_fin datetime, information varchar(256), latitude varchar(256), longitude varchar(256));
   
   CREATE TABLE IF NOT EXISTS
   participe_rencontre (id_participe_rencontre bigint(20) AUTO_INCREMENT PRIMARY
   FOREIGN KEY (id_recontre) REFERENCES rencontre (id_rencontre), FOREIGN KEY (id_user) REFERENCES wp_users (ID));
   
   CREATE TABLE IF NOT EXISTS
   rencontre (id_rencontre bigint(20) AUTO_INCREMENT PRIMARY   
   KEY, lieu varchar(256), date date, heure_debut datetime, heure_fin datetime, information varchar(256), nom_artiste varchar(256), latitude varchar(256), longitude varchar(256), is_accessible tinyint(1), FOREIGN KEY (id_artiste) REFERENCES artiste (id_artiste));
   
   CREATE TABLE IF NOT EXISTS
   scene (id_scene bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), taille varchar(256), information varchar(256), latitude varchar(256), longitude varchar(256), is_accessible tinyint(1));
   
   CREATE TABLE IF NOT EXISTS
   stand (id_stand bigint(20) AUTO_INCREMENT PRIMARY
   KEY, nom varchar(256), type varchar(256),  heure_debut datetime, heure_fin datetime, information varchar(256), nom_artiste varchar(256), latitude varchar(256), longitude varchar(256), is_accessible tinyint(1));
   
   CREATE TABLE IF NOT EXISTS
   abonnement (id_abonnement bigint(20) AUTO_INCREMENT PRIMARY
   FOREIGN KEY (id_user) REFERENCES wpusers (ID), FOREIGN KEY (id_artiste) REFERENCES artiste (id_artiste));

   ALTER TABLE wpusers
   ADD user_tel varchar(255), user_firstname varchar(255), user_lastname varchar(255);
   ");
}