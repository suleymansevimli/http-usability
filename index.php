<?php 
	require 'HttpClass.php';

	$server = new HttpInfo();

	// klasik kullanımın dışında bir kullanım için ; 
	$return = $server->serverParameter("QUERY_STRING");

	// sayfa yenilenmelerini takip etmek için kullanılabilecek olan fonksiyon;
	# $unique = $server->is_changed_unique_id();

	// referer bilgisini burdan alıyoruz veya değiştiriyoruz..
	# $referer = $server->referer();
	
	// accept değişkeni içerisindekileri almak için bu alanı kullanabiliriz
	$accept = $server->accept(["text/plain"]);

	$query = $server->query();
		
	// çıktımızı alalım.
	print_r($query);
			