<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'narc' );

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
define( 'AUTH_KEY',         ':6r|oM]f88&$|WUM|B|L^jzPk%hZ&Up)_hv5:R~w~[7j%k-a@Vp=3rco(J^~z>5T' );
define( 'SECURE_AUTH_KEY',  'Pzs=YejrQ)/O)-A:QiRl[V_`>E8IS0>LUy{v_V uLjnlfsHCyR-+_GYdXV+3z=&Z' );
define( 'LOGGED_IN_KEY',    'bS{1J09<)zlSK!C1.^#nAmg,v%zcJMsxWD=%H!D8r^z7|6w_$} [2f5=xnTL:VqF' );
define( 'NONCE_KEY',        'HWgZ#gjG)M[wZd*<8~HsaEKTAtfo0cg[1VVrkw3-n<3qH BTzBIeZ%{]VvjM>Wd]' );
define( 'AUTH_SALT',        'Y1<VNGJ.LGv#RjDsq0._KYnNc54y(RR;3JF]{nE=Yx0W[j*oFCzW4I2]UNDZmC~#' );
define( 'SECURE_AUTH_SALT', '=8YEvUYy42E]&:xBT=-~mB+4WmGe[^4:XJ:.JoR5uCZ(2>(YTwxZ#IGPL=1NJk)P' );
define( 'LOGGED_IN_SALT',   'kVn!|Q3Cu3bGl_%^~*l$eWlljA)+93l;y+:@hi%N7#fT^5,(/-.:$iJzoypId3E<' );
define( 'NONCE_SALT',       'Qt/EHz|iEA3Y*GWJx5[x=hAjkC#N@AEu-@1%h`V+E|}k[W.mX*9(a6[_B+mR}_5G' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
