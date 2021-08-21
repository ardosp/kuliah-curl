<?php 

	header("Content-Type: text/xml");

	if (!empty($_GET['cari'])) {
		# code...
		include_once('getDataBuku.php');
		$key=$_GET['cari'];
		$buku=cariBuku($key);
		if (empty($buku)) {
			# code...
			deliver_response(1,'Buku Tidak Ditemukan',NULL);
		}else{
			deliver_response(1,'Buku Ditemukan',$buku);
		}
	}else{
		deliver_response(0,'Invalid Request',NULL);
	}

	function deliver_response($status, $status_message, $data) {

		$xml_response = simplexml_load_string("<?xml version=\"1.0\" ?><data />");
		$xml_response -> addChild("status", $status);
		$xml_response -> addChild("status_message", $status_message);
		if (!empty($data)) {
			# code...
			$xml_buku = $xml_response -> addChild("buku");
			$xml_buku -> addChild("id_buku", $data["id_buku"]);
			$xml_buku -> addChild("judul", $data["judul"]);
			$xml_buku -> addChild("pengarang", $data["pengarang"]);
			$xml_buku -> addChild("penerbit", $data["penerbit"]);
			$xml_buku -> addChild("harga", $data["harga"]);
		}
		echo $xml_response -> asXML();
	}

 ?>