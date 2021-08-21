<?php 
	
	function getData($url) {
		$cari = "?cari=1";
		$url = $url . $cari;

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}

	function data_xml() {
		$url = "http://localhost/672013214/getXML.php";
		$response = getData($url);
		$xml = simplexml_load_string($response);
		if ($xml -> status == "1") {
			# code...
			echo $xml -> status_message . "<br/>";
			if (!empty($xml -> buku)) {
				# code...
				foreach ($xml->buku as $buku) {
					# code...
					echo "ID Buku : ". $buku['id_buku'] . "<br/>";
					echo "Judul : ". $buku['judul'] . "<br/>";
					echo "Pengarang : ". $buku['pengarang'] . "<br/>";
					echo "Penerbit : ". $buku['penerbit'] . "<br/>";
					echo "Harga : ". $buku['harga'] . "<br/>";

				}
			}
		}
	}

	function data_json() {
		$url = "http://localhost/672013214/getJson.php";
		$response = getData($url);
		$response = json_decode($response, true);
		if ($response['status'] == 1) {
			# code...
			echo $response['status_message'] . "<br/>";
			foreach ($response['buku'] as $buku) {
				# code...
				echo "ID Buku : ". $buku['id_buku'] . "<br/>";
				echo "Judul : ". $buku['judul'] . "<br/>";
				echo "Pengarang : ". $buku['pengarang'] . "<br/>";
				echo "Penerbit : ". $buku['penerbit'] . "<br/>";
				echo "Harga : ". $buku['harga'] . "<br/>";
			}
		}
	}

	data_json();

 ?>

