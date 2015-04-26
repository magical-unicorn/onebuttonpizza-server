<?php

$data = data_load($_REQUEST['CallSid']);

if ($data !== '') {
	if (!isset($data['duration'])) {
		// cas d'erreur
		if ($_REQUEST['CallStatus'] == 'completed') {
			$data['status'] = 'hangup';
			data_save($_REQUEST['CallSid'], $data);	
		}
	}
} else {

}

 
//file_put_contents('./error.txt', serialize($_REQUEST));    
     
?>
