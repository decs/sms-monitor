<?php

require_once 'config.php';
require_once 'sms.php';

function check_port($ip, $port) {
	$socket = @fsockopen($ip, $port, $errno, $errstr, 3);
	if ($socket)
		fclose($socket);
	return $socket == true;
}

$on = read_statuses();

foreach ($sites as $s) {
	if (check_port($s['ip'], $s['port'])) {
		if ($on[$s['name']] >= $notifyDownTimes)
			sms($notifyCall, $s['name'], true);
		$on[$s['name']] = 0;
	} else {
		$on[$s['name']]++;
		if ($on[$s['name']] == $notifyDownTimes)
			sms($notifyCall, $s['name'], false);
	}
}

write_statuses($on);

?>