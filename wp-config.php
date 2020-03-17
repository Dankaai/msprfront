<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'msprfront' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost/phpmyadmin/' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!5v&3aXLue t`)vcO{Gz,fIh?(F6crMrKyd!3jW<z)K%RT#`$|}*aIUUzIQnyzh=' );
define( 'SECURE_AUTH_KEY',  '$KTqLjS}/*gS%~I&K:lX$g<5?P.,ltxz5~K@*3P1d(x43XPArEf!g,]FYjqj6sqD' );
define( 'LOGGED_IN_KEY',    'Cf1nE(M3*<)=k%3TA#*c]AtDg}@F$j^?e#4=1vj6!pL$9l-Nf9ChiDNs!;}w6LUK' );
define( 'NONCE_KEY',        'x IntrPn=I>OzX9q&N]|c$4wO;Ae3d;c/sC>}5,6NO*`u7qIv&Cq{8#!hV<JjFw0' );
define( 'AUTH_SALT',        '%0=tdYXMDidVEP]5+mN5UT3wfZl02}<w$6LiSyt0f/i)2JK9:(r JmY.%~@cp$V<' );
define( 'SECURE_AUTH_SALT', '{/zb&t3 M{lLf]vO~ud_KSs23?cTt|)V|xvU0Ks*7)8a?$9@kZ2]VS94)o-GL_%m' );
define( 'LOGGED_IN_SALT',   'X6b~[ILk;q/s5dslGEb*g^g}&vjovnfL(c8-&Dy,;&i?mXGuOA-WejR])cUN}?I9' );
define( 'NONCE_SALT',       'BP}9;4t]gB62$=TxLl.F@(aQX|X|4#L|oC(}49gF<.H&3S{&DH|4[JOX`Nw4,&o@' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
