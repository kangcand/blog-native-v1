<?php foreach ($kategori->edit($data['id']) as $xx) {
    $id = $xx['id'];
    $nama = $xx['nama'];
}
?>
<div class="modal fade kategori-<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/admin/kategori/proses.php?aksi=update" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit kategori </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" value="<?php echo $xx['nama']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-block btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>