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
define('DB_NAME', 'oss');

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
define('AUTH_KEY',         'Lmc]k<e3qYYh.Z_7.h6)il*|gp]CHJ?07Z|c?}bSI2,WCeKT*?T46Zm8=WJ_ Y#F');
define('SECURE_AUTH_KEY',  '/&4X?u:n_In&z;kF[a`6oI.%)UbhoVvM},hcd:Blq!PV<3gJs6;ku6nLiL`fmA|&');
define('LOGGED_IN_KEY',    '?J]2SKydO(Fo9en_mx+2U?,1._R}p;X}cRqWwQ-9AQa|:~P`Gx rX;3W=7uS0t.6');
define('NONCE_KEY',        'g-bF-oM$9+]Fj)ivgo8n#qC{VdW<?nIR(QV(cK `@1h,!|2Ee)d%|=N1.bI(XN6U');
define('AUTH_SALT',        '*`BRU5z]z84G*dPWhU%vgG9>|9-LOXdzzEs!0&AGm;c5i,iys!wEB.!_c9pqcT:|');
define('SECURE_AUTH_SALT', 'ep+,jc6vJ97Q&I,y{Ny)oy}GUWpv4sE9jo]T5h~yzjvj7e=&Fkr`gDyLFdfnuS&i');
define('LOGGED_IN_SALT',   'XlBE8Gepv~^)zbLt+,pn37~cR7)}]I`R iL[ nL!2(]%R=ubPATIL$cPe@>W:XN]');
define('NONCE_SALT',       'J*Ty7KQCsiDVZNlq! ]#:DDK,Hp^v(1{+UomZr0N#M#T[e>`.Gb._}V{feBb%#s,');

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
