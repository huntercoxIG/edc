<?php

	$current_dir = dirname(__FILE__);
	$dir = opendir($current_dir);
 	echo '[';
	$files = array();
	while ($file = readdir($dir)) {
		$pieces = explode(".", $file);
		if (is_array($pieces) && count($pieces) > 1) {
			$extension = end($pieces);
			if (in_array($extension, array('jpg', 'JPG', 'gif', 'GIF', 'png', 'PNG')))
             $files[] = '"'.$file.'"';
        }
    }
	echo implode(',', $files);
	echo ']';
	closedir($dir);



?>