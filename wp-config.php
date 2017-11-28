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
define('DB_NAME', 'wp_films_db');

/** MySQL database username */
define('DB_USER', 'wp_film_user');

/** MySQL database password */
define('DB_PASSWORD', '4a54s(&^*gbsdf');

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
define('AUTH_KEY',         'GdJ=(S6kB|7Nyj2%1Al[x$1Gj/BpT-(?vwOX8f^zRZQ*Kj}q{2<w!7>r:Lue(@u|');
define('SECURE_AUTH_KEY',  'J!b=*fp%nKx9O,&)]a)kJtFghx,MPUYw-@qY9J#`hM&=o}HXvj@#82zCXnrv^>+[');
define('LOGGED_IN_KEY',    'BM&[2Reg+d6lil,:1@?,U`H1AANC xPe}+ /D%|E?nL5.J]At]F%WC:G~F.tJ67<');
define('NONCE_KEY',        ':f4H)Gq{:JQ>)Z^e;_KDR VDl?h+s$%%%*I9>QBjL^l@,qvyb[16yh!/=y]Be<0b');
define('AUTH_SALT',        ':v<U/QW-dd,/}1!D-,PUt/ewGQ{6x&AUw?tpYk]|Efs4xiM#aZRH9y4Ot7o7Q^eY');
define('SECURE_AUTH_SALT', '<IPE&2nVFsLb(q.6]rqv2dBz?`6|RnP|SNyzukD2fLd~N4K/s:kU%Qrc`ZI`XunB');
define('LOGGED_IN_SALT',   '^rc/seT?CL<4np!q0 oIdfmz]=@2Mp+8_K%C3~lnKS{CI:~x0<,p/g3bwtVxdgt0');
define('NONCE_SALT',       '04z7: BYJpP$|PM@!.+>>N<*)JL$h;]P^>p<J{FyzlJ1A{l@~B#p7s$@St-]JDti');

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
