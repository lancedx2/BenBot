<?PHP
/* This is just a place that everyone else should 
 * inherit from so that we can add global services
 * as needed.
 */
 require_once 'lib/loadJSON.class.php';

class base {

	public $config;

	function __construct(){

		$config = new loadJSON('config.json');
		$this->config = $config->JSON;

	}

	function logger($msg) {
		$log_msg = '[' . date("r") . ']: ' . $msg . "\n";
		file_put_contents("BenBot.log", $log_msg, FILE_APPEND);
	}

	function removeCRLF($str) {

		$crlf = array("\r", "\n");
		$str = str_replace($crlf, '', $str);

		return $str;

	}

}

?>
