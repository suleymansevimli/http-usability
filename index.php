<?php 
	require 'HttpClass.php';

	$server = new HttpInfo();

	// klasik kullanımın dışında bir kullanım için ; 
	$return = $server->serverParameter("QUERY_STRING");

	// sayfa yenilenmelerini takip etmek için kullanılabilecek olan fonksiyon;
	# $unique = $server->is_changed_unique_id();

	$referer = $server->referer();
	// çıktımızı alalım.

	$accept = $server->accept("text/plain");
	print_r($accept);
			