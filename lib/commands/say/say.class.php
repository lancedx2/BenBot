<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class say extends base implements icommand {

	protected $response;

	function __construct() {
	}
	
	function handleCommand($channel, $params) {
		$sentence = '';
		// reconstruct the params
		foreach($params as $word) {
			$sentence .= $word . ' ';
		}

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

	function getResponse() {
		return $this->response;
	}

}
?>
