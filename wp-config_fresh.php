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
define( 'DB_NAME', 'knovkope_wp436' );

/** MySQL database username */
define( 'DB_USER', 'knovkope_wp436' );

/** MySQL database password */
define( 'DB_PASSWORD', 'p2[7()6TESz!M7' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'j95w8eynkhyzrsmuccivpmlzzc6xzvzrcw6dpt0un86a3wnjja5zsnja0elnpatc' );
define( 'SECURE_AUTH_KEY',  'kcidn9jyiwbeyecewf6ackfj3nthkn6enzgyv1xmgz5pmrsnxbllr3la7osbrmrl' );
define( 'LOGGED_IN_KEY',    '6x2q9jcpeqtflkk6tutjcuuehz4iqkaafvatefjm8bxl0zlulw0af5sk9fwmngk2' );
define( 'NONCE_KEY',        'nanhua5vdfmktpj3tcsut4yrlikiooef32f2dmlnqdfccwziuoijya2gsk0azioy' );
define( 'AUTH_SALT',        'ugrrxngewcj3znxrgq3gwvj7sfxv2w3bgsdfaa4oonqdtv9pb5ahqwbomodjzgen' );
define( 'SECURE_AUTH_SALT', 'rfbd7o7qo9sc6vzwd1m2lm2we3ha6ob3ofgqw3vjtfsdstf3syai1nzb2g86esop' );
define( 'LOGGED_IN_SALT',   'tgiljlmuy06ybcrxb6jewngt6lwzfmeeilze0hbtaipdjbvru0pwllkcwdb2tjel' );
define( 'NONCE_SALT',       'ltm8u8h6tokhwdxd3rteto6itua3zhmpddsrdniinytbfl80riwijulhx5y7njy0' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpca_';

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
