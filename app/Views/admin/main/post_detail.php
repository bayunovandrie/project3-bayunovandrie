<div class="modal-header">
    <h3 class="modal-title">Preview Blog</h3>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <p><strong>Title</strong> : <?= $post['title'] ?></p>
        </div>
        <div class="col-md-12">
            <p><strong>Author</strong> : <?= $post['author'] ?></p>
        </div>
        <div class="col-md-12">
            <p><strong>Body</strong> : <?= $post['content'] ?></p>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
</div>