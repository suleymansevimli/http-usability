<?php 

	class HttpInfo {
		// 
		public function __construct (){
			return print_r($_SERVER);

		}

		// $_SERVER['PARAMETRE'] kullanımını kısaltmak için kullanılan fonksiyon
		public static function serverParameter($var){
			return $_SERVER[$var];
		}


		// atanan UNIQUE_ID değerinin değişip değişmediğinin kontrolü
		public function is_changed_unique_id(){
			
			$id = $this->serverParameter("UNIQUE_ID").PHP_EOL;
			
			// gelen kişinin bot olup olmadığını kontrol ediyoruz 
			if($id == null || empty($id )){
				echo "Your Are A Bot ? Please standart login my page !";
			} 
			// örnek bir txt dosya oluşturuyoruz ve içerisine id'leri yazdırıyoruz
			$this-> fileWrite('id.txt','a+',$id);

	      	// dosyamızı dizi haline getiriyoruz.
	      	$dizi = explode("\n", file_get_contents('id.txt'));
	      	
	      	#print_r($dizi);
	      	
	      	if (isset($dizi[2]) && $dizi[1] != $dizi[2] ){
	      		unlink('id.txt');
	      		
	      		throw new Exception('Geçersiz UNIQUE ID !');
	      			echo $e->geMessage();
	      		exit;
	      	}
		}

		// Yönlendirme nereden geliyor tespiti ve değiştirilmesi için;
		public function referer($change = null){
			# referans bilgisini aldık.
			$ref = $this->serverParameter("HTTP_REFERER").PHP_EOL;
			
			# eğer referans bilgilerini değiştirmek istiyorsak; 
			if (isset($change)) {
				$ref = $change;
			}
			
			#eğer ki bu verileri kullanacaksak bir dosyaya kaydedelim;
			$this->fileWrite("referer.txt","a+",$ref);
			# unlink('referer.txt');
			return  $ref;
		}
		
		public function accept(array $change=null){
			$http_access = $_SERVER['HTTP_ACCEPT'];
			$arr = explode(",", $http_access);

			if (isset($change)) {
				$values = func_get_args();
				$count = count($values); 

				$arr = $change;
			}

			print_r($arr);
		}

		
		private function fileWrite($fileName,$parameter,$content){
			$file = touch($fileName);
	      	$file_o = fopen($fileName,$parameter);
	     	$file_w = fwrite($file_o,$content);
	      	$file_c = fclose($file_o);
		}

	}