<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class joke extends base implements icommand {

	private $response;

	function __construct() {
	}
	
	function handleCommand($channel, $params) {
		$file = file_get_contents('lib/commands/joke/jokes.json');
		$file = trim($file);
		$quotes = json_decode($file, true);

		$this->logger('found ' . count($quotes) . ' jokes!');
		$random = rand(0, count($quotes) - 1);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $quotes[$random];
	}

	function getResponse() {
		return $this->response;
	}

}

?>
