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
                                <textarea class="summernote" name="deskripsi" id="deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kemampuan yang dibutuhkan</label>
                                <select class="form-select" name="skill" id="skill"></select>
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
                                <label class="form-label required">Kriteria</label>
                                <textarea class="summernote" name="kriteria" id="kriteria"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Cara Mendaftar</label>
                                <textarea class="summernote" name="cara_daftar" id="cara_daftar"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Info Tambahan</label>
                                <textarea class="summernote" name="info_tambahan" id="info_tambahan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3 class="card-title">Detail Perusahaan</h3>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_detail_perusahaan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21l18 0"></path>
                                    <path d="M9 8l1 0"></path>
                                    <path d="M9 12l1 0"></path>
                                    <path d="M9 16l1 0"></path>
                                    <path d="M14 8l1 0"></path>
                                    <path d="M14 12l1 0"></path>
                                    <path d="M14 16l1 0"></path>
                                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
                                </svg>
                                Pilih Perusahaan
                            </a>
                        </div>
                        <div class="card-body">
                            <input type="text" name="id_perusahaan" id="id_perusahaan" hidden>
                            <div class="mb-3">
                                <label class="form-label required">Nama Perusahaan</label>
                                <input readonly type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_perusahaan" class="form-label required">Alamat Perusahaan</label>
                                <textarea readonly class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email_perusahaan" class="form-label required">Email Perusahaan</label>
                                <input readonly type="text" class="form-control" name="email_perusahaan" id="email_perusahaan" placeholder="Email Perusahaan">
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp_perusahaan" class="form-label required">Whatsapp Perusahaan</label>
                                <input readonly type="text" class="form-control" name="whatsapp_perusahaan" id="whatsapp_perusahaan" placeholder="Whatsapp Perusahaan">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_perusahaan" class="form-label required">Deskripsi Perusahaan</label>
                                <textarea readonly class="form-control" name="deskripsi_perusahaan" id="deskripsi_perusahaan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detail Perusahaan -->
