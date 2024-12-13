<?php

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
define( 'WP_CACHE', true );
//Begin Really Simple Security key
define('RSSSL_KEY', 'BSYkbvL5k541BIkIdL4e5WL472P6WyiKEJO8EnuvHAVKUtTnmOwBsvSEagZWDdKY');
//END Really Simple Security key

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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'pU;>B[eEb_yHvE[r^sQjtVU*Mx=R&E0uV_DQ8uDZwdpD~}%!~Y0/l-*_:DeC,Ji_' );
define( 'SECURE_AUTH_KEY',  'rPz1]k0R1_H`ca$z2$jg~[TiT)|7*EX6y0;{8d#Y<-}D,&!tLkz3#JXPzXaSQx,]' );
define( 'LOGGED_IN_KEY',    '&iOaRyJ2{%d6iZYnA*Hpm?~?oj@dlI8-Kig& m!Xqp=l0K@.iyb6p2ASAPt2gPWa' );
define( 'NONCE_KEY',        '$BhJG;d}KSw9o:e0Kx:B0,<WB2Z!KMc2Dm=fo}k2uhq~7L<*h/K.<IIY$:IAyt1 ' );
define( 'AUTH_SALT',        '4`<~l4l%n60+0jSJ5faZ]3*HroVe,g?~CCc@OF]~-c97>fbJ}}4jg[!)zf;Lo(L-' );
define( 'SECURE_AUTH_SALT', 'Z-4g%eqp!&4:kMWedlEH;fjLf_&8d<xGE#t|owm:M~orWRx~)[>t9WH}Yl~4G !F' );
define( 'LOGGED_IN_SALT',   'hS>^&Z|-<LnbMtb1_Qq`c<v9)j8c]a{w57)CK[y5]|DzZNiuMhprHS*D5J? xQ<7' );
define( 'NONCE_SALT',       'FIlf@VGW9oHO$T*p4XmB0kr#`z>*qu<t1)=cjd~`xGEPr $t=Zd)/}Zm~VwEM:)|' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
