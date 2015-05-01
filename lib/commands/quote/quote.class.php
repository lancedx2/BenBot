<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class quote extends base implements icommand {

	private $response, $quotes;

	function __construct() {
		$file = file_get_contents('lib/commands/quote/quotes.json');
		$file = trim($file);
		$this->quotes = json_decode($file, true);
	}
	
	function handleCommand($channel, $params) {
		$this->logger('found ' . count($this->quotes) . ' quotes!');
		$random = rand(0, count($this->quotes) - 1);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $this->quotes[$random];
	}

	function getResponse() {
		return $this->response;
	}

}

?>
