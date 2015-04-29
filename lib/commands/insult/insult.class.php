<?PHP
require_once 'lib/base.class.php';

class insult extends base {

	public $response;

	function __construct($channel, $params) {
		
		$file = file_get_contents('lib/commands/insult/insults.json');
		$file = trim($file);
		$insults = json_decode($file, true);

		$this->logger('found ' . count($insults) . ' insults!');
		$random = rand(0, count($insults) - 1);
	
		$target = $params[0];
		$crlf = array("\r", "\n");
		$target = str_replace($crlf, '', $target);

		$sentence = str_replace('{0}', $target, $insults[$random]);

		$sentence = str_replace($crlf, '', $sentence);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;

	}

}

?>
