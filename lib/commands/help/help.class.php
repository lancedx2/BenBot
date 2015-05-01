<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class help extends base implements icommand {

	private $response;

	function __construct() {
	}

	function handleCommand($channel, $params) {
		$sentence = '';
		// reconstruct the params

		foreach(glob('lib/commands/*', GLOB_ONLYDIR) as $dir) {
	    	$dirname = basename($dir);
			$sentence .= $dirname . ' ';
		}

		$this->response = 'PRIVMSG ' . $channel . ' : Current available commands are: ' . $sentence;
	}

	function getResponse() {
		return $this->response;
	}


}

?>
