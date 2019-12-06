<?php
include_once('conn.php');
$profile = $_POST['desk'];


$name = "SELECT profile_lulusan.deskripsi FROM profile_lulusan WHERE profile_lulusan.id_profile = $profile ";


$keterampilan_khusus    = "SELECT DISTINCT profile_lulusan.deskripsi, ketrampilan_khusus.deskripsi 
                           FROM profile_lulusan,ketrampilan_khusus,profile_has_kk 
                           WHERE profile_lulusan.id_profile = profile_has_kk.id_profile 
                           AND ketrampilan_khusus.id_kk = profile_has_kk.id_kk 
                           AND profile_lulusan.id_profile = $profile";

$keterampilan_umum      = "SELECT DISTINCT profile_lulusan.deskripsi, ketrampilan_umum.deskripsi 
                           FROM profile_lulusan, ketrampilan_umum, profile_has_ku 
                           WHERE profile_lulusan.id_profile = profile_has_ku.id_profile 
                           AND ketrampilan_umum.id_ku = profile_has_ku.id_ku 
                           AND profile_lulusan.id_profile = $profile";

$sikap                  = "SELECT DISTINCT profile_lulusan.deskripsi, sikap.deskripsi 
                           FROM profile_lulusan,sikap, profile_has_sikap 
                           WHERE profile_lulusan.id_profile = profile_has_sikap.id_profile 
                           AND sikap.id_sikap = profile_has_sikap.id_sikap
                           AND profile_lulusan.id_profile = $profile
                           ";

$pengetahuan            = "SELECT DISTINCT profile_lulusan.deskripsi, pengetahuan.deskripsi 
                           FROM pengetahuan, profile_lulusan, profile_has_pengetahuan 
                           WHERE profile_lulusan.id_profile = profile_has_pengetahuan.id_profile 
                           AND pengetahuan.id_pengetahuan = profile_has_pengetahuan.id_pengetahuan
                           AND profile_lulusan.id_profile = $profile";

