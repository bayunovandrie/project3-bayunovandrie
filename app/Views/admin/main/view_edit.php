<form action="<?= base_url('admin/delete-blog') ?>" method="post">
    <div class="modal-header">
        <h3 class="modal-title">Delete Blog</h3>
    </div>
    <div class="modal-body">
        <h4 class="">Apakah Kamu yakin?</h4>
        <p>Judul Blog title <strong><?= $post['title'] ?></strong> akan terhapus!!</p>
        <input type="hidden" value="<?= $post['id'] ?>" name="id_blog">
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>