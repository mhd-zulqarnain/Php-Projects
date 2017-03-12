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
define('DB_NAME', 'wp');

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
define('AUTH_KEY',         ' q7Z=E!X_Wj0Z;q8spcL6(&WnOu!c|bduoX$9rIb?AlKuC87z6=m^6_+*FIP9NWF');
define('SECURE_AUTH_KEY',  'E./mAmjl(hMve9qf$:>Y&iW68cktEWQJEaU?wJgW;j%_&.!%2If*S?Rb)W1knuj:');
define('LOGGED_IN_KEY',    '%$>scHpua.kxP?Zy]$~hb$=#8/7_J[Pa{!aE%Pu/|xoenW@{^P^`ETNb>$a&,l.m');
define('NONCE_KEY',        'c/(/a)sFzguEY&Lr3:X}>[(d`1?;)}v#NSxO7h7#oxYS.F!OY%w}~{FDKn_8QLbX');
define('AUTH_SALT',        '*hOvo(L75P]nMWud]-{[N)oEPp^cJuUweDlst1jPoww!i75ovGxsg#XTJCTUWmE1');
define('SECURE_AUTH_SALT', 'G;W_PCXe4?^$U6!eHi kZC?d[w&Acy5{NbSHMS/7 =M(PG*[RpdCfU{}tDsC=F3|');
define('LOGGED_IN_SALT',   '[)G&RQ_&H[zP2hb2>LCwj@)TWk#v~W[?fE#u3ReG2}jTO34S(ofy4AZpqUThBq83');
define('NONCE_SALT',       'vAJF!;]5+SZm4L~YxJrUJIAcU*W2yRLzx0SG :t[Z#p46^LDKL4XJu^f(;tQR8R~');

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
