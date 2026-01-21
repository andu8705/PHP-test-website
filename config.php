<?php
ini_set('display_errors','On');
ini_set('error_reporting', E_ALL );
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
define('DEBUG', true);
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'andrei');
define('DB_PASS', '1234');
define('DB_NAME', 'andrei');
define('DB_PORT', 3306);

define('SMTP_SERVER', 'THE SMTP SERVER');
define('SMTP_PORT', 'THE PORT NUMBER');
define('SMTP_AUTH', true);
define('SMTP_SECURE', 'THE TYPE OF ENCRYPTION');
define('MAIL_USERNAME', 'YOUR EMAIL ADDRESS');
define('MAIL_USER', 'YOUR EMAIL USERNAME');
define('MAIL_PASS', 'YOUR EMAIL PASSWORD');