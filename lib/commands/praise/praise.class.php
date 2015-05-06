<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commandInterface.php';

class praise extends base implements icommand {

	private $response;

	function __construct() {
	}
	
	function handleCommand($user, $channel, $params) {
		$file = file_get_contents('lib/commands/praise/praises.json');
		$file = trim($file);
		$praises = json_decode($file, true);

		$this->logger('found ' . count($praises) . ' praises!');
		$random = rand(0, count($praises) - 1);
		
		$target = '';
		foreach($params as $param) {
			$target .= $this->removeCRLF($param) . ' ';
		}
		$target = trim($target);

		$sentence = str_replace('{0}', $target, $praises[$random]);
		$sentence = $this->removeCRLF($sentence);

		$this->response = 'PRIVMSG ' . $channel . ' :' . $sentence;
	}

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~praise to praise someone.';
        }

	function getResponse() {
		return $this->response;
	}

}

?>
