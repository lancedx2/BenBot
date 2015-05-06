<?PHP
require_once 'lib/commands/say/say.class.php';

class shout extends say {
        function __construct() {
                $this->commands = array("shout");
        }

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~shout <channel> to have me shout something, optionally in a channel.';
        }

	function getResponse() {
		return strtoupper($this->response);
	}

}

?>
