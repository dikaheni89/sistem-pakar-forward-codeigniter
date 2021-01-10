<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// costum

// css mode costum login
define('BOOT_CSS', 'assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css');
define('FONT_CSS', 'assets/backend/bower_components/font-awesome/css/font-awesome.min.css');
define('ION_CSS', 'assets/backend/bower_components/Ionicons/css/ionicons.min.css');
define('ADMIN_CSS', 'assets/backend/dist/css/AdminLTE.css');
define('BLUE_CSS', 'assets/backend/plugins/iCheck/square/blue.css');
define('SWEET_CSS', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css');
define('GOOGLEFONT_CSS', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css');
define('TITLE', 'Sign in to start your session Admin');
define('FAVICON_IMAGE', 'media/favicon.png');


// js mode costum login
define('JQUERYMIN_JS', 'assets/backend/bower_components/jquery/dist/jquery.min.js');
define('BOOTMIN_JS', 'assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js');
define('ICHECK_JS', 'assets/backend/plugins/iCheck/icheck.min.js');
define('SWEET_JS', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js');

// css mode costum admin
define('SKIN_CSS', 'assets/backend/dist/css/skins/skin-blue.css');
define('DATATABLEBOOT_CSS', 'assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
define('DATAPICKERBOOT_CSS', 'assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
define('DATERANGE_CSS', 'assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css');
define('BOOT3_CSS', 'assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
define('BOOTTOGGLE_CSS', 'https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css');
define('AJAX_JS', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

// js mode costum admin
define('JQUERYUI_JS', 'assets/backend/bower_components/jquery-ui/jquery-ui.min.js');
define('BOOTTOGLE_JS', 'https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js');
define('MOMENTMIN_JS', 'assets/backend/bower_components/moment/min/moment.min.js');
define('DATATABLE_JS', 'assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js');
define('DATATABLEBOOTMIN_JS', 'assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
define('DATERANGE_JS', 'assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js');
define('DATEPICKER_JS', 'assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
define('BOOT3_JS', 'assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
define('SLIMSCROLL_JS', 'assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');
define('FASTCLICK_JS', 'assets/backend/bower_components/fastclick/lib/fastclick.js');
define('ADMIN_JS', 'assets/backend/dist/js/adminlte.min.js');
define('DEMO_JS', 'assets/backend/dist/js/demo.js');
define('HEADER', '<b>Sistem</b> Pakar');
define('SUBHEADER', '<b>S</b>P');

// css mode web costum
define('LOGO', 'media/logo.png');
define('CALL', 'Call RSUD BERKAH PANDEGLANG (0253) 202077/201963');
define('TITLE_USR', 'Sign in to start User');
define('BOOTSMINA_CSS', 'assets/frontend/css/bootstrap.min.css');
define('FONTWEB_CSS', 'assets/frontend/font-awesome/css/font-awesome.min.css');
define('CUBEPORTO_CSS', 'assets/frontend/plugins/cubeportfolio/css/cubeportfolio.min.css');
define('NIVOLIGHT_CSS', 'assets/frontend/css/nivo-lightbox.css');
define('DEFAULT_CSS', 'assets/frontend/css/nivo-lightbox-theme/default/default.css');
define('CAROUSEL_CSS', 'assets/frontend/css/owl.carousel.css');
define('THEME_CSS', 'assets/frontend/css/owl.theme.css');
define('ANIMATE_CSS', 'assets/frontend/css/animate.css');
define('STYLE_CSS', 'assets/frontend/css/style.css');
define('BG_CSS', 'assets/frontend/bodybg/bg1.css');
define('DEFAULTCOLOR_CSS', 'assets/frontend/color/default.css');

// js mode costum web
define('JQUERYWEB_JS', 'assets/frontend/js/jquery.min.js');
define('BOOTWEB_JS', 'assets/frontend/js/bootstrap.min.js');
define('EASING_JS', 'assets/frontend/js/jquery.easing.min.js');
define('WOW_JS', 'assets/frontend/js/wow.min.js');
define('SCROLLTO_JS', 'assets/frontend/js/jquery.scrollTo.js');
define('APPEAR_JS', 'assets/frontend/js/jquery.appear.js');
define('STELLAR_JS', 'assets/frontend/js/stellar.js');
define('CUBEPORTO_JS', 'assets/frontend/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js');
define('CAROUSEl_JS', 'assets/frontend/js/owl.carousel.min.js');
define('NIVOLIGHT_JS', 'assets/frontend/js/nivo-lightbox.min.js');
define('COSTUM_JS', 'assets/frontend/js/custom.js');
define('AJAXDIAG', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');