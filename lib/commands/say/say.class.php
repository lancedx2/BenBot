<?PHP
require_once 'lib/base.class.php';

class say extends base {

	public $response;

	function __construct($channel, $params) {

		$sentence = '';
		// reconstruct the params
		foreach($params as $word) {
			$sentence .= $word . ' ';
		}

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;

	}

}

?>
