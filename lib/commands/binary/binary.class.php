<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class binary extends base implements icommand {

	private $response;

	function __construct() {
	}
	
	function handleCommand($user, $channel, $params) {
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

	function getHelp($user, $channel) {
		$this->response = 'PRIVMSG ' . $channel . ' :~say <#channel> to have me say something, optionally in a channel.';
	}



	function getResponse() {
		return $this->response;
	}

}

?>
