<?PHP
require_once 'lib/base.class.php';

class help extends base {

	public $response;

	function __construct($channel, $params) {

		$sentence = '';
		// reconstruct the params

		foreach(glob('lib/commands/*', GLOB_ONLYDIR) as $dir) {
	    	$dirname = basename($dir);
			$sentence .= $dirname . ' ';
		}

		$this->response = 'PRIVMSG ' . $channel . ' : Current available commands are: ' . $sentence;

	}

}

?>
