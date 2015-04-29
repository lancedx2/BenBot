<?PHP
require_once 'lib/base.class.php';

class praise extends base {

	public $response;

	function __construct($channel, $params) {
		
		$file = file_get_contents('lib/commands/praise/praises.json');
		$file = trim($file);
		$praises = json_decode($file, true);

		$this->logger('found ' . count($praises) . ' praises!');
		$random = rand(0, count($praises) - 1);
	
		$target = $params[0];
		$crlf = array("\r", "\n");
		$target = str_replace($crlf, '', $target);

		$sentence = str_replace('{0}', $target, $praises[$random]);

		$sentence = str_replace($crlf, '', $sentence);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;

	}

}

?>
