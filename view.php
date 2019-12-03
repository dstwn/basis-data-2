<?php
include_once('conn.php');

$profile = $_POST['desk'];
$name                   = "SELECT profile_lulusan.deskripsi FROM profile_lulusan WHERE profile_lulusan.id_profile = $profile ";
$names = mysqli_query($koneksi,$name);
while($d = mysqli_fetch_assoc($names)){
    echo  $d['deskripsi'] ;
    echo "<br>";
}

$keterampilan_khusus    = "SELECT profile_lulusan.deskripsi,ketrampilan_khusus.deskripsi FROM profile_lulusan,ketrampilan_khusus WHERE profile_lulusan.id_profile = $profile ";
$keterampilan_umum      = "SELECT profile_lulusan.deskripsi,ketrampilan_umum.deskripsi FROM profile_lulusan,ketrampilan_umum WHERE profile_lulusan.id_profile = $profile ";
$sikap                  = "SELECT profile_lulusan.deskripsi, sikap.deskripsi FROM profile_lulusan,sikap WHERE profile_lulusan.id_profile = $profile ";
$pengetahuan            = "SELECT profile_lulusan.deskripsi,pengetahuan.deskripsi FROM profile_lulusan,pengetahuan WHERE profile_lulusan.id_profile = $profile ";

// function data($query) {
//     return run($query);
// }
// function run($query){
//     global $koneksi;
//     mysqli_query($koneksi,$query);
// }
echo "<h1>Sikap</h1>";
$kk = mysqli_query($koneksi,$sikap);
while($d = mysqli_fetch_assoc($kk)){
    echo  $d['deskripsi'] ;
    echo "<br>";
}
echo "<h1>Pengetahuan</h1>";
$kk = mysqli_query($koneksi,$pengetahuan);
while($d = mysqli_fetch_assoc($kk)){
    echo  $d['deskripsi'] ;
    echo "<br>";
}
echo "<h1>Keterampilan Umum</h1>";
$kk = mysqli_query($koneksi,$keterampilan_umum);
while($d = mysqli_fetch_assoc($kk)){
    echo  $d['deskripsi'] ;
    echo "<br>";
}
echo "<h1>Keterampilan Khusus</h1>";
$kk = mysqli_query($koneksi,$keterampilan_khusus);
while($d = mysqli_fetch_assoc($kk)){
    echo  $d['deskripsi'] ;
    echo "<br>";
}
?>