<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
    <div class="btn-list">
        <?php if ($surat['status'] == 'PENDING' || $surat['status'] == "APPROVED") : ?>
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
            <a href="<?= base_url('admin/surat/download/' . $surat['id']) ?>" class="btn btn-success" title="Download" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
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
                        <label for="surat_final" class="form-label required">Surat Permohonan</label>
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
                    url: "<?= base_url('admin/surat/' . $surat['id']) ?>",
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
                                    window.location.href = "<?= base_url('admin/surat') ?>";
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