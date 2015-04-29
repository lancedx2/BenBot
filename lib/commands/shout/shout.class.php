<?PHP
require_once 'lib/base.class.php';

class shout extends base {

	public $response;

	function __construct($channel, $params) {

		$sentence = '';
		// reconstruct the params
		foreach($params as $word) {
			$sentence .= $word . ' ';
		}

		$sentence = trim($sentence);

		$this->response = 'PRIVMSG ' . $channel . ' :' . strtoupper($sentence);

	}

}

?>
