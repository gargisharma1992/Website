<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Custom Constants
|--------------------------------------------------------------------------
|
| These are some constants that will use for applications paths
|
*/

/*
|--------------------------------------------------------------------------
| Custom Constants
|--------------------------------------------------------------------------
|
| These are some constants that will use for applications paths
|
*/

define('SITE_URL', 				'http://' . $_SERVER['HTTP_HOST'] . '/dilitrust/');
define('ADMIN_SITE_URL', 		'http://' . $_SERVER['HTTP_HOST'] . '/dilitrust/admin/');

define('ROOT_PATH',				str_replace("\\", "/",dirname(dirname(dirname(__FILE__)))));

define('IMAGES_UPLOADS_PATH',	str_replace("\\", "/",dirname(dirname(dirname(__FILE__))))."/common/uploads/");

define('JS_PATH',  				SITE_URL."common/");
define('CSS_PATH',  			SITE_URL."common/frontend/");

define('FRONTEND_JSS_PATH',  	SITE_URL."assets/");
define ('IMG_PATH',   			SITE_URL."assets/");
define('FRONTEND_CSS_PATH',  	SITE_URL."assets/");

define('ADMIN_JS_PATH',  		SITE_URL."common/admin/");
define('ADMIN_CSS_PATH',  		SITE_URL."common/admin/");

define('CSS_FRONTEND',  		SITE_URL."common/frontend/frontend/");

define('FRONTEND_IMAGES',		SITE_URL."common/frontend/");

define('FRONTEND_IMAGE',		SITE_URL."common/admin/");
define('IMAGES_SHOW_PATH',  	SITE_URL."common/uploads/");
define('FORM_IMAGES_PATH',      SITE_URL."common/media/images/form/");
define('NO_IMAGE',          	SITE_URL."common/media/images/core/no.image.jpg");

define('FRONTEND_DATE_FORMAT',	"m/d/Y");
define('ADMIN_DATE_FORMAT',	    "m/d/Y");

define('CMSTEMPLATESFILE',      "cms/templates/template.list.js");
define('CMS_UPLOADS_PATH',	    str_replace("\\", "/",dirname(dirname(dirname(__FILE__))))."/common/");
define('CMS_UPLOADS_PATH_REL',			SITE_URL."common/cms/library/images/");
define('CMS_UPLOADS_PATH_REL_DOC',	    SITE_URL."common/cms/library/documents/");
define('IMAGE_INFO',			SITE_URL."common/media/icons/information.png");

/* End of file constants.php */
/* Location: ./application/config/constants.php */