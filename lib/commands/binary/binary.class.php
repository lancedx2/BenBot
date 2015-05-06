<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class binary extends base implements icommand {

	private $response;

	function __construct() {
	}
	
	function handleCommand($channel, $params) {
		$sentence = '';
		foreach($params as $word) {
			if(trim($word) != '') { 
				$count = strlen($word);
				for($i=0; $i < $count; $i++) {
					$chr = $word[$i];
					$sentence .= str_pad(decbin( ord($chr) ), 7, "0", STR_PAD_LEFT) . ' ';
				}
			}
		}

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

	function getResponse() {
		return $this->response;
	}

}

?>
