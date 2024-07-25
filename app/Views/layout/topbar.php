<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs- toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria- expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($uri->getSegment(1) == '') ? 'active' : '' ?>" aria-current="page"
                        href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri->getSegment(1) == 'page-about') ? 'active' : '' ?>" href="<?=
base_url('page-about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri->getSegment(1) == 'post') ? 'active' : '' ?>" href="<?= base_url('post')
?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri->getSegment(1) == 'page-contact') ? 'active' : '' ?>" href="<?=
base_url('page-contact') ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri->getSegment(1) == 'page-faqs') ? 'active' : '' ?>" href="<?=
base_url('page-faqs') ?>">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>