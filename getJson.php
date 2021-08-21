<?php

	header("Content-Type: application/json");

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

	function deliver_response($status, $status_message, $data){
		$response['status']				= $status;
		$response['status_message']		=$status_message;
		$response['buku']				=array();
		if (!empty($data)) {
			# code...
			array_push($response['buku'], $data);
		}
		$json_response=json_encode($response);
		echo $json_response;
	}


?>