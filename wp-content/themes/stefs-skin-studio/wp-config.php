<?php
# Database Configuration
define( 'DB_NAME', 'wp_stefsskinstud' );
define( 'DB_USER', 'stefsskinstud' );
define( 'DB_PASSWORD', '0nKbLIkIIdp_3axoZG_G' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'p4:[`FvF> -UeNAs~39-.^C?(v@+B=^yS3}WA^Pi&X@N;:un&;s4Q#}+,:^nI{!`');
define('SECURE_AUTH_KEY',  '+R{ D/@`n?72}pq-(Ffp`Xma<(weeW98y~I`<SbsVa.}ZFQ}.}6`+b8eOQ1WR[`s');
define('LOGGED_IN_KEY',    'bm.MZ3le:BuVQ/ZS5rfic+TfsMkL1,_GtnHb$mmWj?AmyH]]U]APRDZ:MRf3Q8:E');
define('NONCE_KEY',        's2q?8#1M=G(7g-I`wK*I[;lTVewz9 Z^C$SH<Gm8rUIkwsZ8YdG44FGo6.z8xTn.');
define('AUTH_SALT',        'N*u,u[}g~ M1hUR1t:~<Viz)3$-6p3H-$^&g83QJRwT;clqGk@/6>hHX>EPxJCM$');
define('SECURE_AUTH_SALT', 'xv)(+.G4@lz84o0to|J}5uBaBS{a|/**3lxdoVLSvvCG?y)ir1,h%`tqhMl-{P3L');
define('LOGGED_IN_SALT',   'GLgVpF,XMySY 2ERA+<<m2P>@pr!A.@|gDvLh?qYr)fxxnm>N=(Dp<Cf&}QZxTlT');
define('NONCE_SALT',       'Z*T#,40;9yDtZ}V,c3jA<@qLMUKTfg t!h@yZ2vfGB*:W1qIXE*UDf..B4`q:C&w');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'stefsskinstud' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '70eca2a5f5be7402b059d22ecd87b69357235f2e' );

define( 'WPE_CLUSTER_ID', '400371' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '35.190.150.171' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'stefsskinstud.wpengine.com', 1 => 'stefsskinstud.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => '127.0.0.1', );

$wpe_special_ips=array ( 0 => '34.73.53.120', 1 => 'pod-400371-utility.pod-400371.svc.cluster.local', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
