<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tutannet');

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
define('AUTH_KEY',         'WK,z.&++QY3P`8%[|}!~u({+{r>|JuP<:9D|iGWojicBX~g0 Whs,{(K+ yETo~}');
define('SECURE_AUTH_KEY',  'D9DwjK0=Lh8.sCp`h?]Q&:u>>o{xWo%{)]x<B|dW@YEs%Kb+0WP(H3/,{OHTH!Tx');
define('LOGGED_IN_KEY',    ' r1^F3$f=sH`M1Jf536bv4icU}QRz))P&kJ|H+hT/r:EdF[$T:Bqy!eT=uYRwXYn');
define('NONCE_KEY',        'Jq)Kk{1ZeHMm,]+eYL-##2W]N5@DH$B(EP$[GQ2<mT&Dh^mT,*tR|)%!-F1uG#L3');
define('AUTH_SALT',        '20dg|MXyK?*7{c#ww|;}xOmySD)da?yySY05 ! *}}) @rqXl++f-@~l0%=,d(d?');
define('SECURE_AUTH_SALT', '2SF|bf.&,t5{0c8j mDw_/l32#9iRBZlGtV9+2R}/[j3gESDNa0K/zDD3D+H9UbY');
define('LOGGED_IN_SALT',   'qy7sAYP701k|x|pQbT?B-]q!2gDSJ$Rh P.jl;.&<1%:fMt-SfI jt:r-#MG8fAd');
define('NONCE_SALT',       '?`2UPz1etUC4z-#IT*X0tb3=!o1Off5g6uCIg.rPu:CW9GoPnp:%*q|+uG9UVCS+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tutannet_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
