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
define('DB_NAME', 'growoffs_wp173');

/** MySQL database username */
define('DB_USER', 'growoffs_wp173');

/** MySQL database password */
define('DB_PASSWORD', 'b50p5@mSX(');

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
define('AUTH_KEY',         'emtcgswpxragmboakwh1uweqjwkbpucpx7ytrfm11ilk5jyqclunc5q6vhlmed7c');
define('SECURE_AUTH_KEY',  '1kebynghfheokw4q4jakfvsh13x8zvpymp0byxkk0bykjir0qh85fd0rs82mbg6l');
define('LOGGED_IN_KEY',    'iqsqfwhfmdxoonfn4ik45nwwv3d7ujxg5dmxcsvadgzssezzzsui3uahpewnhebl');
define('NONCE_KEY',        'p60wrnvqvtu6rmbamau5wpimbj0s3mivibsh0primeoirfgpxwpkgnq3kyactu9j');
define('AUTH_SALT',        '2locmny2lmrmaryfou4pzhtixxxezadlb8bzp8iunootknotcqjre9emcyboolca');
define('SECURE_AUTH_SALT', 'm6wwzfbut68zt3ctc58g2eup2yo8hofm88gxcfo0pguypnjzu0ix99cprhucgmzf');
define('LOGGED_IN_SALT',   'j76d3jksosz1o4yzuihkj9o5aq1u2vdomkswpkbbbhr7ojv1ngrwkrgvamioq15k');
define('NONCE_SALT',       'pnhjvo5oyfy33rty9v3p1ww3zegquncnlch72236hlfquocuejbmsaehcqwwvjte');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpxu_';

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
