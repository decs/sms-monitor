<?php

require_once 'config.php';

function printStatus($on, $name, $ip, $port) {
	echo '<li class="' . ($on ? 'online' : 'offline') . '">';
	echo htmlspecialchars($name);
	echo '</li>';
}

$on = read_statuses();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo $title; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<style type="text/css">
		body { background: #7EC0C2; margin: 100px 20%; font: 11px Verdana; }
		h2 { color: #4F4235; font: bold 24pt Georgia; margin: 0 0 -9px 20px; padding: 0; }
		ul { background: #F2E0B6; border: 2px solid #4F4235; list-style: none; margin: 0; padding: 4px 4px 2px 4px; }
		li { color: #FFF; font-weight: bold; margin: 0 0 2px 0; padding: 5px 10px; }
		.online { background: #82BA61; }
		.offline { background: #BA8261; }
	</style>
</head>

<body>
	<h2><?php echo $title; ?></h2>
	<ul>
	<?php foreach ($sites as $s): ?>
		<?php printStatus($on[$s['name']] == 0, $s['name'], $s['ip'], $s['port']); ?>
	<?php endforeach; ?>
	</ul>
</body>

</html>