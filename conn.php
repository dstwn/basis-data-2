<?php 
global $koneksi ;
$koneksi =mysqli_connect("localhost","root","","new_basdat");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>