<div class="modal modal-blur fade" id="modal_detail_perusahaan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs_cari_perusahaan" class="nav-link fw-bold active" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M18.5 18.5l2.5 2.5"></path>
                                <path d="M4 6h16"></path>
                                <path d="M4 12h4"></path>
                                <path d="M4 18h4"></path>
                            </svg>
                            Cari
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs_tambah_perusahaan" class="nav-link fw-bold" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-text-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M19 10h-14"></path>
                                <path d="M5 6h14"></path>
                                <path d="M14 14h-9"></path>
                                <path d="M5 18h6"></path>
                                <path d="M18 15v6"></path>
                                <path d="M15 18h6"></path>
                            </svg>
                            Tambah
                        </a>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="tab-content">

                    <!-- Cari -->
                    <div class="tab-pane active show" id="tabs_cari_perusahaan">
                        <div class="mb-3">
                            <div class="input-icon mb-3">
                                <input id="cari_perusahaan" name="cari_perusahaan" type="text" value="" class="form-control" placeholder="Nama Perusahaan...">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div id="result_cari_perusahaan">
                            <div class="container text-center">
                                <span>
                                    Harap mencari terlebih dahulu sebelum menambahkan perusahaan baru
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Tambah -->
                    <div class="tab-pane" id="tabs_tambah_perusahaan">
                        <div class="mb-3">
                            <label class="form-label required">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="tambah_nama_perusahaan" id="tambah_nama_perusahaan" placeholder="Nama Perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_perusahaan" class="form-label required">Alamat Perusahaan</label>
                            <textarea class="form-control" name="tambah_alamat_perusahaan" id="tambah_alamat_perusahaan" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="email_perusahaan" class="form-label required">Email Perusahaan</label>
                            <input type="text" class="form-control" name="tambah_email_perusahaan" id="tambah_email_perusahaan" placeholder="Email Perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp_perusahaan" class="form-label required">Whatsapp Perusahaan</label>
                            <input type="text" class="form-control" name="tambah_whatsapp_perusahaan" id="tambah_whatsapp_perusahaan" placeholder="Whatsapp Perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_perusahaan" class="form-label required">Deskripsi Perusahaan</label>
                            <textarea class="form-control" name="tambah_deskripsi_perusahaan" id="tambah_deskripsi_perusahaan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 150,
            callbacks: {
                onChange: function(contents, $editable) {
                    // Trigger validation when the contents of the Summernote editor change
                    $('#tambah_lowongan_mhs').validate().element('.summernote');
                }
            }
        });

        $('#skill').select2({
            placeholder: 'Masukkan kemampuan yang dibutuhkan',
            multiple: true,
            ajax: {
                url: "<?= base_url('api/select2Skill') ?>",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data,

                    };
                },
                cache: true
            },
            tags: true, // allow manually adding new tags
            createTag: function(params) { // create new tag
                return {
                    id: params.term,
                    text: params.term,
                    isNew: true
                }
            },
            minimumInputLength: 2 // minimum number of characters before triggering search
        });

        $('#skill').on('select2:select', function(e) {
            var data = e.params.data;

            if (data.isNew) {
                // Add the new skill to the database
                $.post("<?= base_url('api/createselect2Skill') ?>", {
                    nama: data.text
                }, function(result) {
                    Toast.fire({
                        icon: result.status,
                        title: result.message
                    });

                    if (result.status === 'success' && result.last_id) {
                        // Manually update the option's value with the received last_id
                        var $optionToUpdate = $('#skill').find('option[data-select2-tag=true][value="' + data.text + '"]');
                        $optionToUpdate.val(result.last_id).attr('selected', true);
                        $('#skill').trigger('change');
                    }
                });
            }
        });

        $('.masonry').masonry({
            // options
            itemSelector: '.masonry-item',
            percentPosition: true,
        });

        $("#tambah_lowongan_mhs").validate({
            ignore: [],
            rules: {
                judul: {
                    required: true,
                    maxlength: 255
                },
                deskripsi: {
                    required: true,
                },
                skill: {
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
                nama_perusahaan: {
                    required: true,
                },
                alamat_perusahaan: {
                    required: true,
                },
            },
            // messages: {
            // },
            errorPlacement: function(error, element) {
                if (element.hasClass("summernote")) {
                    // Show error message inside the Summernote editor
                    error.appendTo(element.siblings(".note-editor"));
                } else {
                    // Show error message normally
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                var form_data = $(form).serializeArray();
                var skill_ids = $.map($(form).find('#skill option:selected'), function(option) {
                    return option.value;
                });
                form_data.push({
                    name: 'skill_ids',
                    value: skill_ids
                });

                $.ajax({
                    url: "<?= base_url('mahasiswa/lowongan') ?>",
                    type: "POST",
                    data: form_data,
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

        $('#cari_perusahaan').keyup(debounce(function() {
            var cari_perusahaan = this.value;

            if (cari_perusahaan == '') {
                $('#result_cari_perusahaan').html('<div class="container text-center"><span>Harap mencari terlebih dahulu sebelum menambahkan perusahaan baru</span></div>');

            } else {
                $.ajax({
                    url: "<?= base_url('api/searchPerusahaan') ?>",
                    type: "POST",
                    data: {
                        cari_perusahaan: cari_perusahaan
                    },
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    // dataType: "json",
                    // processData: false,
                    // contentType: false,
                    success: function(response) {
                        $('#result_cari_perusahaan').html(response);
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

        }, 300));

        function debounce(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this,
                    args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }


        $('#btn_save').on('click', function() {
            if ($('#tambah_lowongan_mhs').valid()) {
                $('#tambah_lowongan_mhs').submit();
            }
        });

        var tab_tambah_input = $('#tabs_tambah_perusahaan').find('input, textarea');
        tab_tambah_input.on('change', function() {
            var value = $(this).val();
            var label = $(this).prev('label').text();
            console.log(label + ':', value);

            $('#id_perusahaan').val();
            $('#nama_perusahaan').val($('#tambah_nama_perusahaan').val());
            $('#alamat_perusahaan').val($('#tambah_alamat_perusahaan').val());
            $('#email_perusahaan').val($('#tambah_email_perusahaan').val());
            $('#whatsapp_perusahaan').val($('#tambah_whatsapp_perusahaan').val());
            $('#deskripsi_perusahaan').val($('#tambah_deskripsi_perusahaan').val());
        });
    });

    function pilihPerusahaan(button) {
        var card = event.target.closest('.card-body');
        var id = button.id;
        var name = card.querySelector('#compName').textContent;
        var whatsapp = card.querySelector('#compWhatsapp').textContent;
        var email = card.querySelector('#compEmail').textContent;
        var deskripsi = card.querySelector('#compDeskripsi').textContent;
        var alamat = card.querySelector('#compAlamat').textContent;

        $('#nama_perusahaan').val(name);
        $('#whatsapp_perusahaan').val(whatsapp);
        $('#email_perusahaan').val(email);
        $('#alamat_perusahaan').val(alamat);
        $('#id_perusahaan').val(id);
        $('#deskripsi_perusahaan').val(deskripsi);
    }
</script>
<?= $this->endSection() ?>