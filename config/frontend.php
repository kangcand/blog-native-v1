<?php
class Frontend extends Database
{
    public function index()
    {
        $blog = mysqli_query(
            $this->koneksi,
            "SELECT artikel.id, artikel.judul, artikel.tgl, artikel.slug,artikel.foto, 
            kategori.nama as nama_kategori, users.nama as penulis from 
            ((artikel JOIN kategori on kategori.id = artikel.id_kategori) 
            JOIN users on users.id = artikel.id_user)ORDER BY artikel.id DESC LIMIT 4"
        );
        return $blog;
    }

    public function blog()
    {
        $blog = mysqli_query(
            $this->koneksi,
            "SELECT artikel.id, artikel.judul, artikel.tgl, artikel.slug,artikel.foto, 
            kategori.nama as nama_kategori, users.nama as penulis from 
            ((artikel JOIN kategori on kategori.id = artikel.id_kategori) 
            JOIN users on users.id = artikel.id_user)ORDER BY artikel.id DESC"
        );
        return $blog;
    }

    public function single_blog($slug)
    {
        $data_artikel = mysqli_query(
            $this->koneksi,
            "SELECT artikel.id, artikel.judul, artikel.foto,artikel.konten, artikel.tgl, artikel.slug, kategori.nama as nama_kategori, 
            users.nama as nama_penulis FROM ((artikel JOIN kategori ON kategori.id = artikel.id_kategori)
            JOIN users ON users.id = artikel.id_user) where artikel.slug='$slug'"
        );
        return $data_artikel;
    }

    public function get_kategori()
    {
        $data_kategori = mysqli_query($this->koneksi, "SELECT * FROM kategori");
        // var_dump($kategori);
        return $data_kategori;
    }
}
