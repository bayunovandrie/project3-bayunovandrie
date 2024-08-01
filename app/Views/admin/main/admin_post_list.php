<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Blog > Admin</h1>
    </div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($posts as $post): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <strong><?= $post['title'] ?></strong><br>
                    <small class="text-muted"><?= $post['created_at'] ?></small>
                </td>
                <td>
                    <?php if($post['status'] === 'published'): ?>
                    <a href="<?= base_url('admin/update-status/published/') . $post['id'] ?>"
                        class="btn btn-sm btn-primary">Published</a>
                    <?php elseif($post['status'] === 'draft'): ?>
                    <a href="<?= base_url('admin/update-status/draft/')  . $post['id']?>"
                        class="btn btn-sm btn-secondary">Draft</a>
                    <?php endif ?>
                </td>
                <td>
                    <a href="#" title="Preview" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#confirm-dialog" onclick="preview('<?= $post['id'] ?>')"><i
                            class="fa-solid fa-eye"></i></a>
                    <a title="Edit" href="<?= base_url('admin/edit-blog/'.$post['id']) ?>"
                        class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a title="Delete" href="#" onclick="confirmToDelete('<?= $post['id'] ?>')"
                        class="btn btn-sm btn-outline-danger" data-bs-target="#confirm-dialog" data-bs-toggle="modal"><i
                            class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div id="confirm-dialog" class="modal fade modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content edit_blog">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>