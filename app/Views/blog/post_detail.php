<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Blog detail</h1>
        <!-- <p class="col-md-8 fs-4">di laman portal berita</p> -->
        <!-- <button class="btn btn-primary btn-sm" type="button">Read more</button> -->

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 my-2 card">
            <div class="card-body">
                <h5 class="h5"><?= $post['title'] ?></h5>
                <span><?= $post['author'] ?> | <?=
$post['created_at'] ?></span>
                <p><?= $post['content'] ?></p>
            </div>
        </div>
    </div>
    <a class="btn btn-sm btn-warning" href="<?= base_url('post') ?>">Back</a>
</div>

<?= $this->endSection(); ?>