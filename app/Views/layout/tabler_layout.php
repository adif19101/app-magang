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
    <link rel="stylesheet" href="<?= base_url('assets/summernote-0.8.18-dist/summernote-lite.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/datatables.min.css') ?>">

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
                    <?php if (isset($subtitle)) : ?>
                        <h2 class="page-title">
                            <span class="text-truncate"><?= $subtitle ?></span>
                        </h2>
                    <?php endif; ?>
                </div>

                <?= $this->renderSection('header-button'); ?>
            </div>
        </div>
    </div>

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
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('upup.min.js') ?>"></script>

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

        // DataTables debounce search START
        $.fn.dataTable.Debounce = function(table, options) {
            var tableId = table.settings()[0].sTableId;
            $('.dataTables_filter input[aria-controls="' + tableId + '"]') // select the correct input field
                .unbind() // Unbind previous default bindings
                .bind('input', (delay(function(e) { // Bind our desired behavior
                    table.search($(this).val()).draw();
                    return;
                }, 350))); // Set delay in milliseconds
        }

        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this,
                    args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }
        // DataTables debounce search END

        // TODO ganti ke workbox biar bisa cache bbrp halaman(ambil 5 halaman terakhir)
        <?php if(!isset($customOffline) OR !$customOffline): ?>
        // PWA
        UpUp.start({
            'content-url': '<?= base_url(uri_string()) ?>',
            'assets': [
                'assets/css/tabler.min.css',
                'assets/img/undraw_quitting_time_dm8t.svg',
                'assets/js/tabler.min.js',
                'favicon-16x16.png',
                'favicon-32x32.png',
            ],
            'service-worker-url': '<?= base_url('upup.sw.min.js') ?>',
        });
        <?php endif; ?>

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