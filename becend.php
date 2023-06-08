<?php
    include("connection.php");
    session_start();

    // Mendapatkan ID beasiswa dari parameter URL
    $id = $_GET['id'];

    // Database query untuk mendapatkan data beasiswa berdasarkan ID
    $query = "SELECT * FROM beasiswa WHERE idisb = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Menyimpan data beasiswa ke dalam variabel
    $namabea = $row['namabea'];
    $jenisbea = $row['jenisbea'];
    $lempe = $row['lempe'];
    $tangbuk = $row['tangbuk'];
    $tangtup = $row['tangtup'];
    $desk = $row['desk'];
    $snk = $row['snk'];
    $linkpro = $row['linkpro'];
    $poster = $row['poster'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Informasi Seputar Beasiswa</title>
    <script src="https://kit.fontawesome.com/91d51d03ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="icon" href="Asset/img/isblogoo.png" type="image/x-icon" />
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
            <img class="logo" src="Asset/img/logoisb.png" alt="logo" style="height: 80px" />
            <a href="index.php" style="color: rgb(48, 82, 236); font-size: medium">Informasi Seputar Beasiswa</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto m-sm-auto">
                <li class="nav-item">
                <a class="nav-link" href="tentang.php">TENTANG KAMI</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="motivasi.php">MOTIVASI</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"> INFO BEASISWA </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="beadn.php">Dalam Negeri</a></li>
                    <li><a class="dropdown-item" href="bealn.php">Luar Negeri</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="komunitas.php">FORUM</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="faq.php">FAQ</a>
                </li>
            </ul>
          <?php
          if(isset($_SESSION['user_name'])){
          ?>
          
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="Asset/profil/<?php echo $_SESSION['profile'] ?>" alt="photo ptofil" class="rounded-circle dropdown-toggle" style="width: 59px; height: auto;">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="unggah.php">Unggah Beasiswa</a></li>
                    <li><a class="dropdown-item" href="ungmot.php">Unggah Motivasi</a></li>
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </div>
          
          <?php
          }else{ ?>
          <form class="d-flex">
            <a href="login.php">
              <button class="btn btn-primary" type="button" >Login</button>
            </a>
          </form>
          <?php } ?>
    </div>
    </nav>
        <div class="container-fluid dalneg">                   
            <a class="dalnegtx" href="javascript:history.back()"><i class="fa-solid fa-chevron-left" style="color: #030303;">
        </i>&ensp;<?php echo $namabea; ?></a>
    </div>
    <div class="container pt-4 pb-5">
        <h2><?php echo $namabea; ?></h2>
        <img src="Asset/posting/<?php echo $poster; ?>" alt="Poster Beasiswa">
        <p>Jenis Beasiswa: <?php echo $jenisbea; ?></p>
        <p>Tanggal Buka: <?php echo $tangbuk; ?></p>
        <p>Tanggal Tutup: <?php echo $tangtup; ?></p>
        <p>Deskripsi: <?php echo $desk; ?></p>
        <p>Syarat dan Ketentuan: <?php echo $snk; ?></p>
        <?php
    // Memeriksa dan menambahkan "https://" jika tidak diawali dengan skema yang valid
    $parsedUrl = parse_url($linkpro);
    if (!isset($parsedUrl['scheme'])) {
        $linkpro = 'https://' . $linkpro;
    }
?>
        <p>Link Pendaftaran: <a href="<?php echo $linkpro; ?>" target="_blank"><?php echo $linkpro; ?></a></p>
    </div>
</body>
<footer class="bg-dark text-white pt-4 pb-4">
    <div class="container text-center text-md-left">
    <div class="row text-center text-md-left">
        <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(27, 109, 231);">Tentang ISB</h5>
        <p>Informasi Seputar Beasiswa (ISB) merupakan penyedia informasi beasiswa bagi pelajar Indonesia untuk mempersiapkan studi lanjut baik di dalam negeri maupun di luar negeri. ISB juga mewadahi para penyelenggara beasiswa untuk mempromosikan program beasiswanya kepada pelajar Indonesia.</p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-3 mx-4 mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(27, 109, 231);">Useful links</h5>
        <p>
            <a href="motivasi.php" class="text-white" style="text-decoration: none;">Motivasi</a>
        </p>
        <p>
            <a href="beadn.php" class="text-white" style="text-decoration: none;">Beasiswa Dalam Negeri</a>
        </p>
        <p>
            <a href="bealn.php" class="text-white" style="text-decoration: none;">Beasiswa Luar Negeri</a>
        </p>
        <p>
            <a href="komunitas.php" class="text-white" style="text-decoration: none;">Forum</a>
        </p>
        <p>
            <a href="faq.php" class="text-white" style="text-decoration: none;">FAQ</a>
        </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(27, 109, 231);">Contact</h5>
        <p>
            <i class="fas fa-home mr-3"></i>Jl. Ketintang Barat No. 9, Surabaya. 60231
        </p>
        <p>
            <i class="fas fa-envelope mr-3"></i>Bantuan.ISB@gmail.com
        </p>
        <p>
            <i class="fas fa-phone mr-3"></i>(031) 7402278
        </p>
        <p>
            <i class="fa fa-whatsapp fa-lg mr-3"></i>6282131590806
            (Chat Only)
        </p>
        </div>
    </div>

    <hr class="mb-5">

    <div class="row align-items-center">
        <div class="col-md-7 col-lg-8">
        <p>	Website was created by:
            <a style="color: aliceblue;">
            <strong >Kelompok 2 PTI21A</strong>
            </a></p>
        </div>
        <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
                <a href="https://www.instagram.com/isb.indonesia" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="https://twitter.com/isb_indonesia?s=21&t=yM7eWoc0R6DQqirfJld1Zw" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="https://youtube.com/@ISBIndonesia" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>
            </ul>
        </div>
        </div>
    </div>
</footer>
</html>