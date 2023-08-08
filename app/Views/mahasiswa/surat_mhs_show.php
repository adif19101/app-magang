<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
    <div class="btn-list">
        <?php if ($surat['status'] == 'PENDING' || $surat['status'] == "APPROVED") : ?>
            <a id="<?= $surat['id'] ?>" class="btn btn-danger button-cancel" title="Cancel">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7l16 0"></path>
                    <path d="M10 11l0 6"></path>
                    <path d="M14 11l0 6"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
                Batalkan Pengajuan
            </a>
        <?php elseif ($surat['status'] == 'DONE') : ?>
            <a href="<?= base_url('mahasiswa/surat/download/' . $surat['id']) ?>" class="btn btn-success" title="Download" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M7 11l5 5l5 -5"></path>
                    <path d="M12 4l0 12"></path>
                </svg>
                Download Surat
            </a>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards masonry">
            <div class="col-md-6 masonry-item">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h3 class="card-title">Surat Permohonan Magang</h3>
                        <?= statusBadge($surat['status']) ?>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="form-control-plaintext"><?= $surat['nama'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="form-control-plaintext"><?= $surat['email'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NPM</label>
                            <div class="form-control-plaintext"><?= $surat['npm'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat, Tanggal Lahir</label>
                            <div class="form-control-plaintext"><?= $surat['tmpt_tgl_lahir'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <div class="form-control-plaintext"><?= $surat['agama'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <div class="form-control-plaintext"><?= $surat['alamat'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Hp</label>
                            <div class="form-control-plaintext"><?= $surat['no_hp'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 masonry-item">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h3 class="card-title">Detail Perusahaan</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Perusahaan</label>
                            <div class="form-control-plaintext"><?= $surat['nama_perusahaan'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penerima Surat</label>
                            <div class="form-control-plaintext"><?= $surat['penerima_surat'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                            <div class="form-control-plaintext"><?= $surat['alamat_perusahaan'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                            <div class="form-control-plaintext"><?= $surat['email_perusahaan'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp_perusahaan" class="form-label">No Telp Perusahaan</label>
                            <div class="form-control-plaintext"><?= $surat['whatsapp_perusahaan'] ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                            <div class="form-control-plaintext"><?= $surat['deskripsi_perusahaan'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('.masonry').masonry({
            // options
            itemSelector: '.masonry-item',
            percentPosition: true,
        });

        $('.button-cancel').on('click', function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Pengajuan surat akan dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Batalkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('mahasiswa/surat/') ?>" + this.id,
                        type: "POST",
                        data: {
                            status: "CANCELED"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Success',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "<?= base_url('mahasiswa/surat') ?>";
                                    }
                                })
                            } else {
                                Swal.fire(
                                    'Error',
                                    response.message,
                                    'error'
                                )
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire(
                                'Error',
                                'Something Went Wrong!',
                                'error'
                            )
                        }
                    });
                }
            })

        });

    });
</script>
<?= $this->endSection() ?>