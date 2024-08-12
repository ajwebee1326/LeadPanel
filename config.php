<?php
date_default_timezone_set('Asia/Kolkata');

// DB DETAILS
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'aditya_birla');


// APP DETAILS
define('APP_NAME', 'My App');
define('APP_URL', 'http://localhost/LeadPanel');
define('APP_EMAIL', 'default@gmail.com');
define('APP_PHONE', '1234567890');
define('APP_ADDRESS', '123, Street, City, Country');
define('COPYRIGHT', 'Webeesocial');


// FORM DETAILS
define('FORM_FIELDS', ['name', 'email', 'phone', 'message']);
define('LOGIN_URL', 'login.php');
define('THANK_YOU_URL', 'http://localhost/LeadPanel/form.php');
define('FORM_SUBMIT_URL', 'http://localhost/LeadPanel/store-inquiry.php');
$thankYouMessage = 'Thank you for your inquiry. We will get back to you soon.';
$errorMessage = 'Something went wrong. Please try again later.';
define('THANK_YOU_MESSAGE', $thankYouMessage);
define('ERROR_MESSAGE', $errorMessage);


// ADMIN DETAILS
define('PASSWORD_ALGO', PASSWORD_DEFAULT);
define('ADMIN_EMAIL', 'admin@gmail.com');
define('ADMIN_PASSWORD','123456');


?>