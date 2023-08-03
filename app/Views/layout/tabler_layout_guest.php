<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/homepage-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/baguetteBox.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vanilla-zoom.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler-flags.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler-payments.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tabler-vendors.min.css') ?>">

    <!-- PWA -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('site.webmanifest') ?>">
    <link rel="mask-icon" href="<?= base_url('safari-pinned-tab.svg') ?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#f1f5f9">
</head>

<body>
    <?php if (auth()->loggedIn()) : ?>
        <?= $this->include('layout/tabler_navbar') ?>
    <?php else : ?>
        <?= $this->include('layout/tabler_navbar_guest') ?>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/tabler_footer') ?>

    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/baguetteBox.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/vanilla-zoom.js') ?>"></script>
    <script src="<?= base_url('assets/js/masonry.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/tabler.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js') ?>"></script>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js').then(registration => {
                    console.log('Service Worker registered:', registration);
                }).catch(error => {
                    console.log('Service Worker registration failed:', error);
                });
            });
        }
    </script>

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