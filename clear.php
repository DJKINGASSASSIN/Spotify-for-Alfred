<?php
// Thanks Jeff Johns <http://phpfunk.me/>; this is identical to his `clear.php`

$folder   = 'artwork';
$bytes    = 0;
$total    = 0;
if ($handle = opendir($folder)) {

	while (false !== ($file = readdir($handle))) {
		if (stristr($file, '.png')) {
			unlink($folder . '/' . $file);
		}
	}

	closedir($handle);
}