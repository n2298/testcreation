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
define( 'DB_NAME', 'paudala' );

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
define( 'AUTH_KEY',         'a`D]2CZrtce0Z61w8(@/7K;9X(vP*z)xWp}w)P*SV}SRgctD^g^#WV1Sf/PM}bIg' );
define( 'SECURE_AUTH_KEY',  '~@i<Bnk8xL{ Y*uyg8^:aY^f2{[>]t(#;f#K)o>Rl2WsX^F(l;OLOM*VS*({+>5l' );
define( 'LOGGED_IN_KEY',    '6nMG>g;_GC&_<hn6!R#`_6U~O4./_h)%jlx]+f8T}_S1zp#N9VS*B=]FS-]b2l*}' );
define( 'NONCE_KEY',        'LG`y}pj$5ar^oMz-vp<K)uw)<((/}@8*4OG]UfuTh9X9S5xOYo =Q?!:(h]RjH X' );
define( 'AUTH_SALT',        '*k7,a74v>|-<Zj[_7j_Au9uPZNJfps&Tw__lPWQ[~|U{DN G}}MS pf:pIqZzjC|' );
define( 'SECURE_AUTH_SALT', 'q0k:CE//[`/iXdm[{Uuyh@EsLi EM@h&A,LG|2s{P!cKq_fn9&C#qgPjJt,uT=Xu' );
define( 'LOGGED_IN_SALT',   'Mt2@.ZNeK~UjKQg<4N4:Zh!(ox68C)*m%fYN@fVssYo0cIc&d25pLS+@xI{B/Jq^' );
define( 'NONCE_SALT',       'X`hw#zlQ;*$Y8TW*23h7SB9`OC4*?Y;<&gC,`?V.B-Mz,12;uluE0r RlCY0a6XT' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
