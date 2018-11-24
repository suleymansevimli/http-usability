<?php 
	require 'HttpClass.php';

	$server = new HttpInfo();
	$return = $server->serverParameter("QUERY_STRING");
	$unique = $server->is_changed_unique_id();
	print_r($unique);