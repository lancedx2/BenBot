<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class sunset extends base implements icommand {

	private $response;

	function __construct() {
	}
	
	function handleCommand($channel, $params) {
		$sentence = "The sun will set at " . date_sunset(time(), SUNFUNCS_RET_STRING);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

	function getResponse() {
		return $this->response;
	}

}
?>
