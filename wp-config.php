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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'practice1' );

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
define( 'AUTH_KEY',         '5kaKCzTL1SQ@7~=}n-sPHxF+<oPgce&Rj1X;S{Wgc@I?7)[3%oj_{%^C+ Id/?x3' );
define( 'SECURE_AUTH_KEY',  '}L@<Mr^T;dTsT+d^_)LNBNJIlGY#)[%sKl>L+zNWTrm>~~bDI?Nu{Hw.C0Lc:A%k' );
define( 'LOGGED_IN_KEY',    ' n?J8NJt4KxN-}&y^tGcPM&P#I)^9U-(bR1$z@Q&AYS1i@+-&9@ AbN>]VsZ`TdH' );
define( 'NONCE_KEY',        'r#t~{XbSa&~7GHRlTKvhw0jS%4**|%UtrNmM-U+$=*RrXV63p@$D(TC^RIN&b:LU' );
define( 'AUTH_SALT',        'f<=<=4p/Z(~Vo]L(gw+va%lr+^ 9oL^Wsr?/#X|g@tIM|<b]qTA I<o?9eN@j)`t' );
define( 'SECURE_AUTH_SALT', '2)Jg(FGCf`VUBF)M74vny@k](NaC-<7l;&<!&Ak!9Xrifp<f*_V{%&]0QLv. (KG' );
define( 'LOGGED_IN_SALT',   'xzz^iRCt9OR`ZjS7geS]GFZ WATI_zuyuRq9QAb|dB CK,Y|w0]u5;2:`oJD;F!Z' );
define( 'NONCE_SALT',       'M)Y|L,,`7GiJpOXI6COVt@0X7hf_5P~JirXws-{j!I|zHs3YmhR[WPy>VZ+!g:,}' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_MEMORY_LIMIT', '1024M');
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


