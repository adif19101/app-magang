<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
    <div class="btn-list">
        <?php if ($surat['status'] == 'PENDING') : ?>
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
            <a href="<?= base_url('mahasiswa/suratPlot/download/' . $surat['id']) ?>" class="btn btn-success" title="Download" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
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
        <form id="buat_surat_plot">
            <div class="row row-cards masonry">
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3 class="card-title">Surat Plot Pembimbing</h3>
                            <?= statusBadge($surat['status']) ?>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="form-control-plaintext"><?= $surat['nama'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="form-control-plaintext"><?= $surat['nama'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NPM</label>
                                <div class="form-control-plaintext"><?= $surat['nama'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="surat_covid" class="form-label">Surat Pernyataan Mengikuti Protokol Kesehatan Selama Magang Dan Pertanggung Jawaban Resiko Covid19</label>
                                <iframe src="<?= base_url('ViewerJS/#../suratBukti/' . $surat['surat_covid']) ?>" width='100%' height='450' allowfullscreen webkitallowfullscreen></iframe>
                            </div>
                            <div class="mb-3">
                                <label for="surat_balasan" class="form-label">Surat Balasan Dari Unit Tujuan Magang</label>
                                <iframe src="<?= base_url('ViewerJS/#../suratBukti/' . $surat['surat_balasan']) ?>" width='100%' height='450' allowfullscreen webkitallowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3 class="card-title">Detail Magang</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Tempat Magang</label>
                                <div class="form-control-plaintext"><?= $surat['nama_perusahaan'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_perusahaan" class="form-label">Alamat Tempat Magang</label>
                                <div class="form-control-plaintext"><?= $surat['alamat_perusahaan'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Penanggung Jawab di Tempat Magang</label>
                                <div class="form-control-plaintext"><?= $surat['nama_penanggung_jawab'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Kontak Penanggung Jawab di Tempat Magang</label>
                                <div class="form-control-plaintext"><?= $surat['hp_penanggung_jawab'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitude Tempat Magang</label>
                                <div class="form-control-plaintext"><?= $surat['latitude'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitude Tempat Magang</label>
                                <div class="form-control-plaintext"><?= $surat['longitude'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Awal/Mulai Magang</label>
                                <div class="form-control-plaintext"><?= convertDate($surat['tanggal_mulai'], 'd-m-Y') ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai Magang</label>
                                <div class="form-control-plaintext"><?= convertDate($surat['tanggal_selesai'], 'd-m-Y') ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bidang Minat</label>
                                <div class="form-control-plaintext"><?= $surat['bidang_minat'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="rencana_magang" class="form-label">Rencana Magang</label>
                                <div class="form-control-plaintext"><?= $surat['rencana_magang'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                        url: "<?= base_url('mahasiswa/suratPlot/') ?>" + this.id,
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
                                        window.location.href = "<?= base_url('mahasiswa/suratPlot') ?>";
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