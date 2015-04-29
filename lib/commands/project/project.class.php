<?PHP
require_once 'lib/base.class.php';
require_once 'lib/commands/project/jira.php';

class project extends base {

	public $response;

	function __construct($channel, $params) {

		$jira = new jira();

		foreach ($params as $param) {
		
			$crlf = array("\r", "\n");
			$param = str_replace($crlf, '', $param);
			
			$project = $jira->get_project_details($param);	

			$stat = json_decode($project, true);

			$this->response = 'PRIVMSG ' . $channel . ' : Project "' . $stat['summary'] . '" is '. $stat['status'];
		}

	}

}

?>
