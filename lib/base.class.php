<?PHP
/* This is just a place that everyone else should 
 * inherit from so that we can add global services
 * as needed.
 */

class base {

	function __construct(){
	}

	function logger($msg) {
		$log_msg = '[' . date("r") . ']: ' . $msg . "\n";
		file_put_contents("BenBot.log", $log_msg, FILE_APPEND);
	}

}

?>
