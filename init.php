<?PHP
/* This script loads all of the support libraries and does some 
 * basic stuff
 */

date_default_timezone_set("America/Boise");

require_once 'lib/loadJSON.class.php';

$config = new loadJSON('config.json');

?>
