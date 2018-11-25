<?php 

	class HttpInfo {
		
		private $server;

		// 
		public function __construct (){
			# return print_r($_SERVER);
			$this->server = $_SERVER;
			print_r($this->server);
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
			$dizi = $this-> fileWrite('id.txt','a+',$id);
	      	
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

				// değerleri ekrana bastırmak için 
				# return $change;

				// değer sayılarını öğrenmek için 
				# return $count;

				$arr = $change;

			}

			return $arr;
		}

		// sadece GET request'i içindir.
		public function query(){
			$method = $this->serverParameter("REQUEST_METHOD");
			if(isset($method)){
				if($method == 'GET'){
					function filter($method){
					 return is_array($method) ? array_map('filter', $method) : htmlspecialchars(trim($method));
					}
					$_GET = array_map('filter',$_GET);

					return $_GET;
				}
			}
	
		}

		
		private function fileWrite($fileName,$parameter,$content){
	    	$file = touch($fileName);
	      	$file_o = fopen($fileName,$parameter);
	     	$file_w = fwrite($file_o,$content);
	      	$file_c = fclose($file_o);
		}
		// tüm işlemler tamamlandıktan sonra 
		
	}