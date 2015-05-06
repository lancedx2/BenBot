<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class insult extends base implements icommand {

	private $response;

	function __construct() {
            $this->commands = array("insult");
	}

	function handleCommand($user, $channel, $params) {
		$file = file_get_contents('lib/commands/insult/insults.json');
		$file = trim($file);
		$insults = json_decode($file, true);

		$this->logger('found ' . count($insults) . ' insults!');
		$random = rand(0, count($insults) - 1);
	
		$target = $this->removeCRLF($params[0]);

		$sentence = str_replace('{0}', $target, $insults[$random]);
		$sentence = $this->removeCRLF($sentence);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~insult to insult someone.';
        }

	function getResponse() {
		return $this->response;
	}

}

?>
