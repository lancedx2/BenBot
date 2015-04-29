<?PHP
require_once 'lib/base.class.php';

class joke extends base {

	public $response;

	function __construct($channel, $params) {
		
		$file = file_get_contents('lib/commands/joke/jokes.json');
		$file = trim($file);
		$quotes = json_decode($file, true);

		$this->logger('found ' . count($quotes) . ' jokes!');
		$random = rand(0, count($quotes) - 1);


		$this->response = 'PRIVMSG ' . $channel . ' :' . $quotes[$random];

	}

}

?>
