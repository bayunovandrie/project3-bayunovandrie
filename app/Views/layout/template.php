<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">

</head>

<body>

    <?= $this->include('layout/topbar') ?>
    <?= $this->renderSection('content') ?>


    <div class="container py-4">
        <footer class="pt-3 mt-4 text-muted border-top">
            <div class="container">
                &copy; <?= Date('Y') ?>
            </div>
        </footer>
    </div>

    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>