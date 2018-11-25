# HTTP Usability !
$_SERVER super global değişkeni içerisindeki elemanların daha rahat ve kullanışlı olarak kullanılması için geliştirilmiştir.

# Nasıl Kullanılır ? 
ilk önce yeni sınıfımızı dahil edip çağırıyoruz.

```php
	require 'HttpClass.php';

	$server = new HttpInfo();

	// klasik kullanımın dışında bir kullanım için ; 
	$return = $server->serverParameter("SERVER_NAME");

	// sayfa yenilenmelerini takip etmek için kullanılabilecek olan fonksiyon;
	 $unique = $server->is_changed_unique_id();

	// referer bilgisini burdan alıyoruz veya değiştiriyoruz..
	 $referer = $server->referer();
	
	// accept değişkeni içerisindekileri almak için bu alanı kullanabiliriz
	$accept = $server->accept(["text/plain"]);

	// gelen QUERY_STRİNG değeriniin içeriğini etkisizleştirme
	$query = $server->query();
		
	// çıktımızı alalım.
	 print_r($return);
```
