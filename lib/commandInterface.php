<?php
interface icommand {
	function handleCommand($channel, $params);
	function getResponse();
}
?>
