<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class quote extends base implements icommand {

	private $response, $quotes;

	function __construct() {
                $this->commands = array("quote");
		$file = file_get_contents('lib/commands/quote/quotes.json');
		$file = trim($file);
		$this->quotes = json_decode($file, true);
	}
	
	function handleCommand($user, $channel, $params) {
		$this->logger('found ' . count($this->quotes) . ' quotes!');
		$random = rand(0, count($this->quotes) - 1);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $this->quotes[$random];
	}

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~quote to have me give an amazing quote.';
        }

	function getResponse() {
		return $this->response;
	}

}

?>
