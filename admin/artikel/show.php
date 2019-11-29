<?php
session_start();
if (!$_SESSION['login']) {
    echo "<script type='text/javascript'>
        alert('Maaf anda harus login terlebih dahulu!');
            window.location = '/login.php'
        </script>";
} else {
    include('../../config/koneksi.php');
    $user = new Database();
    $user = mysqli_query(
        $user->koneksi,
        "select * from users where password='$_SESSION[login]'"
    );
    // var_dump($_SESSION['login']);
    $user = mysqli_fetch_array($user); ?>

    <!-- Header -->
    <?php include('../../layouts/includes/head.php') ?>
    <!-- End Header -->

    <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        <!-- Navbar -->
        <?php include('../../layouts/includes/navbar.php') ?>
        <!-- End Navbar -->
        <div class="app-body">
            <!-- Sidebar -->
            <?php include('../../layouts/includes/sidebar.php') ?>
            <!-- End Sidebar -->
            <!-- Main Content -->
            <main class="main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">
                        <a href="#">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    <!-- Breadcrumb Menu-->
                    <li class="breadcrumb-menu d-md-down-none">
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn" href="#">
                                <i class="icon-speech"></i>
                            </a>
                            <a class="btn" href="./">
                                <i class="icon-graph"></i>  Dashboard</a>
                            <a class="btn" href="#">
                                <i class="icon-settings"></i>  Settings</a>
                        </div>
                    </li>
                </ol>
                <div class="container" style="padding-top:20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Show Artikel <i class="icons cui-laptop"></i>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $artikel = new Artikel();
                                        foreach ($artikel->show($_GET['id']) as $data) {
                                            $id = $data['id'];
                                            $judul = $data['judul'];
                                            $konten = $data['konten'];
                                            $foto = $data['foto'];
                                            $tgl = $data['tgl'];
                                            $kategori = $data['nama_kategori'];
                                            $penulis = $data['nama_penulis'];
                                        }
                                        // var_dump($artikel);                                    
                                        ?>
                                    <p align="right"> <i class="icons cui-note"></i> Dibuat : <?php echo date('d F Y', strtotime($tgl)) ?></p>
                                    <center>
                                        <h2><label class="cui-date"><?php echo $judul ?></label></h2>
                                        <img src="/admin/artikel/img/<?php echo $foto; ?>" alt="" style="width:600px; height:350px;">
                                    </center>
                                    <br>
                                    <p class="cui-date"><?php echo $data['konten']; ?></p>

                                    <p class="cui-date">Kategori : <button class="btn btn-sm btn-outline btn-danger"> <i class="icons cui-tags"></i></i> <?php echo $kategori ?></button></p>
                                    <p class="cui-date">Penulis : <button class="btn btn-sm btn-outline btn-info"><i class="icons cui-pencil"></i> <?php echo $penulis ?></button></p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main> <!-- End Main Conten -->

        </div>
        <!-- Footer -->
        <?php include('../../layouts/includes/footer.php') ?>
        <!-- End Footer -->
        <!-- CoreUI and necessary plugins-->
        <!-- Scripts -->
        <?php include('../../layouts/includes/scripts.php') ?>
        <!-- End Scripts -->
    </body>

    </html>
<?php
} ?>