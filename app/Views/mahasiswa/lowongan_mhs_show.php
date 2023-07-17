<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<?php if($lowongan['daftar_langsung'] == 1) :?>
<div class="col-auto">
    <div class="btn-list">
        <a id="btn_daftar" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-daftar-lowongan">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 14l11 -11"></path>
                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
            </svg>
            Daftar
        </a>
    </div>
</div>
<?php endif; ?>
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
                                        Tenggat Daftar : <?= convertDate($lowongan['deadline_daftar'], 'd-m-Y')  ?>
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
                        <?php if(isset($lowongan['alamat_perusahaan'])) :?>
                        <div class="mb-3">
                            <small class="form-hint">Lokasi</small>
                            <?= $lowongan['alamat_perusahaan'] ?>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($lowongan['email'])) :?>
                        <div class="mb-3">
                            <small class="form-hint">Email</small>
                            <?= $lowongan['email_perusahaan'] ?>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($lowongan['whatsapp_perusahaan'])) :?>
                        <div class="mb-3">
                            <small class="form-hint">Whatsapp</small>
                            <?= $lowongan['whatsapp_perusahaan'] ?>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($lowongan['deskripsi_perusahaan'])) :?>
                        <div class="mb-3">
                            <small class="form-hint">Profil Perusahaan</small>
                            <?= $lowongan['deskripsi_perusahaan'] ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <?= $lowongan['lama_kontrak'] . ' (' . $lowongan['tipe_pekerjaan'] . ' - ' . $lowongan['jenis_kontrak'] . ')' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($lowongan['daftar_langsung'] == 1) :?>
<!-- Modal Daftar -->
<div class="modal modal-blur fade" id="modal-daftar-lowongan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="form_daftar_lowongan">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Lowongan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cv" class="form-label required">CV</label>
                        <small class="form-hint">File : .pdf</small>
                        <input type="file" class="form-control" name="cv" id="cv">
                    </div>
                    <div class="mb-3">
                        <label for="dokumen_pendukung" class="form-label">Dokumen Pendukung</label>
                        <small class="form-hint">File : .pdf</small>
                        <input type="file" class="form-control" name="dokumen_pendukung" id="dokumen_pendukung">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button id="submit_daftar" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        <?php if($lowongan['daftar_langsung'] == 1) :?>
            $("#form_daftar_lowongan").validate({
            ignore: [],
            rules: {
                cv: {
                    required: true,
                    extension: "pdf",
                },
                dokumen_pendukung: {
                    extension: "pdf",
                },
            },
            // messages: {
            // },
            submitHandler: function(form) {
                var form_data = new FormData(form);

                $.ajax({
                    url: "<?= base_url('mahasiswa/lowongan/lamar/' . $lowongan['id']) ?>",
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
                                    window.location.href = "<?= base_url('mahasiswa/lowongan') ?>";
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

        $('#submit_daftar').on('click', function() {
            if ($('#form_daftar_lowongan').valid()) {
                $('#form_daftar_lowongan').submit();
            }
        });
        <?php endif; ?>
    });
</script>
<?= $this->endSection() ?>