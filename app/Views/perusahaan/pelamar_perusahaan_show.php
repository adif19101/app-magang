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
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Detail Pelamar</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pelamar</label>
                            <div class="form-control-plaintext"><?= $pelamar['nama'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="deadline_daftar" class="form-label">Tempat, Tanggal Lahir</label>
                            <div class="form-control-plaintext"><?= $pelamar['tmpt_tgl_lahir'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="form-control-plaintext"><?= $pelamar['email'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Whatsapp</label>
                            <div class="form-control-plaintext"><?= $pelamar['whatsapp'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="form-control-plaintext"><?= $pelamar['alamat'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cv" class="form-label">CV</label>
                            <iframe src="<?= base_url('ViewerJS/#../suratLamaran/' . $pelamar['cv']) ?>" width='100%' height='450' allowfullscreen webkitallowfullscreen></iframe>
                        </div>
                    </div>
                    <?php if($pelamar['dokumen_pendukung'] != null) : ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dokumen_pendukung" class="form-label">Dokumen Pendukung</label>
                            <iframe src="<?= base_url('ViewerJS/#../suratLamaran/' . $pelamar['dokumen_pendukung']) ?>" width='100%' height='450' allowfullscreen webkitallowfullscreen></iframe>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {});
</script>
<?= $this->endSection() ?>