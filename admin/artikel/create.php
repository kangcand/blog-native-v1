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
    ?>

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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Tambah Artikel
                                </div>
                                <div class="card-body">
                                    <form action="proses.php?aksi=create" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Judul</label>
                                            <input type="text" class="form-control" name="judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konten</label>
                                            <textarea type="text" class="form-control" rows="5" name="konten" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto Artikel</label>
                                            <input type="file" name="foto" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kategori Artikel</label>
                                            <select name="id_kategori" id="" class="form-control">
                                                <?php
                                                    $kategori = new Artikel();
                                                    foreach ($kategori->get_kategori() as $data) {
                                                        ?>
                                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['nama'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="save" class="btn btn-primary btn-block">Simpan Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- End Main Conten -->

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