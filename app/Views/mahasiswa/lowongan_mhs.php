<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
    <div class="btn-list">
        <a href="<?= base_url('mahasiswa/lowongan/new') ?>" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Tambah
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-3">
                <form name="filter_form" id="filter_form" action="<?= base_url('mahasiswa/lowongan') ?>" method="get" autocomplete="off" novalidate class="sticky-top">
                    <input type="hidden" name="filter_applied" value="1">
                    <div class="form-label">Tipe Pekerjaan</div>
                    <div class="mb-4">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="tipe_pekerjaan[]" <?= formChecker(isset($filter['tipe_pekerjaan']) ? $filter['tipe_pekerjaan'] : '', 'WFO', 'checked') ?> value="WFO">
                            <span class="form-check-label">Work From Office</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="tipe_pekerjaan[]" <?= formChecker(isset($filter['tipe_pekerjaan']) ? $filter['tipe_pekerjaan'] : '', 'WFH', 'checked') ?> value="WFH">
                            <span class="form-check-label">Work From Home</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="tipe_pekerjaan[]" <?= formChecker(isset($filter['tipe_pekerjaan']) ? $filter['tipe_pekerjaan'] : '', 'Hybrid', 'checked') ?> value="Hybrid">
                            <span class="form-check-label">Hybrid</span>
                        </label>
                    </div>
                    <div class="form-label">Jenis Kontrak</div>
                    <div class="mb-4">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="jenis_kontrak[]" <?= formChecker(isset($filter['jenis_kontrak']) ? $filter['jenis_kontrak'] : '', 'Paid', 'checked') ?> value="Paid">
                            <span class="form-check-label">Paid</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="jenis_kontrak[]" <?= formChecker(isset($filter['jenis_kontrak']) ? $filter['jenis_kontrak'] : '', 'Unpaid', 'checked') ?> value="Unpaid">
                            <span class="form-check-label">Unpaid</span>
                        </label>
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-primary w-100">
                            Confirm changes
                        </button>
                        <a href="<?= base_url('mahasiswa/lowongan') ?>" class="btn btn-link w-100">
                            Reset to defaults
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-md-9 order-first">
                <div class="row row-cards">
                    <div class="space-y">
                        <?php
                        foreach ($lowongan as $jobDetail) {
                        ?>
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-auto">
                                        <div class="card-body">
                                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-1.jpg)"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-body ps-0">
                                            <div class="row">
                                                <div class="col">
                                                    <h3 class="mb-0"><a href="<?= base_url('mahasiswa/lowongan/' . $jobDetail['id']) ?>"><?= $jobDetail['judul'] ?></a></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                                <path d="M13 7l0 .01" />
                                                                <path d="M17 7l0 .01" />
                                                                <path d="M17 11l0 .01" />
                                                                <path d="M17 15l0 .01" />
                                                            </svg>
                                                            <?= $jobDetail['nama_perusahaan'] ?>
                                                        </div>
                                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                                                                <path d="M9 7l4 0" />
                                                                <path d="M9 11l4 0" />
                                                            </svg>
                                                            <?= $jobDetail['jenis_kontrak'] ?>
                                                        </div>
                                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M12 11m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                            </svg>
                                                            <?= $jobDetail['tipe_pekerjaan'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 list mb-0 text-muted d-block d-sm-none">
                                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                                <path d="M13 7l0 .01" />
                                                                <path d="M17 7l0 .01" />
                                                                <path d="M17 11l0 .01" />
                                                                <path d="M17 15l0 .01" />
                                                            </svg>
                                                            <?= $jobDetail['nama_perusahaan'] ?>
                                                        </div>
                                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                                                                <path d="M9 7l4 0" />
                                                                <path d="M9 11l4 0" />
                                                            </svg>
                                                            <?= $jobDetail['jenis_kontrak'] ?>
                                                        </div>
                                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M12 11m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                            </svg>
                                                            <?= $jobDetail['tipe_pekerjaan'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-auto">
                                                    <div class="mt-3 badges">
                                                        <span href="#" class="badge badge-outline text-muted border fw-normal badge-pill">PHP</span>
                                                        <span href="#" class="badge badge-outline text-muted border fw-normal badge-pill">Laravel</span>
                                                        <span href="#" class="badge badge-outline text-muted border fw-normal badge-pill">CSS</span>
                                                        <span href="#" class="badge badge-outline text-muted border fw-normal badge-pill">Vue</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        document.getElementById('filter_form').addEventListener('submit', combineSearchAndFilterParams);
        document.getElementById('search_form').addEventListener('submit', combineSearchAndFilterParams);
    
        function combineSearchAndFilterParams(event) {
            event.preventDefault(); // prevent form from submitting normally
    
            const searchParams = new URLSearchParams(new FormData(document.getElementById('search_form'))); // retrieve search form inputs
            const filterParams = new URLSearchParams(new FormData(document.getElementById('filter_form'))); // retrieve filter form inputs
            const combinedParams = new URLSearchParams([...searchParams, ...filterParams]); // combine into a single query string
    
            const url = `${window.location.pathname}?${combinedParams}`; // construct URL with combined query parameters
            window.location.href = url; // navigate to new URL
        }
    });
</script>
<?= $this->endSection() ?>