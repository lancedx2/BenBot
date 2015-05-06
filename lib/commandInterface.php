<?php
interface icommand {
	function handleCommand($user, $channel, $params);
	function getResponse();
        function getHelp($user, $channel);
}
?>
