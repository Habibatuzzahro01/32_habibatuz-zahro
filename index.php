<?php
  include "includes/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WELCOME - HOTEL AIRLANGGA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="hotel.png" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
</head>
<body class= bg-info>

<!------------------------------ISI BODY----------------------------- -->

<!------------------AWAL BAGIAN HEADER----------------- -->
<div class="p-2 bg-info text-dark text-center">
  <h1>HOTEL AIRLANGGA</h1>
  <p>Selamat datang di Hotel Airlangga Jember</p> 
</div>
<!------------------AKHIR BAGIAN HEADER----------------- -->

<!------------------------------AWAL BAGIAN NAVBAR(MENU)----------------------------- -->
<nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">HOTEL AIRLANGGA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
           <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">

          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
             <h5><a class="nav-link" href="">Home</a></h5> 
            </li>
            <li class="nav-item">
              <h5><a class="nav-link" href="#" id="tombol_kamar">Kamar</a></h5> 
            </li>
            <li class="nav-item">
              <h5><a class="nav-link" href="#" id="tombol_fasilitas">Fasilitas</a></h5>
            </li>
            <li class="nav-item">
              <h5><a class="nav-link" href="index2.php" id="">Login</a></h5>
            </li>
          </ul>     
  
        </div>
      </div>
</nav>
<!------------------------------AKHIR BAGIAN NAVBAR(MENU)----------------------------- -->


<!------------------------------AWAL BAGIAN CAROUSEL(SLIDESHOW)----------------------------- -->
<div id="demo_slide" class="carousel slide" data-bs-ride="carousel">
    <!-- INDIKATOR CAROUSEL -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>
    
   <div class="carousel-inner">
     <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
        <?php
            $aktif="active";
            $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              //membaca data pada baris tabel
              while($row = $result->fetch_assoc()) {
                $nf= $row["nama_fasilitas"];
                $gambar= $row["gambar"];
                $ket = $row["keterangan"];
        ?>
              <div class="carousel-item <?php echo $aktif;?> ">
                <img src="<?php echo $gambar; ?>" alt="Los Angeles" class="d-block" style="width:100%">
                  <div class="carousel-caption">
                    <h3><?php echo $nf; ?></h3>
                    <p><?php echo $ket; ?></p>
                  </div>
              </div>
            
        <?php
            $aktif="";
              }
            } 
        ?>
      <!-- Akhir Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
      
    <!-- KONTROL TOMBOL KIRI DAN KANAN SLIDESHOW -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>

   </div>
  </div>
<!------------------------------AKHIR BAGIAN CAROUSEL(SLIDESHOW)----------------------------- -->

<!-- SCRIPT CHECK IN, CHECK OUT, JUMLAH KAMAR -->
 <div class="container mt-2" id="panel_cek">
    <div class="d-flex justify-content-center">
        <form>
            <div class="row">
                <div class="col-sm form-floating mb-3 mt-3">
                    <input type="date" class="form-control" id="masuk" name="masuk">
                    <label for="masuk"> Check In</label>
                </div>
                <div class="col-sm form-floating mb-3 mt-3">
                    <input type="date" class="form-control" id="keluar" name="keluar">
                    <label for="keluar"> Check Out</label>
                </div>
                <div class="col-sm form-floating mb-3 mt-3">
                    <input type="number" class="form-control" id="jkamar"  name="jkamar">
                    <label for="jkamar">Jumlah Kamar</label>
                </div>
            </div>
          </form>       
    </div>
 </div>

 <!-- SCRIPT PEMESANAN -->
 <div class="container mt-4 col-sm-8" id="panel_pemesanan">
    <div class="card d-flex justify-content-center">
        <div class="card-body bg-secondary">
            <div class="row bg-secondary text-white">
                <h4>Form Pemesanan</h4>
                <p>Silahkan memasukan data pada form ini untuk memulai pemesanan</p>
            </div>
            <div class="row bg-white">
              <form id="form_pesan">
                <div class="form-floating mb-2 mt-3">
                    <input type="text" class="form-control" id="nama"  name="nama">
                    <label for="nama">Nama Pemesanan</label>
                </div>         
                <div class="form-floating mt-2 mb-2">
                    <input type="email" class="form-control" id="email" name="email">
                    <label for="pwd">Email</label>
                </div>
                <div class="form-floating mt-2 mb-2">
                    <input type="text" class="form-control" id="hp" name="hp">
                    <label for="hp">No. Telepon</label>
                </div>
                <div class="form-floating mt-2 mb-2">
                    <input type="text" class="form-control" id="tamu" name="tamu">
                    <label for="tamu">Nama Tamu</label>
                </div>
                <div class="form-floating mt-2 mb-2">
                <select class="form-select mt-3" id="idkamar" name="idkamar">
                  <?php
                    $sql = "SELECT * FROM tb_kamar";
                    $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      //membaca data pada baris tabel
                      while($row = $result->fetch_assoc()) {
                  ?>
                        <option value="<?php echo $row["id_kamar"]; ?>"> <?php echo $row["nama_kamar"]; ?> </option>                 
                  <?php 
                    }
                   }
                  ?>
                   </select>
                    <label for="idkamar">Tipe Kamar</label>
                </div>
                <div class="mt-3 mb-3">
                    <button type="button" id="konfirmasi" class="btn btn-outline-secondary">Konfirmasi Pemesanan</button>
                    <button type="button" id="tombol_batal" class="btn btn-outline-danger">Batal</button>
                </div>
            </form>

          </div>
        </div>
    </div>
