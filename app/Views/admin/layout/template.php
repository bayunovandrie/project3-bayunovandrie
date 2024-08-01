<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" />
    <!-- font awesome 6.6 -->
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.min.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <?= $this->include('admin/layout/topbar') ?>

    <?= $this->renderSection('content') ?>

    <div class="container py-4">
        <footer class="pt-3 mt-4 text-muted border-top">
            <div class="container">
                &copy; <?= Date('Y') ?>
            </div>
        </footer>
    </div>
    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('jquery3.7.1/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
    function confirmToDelete(blogID) {
        $('.edit_blog').load('<?php echo base_url()?>admin/edit_view/' + blogID);
    }

    function preview(blogID) {
        $('.edit_blog').load('<?php echo base_url()?>admin/preview-blog/' + blogID);
    }
    </script>

</body>

</html>