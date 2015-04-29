#!/usr/bin/php
<?PHP
set_time_limit(0);
ini_set('display_errors', 'on');

require_once 'init.php';
require_once 'lib/connection.class.php';

$connection = new connection($config->JSON);

?>
