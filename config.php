<?php

// Who to check?
$sites = array(
	array('name' => 'Google', 'ip' => 'google.com', 'port' => 80),
);

$title = 'Monitoramento'; // Page Title

$tropoToken = ''; // Application's Messaging Token at Tropo

$notifyDownTimes = 5; // Minimum checks before notifying
$notifyCall = ''; // Who to call? (with country code)

function read_statuses() {
	global $sites;
	$on = @unserialize(@file_get_contents('statuses.ser'));
	if (!$on)
		$on = array();
	foreach ($sites as $s)
		if (!isset($on[$s['name']]))
			$on[$s['name']] = 0;
	return $on;
}

function write_statuses($on) {
	return file_put_contents('statuses.ser', serialize($on));
}

?>