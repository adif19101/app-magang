<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!-- <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler-flags.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler-payments.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler-vendors.min.css') ?>">
    <link rel="manifest" href="<?= base_url('assets/pwa/manifest.json') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/summernote-0.8.18-dist/summernote-lite.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.min.css') ?>">
</head>

<body>
    <?= $this->include('layout/tabler_navbar') ?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container-xl">
            <div class="row align-items-center mw-100">
                <div class="col">
                    <div class="mb-1">
                        <ol class="breadcrumb" aria-label="breadcrumbs">
                            <?php
                            if (isset($breadcrumbs)) {
                                foreach ($breadcrumbs as $crumbs) {
                                    echo '<li class="breadcrumb-item">';
                                    if (isset($crumbs['url'])) {
                                        echo '<a href="' . $crumbs['url'] . '">' . $crumbs['crumb'] . '</a>';
                                    } else {
                                        echo $crumbs['crumb'];
                                    }
                                }
                            }
                            ?>
                        </ol>
                    </div>
                    <h2 class="page-title">
                        <span class="text-truncate"><?= $subtitle ?></span>
                    </h2>
                </div>

                <?= $this->renderSection('header-button'); ?>
                <!-- <div class="col-auto">
                    <div class="btn-list">
                        <a href="#" class="btn d-none d-md-inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" />
                            </svg>
                            Edit
                        </a>
                        <a href="#" class="btn btn-primary">
                            Publish
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $subtitle ?>
                    </h2>
                </div>
            </div>
        </div>
    </div> -->

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/tabler_footer') ?>

    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/masonry.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/tabler.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://kit.fontawesome.com/d7e4f69e6f.js" crossorigin="anonymous"></script> -->
    <script src="<?= base_url('assets/summernote-0.8.18-dist/summernote-lite.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/additional-methods.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/select2.min.js') ?>"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        
        $(document).ready(function() {

            <?php if (session()->getFlashdata('toast')) : ?>
                Toast.fire({
                    icon: "<?= session()->getFlashdata('toast')['icon'] ?>",
                    title: "<?= session()->getFlashdata('toast')['title'] ?>",
                })
            <?php endif; ?>
        });
    </script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>