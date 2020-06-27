<!-- SELAMAT DATANG -->
<?php
$key = "FAJAR-RIDIKC-!*4+)!5A6%+_!4!A+7!4’5!5-";

	function encrypt($str) {
		global $key;
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		$hasil = base64_encode($hasil);
		$hasil = urlencode($hasil);
		$hasil = str_replace('%','xxx',$hasil);
		$hasil = str_replace('&','yyy',$hasil);
		$hasil = str_replace('+','zzz',$hasil);
		
		return ($hasil);
	}
	 
	function decrypt($str) {
		global $key;
		$str = str_replace('xxx','%',$str);
		$str = str_replace('yyy','&',$str);
		$str = str_replace('zzz','+',$str);
		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		return $hasil;
	}
	?>