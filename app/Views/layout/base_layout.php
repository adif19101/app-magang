<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="manifest" href="<?= base_url('assets/pwa/manifest.json') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/simple-line-icons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/baguetteBox.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vanilla-zoom.min.css') ?>">
</head>

<body>
    <?= $this->include('layout/base_navbar') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/base_footer') ?>

    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/baguetteBox.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/vanilla-zoom.js') ?>"></script>
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
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