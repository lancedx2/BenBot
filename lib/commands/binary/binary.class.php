<?PHP
require_once 'lib/base.class.php';

class binary extends base {

	public $response;

	function __construct($channel, $params) {

		$sentence = '';
		// reconstruct the params
		foreach($params as $word) {
			if(trim($word) != '') { 
				$count = strlen($word);
				echo "\n$word len $count\n";
				for($i=0; $i < $count; $i++) {
					$chr = $word[$i];
					echo "\nCHR: ". $word[$i] . "\n";
					$sentence .= decbin( ord($chr) ) . ' ';
				}
			}
		}

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;

	}

}

?>
