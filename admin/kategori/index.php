<?php
session_start();
if (!$_SESSION['login']) {
    echo "<script type='text/javascript'>
        alert('Maaf anda harus login terlebih dahulu!');
            window.location = '/login.php'
        </script>";
} else {
    include('../../config/database.php');
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
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Data Kategori
                                    <button class="btn btn-outline-danger btn-sm float-right" data-toggle="modal" data-target=".kategori">Tambah</button>
                                </div>
                                <?php include 'create.php'; ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="data-table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Slug</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    $kategori = new Kategori();
                                                    foreach ($kategori->index() as $data) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $data['nama']; ?></td>
                                                        <td><?php echo $data['slug']; ?></td>

                                                        <td>
                                                            <a href="/admin/kategori/proses.php?id=<?php echo $data['id']; ?>&aksi=delete" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Delete</a> |
                                                            <a href="/admin/kategori/show.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Show</a> |
                                                            <button type="button" class="btn btn-sm btn-success btn-outline" data-toggle="modal" data-target=".kategori-<?php echo $data['id']; ?>">Edit</button>

                                                        </td>
                                                    </tr>
                                                    <?php include 'edit.php'; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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