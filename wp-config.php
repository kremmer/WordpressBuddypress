<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'jnprlhcobkportf');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'jnprlhcobkportf');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'RJHdFUmT6mQR');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'jnprlhcobkportf.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g`-Yx@FyKVzI|br[Em?ugII)Tx^{oe1|3JT3LBmXT%mwT;Ar5Bk)=VSfZ|6:e+/u');
define('SECURE_AUTH_KEY',  'CwoQuWM9$JrKLn+{LrMzZz,,)&B|3npTp=oVD8XgLdPBv#vD|g9`c;_uGoqN tuw');
define('LOGGED_IN_KEY',    'z|+sT|$RA$3^<Y(qm=QwMB7<T<^&{nGcXr-pN 5MLR~ua>c&LW-*S=!./)EgKUNx');
define('NONCE_KEY',        '@X(}NUf`w(0XE?0l 5dHSnF7U+$s)MRnkg_0g-,x(;BsyVx.+nPkiZA1e9|U?.6X');
define('AUTH_SALT',        'k+Irn_UBN%(rZ(Duwx](oKvH<t4e9<bYN#qPC2S+8W5DwM*x2q1{7(rr_-PMda{1');
define('SECURE_AUTH_SALT', 'WqJ!k^^C.,#22 }ipNI5[8Trn/U;I+hmr@6zcR2-$9gzF0:9qe>$YFh75#d9TN~5');
define('LOGGED_IN_SALT',   '<Bae/,sGh-6jG_uK->J4J?t;px**F?{A$=+2|k-6y7!&}X)QhL8Z5ZZOO+i`15u@');
define('NONCE_SALT',       'z?0Vlku<(rY/de#^i!f~hTub<qMc`Y$-7i/mc(`bGCU$0Rt^#Q]rp/4{{1L`Qmfr');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');