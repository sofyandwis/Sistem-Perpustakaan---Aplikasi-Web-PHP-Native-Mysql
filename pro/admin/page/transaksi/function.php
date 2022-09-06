<?php 
function terlambat($tgl_dateline, $tgl_kembali) {
	$tgl_dateline  = explode('-', $tgl_dateline);
	$tgl_dateline  = $tgl_dateline [2].'-'.$tgl_dateline [1].'-'.$tgl_dateline [0];

	$tgl_kembali  = explode('-', $tgl_kembali);
	$tgl_kembali  = $tgl_kembali [2].'-'.$tgl_kembali [1].'-'.$tgl_kembali [0];

	$selisih = strtotime($tgl_kembali ) - strtotime($tgl_dateline );

	$selisih = $selisih/86400;
	if ($selisih >= 1) {
		$hasil_tgl = floor($selisih);
	}else{
		$hasil_tgl = 0;
	}
	return $hasil_tgl;
}

?>