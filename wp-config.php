<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '############' );

/** Database username */
define( 'DB_USER', '############' );

/** Database password */
define( 'DB_PASSWORD', '#############' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ';(!+E*7W2;kg36zl?JIK:xf=9BA+:%?vBW]<3r>q8Bs;7_mlS`l/pNgs%|lkZm:#' );
define( 'SECURE_AUTH_KEY',   'nI([V3kc3H0 Fq~KhKqQd3D(x~MUkM9V`eL@cUKgNqj<S9JHy-D`pz7ODVLRhL1+' );
define( 'LOGGED_IN_KEY',     'Xo N^=6!YrsuYlY3vKkUNp476XTS*)!XN/37&mq H1Pk%(.|47hv1Se&#3N2[vjd' );
define( 'NONCE_KEY',         'qqe$l_rCP?ryeqvT@055+uAQ/AQX*LXO0Oc3!h*_j*3AEuP|9fBr(YTR|H~Le9Lt' );
define( 'AUTH_SALT',         ':f )9BLM~$?ZoZa6=2v.Rw^T^UU>5jJ>isiVl9qlGD;rkCUb5sr~Dbsmf-Nlb(zm' );
define( 'SECURE_AUTH_SALT',  'mN=GR12<ItPz1Gn05q9YUfiq+4t@og)2)Fl}LZ9>@F)4AmQhVY3.mcG9^7[JY6jN' );
define( 'LOGGED_IN_SALT',    'vaj@2fFy|gfHHjp$;?b1NKs(-~U-df2d1^_$0_LgjLt)$zl#mhR1OU@j2dcz6$5Q' );
define( 'NONCE_SALT',        'jn&]gL1q!4eWx7VkVQB~ey[|vKwDJ k!,W3vw$>x<KjiU7 :SW:6<HE,O~.%cN:a' );
define( 'WP_CACHE_KEY_SALT', 'Ml163AAclk&FR 8?2_F}`i5BK3hZ/NHa:!@gLDB,aEru9Jb3xGOq:R&J(n+`@p#6' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
