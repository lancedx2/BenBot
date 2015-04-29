<?PHP
require_once 'lib/base.class.php';

class JOIN extends base {

	public $response = false;

	function __construct($ex) {

		parent::__construct();

		// Let's get the username
		preg_match('/(?!:).*(?=!)/', $ex[0], $matches);
		$sentence = str_replace('{0}', $matches[0], $this->config['join_greeting']);

		$this->response = 'PRIVMSG ' . $this->removeCRLF($ex[2]) . ' :' . $sentence;

	}

}

?>
