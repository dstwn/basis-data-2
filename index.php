<!DOCTYPE html>
<html>
<head>
    <tittle>Desain Kurikulum</tittle>
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
<body background="aset/blue.png">
    <div class="wrapper">
      <div class="nav">
        <div class="logo">
          <a href="#">
            <div class="logo a"> <p>Data Kurikulum UNY</p></div>
         
          </a>
        </div>
<!--         <ul>
          <li>Home</li>
          <li>About</li>
          <li>Contact Us</li>
        </ul> -->
      </div>
      <div>
        <div class="header">
          <table>
            <td>
                <h1>Kurikulum Informatika UNY</h1>
                <p>Cari kurikulum berdasarkan profil lulusan !</p>
          
                <div class="dropdown text-left">
                    <form action="detailview.php" method="post">
                    <select class="btn btn-primary btn-lg dropdown-toggle" name="desk" aria-labelledby="dropdownMenuLink">
                      <?php
                      include_once('conn.php');
                      $query = "SELECT * FROM profile_lulusan";
                      $data = mysqli_query($koneksi,$query);
                      while($d = mysqli_fetch_assoc($data)){
                      ?>
                        <option type="submit" class="dropdown-item" name="desk" value="<?php echo $d['id_profile'];?>"><?php echo $d['deskripsi'];?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Lihat</button>
                    </form>
                  </div>
            </td>
          </table>
         
    </div>
        </div>
          
          <div class="tagline"></div>
                  
      </div>
      <div class="header">
       
        
      </div>
      
      <div class="down">
        <img src="aset/logo.png" alt="logo">
      </div>
    </div>
  </body>
</html>