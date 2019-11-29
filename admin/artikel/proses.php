<?php
session_start();
include '../../config/koneksi.php';
$artikel = new Artikel();
$aksi = $_GET['aksi'];
// Memanggil User login yang akan dijadi penulis
$user = new Database();
$user = mysqli_query(
    $user->koneksi,
    "select * from users where password='$_SESSION[login]'"
);
$user = mysqli_fetch_array($user);

if (isset($_POST['save'])) {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $tgl = date('Y-m-d');
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul"])));
    $id_kategori = $_POST['id_kategori'];
    $id_user = $user['id'];
    $fotoLama = $_POST['fotoLama'];
    // upload image
    function upload()
    {
        // Upload Foto
        $foto = $_FILES['foto']['name'];
        $sizeFoto = $_FILES['foto']['size'];
        $fotoError = $_FILES['foto']['error'];
        $tmpFoto = $_FILES['foto']['tmp_name'];
        // ekstensi
        $ekstensi = ["jpg", "jpeg", "png"];
        $ekstensiFoto = explode('.', $foto);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        // if ($fotoError === 4) {
        //     echo "<script>
        // alert('Maaf file yang anda masukan tidak ada!');
        // </script>";
        //     return false;
        // }
        if ($sizeFoto > 2400000) {
            echo "<script>
        alert('Maaf file yang anda masukan tidak boleh melebihi 2.4mb!');
        </script>";
            return false;
        }
        if (!in_array($ekstensiFoto, $ekstensi)) {
            echo "<script>
        alert('Maaf file yang masukan bukan sebuah foto!');
        </script>";
            return false;
        }
        // mengubah nama foto
        $namaFoto = uniqid();
        // 5328367236273627.png
        $namaFoto .= ".";
        $namaFoto .= $ekstensiFoto;
        move_uploaded_file($tmpFoto, 'img/' . $namaFoto);
        return $namaFoto;
    }
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }
}
// var_dump($id_user);
// var_dump($_FILES);
// var_dump(upload());
if ($aksi == "create") {
    $artikel->create($judul, $slug, $konten, $foto, $tgl, $id_user, $id_kategori);
    header("location:index.php");
} elseif ($aksi == "update") {
    $artikel->update($id, $judul, $slug, $konten, $foto, $tgl, $id_user, $id_kategori);
    header("location:index.php");
} elseif ($aksi == "delete") {
    $artikel->delete($_GET['id']);
    header("location:index.php");
}
