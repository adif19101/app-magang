<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
    <div class="btn-list">
        <?php if ($surat['status'] == 'APPROVED') : ?>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_upload_surat">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M12 11v6"></path>
                    <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                </svg>
                Upload Surat
            </a>
        <?php elseif ($surat['status'] == 'DONE') : ?>
            <a href="<?= base_url('admin/suratPlot/download/' . $surat['id']) ?>" class="btn btn-success" title="Download" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
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

<!-- Modal Upload Surat -->
<div class="modal modal-blur fade" id="modal_upload_surat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="form_upload_surat">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="surat_final" class="form-label required">Surat Plot Pembimbing</label>
                        <small class="form-hint">File : .pdf</small>
                        <input type="file" class="form-control" name="surat_final" id="surat_final">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button id="save_upload" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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

        $("#form_upload_surat").validate({
            ignore: [],
            rules: {
                surat_final: {
                    required: true,
                    extension: "pdf",
                },
            },
            // messages: {
            // },
            submitHandler: function(form) {
                var form_data = new FormData(form);
                form_data.append('status', 'DONE');

                $.ajax({
                    url: "<?= base_url('admin/suratPlot/' . $surat['id']) ?>",
                    type: "POST",
                    data: form_data,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire(
                                'Success',
                                response.message,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url('admin/suratPlot') ?>";
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

        $('#save_upload').on('click', function() {
            if ($('#form_upload_surat').valid()) {
                $('#form_upload_surat').submit();
            }
        });
    });
</script>
<?= $this->endSection() ?>