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
                                    Tambah Artikel
                                </div>
                                <div class="card-body">
                                    <?php
                                        $artikel = new Artikel();
                                        foreach ($artikel->edit($_GET['id']) as $data) {
                                            $id = $data['id'];
                                            $judul = $data['judul'];
                                            $konten = $data['konten'];
                                            $foto = $data['foto'];
                                        }
                                        // var_dump($artikel);                                    
                                        ?>
                                    <form action="/admin/artikel/proses.php?aksi=update" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="fotoLama" value="<?php echo $data['foto']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                        <div class="form-group">
                                            <label for="">Judul</label>
                                            <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konten</label>
                                            <textarea type="text" class="form-control" rows="5" name="konten" required><?php echo $data['konten']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto Artikel</label><br>
                                            <?php
                                                if (isset($data['foto'])) { ?>
                                                <img src="/admin/artikel/img/<?php echo $data['foto']; ?>" alt="" style="width:200px; height:100px;">
                                            <?php }
                                                ?>
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kategori Artikel</label>
                                            <select name="id_kategori" id="" class="form-control">
                                                <?php
                                                    $artikel = new Artikel();
                                                    foreach ($artikel->get_kategori() as $kategori) {
                                                        ?>
                                                    <option value="<?php echo $kategori['id'] ?>" <?php if ($kategori['id'] == $data['id_kategori']) echo "selected" ?>>
                                                        <?php echo $kategori['nama'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group"></div>
                                        <button type="submit" name="save" class="btn btn-primary btn-block">Simpan
                                            Data</button>
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