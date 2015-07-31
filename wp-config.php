<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1G<BoLTHlj{pZ?7 OPoWE708kxRh=T=%;SFJ7fC_Xd Fs8(4u!sb|`Kn_P8kxzrm');
define('SECURE_AUTH_KEY',  '75F|c`!O=xzIfE,L-gtN%:ukEX*+*!c>Gv,We.E&T56Cu7sb*h-ghS%.zv$u;4^1');
define('LOGGED_IN_KEY',    '=K3<:[|~o`&Y<2J.RnYynCs&FtdW.-jcY7NbA#-I@]_$O,kw:Nu}1<5zh:+Ftp?C');
define('NONCE_KEY',        'amX|&K2*-//VZ*7|-(pa=IZ$?O?h(xYlG>~W_BGUD4~Mx6B$x=d[YFtBVGyM9k+A');
define('AUTH_SALT',        'yB60*}1WwO&~t{yHD*5$tIhJQ^dr,-WlOV-(7uTqt|S&~~-vxo/X})T])j6^}Rkz');
define('SECURE_AUTH_SALT', '0ykhzhJ7v|Y;SJEU5(*]|DWAG}mlLU+v`0-o}0fWwa#Y5(P(xIqNiW>2_Wv+uAB5');
define('LOGGED_IN_SALT',   'PJF=x/n#kSFl+]]F{Z|k.9_OpRymPg%8F]U08K)k-*7Y$+XeBsVEOiic[U^YdY^v');
define('NONCE_SALT',       '.)o]srlDZ[nN%dzR i6=/K}X7N+( .4/(Rs?pe[aoSCA`k$( ggX@Z(fr#[mjQTO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tutannet_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
