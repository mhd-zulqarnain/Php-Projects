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
define('DB_NAME', 'new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'nBCA>AD}Vm+Z# NNR{{=ncX&M)VQ5Ap6gyIyo$ITiTAEgPDR6 ?)hh!nm2^iUp=?');
define('SECURE_AUTH_KEY',  '&JyEppP_S>gp=^&bO{ uWKx50k{csy1pCi%JocHWXMDcM<SkV49W#Anqjguqbc:(');
define('LOGGED_IN_KEY',    '?#;&Q]UTg%dk5Jgb`9?]bWDIrLR-0O$L|TKCNo`JeARI IXSz%df+I~eJb,w$thv');
define('NONCE_KEY',        '7x4 sPd|?U}(l)N!UmZV$s}=J*+hlFD=lKbJcZ^M&u6lND.)^EB`!z4% *}ML~)O');
define('AUTH_SALT',        'f(/QS>;#k)S3AOV{]k0LL+RL`~ I<9mgHF~_5~=8U[qZSCj(H@&n@~w+G+l=RwKr');
define('SECURE_AUTH_SALT', '$5PR3<o:eTSOVIpJchn`piaKk9O F-EaTHh|UQO^t7=B5iWhT.q9(){w7a1!n6h ');
define('LOGGED_IN_SALT',   'kUIIQePM^7t~2x6i:4OU7n!Jw3*alig(1$5#,,K ,_4=CkXRGUDna~A@TZ$snsY:');
define('NONCE_SALT',       'b^6C~.&!w>)N?bRqnq@PD]rV9=t ls[4xB|n2A`C.%~&/vp{QI,+|7/VK<U$l+7C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
