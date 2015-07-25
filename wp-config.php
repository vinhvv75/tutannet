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

/** Default language as Vietnamese */
define('WPLANG', 'vi-VI');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'og8{~V!N78riA3vlT$,P+MrI<Y2~Q~}nnL+  3m2[,6SWRfKfv.6]PV/uM8*D Ne');
define('SECURE_AUTH_KEY',  'v6oyv;WNzM;/Y9XmICNTUXlz=,{+T.fs_6!}N!h5a6]toP]v)s`NtEkE%h8?+x;,');
define('LOGGED_IN_KEY',    '`cq@>3gTp*x@}Lh G>nK|HyROKEtfV2<1{-JN]gc[;a=0sqB+ls}[vjp9YDK&4~K');
define('NONCE_KEY',        'Fg/@A;XZQfU>QT1BYLr=6eFZNt-TK#`<-2>e(%RQUE^f8@Hnl7Xd<s=fs1k!-GXs');
define('AUTH_SALT',        'HSle~jf=fHGXmI=9I:AuJpy}ij?Y/Ip4At&V okTq*Dz_}VL^1k_pm8C)*p[4{?_');
define('SECURE_AUTH_SALT', 'T|%T,_HoBX{vA$Uiz,qe_W#$v|yuf;zn^NZdJh>|GSrCCSa#U^g~JCJq=`}P. Ly');
define('LOGGED_IN_SALT',   'swLDXsvV{{bbZ$B$U.sOcudPww&S)Td_E/S)#ofAJ1rWIj#&8l*fR/<^)!{4QXR=');
define('NONCE_SALT',       'FwEy2o6 ,#`cog5(~VmKtWq_6V7iLBWfpVBIy*0ktu?lVN#s-(|gtsWxYu7(qKZF');

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
