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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'honestbrew' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0+:q{MY<W^,L.Lo#Hkc(`,@r>`07~^5(TSDo3mpd7tF4Wv1e~GoR~y5X*_b=`,gG' );
define( 'SECURE_AUTH_KEY',  'B6VgV>n}`^&3i)-P5(XB/!OkJeI]fWo,*T_Zh@BCSgnV%Dy=CZQR6XF$Ae`)S46K' );
define( 'LOGGED_IN_KEY',    '6TC4p?gRc/bvIjXbY~,F=v&.[pZ}@yKc>@x/72BJ9I/Dy9`1ep2EI*4IX^g .ZQw' );
define( 'NONCE_KEY',        '^!$>CdV2t{d>+ qrp.bS7PZp%D,`]W{9fM*RV@i&v&!qD1&*aCIjjlada4{xZu}A' );
define( 'AUTH_SALT',        '0A?px|_<+VGSJH,QLff Nm,d>Bdq<WrC&=;?xq>>j g^:@fF:Xa#`=H!Iumc/p#3' );
define( 'SECURE_AUTH_SALT', '+kgw+4i_.YNR1v:K*dM2,F~#tX,,.M#%F{-ha)7@&a`hi:df61<;w>)d%IK;i$!C' );
define( 'LOGGED_IN_SALT',   'FfIRri;iy*AY},Ltdp=T:6XTOf5yrZn]:KC2Spvu8Z(qP(`Y))<L*:D)p*jT&K6m' );
define( 'NONCE_SALT',       'G#2JeHt/EbdMFB4r/wnxp7vL1~1#Hf|6o[#gH[Q$zmd4|^4wUf#)V#YfPun.: TP' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hb_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('WP_DEBUG', true);