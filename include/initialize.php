<?php
//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'ECommerce');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'include');

//load the database configuration first.
require_once(dirname(__FILE__) . "/config.php");
require_once(dirname(__FILE__) . "/function.php");
require_once(dirname(__FILE__) . "/session.php");
require_once(dirname(__FILE__) . "/accounts.php");
require_once(dirname(__FILE__) . "/autonumbers.php");
require_once(dirname(__FILE__) . "/products.php");
require_once(dirname(__FILE__) . "/stockin.php");
require_once(dirname(__FILE__) . "/categories.php");
require_once(dirname(__FILE__) . "/sidebarFunction.php");
require_once(dirname(__FILE__) . "/promos.php");
require_once(dirname(__FILE__) . "/customers.php");
require_once(dirname(__FILE__) . "/orders.php");
require_once(dirname(__FILE__) . "/summary.php");
require_once(dirname(__FILE__) . "/settings.php");


require_once(dirname(__FILE__) . "/database.php");
?>