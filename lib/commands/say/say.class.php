<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class say extends base implements icommand {

	protected $response;

	function __construct() {
            $this->commands = array("say");
	}
	
	function handleCommand($user, $channel, $params) {
		$sentence = '';
                if (strpos($params[0], "#") !== false) {
                    $channel = array_shift($params);
                }

		// reconstruct the params
		foreach($params as $word) {
			$sentence .= $word . ' ';
		}

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~say <#channel> to have me say something, optionally in a channel.';
        }

	function getResponse() {
		return $this->response;
	}

}
?>
