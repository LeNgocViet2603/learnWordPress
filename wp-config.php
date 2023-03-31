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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hocwp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'NXsNt#xv~Qo:stcG:`fjw3ln4Z}mv|;8?%5!t[`i^-lnlDo_,Y6XO76NeO6an<br' );
define( 'SECURE_AUTH_KEY',  'e;TVkr<5}TsJ9j=<y$xBW>$mQZ&1s0sDv:%DJ~3VK 3jE8{qO`QuJknaK]kN%Ko#' );
define( 'LOGGED_IN_KEY',    'HUtz4Kr7.dE#!M3=dM)GiRoAAE0-@9>(TX{Z00tVD]G]U|:AV17tQ(mWj?-)fpl.' );
define( 'NONCE_KEY',        'oa<Qs*.jXS7jE^D*/[NaKq{rF9~g_%U%#=X[e&^$|G:io_VB+Pr <&e]ZO`0Zmr9' );
define( 'AUTH_SALT',        'j`v?iZeyJzdPM1.u!oJ:#gI+f$_Iw*w_$^iB9R_}Dro]g-M*b}.ql|fA[bG|t9fO' );
define( 'SECURE_AUTH_SALT', 'K_=Hpo*JnI|t(WS0U`?veVD%X&DRtPiv2:.cfU;!4xy6S.u3z5nsc;*r/cdm<9[^' );
define( 'LOGGED_IN_SALT',   '#OuMYk%v}2^/1w_M1#iko|iXmpTHvx>9.JE6C8wC9`v&LVHGjzE}1*[e=5j5u/=e' );
define( 'NONCE_SALT',       'p~)2JJ#5&* +T2Y52xfRcLWO72v76Lx&$kPcpdy&{a@*S!I%->7%,O^lLbQoo6|;' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
