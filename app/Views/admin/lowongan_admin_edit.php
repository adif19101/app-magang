<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
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
</div>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <form id="edit_lowongan_admin">
            <div class="row row-cards masonry">
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Lowongan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Lowongan" value="<?= $lowongan['judul'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label required">Deskripsi</label>
                                <textarea class="summernote" name="deskripsi" id="deskripsi"><?= $lowongan['deskripsi'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tipe_pekerjaan" class="form-label required">Tipe Pekerjaan</label>
                                <select class="form-select" name="tipe_pekerjaan" id="tipe_pekerjaan">
                                    <option <?= formChecker($lowongan['tipe_pekerjaan'], 'WFO', 'selected') ?> value="WFO">Work From Office</option>
                                    <option <?= formChecker($lowongan['tipe_pekerjaan'], 'WFH', 'selected') ?> value="WFH">Work From Home</option>
                                    <option <?= formChecker($lowongan['tipe_pekerjaan'], 'Hybrid', 'selected') ?> value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Lama Kontrak</label>
                                <input type="text" class="form-control" name="lama_kontrak" id="lama_kontrak" value="<?= $lowongan['lama_kontrak'] ?>" placeholder="Lama Kontrak">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Jenis Kontrak</label>
                                <select name="jenis_kontrak" id="jenis_kontrak" class="form-select">
                                    <option <?= formChecker($lowongan['jenis_kontrak'], 'Paid', 'selected') ?> value="Paid">Paid</option>
                                    <option <?= formChecker($lowongan['jenis_kontrak'], 'Unpaid', 'selected') ?> value="Unpaid">Unpaid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pendaftaran</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="deadline_daftar" class="form-label">Tenggat Pendaftaran</label>
                                <input type="date" class="form-control" name="deadline_daftar" id="deadline_daftar" value="<?= convertDate($lowongan['deadline_daftar'], 'Y-m-d') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kriteria</label>
                                <textarea class="summernote" name="kriteria" id="kriteria"><?= $lowongan['kriteria'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Cara Mendaftar</label>
                                <textarea class="summernote" name="cara_daftar" id="cara_daftar"><?= $lowongan['cara_daftar'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Info Tambahan</label>
                                <textarea class="summernote" name="info_tambahan" id="info_tambahan"><?= $lowongan['info_tambahan'] ?></textarea>
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
                                <div class="form-control-plaintext"><?= $lowongan['nama_perusahaan'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                                <div class="form-control-plaintext"><?= $lowongan['alamat_perusahaan'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                <div class="form-control-plaintext"><?= $lowongan['email_perusahaan'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp_perusahaan" class="form-label">Whatsapp Perusahaan</label>
                                <div class="form-control-plaintext"><?= $lowongan['whatsapp_perusahaan'] ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                                <div class="form-control-plaintext"><?= $lowongan['deskripsi_perusahaan'] ?></div>
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
        $('#deskripsi, #kriteria, #cara_daftar, #info_tambahan').summernote({
            height: 150,
        });

        $('.masonry').masonry({
            // options
            itemSelector: '.masonry-item',
            percentPosition: true,
        });

        if ($("#edit_lowongan_admin").length > 0) {
            $("#edit_lowongan_admin").validate({

                rules: {
                    judul: {
                        required: true,
                        maxlength: 255
                    },
                    deskripsi: {
                        required: true,
                    },
                    tipe_pekerjaan: {
                        required: true,
                    },
                    lama_kontrak: {
                        required: true,
                    },
                    jenis_kontrak: {
                        required: true,
                    },
                    deadline_daftar: {
                        required: true,
                    },
                    kriteria: {
                        required: true,
                        maxlength: 30000,
                    },
                    cara_daftar: {
                        required: true,
                        maxlength: 30000,
                    },
                    info_tambahan: {
                        maxlength: 30000,
                    },
                },
                // messages: {
                // },
                submitHandler: function(form) {
                    
                    $.ajax({
                        url: "<?= base_url('admin/lowongan/'). $lowongan['id'] ?>",
                        type: "POST",
                        data: $(form).serialize(),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        dataType: "json",
                        // processData: false,
                        // contentType: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Success',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "<?= base_url('admin/lowongan') ?>";
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
        }

        $('#btn_save').on('click', function() {
            if ($('#edit_lowongan_admin').valid()) {
                $('#edit_lowongan_admin').submit();
            }
        });
    });
</script>

<?= $this->endSection() ?>