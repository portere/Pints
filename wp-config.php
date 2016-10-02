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
define('DB_NAME', 'wordpress-localtest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Q<_9-TSo&z07k6i<T3%j#4Ya]64`R@Bw7 pf0D:?%))x]CwiPaO`=JOxAp0a^Ol^');
define('SECURE_AUTH_KEY',  'VDf|,9HWsXqF[Ma^BiaOCTa[n&gw~OgWC/M<gi|$uG_^rSEElx$>=@plh(S9xb%;');
define('LOGGED_IN_KEY',    '[v*d,hyRjgAP.+RQp+B-Dj]jj7w3D*ahiO0f:3mu86Br%g:#FE(MZ0= OAVKB<^-');
define('NONCE_KEY',        '4wc%,(xtYh#zQG4 WHw6g[YIswdtap*^)>/9Pr+H~({K~/gaP~aYZj{EvZZu18$A');
define('AUTH_SALT',        ',5khMQDL[]=&-*s3QOQG`:v)$;qO7d^P)q>cT<-odbjI&hwO(5FROWkp*&;dv[ew');
define('SECURE_AUTH_SALT', 'RT<jPMgMU).;>W/AO(*Q&jXVVfoR k[2+n3CqPj.b{EK+@r&)9Z-f#BvD>}0+-IX');
define('LOGGED_IN_SALT',   '-!lm2 $VOM4xCIPI}lG3gbm?|z)G~zwKQsSi>G*4{`f2wZe<Kh:f34j`GQU`^l~C');
define('NONCE_SALT',       'my{>qX:]}?2>rP{xkvNOx%l+,)CF`H(=h<|W+)+h6ZlCkQL_1.;ce!*J&Wd(3aoQ');

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
