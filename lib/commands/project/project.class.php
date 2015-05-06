<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commands/project/jira.php';
require_once 'lib/commandInterface.php';

class project extends base implements icommand {

	private $response, $jira;

	function __construct() {
            $this->commands = array("project");
            $this->jira = new jira();
	}

	function handleCommand($user, $channel, $params) { 
		
		foreach ($params as $param) {
			$param = $this->removeCRLF($param);
			$project = $this->jira->get_project_details($param);	
			$stat = json_decode($project, true);

			$this->response[] = 'PRIVMSG ' . $channel . ' : Project "' . $stat['summary'] . '" is '. $stat['status'];
		}

	}

        function getHelp($user, $channel) {
                $this->response = 'PRIVMSG ' . $channel . ' :~project PROJ_ID for details of a project!';
        }

	function getResponse() {
		return $this->response;
	}

}
?>
