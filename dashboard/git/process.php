<?php
#$output = shell_exec($_GET['command']); # Old vulnerable code
$$output = shell_exec(filter_var($_GET['command'], FILTER_SANITIZE_STRING)); #Sanitize all $_GET
echo "<pre>$output</pre>";
?>
