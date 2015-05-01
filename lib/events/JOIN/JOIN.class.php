<?PHP
require_once 'lib/base.class.php';
require_once 'lib/eventInterface.php';

class JOIN extends base implements ievent {

	private $response = false;

	function __construct() {
	}
	
	function handleEvent($ex) {
		parent::__construct();

		// Let's get the username
		preg_match('/(?!:).*(?=!)/', $ex[0], $matches);
		$sentence = str_replace('{0}', $matches[0], $this->config['join_greeting']);

		$this->response = 'PRIVMSG ' . $this->removeCRLF($ex[2]) . ' :' . $sentence;
	}

	function getResponse() {
		return $this->response;
	}

}
?>
