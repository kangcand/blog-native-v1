<?php foreach ($kategori->show($data['id']) as $data) {
    $id = $data['id'];
    $nama = $data['nama'];
}
?>
<div class="modal fade kategori-show-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/admin/kategori/proses.php?aksi=update" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Show kategori </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Slug Kategori</label>
                        <input type="text" name="nama" value="<?php echo $data['slug']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>