$matkul_khusus          = "SELECT DISTINCT mata_kuliah.*,  bahan_kajian.deskripsi
FROM mata_kuliah,profile_lulusan, profile_has_kk, kode_mk_has_kk , ketrampilan_khusus , bahan_kajian, kajian_matkul
WHERE mata_kuliah.kode_mk = kode_mk_has_kk.id_mk 
AND kode_mk_has_kk.id_kk = ketrampilan_khusus.id_kk 
AND profile_has_kk.id_kk = ketrampilan_khusus.id_kk 
AND profile_lulusan.id_profile = profile_has_kk.id_profile 
AND kajian_matkul.id_kajian = bahan_kajian.id_kajian
AND kajian_matkul.id_matkul = mata_kuliah.kode_mk
AND profile_lulusan.id_profile = $profile
UNION SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi
FROM mata_kuliah,profile_lulusan, profile_has_ku, kode_mk_has_ku , ketrampilan_umum , bahan_kajian, kajian_matkul
WHERE mata_kuliah.kode_mk = kode_mk_has_ku.id_mk 
AND kode_mk_has_ku.id_ku = ketrampilan_umum.id_ku 
AND profile_has_ku.id_ku = ketrampilan_umum.id_ku 
AND profile_has_ku.id_profile = profile_lulusan.id_profile
AND kajian_matkul.id_kajian = bahan_kajian.id_kajian
AND kajian_matkul.id_matkul = mata_kuliah.kode_mk
AND profile_lulusan.id_profile = $profile 
UNION SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi 
FROM sikap, mata_kuliah,profile_lulusan,profile_has_sikap, kode_mk_has_sikap, bahan_kajian, kajian_matkul
WHERE mata_kuliah.kode_mk = kode_mk_has_sikap.id_mk 
AND kode_mk_has_sikap.id_sikap = sikap.id_sikap 
AND sikap.id_sikap = profile_has_sikap.id_sikap 
AND profile_has_sikap.id_profile = profile_lulusan.id_profile 
AND kajian_matkul.id_kajian = bahan_kajian.id_kajian
AND kajian_matkul.id_matkul = mata_kuliah.kode_mk
AND profile_lulusan.id_profile =  $profile 
UNION SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi
FROM mata_kuliah, pengetahuan, profile_lulusan, profile_has_pengetahuan, kode_mk_has_pengetahuan, bahan_kajian, kajian_matkul 
WHERE mata_kuliah.kode_mk = kode_mk_has_pengetahuan.id_mk 
AND kode_mk_has_pengetahuan.id_pengetahuan 
AND pengetahuan.id_pengetahuan = profile_has_pengetahuan.id_pengetahuan 
AND profile_lulusan.id_profile = profile_has_pengetahuan.id_profile
AND kajian_matkul.id_kajian = bahan_kajian.id_kajian
AND kajian_matkul.id_matkul = mata_kuliah.kode_mk
AND profile_lulusan.id_profile = $profile  
ORDER BY nama_mk ASC";
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Detail Kurikulum</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Hanalei+Fill|Noto+Serif+JP|Raleway" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
            <nav class="navbar navbar-light bg-light container">
                <a href="index.php"><span class="navbar-brand mb-0 h1">Kurikulum JPTEI UNY</span></a>

                <span class="h6">
                <?php
                    $names = mysqli_query($koneksi,$name);
                    while($d = mysqli_fetch_assoc($names)){
                        echo  $d['deskripsi'] ;
                        echo "<br>";
                    }         
                ?>   
                </span>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                      <div class="nav nav-link flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Ketrampilan Umum</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ketrampilan Khusus</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Sikap</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Pengetahuan</a>
                        <a class="nav-link" id="v-pills-matkul-tab" data-toggle="pill" href="#v-pills-matkul" role="tab" aria-controls="v-pills-matkul" aria-selected="false">Mata Kuliah</a>
                  </div>
                </div>
                    <div class="col-9">
                      <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Deskripsi Keterampilan Umum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ku = mysqli_query($koneksi,$keterampilan_umum);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($ku)){
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                              </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Deskripsi Keterampilan Khusus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ku = mysqli_query($koneksi,$keterampilan_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($ku)){
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                              </table>
                            </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Deskripsi Sikap</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $kk = mysqli_query($koneksi,$sikap);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                              </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Deskripsi Pengetahuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ku = mysqli_query($koneksi,$pengetahuan);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($ku)){
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                            <div class="tab-pane fade" id="v-pills-matkul" role="tabpanel" aria-labelledby="v-pills-matkul-tab">
                            <div class="d-flex flex-column">
                            <div class="p-2">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Sem 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Sem 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Sem 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">Sem 4</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false">Sem 5</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-6-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false">Sem 6</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-7-tab" data-toggle="pill" href="#pills-7" role="tab" aria-controls="pills-7" aria-selected="false">Sem 7</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-8-tab" data-toggle="pill" href="#pills-8" role="tab" aria-controls="pills-8" aria-selected="false">Sem 8</a>
                                </li>
                                </ul></div>
                                <div style="margin-top:50px">                                
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab"> 
                                    <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat Min</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk'] == 1) {
                                        ?>        
                                           
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table></div>
                                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab"> 
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk']==2) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table></div>
                                <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab"> 
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk'] == 3) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table>
                                </div> 
                                <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk']==4) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php   
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table>
                                </div>   
                                <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk'] == 5) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table>
                                </div>   
                                <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab"> 
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk'] == 6) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table>
                                </div>  
                                <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab"> 
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk'] == 7) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="pills-8" role="tabpanel" aria-labelledby="pills-8-tab"> 
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$matkul_khusus);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
                                            if($d['semester_mk'] == 8) {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $nomor++ ?></td>
                                            <td><?php echo $d['kode_mk'] ; ?></td>
                                            <td><?php echo $d['nama_mk'] ; ?></td>
                                            <td><?php echo $d['semester_mk'] ; ?></td>
                                            <td><?php echo $d['sks_mk'] ; ?></td>
                                            <td><?php echo $d['syarat_mk'] ; ?></td>
                                            <td><?php echo $d['deskripsi'] ; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="5">
                                            <span><b>Bahan Kajian : </b><?php echo $d['deskripsi'] ; ?></span>
                                            </td>
                                        </tr> -->
                                       
                                    <?php 
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                  </table>
                                </div>
                                </div></div>
                            </div>
                            

                            
                                </div>
                      </div>
                    </div>
                  </div>
                </div>
                
    </body>
    
</html>


