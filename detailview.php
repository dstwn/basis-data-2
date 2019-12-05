<?php
include_once('conn.php');
$profile = $_POST['desk'];


$name = "SELECT profile_lulusan.deskripsi FROM profile_lulusan WHERE profile_lulusan.id_profile = $profile ";


$keterampilan_khusus    = "SELECT profile_lulusan.deskripsi,ketrampilan_khusus.deskripsi FROM profile_lulusan,ketrampilan_khusus WHERE profile_lulusan.id_profile = $profile ";
$keterampilan_umum      = "SELECT profile_lulusan.deskripsi,ketrampilan_umum.deskripsi FROM profile_lulusan,ketrampilan_umum WHERE profile_lulusan.id_profile = $profile ";
$sikap                  = "SELECT profile_lulusan.deskripsi, sikap.deskripsi FROM profile_lulusan,sikap WHERE profile_lulusan.id_profile = $profile ";
$pengetahuan            = "SELECT profile_lulusan.deskripsi,pengetahuan.deskripsi FROM profile_lulusan,pengetahuan WHERE profile_lulusan.id_profile = $profile ";
$semester1             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 1 
ORDER BY mata_kuliah.semester_mk ASC";
$semester2             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 2
ORDER BY mata_kuliah.semester_mk ASC";
$semester3             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 3
ORDER BY mata_kuliah.semester_mk ASC";
$semester4             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 4
ORDER BY mata_kuliah.semester_mk ASC";
$semester5             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 5
ORDER BY mata_kuliah.semester_mk ASC";
$semester6             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 6
ORDER BY mata_kuliah.semester_mk ASC";
$semester7             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 7
ORDER BY mata_kuliah.semester_mk ASC";
$semester8             = "SELECT DISTINCT mata_kuliah.*, bahan_kajian.deskripsi  FROM kajian_matkul, bahan_kajian, mata_kuliah WHERE kajian_matkul.id_matkul = mata_kuliah.kode_mk AND kajian_matkul.id_kajian = bahan_kajian.id_kajian AND mata_kuliah.semester_mk = 8
ORDER BY mata_kuliah.semester_mk ASC";
?>


<!DOCTYPE html>
<html>
    <head>
        <tittle>Detail Kurikulum</tittle>
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
                                        <th scope="col">Syarat</th>
                                        <th scope="col">Bahan Kajian</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $kk = mysqli_query($koneksi,$semester1);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester2);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester3);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester4);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester5);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester6);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester7);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                                        $kk = mysqli_query($koneksi,$semester8);
                                        $nomor = 1;
                                        while($d = mysqli_fetch_assoc($kk)){
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
                
                         <!-- <div class="float-right"><div class="p-1"> <select class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                              </select></div> -->
    </body>
    
</html>


