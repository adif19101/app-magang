<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <form id="tambah_lowongan_mhs">
            <div class="row row-cards masonry">
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Lowongan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Lowongan">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label required">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tipe_pekerjaan" class="form-label required">Tipe Pekerjaan</label>
                                <select class="form-select" name="tipe_pekerjaan" id="tipe_pekerjaan">
                                    <option value="WFO">Work From Office</option>
                                    <option value="WFH">Work From Home</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Lama Kontrak</label>
                                <input type="text" class="form-control" name="lama_kontrak" id="lama_kontrak" placeholder="Lama Kontrak">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Jenis Kontrak</label>
                                <select name="jenis_kontrak" id="jenis_kontrak" class="form-select">
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
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
                                <input type="date" class="form-control" name="deadline_daftar" id="deadline_daftar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Persyaratan</label>
                                <textarea name="persyaratan" id="persyaratan"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Cara Mendaftar</label>
                                <textarea name="cara_daftar" id="cara_daftar"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Info Tambahan</label>
                                <textarea name="info_tambahan" id="info_tambahan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Perusahaan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_perusahaan" class="form-label required">Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kontak_perusahaan" class="form-label required">Kontak Perusahaan</label>
                                <input type="text" class="form-control" name="kontak_perusahaan" id="kontak_perusahaan" placeholder="Kontak Perusahaan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 masonry-item">
                    <div class="text-end">
                        <button id="btn_submit" type="submit" class="btn btn-primary my-3">Submit</button>
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
        $('#deskripsi, #persyaratan, #cara_daftar, #info_tambahan').summernote({
            height: 150,
        });

        $('.masonry').masonry({
            // options
            itemSelector: '.masonry-item',
            percentPosition: true,
        });

        if ($("#tambah_lowongan_mhs").length > 0) {
            $("#tambah_lowongan_mhs").validate({

                rules: {
                    judul: {
                        required: true,
                        maxlength: 255
                    },
                    // deskripsi: {
                    //     required: true,
                    // },
                    // tipe_pekerjaan: {
                    //     required: true,
                    // },
                    // lama_kontrak: {
                    //     required: true,
                    // },
                    // jenis_kontrak: {
                    //     required: true,
                    // },
                    // deadline_daftar: {
                    //     required: true,
                    // },
                    // persyaratan: {
                    //     required: true,
                    // },
                    // cara_daftar: {
                    //     required: true,
                    // },
                    // nama_perusahaan: {
                    //     required: true,
                    // },
                    // alamat_perusahaan: {
                    //     required: true,
                    // },
                    // kontak_perusahaan: {
                    //     required: true,
                    // },
                },
                // messages: {
                // },
                submitHandler: function(form) {
                    
                    $.ajax({
                        url: "<?= base_url('mahasiswa/lowongan') ?>",
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
        }
    });
</script>
<?= $this->endSection() ?>