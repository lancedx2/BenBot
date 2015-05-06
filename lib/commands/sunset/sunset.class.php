<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class sunset extends base implements icommand {

	private $response;

	function __construct() {
	}
	
	function handleCommand($user, $channel, $params) {
		$sentence = "The sun will set at " . date_sunset(time(), SUNFUNCS_RET_STRING);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~sunset to find out the time of sunset.';
        }

	function getResponse() {
		return $this->response;
	}

}
?>
