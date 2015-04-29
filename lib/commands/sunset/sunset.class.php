<?PHP
require_once 'lib/base.class.php';

class sunset extends base {

	public $response;

	function __construct($channel, $params) {

		$sentence = "The sun will set at " . date_sunset(time(), SUNFUNCS_RET_STRING);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;

	}

}

?>
