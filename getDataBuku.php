<?php

	function get_buku() {
		
		$data_buku = array();
		$buku = array(
			"id_buku"	=>	"1",
			"judul"		=>	"Ngopi bareng Denny Siregar",
			"pengarang"	=>	"Denny Siregar",
			"penerbit"	=>	"Mizan",
			"harga"		=>	45000,
			);

		array_push($data_buku, $buku);
		return $data_buku;

	}

	function cariBuku($key) {
		
		$data_buku = get_buku();
		foreach ($data_buku as $buku) {
			if ($buku['id_buku'] == $key) {
				# code...
				return $buku;
				break;
			}
		}
	}

?>