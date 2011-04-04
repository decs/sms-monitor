<?php

require_once 'config.php';

function sms($call, $site, $on) {
	global $tropoToken;
    $ch = curl_init();
	$params = 'action=create';
	$params .= '&token='.urlencode($tropoToken);
	$params .= '&call='.urlencode($call);
	$params .= '&site='.urlencode($site);
	$params .= '&on='.($on ? 'true' : 'false');
	curl_setopt($ch, CURLOPT_URL, "http://api.tropo.com/1.0/sessions?$params");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	curl_close($ch);
}

?>