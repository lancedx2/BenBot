<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class help extends base implements icommand {

	private $response;

	function __construct() {
            $this->commands = array("help");
	}

        function handleCommand($user, $channel, $params) {
            $this->getHelp($user, $channel);
        }

	function getHelp($user, $channel) {
		$sentence = '';
		// reconstruct the params

		foreach(glob('lib/commands/*', GLOB_ONLYDIR) as $dir) {
	    	$dirname = basename($dir);
			$sentence .= $dirname . ' ';
		}

		$this->response = 'PRIVMSG ' . $channel . ' : Current available commands are: ' . rtrim($sentence) . ". ~<command> help to get more info.";
	}

	function getResponse() {
		return $this->response;
	}


}

?>
