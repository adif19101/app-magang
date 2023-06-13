<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="card mb-4">
            <div class="card-header row align-items-center justify-content-between">
                <h3 class="card-title col-auto">Surat Magang</h3>

                <div class="col-auto">
                    <div class="btn-list">
                        <a href="<?= base_url('mahasiswa/surat/new') ?>" class="btn d-none d-md-inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Ajukan Surat
                        </a>
                        <a href="<?= base_url('mahasiswa/surat') ?>" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 6l11 0"></path>
                                    <path d="M9 12l11 0"></path>
                                    <path d="M9 18l11 0"></path>
                                    <path d="M5 6l0 .01"></path>
                                    <path d="M5 12l0 .01"></path>
                                    <path d="M5 18l0 .01"></path>
                                </svg>
                            Semua
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>