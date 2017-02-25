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
define('AUTH_KEY',         '~-GHSE4nfG(lN9i#u{f7]iZNAxamsOFXidT,L62]/Q}OeqtepEyNFN@}x@u=m@/0');
define('SECURE_AUTH_KEY',  'hnC2dCq*@77^S`#ylWic|Nw5$Ta9BXBytHM41Vjm7$kP]odetS2]e(!MzF{luy+G');
define('LOGGED_IN_KEY',    '2]LoM:J|Zv .sV/bJSnW/}#=6`mvpr,DEOwz2`ZN~m|~`1Iij1TvZjbVb?7.f#uH');
define('NONCE_KEY',        '8E7El|EET-XKP:yN%is2OMKC<(*elD<z+0bB+MT[(t,3#wc-:,G!w_!pF{XbRfRM');
define('AUTH_SALT',        '$Q,]P=Z1_2;Km%w~PY:5|(&En]/m1 -u>pSAD:pzV0&`8Q6mU3]fzU%s?^)<1U5;');
define('SECURE_AUTH_SALT', 'KCv:$1lCk=<K@n/q;ku^,>ON}b*LXwmFk`%YD*&28rB[ZS/7]V;8<9|d0E1]Hi*W');
define('LOGGED_IN_SALT',   'UP1pQAy3pI*LJ|I:3Af?J7hC%O7b_EFkl/0IpodzY#hSe1+{cU 0aHH$EM2~<:]7');
define('NONCE_SALT',       'p/so*GODERUYs6JeC}?,`y`IQ:[,|w6}!B7K%/%Q~5hB-]e|%+<V8Sns&H.T30>u');

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
