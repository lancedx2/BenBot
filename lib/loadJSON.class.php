<?PHP
require_once 'lib/base.class.php';

class loadJSON extends base {

	public $JSON;

	function __construct($filename) {
		$this->JSON = $this->load($filename);
	}

	function load($filename) {
		
		if (file_exists($filename)) {
			
			$file = file_get_contents($filename);
			$file = trim($file);
			$arr = json_decode($file, true);
			if (is_null($arr)) {
				$this->logger($filename . ' did not parse properly. Check that it is valid JSON.');
			}

		} else {
			$this->logger($filename . ' does not exist.');
			$arr = false;
		}

		return $arr;
	
	}

}

?>
