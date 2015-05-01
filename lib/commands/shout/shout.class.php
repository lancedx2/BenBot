<?PHP
require_once 'lib/commands/say/say.class.php';

class shout extends say {

	function getResponse() {
		return strtoupper($this->response);
	}

}

?>
