<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
define('WP_AUTO_UPDATE_CORE', 'minor');
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'phong123_blog' );
/** Username của database */
define( 'DB_USER', 'phong123_log' );
/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );
/** Hostname của database */
define( 'DB_HOST', 'localhost' );
/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );
/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');
/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uJ/S/3Dz<.D9%eAx0O4Y3k@Xrk)!76y*mp6F803hc0KQK2vc6x9*;eFpNrBjy2AX' );
define( 'SECURE_AUTH_KEY',  'H[DUlMUk;nxnh*=-rS6S,P&c  s2+/j3q,XnQPSGYi]#.5YDs%|FX!wN;EJ7vHW~' );
define( 'LOGGED_IN_KEY',    '*_Ki^fW/Vxq}=!d%11U9gRbO_q4A[M9KOC%WTl9{,5KigJt<7_i>MGkSF2VcE-0&' );
define( 'NONCE_KEY',        '=%GE-e`RbN*Vt@85x/e|nK%^4d(NdB]+VYGWL0eS}Xm$maY7Fc)wNu/MJIgaRayz' );
define( 'AUTH_SALT',        'Gw9rU(6FYZ?AwowX]n}7a4,-)PLi+u,_7M|V#a7AWB7SIY<-BN^[,Q3gEnSuGUFS' );
define( 'SECURE_AUTH_SALT', 'iFl5 D]2ytW0}I*V[/+.Hb8Eg=>!mp#dB7`$J%jK>r&0o0- 7~7;cH<gi}d^H;y.' );
define( 'LOGGED_IN_SALT',   ';stdCNT2[2h&=J1r}-:+zdV@oRtuwM3Lq#4Kea)ae1`}#+)96ygcJYz^z2Y`Ww/>' );
define( 'NONCE_SALT',       'VyUT;rEGYf$#6[`S)OYff l4)eE)FsDSsa,<pe B}iL043Lv,`aJw~d?LrL|r_lA' );
/**#@-*/
/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wpblog_';
/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */
/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