</div>

<!-- SCRIPT FASILITAS -->
<div class="container mt-2" id="panel_fasilitas_kami">
    <h2 class="text-center" >FASILITAS KAMI</h2>
      <h5 class="text-center">Hotel Airlangga</h5>
        
      <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
        <?php
            $aktif="active";
            $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              //membaca data pada baris tabel
              while($row = $result->fetch_assoc()) {
                $nf= $row["nama_fasilitas"];
                $gambar= $row["gambar"];
                $ket = $row["keterangan"];
        ?>

      <div class="container mt-4">
      <div class="card-colum bg-secondary">
        <div class="text-white">
        <h5><?php echo $nf ; ?></h5>
        <p><?php echo $ket ; ?></p>
        <img class="img-fluid" max-width: 100%;  height: auto; src="<?php echo $gambar ; ?>" alt="Gambar"> 
      </div>
       </div>
      </div>
    <?php
        }
      } 
    ?>
</div>

<!-- SCRIPT KAMAR -->
<div class="container mt-2 col-sm-7" id="panel_kamar">
  <h2 class="text-center" >TIPE KAMAR KAMI</h2>
    <h5 class="text-center">Hotel Airlangga</h5>

  <div class="justify-content-center">
   <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
   <?php
     $sql = "SELECT * FROM tb_fasilitas_kamar ORDER BY id DESC LIMIT 5";
      $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       //membaca data pada baris tabel
        while($row = $result->fetch_assoc()) {
         $idk= $row["id_kamar"];
         $gambar= $row["gambar"];
         $fas = $row["fasilitas"];

         $sql2    = "SELECT nama_kamar FROM tb_kamar WHERE id_kamar= '$idk'";
         $result2 = $conn->query($sql2);
         $row2    = $result2->fetch_assoc();
   ?>

  <div class="card mt-2 mb-4">
      <div class="card-colum bg-secondary">
        <h5 class="card-title"><?php echo $row2["nama_kamar"]; ?> :</h5>
        <ul> 
          <li><?php echo $fas; ?></li>
        </ul>
        <img class="img-fluid" src="<?php echo $gambar; ?>" alt="Card image">
      </div>
    </div>
   <?php
        }
      }
    ?>   
  </div>
</div>

<!-- SCRIPT TEANTANG KAMI -->
<div class="container  mt-2" id="panel_tentang_kami">
  <!-- SCRIPT TOMBOL PESAN SEKARANG -->
<div class="container mt-2">
    <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-sm form-floating mb-3 mt-4">
                    <button type="button" id="tombol_pesan" class="btn btn-outline-dark">Mulai Pesan Sekarang</button>
                </div>
            </div> 
    </div>
 </div>
  <div class="d-flex justify-content-center">
    <div class="row">
     <div class="col-sm-12 p-5">
      <h2 class="text-center">TENTANG KAMI</h2>
      <p> <b>Hotel Airlangga</b> terkenal dengan keramahan kelas dunia, desain hotel yang mengagumkan dan standar layanan yang terbaik di daerah Jember, Hotel Airlangga adalah resort bintang lima yang terletak di pusat kota Jember dengan jarak tempuh kurang lebih 30-45 menit dari Alun-alun Jember. Hotel Airlangga merupakan hotel dengan bangunan yang tergolong masih baru dengan fasilitas yang tentunya akan membuat anda nyaman selama menginap. setiap kamar menawarkan pemandangan indah nan asri dengan jendela besar untuk menikmati cahaya keemasan dari matahari yang terbenam di atas gedung.
    </p>
   </div>
  </div>
  
 </div>
</div>

<!-- SCRIPT FOOTER -->
<div class="mt-5 p-2 bg-secondary text-white text-center">
  <p>Habibatuz Zahro UKK RPL 2022</p>
</div>

<!-- PANGGIL FILE JAVASCRIPT DARI FOLDER js -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap5.0.1.bundle.min.js"></script>
<script src="crud_js/pesan.js"></script>

<!------------------------------ AWAL KONDISI CODING JAVASCRIPT-------------------------------- -->
<script>
$(document).ready(function(){

     /*KONDISI SAAT WEBSITE DIJALANKAN PERTAMA KALI*/
     $('#panel_cek').hide();
     $('#panel_fasilitas_kami').hide();
     $('#panel_pemesanan').hide();
     $('#panel_tentang_kami').show();
     $('#panel_kamar').hide();

     /*KONDISI TOMBOL PESAN SEKARANG DI KLIK*/
      $("#tombol_pesan").click(function(){
        $('#panel_tentang_kami').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_cek').show();
        $('#panel_pemesanan').show();
        $('#panel_kamar').hide();
        $('#demo_slide').hide();
      });

      /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
      $("#tombol_batal").click(function(){
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').show();
        $('#demo_slide').show();
        $('#panel_kamar').hide();
      });

       /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_fasilitas").click(function(){
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').show();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').hide();
        $('#panel_kamar').hide();
        $('#demo_slide').hide();
      });
        /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_kamar").click(function(){
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').hide();
        $('#panel_kamar').show();
        $('#demo_slide').hide();
      });

});

</script>
<!------------------------------ AWAL KONDISI CODING JAVASCRIPT-------------------------------- -->

</body>
<!-- END BODY -->
</html>