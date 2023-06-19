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
        <form id="buat_surat_plot">
            <div class="row row-cards masonry">
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Surat Plot Pembimbing</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Nama Lengkap</label>
                                <!-- TODO kkasih value default pke dari profile -->
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email Aktif">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">NPM</label>
                                <input type="text" class="form-control" name="npm" id="npm" placeholder="NPM">
                            </div>
                            <div class="mb-3">
                                <label for="surat_covid" class="form-label required">Surat Pernyataan Mengikuti Protokol Kesehatan Selama Magang Dan Pertanggung Jawaban Resiko Covid19</label>
                                <input type="file" class="form-control" name="surat_covid" id="surat_covid">
                            </div>
                            <div class="mb-3">
                                <label for="surat_balasan" class="form-label required">Surat Balasan Dari Unit Tujuan Magang</label>
                                <input type="file" class="form-control" name="surat_balasan" id="surat_balasan">
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
                                <label class="form-label required">Nama Tempat Magang</label>
                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_perusahaan" class="form-label required">Alamat Tempat Magang</label>
                                <textarea class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Nama Penanggung Jawab di Tempat Magang</label>
                                <input type="text" class="form-control" name="nama_penanggung_jawab" id="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Nomor Kontak Penanggung Jawab di Tempat Magang</label>
                                <input type="text" class="form-control" name="hp_penanggung_jawab" id="hp_penanggung_jawab" placeholder="Nomor Penanggung Jawab">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Latitude Tempat Magang</label>
                                <small class="form-hint">nilai pertama di koordinat (contoh -6.367712, 107.277014; berarti latitude = -6.36...)</small>
                                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Longitude Tempat Magang</label>
                                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label required">Tanggal Awal/Mulai Magang</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label required">Tanggal Selesai Magang</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Bidang Minat</label>
                                <select class="form-select" name="bidang_minat" id="bidang_minat">
                                    <option value="">Pilih Bidang Minat</option>
                                    <option value="Software Engineering">Software Engineering</option>
                                    <option value="Computer Network">Computer Network</option>
                                    <option value="Data Science">Data Science</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="rencana_magang" class="form-label required">Rencana Magang</label>
                                <small class="form-hint">Tulis deskripsi kegiatan yang akan dilakukan selama magang</small>
                                <textarea class="form-control" name="rencana_magang" id="rencana_magang" rows="3"></textarea>
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

        $("#buat_surat_plot").validate({
            ignore: [],
            rules: {
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                email: {
                    required: true,
                    maxlength: 255
                },
                npm: {
                    required: true,
                    digits: true,
                    minlength: 13,
                    maxlength: 13
                },
                surat_covid: {
                    required: true,
                },
                surat_balasan: {
                    required: true,
                },
                nama_perusahaan: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                alamat_perusahaan: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                nama_penanggung_jawab: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                hp_penanggung_jawab: {
                    required: true,
                    digits: true,
                    minlength: 9
                },
                latitude: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                longitude: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                tanggal_mulai: {
                    required: true,
                },
                tanggal_selesai: {
                    required: true,
                },
                bidang_minat: {
                    required: true,
                },
                rencana_magang: {
                    required: true,
                },
            },
            // messages: {
            // },
            // errorPlacement: function(error, element) {
            //     if (element.hasClass("summernote")) {
            //         // Show error message inside the Summernote editor
            //         error.appendTo(element.siblings(".note-editor"));
            //     } else {
            //         // Show error message normally
            //         error.insertAfter(element);
            //     }
            // },
            submitHandler: function(form) {
                var form_data = new FormData(form);

                $.ajax({
                    url: "<?= base_url('mahasiswa/suratPlot') ?>",
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

        $('#btn_save').on('click', function() {
            if ($('#buat_surat_plot').valid()) {
                $('#buat_surat_plot').submit();
            }
        });
    });
</script>
<?= $this->endSection() ?>