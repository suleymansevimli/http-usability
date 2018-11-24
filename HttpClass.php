<?php 

	class HttpInfo {
		// 
		public function __construct (){
			// return print_r($_SERVER);
		}

		// $_SERVER['PARAMETRE'] kullanımını kısaltmak için kullanılan fonksiyon
		public static function serverParameter($var){
			return $_SERVER[$var];
		}


		/* Spesifik Alan */ 

		// atanan UNIQUE_ID değerinin değişip değişmediğinin kontrolü
		public function is_changed_unique_id(){
			
			$id = $this->serverParameter("UNIQUE_ID").PHP_EOL;
			
			// gelen kişinin bot olup olmadığını kontrol ediyoruz 
			if($id == null || empty($id )){
				echo "Your Are A Bot ? Please standart login my page !";
			} 
			// örnek bir txt dosya oluşturuyoruz ve içerisine id'leri yazdırıyoruz
			$file = touch('id.txt');
	      	$file_o = fopen('id.txt','a+');
	     	$file_w = fwrite($file_o,$id);
	      	$file_c = fclose($file_o);
	      	
	      	// dosyamızı dizi haline getiriyoruz.
	      	$dizi = explode("\n", file_get_contents('id.txt'));
	      	
	      	# print_r($dizi);
	      	
	      	if (isset($dizi[2]) && $dizi[1] != $dizi[2] ){
	      		unlink('id.txt');
	      		throw new Exception('Geçersiz UNIQUE ID !');
	      		echo $e->geMessage();
	      		unlink('id.txt');
	      		exit;
	      	} 
	      	
	      	
	      	
			
		}

		/* # Spesifik alan Sonu */

	}