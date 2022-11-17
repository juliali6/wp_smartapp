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
define( 'DB_NAME', 'julia' );

/** Database username */
define( 'DB_USER', 'julia' );

/** Database password */
define( 'DB_PASSWORD', 'MVk2WrtUmcJaITwn' );

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
define( 'AUTH_KEY',         '8rPb1W;?UmFtE1#O2MpT2:e*h0tNj>v`v.>-}r~l=?a/a:s-H:KVAhU-A&(uhcc:' );
define( 'SECURE_AUTH_KEY',  'bw0zc8^sXYitN/axjf!J@BQR!DgingrSJ6iJwjS#o@FC4<J@kF|n[*,nJm4s5*Nq' );
define( 'LOGGED_IN_KEY',    'nQp3M!0cEpvcp+j|5rq}JFzmde{6mV y7{_68y l_uxza*%@n]d3M<[~9C+KSpV_' );
define( 'NONCE_KEY',        'M^*51ud>K;zQ7r4&v^:/G+{.4r+`$pjA[q5&kr8Fu;v*^3Wmxup24Zl~;Z) &D*4' );
define( 'AUTH_SALT',        'nE+Pzm&ZLm^MgIM/(xd@v3`7,,,=O:CiD?NG kZ0L=UnVb)C=-rmBbYjj1cyxSzN' );
define( 'SECURE_AUTH_SALT', 'TV bj;iUD(`Ec|MG^(jEwt*HtuS-uMpV2 aoHWDXRtA2ErCNu45dxWggTbG^BIfV' );
define( 'LOGGED_IN_SALT',   '`$/Jj@4vob[j5H@ Q<~heKi/tMHVCKU9]-_H&3lq_3db2?Ptzk:BPK$;CR&0rbJo' );
define( 'NONCE_SALT',       'fBCS@*f8/k=]i4C(&N~0=|}=8? XHI0<Iw%wdf<S6)vv1q$fE_TQzXW)B aXGH0y' );

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
