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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'kennethjulianda');

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
define('AUTH_KEY',         'X{Q32Gr8pwMk[Cex[Yq.&ND+X+v|H;F^wgC7#~;T,KI_mn3<F80X&7+//#}K|L-t');
define('SECURE_AUTH_KEY',  '<aL:%7HTI?w|T2}B`,Ge/Gwt7*K<?9EV<,z.KM&MeM!;{ZMUGYcXjH}TRYe[}&Rl');
define('LOGGED_IN_KEY',    'P$1c70@g^B,/S~74#;Ea+dt[yZF.L04^U2(.F1io ]$MKmx.2A7P:Jf2bIzd/&;T');
define('NONCE_KEY',        '&~SqNYqL_zX|(:SsVkPMFbg6,D|je?Kz4t9H>0-bQp<eA+hh)@TQ<=q;XgeO5L(Z');
define('AUTH_SALT',        '?9l]$kz|u-tgc4}rv19!DTsz&3zxkZ{(bI28(+TMLbIz1B4#(5k&hCQdHNma!M$a');
define('SECURE_AUTH_SALT', 'ElAjeR/L0CVtS!yc1@/8pbqlP>cZX)1#sPR({ZL)0t|x^v!.+eT?z^(5M^{Cxi/s');
define('LOGGED_IN_SALT',   'RDy8PWJ$OUdN/G1^E6HI s[9nG{BgmvZVx}4oEg=aM]7Y,mR5aja)9hQY)nwqO`m');
define('NONCE_SALT',       '7i*k!JSfT]SH|pK9^U(S!.PKJLzLeLOdjN^}L4s`]=(R,?o2fpiZl2F|;<)LYbyn');

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
