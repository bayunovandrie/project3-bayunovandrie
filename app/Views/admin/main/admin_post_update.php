<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Blog > Edit</h1>
    </div>
</div>

<div class="container">
    <form action="" method="post" id="text-editor">
        <input type="hidden" name="id" value="<?= $post['id'] ?>" />
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Post title"
                        value="<?= $post['title'] ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="title">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Post Author"
                        value="<?= $post['author'] ?>" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-2">
            <textarea name="content" class="form-control" cols="30" rows="10"
                placeholder="Write a great post!"><?= $post['content'] ?></textarea>
        </div>
        <div class="form-group mb-2">
            <!-- <button type="submit" name="status" value="published" class="btn btn-primary">Publish</button> -->
            <button type="submit" name="status" value="draft" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>