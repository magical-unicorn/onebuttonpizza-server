<?php
 require_once(dirname(__FILE__).'/data.php');
 $data = array();
 $data['duration'] = $_REQUEST['Digits'];
 $data['timestamp'] = time();
 $data['status'] = 'ok';

 data_save($_REQUEST['CallSid'], $data);

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say language="fr" voice="woman">Ok c'est noté ! Merci ! Bisous !</Say>
	<Hangup/>
</Response>
