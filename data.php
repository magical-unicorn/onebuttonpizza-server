<?php

function data_load($id) {
	if (file_exists(dirname(__FILE__).'/data/'.$id)) {
		return json_decode(file_get_contents(dirname(__FILE__).'/data/'.$id));
	} else {
		return "";
	}
}

function data_save($id, $data) {
	file_put_contents(dirname(__FILE__).'/data/'.$id, json_encode($data));
}

?>
