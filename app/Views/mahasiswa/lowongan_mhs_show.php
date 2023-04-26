<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<!-- <div class="col-auto">
    <div class="btn-list">
        <a id="btn_save" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M14 4l0 4l-6 0l0 -4"></path>
            </svg>
            Simpan
        </a>
    </div>
</div> -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <?= $lowongan['deskripsi'] ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kriteria</label>
                            <?= $lowongan['kriteria'] ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cara Mendaftar</label>
                            <?= $lowongan['cara_daftar'] ?>
                        </div>
                        <?php if ($lowongan['info_tambahan']) : ?>
                            <div class="mb-3">
                                <label class="form-label">Info Tambahan</label>
                                <?= $lowongan['info_tambahan'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-share" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M20.943 13.016a9 9 0 1 0 -8.915 7.984"></path>
                                        <path d="M16 22l5 -5"></path>
                                        <path d="M21 21.5v-4.5h-4.5"></path>
                                        <path d="M12 7v5l2 2"></path>
                                    </svg>
                                    Terakhir diubah : <?= convertDate($lowongan['updated_at'], 'd-m-Y')  ?>
                                </span>
                            </div>

                            <div class="col-auto">
                                <div class="text-end">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20.942 13.021a9 9 0 1 0 -9.407 7.967"></path>
                                            <path d="M12 7v5l3 3"></path>
                                            <path d="M15 19l2 2l4 -4"></path>
                                        </svg>
                                        Tenggat Daftar : <?= convertDate($lowongan['deadline_daftar'])  ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <h3><?= $lowongan['nama_perusahaan'] ?></h3>
                        </div>
                        <div class="mb-3">
                            <small class="form-hint">Lokasi</small>
                            <?= $lowongan['alamat_perusahaan'] ?>
                        </div>
                        <div class="mb-3">
                            <small class="form-hint">Kontak</small>
                            <?= $lowongan['kontak_perusahaan'] ?>
                        </div>
                        <div class="mb-3">
                            <small class="form-hint">Profil Perusahaan</small>
                            <!-- TODO lengkapin -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= $lowongan['lama_kontrak'] . ' (' . $lowongan['tipe_pekerjaan'] . ' - ' . $lowongan['jenis_kontrak'] . ')' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>