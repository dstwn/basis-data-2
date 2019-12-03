<?php 
global $koneksi ;
$koneksi =mysqli_connect("localhost","root","password","desain_kurikulum");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>