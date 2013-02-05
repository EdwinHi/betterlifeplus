<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
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
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '?13AiKq!sAAM$t:LgX5LB}u9rDK&v[fhj:J@mc%B!QUk[v@esBd=3IM9ZXov,V{3');
define('SECURE_AUTH_KEY',  '?Tvpn0IuDi6n/{N2R&ogNKxWv]y?xl&p^rS^-3cOI?# z3AhYD42Mi$V}a]4.LQp');
define('LOGGED_IN_KEY',    '_$n.<;#:MrG;J/Zp+TB49qI.a|^CG$K3ptQxs|;%O+w}XE-[Hx2&{2m a4J7eumw');
define('NONCE_KEY',        ' !wiHafy7)X^^N|F1D=e_hmS9{%*~%>qAYfreRyPCN[:4zt{#2My+JN*Wq@,ez2|');
define('AUTH_SALT',        '*>]_7`T+T?M;Nd7zvb3,[Y<%/oJ(^dl..4srC6B}1#/SG;NBCk&(k(Ny^8vy$m}s');
define('SECURE_AUTH_SALT', 'O=HCLm;+[,1|R<TDX%.3h{]KXD6wjdK6gf9Dq|J9WqNM0TwJm7B 9s:A^uZ,Lz12');
define('LOGGED_IN_SALT',   'Us> ^A%&pt^?F!Sx8o/[75~JvuBb(HEl;OpEzpF79i=mKk^REj>]*9_JCgYU-2w4');
define('NONCE_SALT',       ')v-HD.AL%(K51k^l|f:GQC*+ErJ}]#<vy;}/S.t7!YfEuOqk2=^,k=zdK&|K?:bb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
