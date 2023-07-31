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
        <form id="tambah_lowongan_perusahaan">
            <div class="row row-cards masonry">
                <div class="col-md-6 masonry-item">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Lowongan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="row">
                                    <label class="col col-form-label">Daftar langsung</label>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input id="daftar_langsung" name="daftar_langsung" class="form-check-input" type="checkbox" value="1">
                                        </label>
                                    </span>
                                </label>
                                <small class="form-hint">Mahasiswa dapat langsung melamar melalui website ini.</small>
                            </div>
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
                                <label for="deadline_daftar" class="form-label required">Tenggat Pendaftaran</label>
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
            </div>
        </form>
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
                    $('#tambah_lowongan_perusahaan').validate().element('.summernote');
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

        $("#tambah_lowongan_perusahaan").validate({
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
                },
                cara_daftar: {
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
                    url: "<?= base_url('perusahaan/lowongan') ?>",
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
                                    window.location.href = "<?= base_url('perusahaan/lowongan') ?>";
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
            if ($('#tambah_lowongan_perusahaan').valid()) {
                $('#tambah_lowongan_perusahaan').submit();
            }
        });
    });
</script>
<?= $this->endSection() ?>